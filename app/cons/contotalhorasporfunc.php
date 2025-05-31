<?php
session_start();
require_once __DIR__ . '/../../config/database.php';

$datainicial = $_POST["data_inicio"];
$datafinal = $_POST["data_final"];

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Horas Trabalhadas por Período / Funcionários</title>
		<meta charset="utf-8">
        <link href="../css/estilocad.css" rel="stylesheet">
	</head>
	</body>
	<h1><u><i>Horas Trabalhadas por Período / Funcionários:</h1></u></i>
    <?php
	$datai=new DateTime($datainicial);
	$dataf=new DateTime($datafinal);
    echo"Período de: ".$datai->format("d/m/Y")." a ".$dataf->format("d/m/Y");
    echo"<br><br>";
try{
$sql="SELECT funcionario.nome, SUM(coleta.temporeal) from coleta inner join funcionario on coleta.cpf=funcionario.cpf where coleta.data between '$datainicial' and '$datafinal' GROUP BY funcionario.nome";
$res=$con->query($sql);
echo "<table border='1'>";
echo "<th>Nome</th>";
echo "<th>Tempo em Horas</th>";
while($row=$res->fetch(PDO::FETCH_ASSOC)){//mysqli_fetch_array($res)){
echo "<tr>";
echo "<td>".$row["nome"]."</td>";
echo "<td>".round($row["SUM(coleta.temporeal)"],2)."</td>";
//echo "<td>".$row["data_nascimento"]."</td>";
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
