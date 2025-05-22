<?php
session_start();
require_once __DIR__ . '/../config/database.php';
$data = $_POST["data"];
$funcionario = $_SESSION["cpf"];
$tarefa = $_POST["tarefa"];
$observacao = $_POST["observacao"];
$inicio = $_POST["inicio"];
$fim = $_POST["fim"];
$iniciohora = date("H",strtotime($inicio));
$iniciominuto = date("i",strtotime($inicio));
$t1 = ($iniciohora*60) + $iniciominuto;
$fimhora = date("H",strtotime($fim));
$fimminuto = date("i",strtotime($fim));
$t2 = ($fimhora*60) + $fimminuto;
$temporeal = ($t2 - $t1);
    if ($t1<=720 and $t2>720){
		$temporeal = $temporeal - 60;
	}
$temporeal = $temporeal/60;	
$sql="update programacao set flag='2' where programacao.data between '$data' and '$data' and programacao.cpf='$funcionario' and programacao.idtarefa='$tarefa'";
if($con->query($sql)){
  echo "Tarefa Comcluida !";
}
$sql="INSERT INTO coleta(data,cpf,idtarefa,inicio,fim,comentario,temporeal)VALUES ('$data','$funcionario','$tarefa','$inicio','$fim','$observacao','$temporeal')";

    if ($con->query($sql)) {
       echo "Novo registro inserido com sucesso !";
}
    else{
		echo " Registro não inserido !!!";
	}
$con=null;
    
?>
    <a href="coleta_prog.php">Voltar.</a>