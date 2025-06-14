<?php
// LOCAL DATABASE:
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

?>
	