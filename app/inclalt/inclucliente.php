<?php
session_start();

require_once __DIR__ . '/../../config/database.php';

//Inclusão ou alteração de cliente proveniente da tela cliente.html

$cnpj = $_POST["cnpj"];
$razao = $_POST["razao"];
$opcao = $_POST["opcao"];
if(isset($_POST["opcao"])){
	if ($opcao=="opcao2"){
		$sql="UPDATE cliente SET razao='$razao' WHERE idcliente='$cnpj'";
			if($con->query($sql)){
				echo "Registro alterado com sucesso";
			}
    		else{
				echo " Registro não alterado !!!";

			}
	}
	elseif($opcao == "opcao1"){
		$sql="INSERT INTO cliente(idcliente,razao) VALUES ('$cnpj','$razao')";
    	if ($con->query($sql)) {
       		echo "Novo registro inserido com sucesso !";
		}
    	else{
			echo " Registro não inserido !!!";
		}
	}	
	elseif($opcao == "opcao3"){
		$sql="DELETE FROM cliente WHERE idcliente='$cnpj'";
			if($con->query($sql)){
			echo "Registro excluído com sucesso !";
		}
		else{
			echo "Registro não excluído !";
		}
	}
}

else{
	echo "Escolha uma opção (Incluir/Alterar/Excluir)";}



$con=null;

?>
    <a href="../telas/cliente.html">Voltar.</a>
