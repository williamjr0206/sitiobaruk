<?php
session_start();
require_once __DIR__ . '/../../config/database.php';

$data_inicial = $_POST["data_inicio"];
$data_final = $_POST["data_final"];
$funcionario = $_POST["cpf"];
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Programação por Funcionário</title>
		<meta charset="utf-8">
        <link href="../css/estilocad.css" rel="stylesheet">
	</head>
	</body>
	<h1><u><i>Programação por Funcionário:</h1></u></i>
<?php
$sql="SELECT funcionario.nome FROM programacao INNER JOIN funcionario on programacao.cpf=funcionario.cpf where programacao.cpf='$funcionario'";
$res=$con->query($sql);
$contador=0;
while($line=$res->fetch(PDO::FETCH_ASSOC)){
	if($contador==0){
		echo "Funcionário: ".$line["nome"]."<br><br>";
	}
	$contador=1;
}
	
$sql="SELECT programacao.data,funcionario.nome,tarefa.descricao,tarefa.roteiro FROM programacao INNER JOIN funcionario on programacao.cpf=funcionario.cpf INNER JOIN tarefa on programacao.idtarefa=tarefa.idtarefa where programacao.data BETWEEN '$data_inicial' AND '$data_final' and programacao.cpf='$funcionario' order by programacao.data";
$res=$con->query($sql);
echo "<table border='1'>";
echo "<th>Data</th>";
echo "<th>Tarefa</th>";
echo "<th>Roteiro</th>";
while($line=$res->fetch(PDO::FETCH_ASSOC)){
echo "<tr>";
echo "<td>".$line["data"]."</td>";
echo "<td>".$line["descricao"]."</td>";
echo "<td>".$line["roteiro"]."</td>";
echo "</tr>";
}
echo "</table>";
?>
<br><br>
<a href="../telas/programacaoporfunc.php">Voltar.</a>
</body>
</html>