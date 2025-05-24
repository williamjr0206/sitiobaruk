<?php
session_start();

require_once __DIR__ . '/../../config/database.php';

//Inclusão ou alteração de funcionário proveniente da tela funcionário.html

$cpf = $_POST["cpf"];
$nome = $_POST["nome"];
$nascimento = $_POST["nascimento"];
$opcao = $_POST["opcao"];
//$sql="SELECT * FROM cliente";
if ($opcao=="alterar"){
$sql="UPDATE funcionario SET data_nascimento='$nascimento' WHERE cpf='$cpf'";
if($con->query($sql)){
//if (mysqli_fetch_array($res)) {
	echo "Registro alterado com sucesso";
}
    else{
		echo " Registro não alterado !!!";

	}
	
}
else{
	$sql="INSERT INTO funcionario(cpf,nome,data_nascimento) VALUES ('$cpf','$nome','$nascimento')";
    if ($con->query($sql)) {
       echo "Novo registro inserido com sucesso !";
	}
    else{
		echo " Registro não inserido !!!";

	}
	   
}
//mysqli_close($con);

?>
    <a href="../telas/funcionario.html">Voltar.</a>
