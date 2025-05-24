<?php
session_start();

require_once __DIR__ . '/../../config/database.php';

//Inclusão ou alteração de tarefas proveniente a tela tarefa.html

$idtarefa = $_POST["idtarefa"];
$descricao = $_POST["descricao"];
$tempo = $_POST["tempo"];
$roteiro = $_POST["roteiro"];
$opcao = $_POST["opcao"];
//$sql="SELECT * FROM cliente";
if ($opcao=="alterar"){
$sql="UPDATE tarefa SET roteiro='$roteiro' WHERE idtarefa='$idtarefa'";
if($con->query($sql)){
//if (mysqli_fetch_array($res)) {
	echo "Registro alterado com sucesso";
}
	    else{
		echo " Registro não atualizado !!!";
	}

}
else{
	$sql="INSERT INTO tarefa(idtarefa,descricao,tempo,roteiro) VALUES ('$idtarefa','$descricao','$tempo','$roteiro')";
    if ($con->query($sql)) {
       echo "Novo registro inserido com sucesso !";
	}
    else{
		echo " Registro não inserido !!!";
		}
 
}
$con=null;

?>
    <a href="../telas/tarefa.html">Voltar.</a>
