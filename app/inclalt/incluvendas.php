<?php
session_start();

require_once __DIR__ . '/../../config/database.php';

//Inclusão ou alteração de vendas proveniente a tela venda.php

$data = $_POST["data"];
$cliente=$_POST["cliente"];
$produto = $_POST["produto"];
$quantidade = $_POST["quantidade"];
$sql="INSERT INTO venda(data,idcliente,idproduto,quantidade) VALUES ('$data','$cliente','$produto','$quantidade')";
    if ($con->query($sql)) {
       echo "Novo registro inserido com sucesso !";
	}
    else{
		echo " Registro não inserido !!!";
		}
 

$con=null;

?>
    <a href="../telas/venda.php">Voltar.</a>
