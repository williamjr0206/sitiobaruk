<?php
session_start();

require_once __DIR__ . '/../../config/database.php';

//Inclusão ou alteração de cliente proveniente da tela cliente.html

$cnpj = $_POST["cnpj"];
$razao = $_POST["razao"];
$opcao = $_POST["opcao"];
if ($opcao=="alterar"){
$sql="UPDATE cliente SET razao='$razao' WHERE idcliente='$cnpj'";
if($con->query($sql)){
	echo "Registro alterado com sucesso";
}
    else{
		echo " Registro não alterado !!!";

	}
	
}
else{
	$sql="INSERT INTO cliente(idcliente,razao) VALUES ('$cnpj','$razao')";
    if ($con->query($sql)) {
       echo "Novo registro inserido com sucesso !";
	}
    else{
		echo " Registro não inserido !!!";

	}
	   
}
$con=null;

?>
    <a href="../telas/cliente.html">Voltar.</a>
