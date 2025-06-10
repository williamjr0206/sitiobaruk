<?php

session_start();
require_once __DIR__ . '/../../config/database.php';


//Buscando dados
$datainicial = $_POST["data_inicio"];
$datafinal = $_POST["data_final"];


// Consulta SQL
$sql = "SELECT funcionario.nome, SUM(producao.quantidade) from producao inner join funcionario on producao.cpf=funcionario.cpf where producao.data between '$datainicial' and '$datafinal' GROUP BY funcionario.nome order by funcionario.nome";
$res = $con->query($sql);

// Preparar os dados para o gráfico
$funcionario = [];
$quantidade = [];


while($row=$res->fetch(PDO::FETCH_ASSOC)){
        $funcionario[] = $row['nome'];
        $quantidade[] = $row['SUM(producao.quantidade)'];
    }


//$con=null;
       ?>
       <!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/graficos.css" rel="stylesheet">
    <title>Gráfico de Barras</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Consulta da Produção Por Funcionário.</h1>
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
        const categorias = <?php echo json_encode($funcionario); ?>;
        const valores = <?php echo json_encode($quantidade); ?>;


        // Configuração do gráfico
        const ctx = document.getElementById('graficoBarras').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: categorias,
                datasets: [{
                    label: 'Produção em gramas',
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
    <br><br>
<a href="../telas/producaograficos.html">Voltar</a>
</div>
</body>
</html>
