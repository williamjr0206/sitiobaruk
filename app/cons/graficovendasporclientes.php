<?php
session_start();
require_once __DIR__ . '/../../config/database.php';


//Buscando dados
$datainicial = $_POST["data_inicio"];
$datafinal = $_POST["data_final"];

// Consulta SQL
$sql = "SELECT cliente.razao, SUM(venda.quantidade*produto.preco) from venda inner join produto on venda.idproduto=produto.idproduto inner join cliente on venda.idcliente=cliente.idcliente where venda.data between '$datainicial' and '$datafinal' group by cliente.razao";
$res = $con->query($sql);

// Preparar os dados para o gráfico
$cliente = [];
$faturamento = [];
$totalfaturado=[];
$totalfaturado=0;


while($row=$res->fetch(PDO::FETCH_ASSOC)){
        $cliente[] = $row['razao'];
        $faturamento[] = $row['SUM(venda.quantidade*produto.preco)'];
        $totalfaturado=$totalfaturado+$row['SUM(venda.quantidade*produto.preco)'];
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
    <h1>Vendas Por Clientes.</h1>
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
        const categorias = <?php echo json_encode($cliente); ?>;
        const valores = <?php echo json_encode($faturamento); ?>;


        // Configuração do gráfico
        const ctx = document.getElementById('graficoBarras').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: categorias,
                datasets: [{
                    label: 'Faturamento em R$',
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
<?php
    echo "Total Faturado no Período é R$ ".$totalfaturado; ?>    
<a href="../telas/vendasporclientes.html">Voltar</a>    
</div>
