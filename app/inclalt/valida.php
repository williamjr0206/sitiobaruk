<?php
// Conexão com o banco de dados
//$pdo = new PDO("mysql:host=localhost;dbname=seubanco", "seuusuario", "suasenha");
//	include_once("conexao.php");
session_start();
$servername="localhost";
$database="mydb";
$username="root"; 
$password="685618";

// Connection var: 
$con=new PDO("mysql:host=$servername;dbname=$database;charset=utf8",$username,$password);

$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

try {
    $con = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}

// Coletar dados do formulário
$username = $_POST['username'];
$password = $_POST['password'];

// Verificar se o usuário existe
$stmt =$con->prepare("SELECT funcionario.nome,usuario.cpf,usuario.senha,usuario.id_permissao FROM usuario inner join funcionario on usuario.cpf=funcionario.cpf WHERE funcionario.cpf = '$username'");
$stmt->execute();
$user = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($user as $usuario){
	$_SESSION["cpf"]=$usuario["cpf"];
	$_SESSION["nome"]=$usuario["nome"];
	$_SESSION["permissao"]=$usuario["id_permissao"];
	echo $_SESSION["nome"];
    $wia = $usuario['cpf'];
    $aiw = $usuario['senha'];
}
if ($username==$wia && $password== $usuario['senha']) {
//    echo "Login bem-sucedido!";
	header('location:../telas/inicio.php');
	exit();
} else {
//    echo "Credenciais inválidas. Tente novamente.";
		header('location:../public/login.html');
		exit();
}
?>
