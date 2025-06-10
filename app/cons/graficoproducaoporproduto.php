<?php
session_start();
require_once __DIR__ . '/../../config/database.php';


//Buscando dados
$datainicial = $_POST["data_inicio"];
$datafinal = $_POST["data_final"];

// Consulta SQL
$sql = "SELECT produto.descricao, SUM(producao.quantidade) from producao inner join produto on producao.idproduto=produto.idproduto where producao.data between '$datainicial' and '$datafinal' GROUP BY produto.descricao order by produto.descricao";
$res = $con->query($sql);

// Preparar os dados para o gráfico
$produto = [];
$quantidade = [];


while($row=$res->fetch(PDO::FETCH_ASSOC)){
        $produto[] = $row['descricao'];
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
    <h1>Consulta da Produção Por Produto.</h1>
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
        const categorias = <?php echo json_encode($produto); ?>;
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
<a href="../telas/producaoporproduto.html">Voltar</a>    
</div>
