<?php

session_start();
require_once __DIR__ . '/../../config/database.php';

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Listagem de Clientes</title>
		<meta charset="utf-8">
        <link href="../css/estilocad.css" rel="stylesheet">
	</head>
	</body>
	<h1><u><i>Listagem de Clientes:</h1></u></i>
<?php
try{
$sql="SELECT * from cliente order by cliente.razao";
$res=$con->query($sql);
echo "<table border='1'>";
echo "<th>Código</th>";
echo "<th>Razão Social</th>";
while($row=$res->fetch(PDO::FETCH_ASSOC)){//mysqli_fetch_array($res)){
echo "<tr>";
echo "<td>".$row["idcliente"]."</td>";
echo "<td>".$row["razao"]."</td>";
echo "</tr>";
}
echo "</table>";
}catch(PDOException $e){
	echo "Erro na conexão ou consulta: ".$e->getMessage();
}
$con=null;

?>
<br><br>
<a href="../cons/listagens.php">Voltar as Listagens</a>
</body>
</html>
