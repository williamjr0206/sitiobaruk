<?php
session_start();
require_once __DIR__ . '/../config/database.php';
$data = $_POST["data"];
$funcionario = $_POST["funcionario"];
$tarefa = $_POST["tarefa"];
$observacao = $_POST["observacao"];


$sql="INSERT INTO programacao(data,cpf,idtarefa,observacao,flag) VALUES ('$data','$funcionario','$tarefa','$observacao','1')";
    if ($con->query($sql)) {
       echo "Novo registro inserido com sucesso !";
}
    else{
		echo " Registro não inserido !!!";
		echo "<a ref=\"programacao.php\">Voltar</a>";
	}
//mysqli_close($con);

?>
    <a href="programacao.php">Voltar.</a>