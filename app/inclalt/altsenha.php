<?php
session_start();

require_once __DIR__ . '/../../config/database.php';

//alteração de senha de usuário proveniente da tela redsenha.php

$usuario=$_SESSION["cpf"];
$senha=$_POST["senha"];
$sql="UPDATE usuario SET senha='$senha' WHERE cpf='$usuario'";
if($con->query($sql)){
	echo "Senha alterada com Sucesso";
}
    else{
		echo " Senha não alterada !!!";

	}

 $con=null;
 
?>
<a href="../telas/redsenha.php">Voltar</a>