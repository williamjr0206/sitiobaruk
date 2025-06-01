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
    <?php echo "<h1>Consultas:  ". $_SESSION["nome"]."</h1>";?> 
    <p>Escolha uma das opções abaixo:</p>
    <?php if($_SESSION["permissao"]==1){
            echo "<a href='../telas/funcportarefas.html'>Funcionários por tarefas.</a>";
            echo"<a href='../telas/programacao.html'>Programação por Data.</a>";
            echo"<a href='../telas/horarioporfunc.php'>Horários de Funcionários</a>";
	        echo"<a href='../cons/listagemtarefasp.php'>Listagem de Tarefas.</a>";
            echo"<a href='../telas/programacaoporfunc.php'>Programação por Funcionário.</a>";
	        echo"<a href='../cons/listagemfunc.php'>Listagem de Funcionários.</a>";
            echo"<a href='../telas/totaisdehorasporfunc.html'>Horas Trabalhadas por Período.</a>";
            echo"<a href='../telas/mediatarefas.html'>Média dos Tempos de Execução das Tarefas.</a>";            
    }
    if($_SESSION["permissao"]==2){
        echo"<a href='../cons/listagemtarefas.php'>Listagem de Tarefas.</a>";
        echo"<a href='../telas/programacaoporfunc.php'>Programação por Funcionário.</a>";
    }
    ?>
	<a href="../telas/inicio.php">Voltar ao início</a>
</body>
</html>