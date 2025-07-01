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
	        echo"<a href='../cons/listagemtarefasp.php'>Listagem de Tarefas.</a>";
	        echo"<a href='../cons/listagemfunc.php'>Listagem de Funcionários.</a>";
            echo"<a href='../cons/listagemusuarios.php'>Listagem de Usuários.</a>";
            echo"<a href='../cons/listagemprodutos.php'>Listagem de Produtos.</a>";
            echo "<a href='../cons/listagemclientes.php'>Listagem de Clientes.</a>";
    }
    ?>
	<a href="../cons/consultas.php">Voltar as Consultas.</a>
</body>
</html>