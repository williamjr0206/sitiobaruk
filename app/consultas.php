<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sítio Baruk</title>
    <link href="css/inicio.css" rel="stylesheet">
</head>
<body>
    <?php echo "<h1>Consultas:  ". $_SESSION["nome"]."</h1>";?> 
    <p>Escolha uma das opções abaixo para navegar:</p>
    <?php if($_SESSION["permissao"]==1){
            echo "<a href='funcportarefas.html'>Funcionários por tarefas.</a>";
            echo"<a href='programacao.html'>Programação por Data.</a>";
            echo"<a href='horarioporfunc.php'>Horários por Funcionários</a>";
	        echo"<a href='listagemtarefas.php'>Listagem de Tarefas.</a>";
            echo"<a href='programacaoporfunc.php'>Programação por Funcionário.</a>";
    }
    if($_SESSION["permissao"]==2){
        echo"<a href='listagemtarefas.php'>Listagem de Tarefas.</a>";
        echo"<a href='programacaoporfunc.php'>Programação por Funcionário.</a>";
    }
    ?>
	<a href="inicio.php">Voltar ao início</a>
</body>
</html>