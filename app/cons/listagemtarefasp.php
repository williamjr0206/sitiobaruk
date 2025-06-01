<?php
session_start();
require_once __DIR__ . '/../../config/database.php';

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Listagem de Tarefas</title>
		<meta charset="utf-8">
        <link href="../css/estilocad.css" rel="stylesheet">
	</head>
	</body>
	<h1><u><i>Listagem de Tarefas:</h1></u></i>
<?php
try{
$sql="SELECT * from tarefa";
$res=$con->query($sql);//mysqli_query($con,$sql);
echo "<table border='1'>";
echo "<th>Código</th>";
echo "<th>Tarefa</th>";
echo "<th>Tempo Teórico</th>";
echo "<th>Roteiro</th>";
while($row=$res->fetch(PDO::FETCH_ASSOC)){//mysqli_fetch_array($res)){
echo "<tr>";
echo "<td>".$row["idtarefa"]."</td>";
echo "<td>".$row["descricao"]."</td>";
echo "<td>".$row["tempo"]."</td>";
echo "<td>".$row["roteiro"]."</td>";
echo "</tr>";
}
echo "</table>";
}catch(PDOException $e){
	echo "Erro na conexão ou consulta: ".$e->getMessage();
}
$con=null;

?>
<br><br>
<a href="../cons/consultas.php">Voltar as Consultas</a>
</body>
</html>
