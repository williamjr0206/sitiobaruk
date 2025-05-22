<?php
session_start();
//date_default_timezone_set('America/Sao_Paulo'); // Define o fuso horário
//$horaLocal=new DateTime();
//echo $horaLocal->format('H:i');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Redefinir Senha</title>
		<meta charset="utf-8">
		<link href="estilocad.css" rel="stylesheet">
	</head>
	<body>
	<h1><u><i>Redefinir Senha:</h1></u></i>
		<form method="POST" action="altsenha.php">
			Usuário: <?php echo $_SESSION["nome"]; ?><br><br>
            <label for="senha">Entre com a nova Senha:</label><br>
            <input type="password" name="senha" required><br><br>
            <input type="submit" value="Alterar senha"><br><br>
            <a href="inicio.php">Voltar para o início</a>
        </form>
    </body>
</html>    
    
          

