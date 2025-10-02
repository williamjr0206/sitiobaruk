<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sítio Baruk</title>
    <link href="../css/inicio.css" rel="stylesheet">
</head>
<body>
    <?php echo "<h1>Cadastros:  ". $_SESSION["nome"]."</h1>";?> 
    <p>Escolha uma das opções abaixo:</p>
    <?php if($_SESSION["permissao"]==1){
    echo "<a href='../telas/funcionario.html'>Funcionário.</a>";    
    echo "<a href='../telas/tarefa.html'>Tarefas.</a>";
    echo "<a href='../telas/familia.html'>Família de Produtos.</a>";
    echo "<a href='../telas/centrodecusto.html'>Centro de Custos.</a>";
    echo"<a href='../telas/custos.php'>Custos e Despesas.</a>";
    echo "<a href='../telas/produtos.php'>Produtos.</a>";
    echo"<a href='../telas/programacao.php'>Programação de Tarefas.</a>";
    echo"<a href='../telas/cliente.html'>Clientes.</a>";
    echo"<a href='../telas/venda.php'>Vendas.</a>";
    echo"<a href='../telas/usuario.php'>Usuários.</a>";
    }
    ?>
	<a href="../telas/inicio.php">Voltar ao início</a>
</body>
</html>