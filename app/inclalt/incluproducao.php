<?php
session_start();

require_once __DIR__ . '/../../config/database.php';

//Inclusão ou alteração de produção proveniente a tela producao.php

$data = $_POST["data"];
$cpf=$_SESSION["cpf"];
$produto = $_POST["produto"];
$quantidade = $_POST["quantidade"];
$sql="INSERT INTO producao(data,cpf,idproduto,quantidade) VALUES ('$data','$cpf','$produto','$quantidade')";
    if ($con->query($sql)) {
       echo "Novo registro inserido com sucesso !";
	}
    else{
		echo " Registro não inserido !!!";
		}
 

$con=null;

?>
    <a href="../telas/producao.php">Voltar.</a>
