<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sítio Baruk</title>
    <link href="../app/css/inicio.css" rel="stylesheet">
</head>
<body>
    <?php echo "<h1>Bem-vindo ao Sítio Baruk:  ". $_SESSION["nome"]."</h1>";?> 
    <p>Escolha uma das opções abaixo para navegar:</p>
    <?php if($_SESSION["permissao"]==1){
    echo "<a href='funcionario.html'>Cadastro de Funcionário.</a>";    
    echo "<a href='tarefa.html'>Cadastro de Tarefas.</a>";
    echo"<a href='programacao.php'>Cadastro de Programação de Tarefas.</a>";
    echo"<a href='usuario.php'>Cadastro de Usuários.</a>";
}?>
    <a href='consultas.php'>Consultas.</a>
    <a href="coleta_prog.php">Cadastro de Coletas de Dados.</a>
	<a href="redsenha.php">Alterar senha.</a>
	<a href="../public/login.html">Finalizar.</a>
</body>
</html>