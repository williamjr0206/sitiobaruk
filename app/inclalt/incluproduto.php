<?php
session_start();

require_once __DIR__ . '/../../config/database.php';

//Inclusão ou alteração de produtos proveniente a tela produtos.php

$idproduto = $_POST["idproduto"];
$descricao = $_POST["descricao"];
$preco = $_POST["preco"];
$unidade = $_POST["unidade"];
$familia=$_POST["familia"];
$opcao = $_POST["opcao"];
if(isset($_POST["opcao"])){
	if ($opcao=="opcao2"){
		$sql="UPDATE produto SET preco='$preco' WHERE idproduto='$idproduto'";;
			if($con->query($sql)){
				echo "Registro alterado com sucesso";
			}
    		else{
				echo " Registro não alterado !!!";

			}
	}
	elseif($opcao == "opcao1"){
		$sql="INSERT INTO produto(idproduto,descricao,preco,unidade, idstatus) VALUES ('$idproduto','$descricao','$preco','$unidade','$familia')";
    	if ($con->query($sql)) {
       		echo "Novo registro inserido com sucesso !";
		}
    	else{
			echo " Registro não inserido !!!";
		}
	}	
	elseif($opcao == "opcao3"){
		$sql="DELETE FROM produto WHERE idproduto = '$idproduto'";
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
    <a href="../telas/produtos.php">Voltar.</a>
