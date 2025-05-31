<?php
// Conexão com o banco de dados
session_start();
require_once __DIR__ . '/../../config/database.php';

//Buscando dados
$datainicial = $_POST["data_inicio"];
$datafinal = $_POST["data_final"];


// Consulta SQL
$sql = "SELECT funcionario.nome, SUM(coleta.temporeal) from coleta inner join funcionario on coleta.cpf=funcionario.cpf where coleta.data between '$datainicial' and '$datafinal' GROUP BY funcionario.nome";
$res = $con->query($sql);

// Preparar os dados para o gráfico
$nome = [];
$tempo = [];


while($row=$res->fetch(PDO::FETCH_ASSOC)){
        $nome[] = $row['nome'];
        $tempo[] = $row['SUM(coleta.temporeal)'];
    }


//$con=null;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfico de Barras</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Consulta de Horas Trabalhadas por Período.</h1>
<div style="width:30%;float:left">
    <?php
try{
$sql="SELECT funcionario.nome, SUM(coleta.temporeal) from coleta inner join funcionario on coleta.cpf=funcionario.cpf where coleta.data between '$datainicial' and '$datafinal' GROUP BY funcionario.nome";
$res=$con->query($sql);
echo "<table border='1'>";
echo "<th>Nome</th>";
echo "<th>Tempo em Horas</th>";
while($row=$res->fetch(PDO::FETCH_ASSOC)){//mysqli_fetch_array($res)){
echo "<tr>";
echo "<td>".$row["nome"]."</td>";
echo "<td>".round($row["SUM(coleta.temporeal)"],2)."</td>";
echo "</tr>";
}
echo "</table>";
}catch(PDOException $e){
	echo "Erro na conexão ou consulta: ".$e->getMessage();
}
$con=null;
?>

</div>
<div style="width:45%;float:left">
    <h3>Gráfico de Barras</h3>
    <?php
	$datai=new DateTime($datainicial);
	$dataf=new DateTime($datafinal);
    echo"Período de: ".$datai->format("d/m/Y")." a ".$dataf->format("d/m/Y");
    echo"<br><br>";
?>

    <canvas id="graficoBarras" width="2" height="1"></canvas>

    <script>
        // Dados do PHP para o JavaScript
        const categorias = <?php echo json_encode($nome); ?>;
        const valores = <?php echo json_encode($tempo); ?>;

        // Configuração do gráfico
        const ctx = document.getElementById('graficoBarras').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: categorias,
                datasets: [{
                    label: 'Horas',
                    data: valores,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <a href="../telas/totaisdehorasporfunc.html">Voltar</a>
</div>    
</body>
</html>
