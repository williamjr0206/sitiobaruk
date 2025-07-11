<?php
session_start();

require_once __DIR__ . '/../../config/database.php';

//Inclusão ou alteração de família proveniente a tela familia.html

$idstatus = $_POST["idstatus"];
$descricao = $_POST["descricao"];
$opcao = $_POST["opcao"];
if ($opcao=="alterar"){
$sql="UPDATE familia SET descricao='$descricao' WHERE idstatus='$idstatus'";
if($con->query($sql)){
	echo "Registro alterado com sucesso";
}
	    else{
		echo " Registro não atualizado !!!";
	}

}
else{
	$sql="INSERT INTO familia(idstatus,descricao) VALUES ('$idstatus','$descricao')";
    if ($con->query($sql)) {
       echo "Novo registro inserido com sucesso !";
	}
    else{
		echo " Registro não inserido !!!";
		}
 
}
$con=null;

?>
    <a href="../telas/familia.html">Voltar.</a>
