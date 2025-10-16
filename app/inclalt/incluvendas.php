<?php
session_start();

require_once __DIR__ . '/../../config/database.php';

//Inclusão ou alteração de vendas proveniente a tela venda.php

$data = $_POST["data"];
$cliente=$_POST["cliente"];
$produto = $_POST["produto"];
$quantidade = $_POST["quantidade"];
$desconto = $_POST["desconto"];
$stmt =$con->prepare("SELECT produto.preco from produto where produto.idproduto='$produto'");
$stmt->execute();
$user = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($user as $usuario){
$preco = $usuario["preco"];
}
$preconeg = $preco - ($preco*$desconto/100);
$sql="INSERT INTO venda(data,idcliente,idproduto,quantidade,preconeg) VALUES ('$data','$cliente','$produto','$quantidade','$preconeg')";
    if ($con->query($sql)) {
       echo "Novo registro inserido com sucesso !";
	}
    else{
		echo " Registro não inserido !!!";
		}
 

$con=null;

?>
    <a href="../telas/venda.php">Voltar.</a>
