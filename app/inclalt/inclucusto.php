<?php
session_start();

require_once __DIR__ . '/../../config/database.php';

//Inclusão ou alteração de custos e despesas proveniente a tela custos.php

$data = $_POST["data"];
$custo = $_POST["centrodecusto"];
$valor = $_POST["valor"];
$sql="INSERT INTO custo(idcentro,data,valor) VALUES ('$custo','$data','$valor')";
    if ($con->query($sql)) {
       echo "Novo registro inserido com sucesso !";
	}
    else{
		echo " Registro não inserido !!!";
		}
 

$con=null;

?>
    <a href="../telas/custos.php">Voltar.</a>
