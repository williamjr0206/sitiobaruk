<?php
session_start();

require_once __DIR__ . '/../../config/database.php';

//Inclusão de usuário proveniente da tela usuario.php

$usuario = $_POST["usuario"];
$senha = $_POST["senha"];
$permissao=$_POST["permissao"];
$sql="INSERT INTO usuario(cpf,senha,id_permissao)VALUES ('$usuario','$senha','$permissao')";

    if ($con->query($sql)) {
       echo "Novo registro inserido com sucesso !";
}
//mysqli_close($con);

?>
<a href="../telas/usuario.php">Voltar.</a>
