<?php
session_start();
require_once __DIR__ . '/../../config/database.php';


$data_inicial = $_POST["data_inicio"];
$data_final = $_POST["data_final"];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Funcionários por Tarefas</title>
		<meta charset="utf-8">
        <link href="../css/estilocad.css" rel="stylesheet">        
	</head>
	</body>
	<h1><u><i>Funcionários por Tarefas:</h1></u></i>
<?php
$sql="SELECT coleta.data,funcionario.nome,tarefa.descricao,tarefa.tempo,coleta.temporeal,coleta.comentario FROM coleta INNER JOIN tarefa ON coleta.idtarefa=tarefa.idtarefa INNER JOIN funcionario ON coleta.cpf=funcionario.cpf WHERE coleta.data BETWEEN '$data_inicial' AND '$data_final' order by coleta.data";
$res=$con->query($sql);
echo "<table border='1'>";
echo "<th>Data</th>";
echo "<th>Nome</th>";
echo "<th>Tarefa</th>";
echo "<th>Teórico</th>";
echo "<th>Real</th>";
echo "<th>Comentários</th>";
while($row=$res->fetch(PDO::FETCH_ASSOC)){
echo "<tr>";
echo "<td>".$row["data"]."</td>";
echo "<td>".$row["nome"]."</td>";
echo "<td>".$row["descricao"]."</td>";
echo "<td>".$row["tempo"]."</td>";
echo "<td>".round($row["temporeal"],2)."</td>";
echo "<td>".$row["comentario"]."</td>";
echo "</tr>";
}
echo "</table>";
$con=null;

?>
<br><br>
<a href="../telas/funcportarefas.html">Voltar.</a>
</body>
</html>
