<?php
session_start();

require_once __DIR__ . '/../../config/database.php';

//Inclusão ou alteração de centro de custo proveniente da tela centrodecusto.html

$centrodecusto = $_POST["centrodecusto"];
$descricao = $_POST["descricao"];
$opcao = $_POST["opcao"];
if(isset($_POST["opcao"])){
	if ($opcao=="opcao2"){
		$sql="UPDATE centrodecusto SET descricao='$descricao' WHERE idcentro='$centrodecusto'";
			if($con->query($sql)){
				echo "Registro alterado com sucesso";
			}
    		else{
				echo " Registro não alterado !!!";

			}
	}
	elseif($opcao == "opcao1"){
		$sql="INSERT INTO centrodecusto(idcentro,descricao) VALUES ('$centrodecusto','$descricao')";
    	if ($con->query($sql)) {
       		echo "Novo registro inserido com sucesso !";
		}
    	else{
			echo " Registro não inserido !!!";
		}
	}	
	elseif($opcao == "opcao3"){
		$sql="DELETE FROM centrodecusto WHERE idcentro='$centrodecusto'";
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
    <a href="../telas/centrodecusto.html">Voltar.</a>
