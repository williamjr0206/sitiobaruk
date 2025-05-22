<?php
session_start();
require_once __DIR__ . '/../config/database.php';


$data_inicial = $_POST["data_inicio"];
$data_final = $_POST["data_final"];
?>

<!DOCTYPE html>
<html>

	<head>
		<title>Programação por Período</title>
		<meta charset="utf-8">
        <link href="css/estilocad.css" rel="stylesheet">    
	</head>
	</body>
	<h1><u><i>Programação por Período:</h1></u></i>
<?php
  $sql="SELECT funcionario.nome,programacao.data,tarefa.descricao,tarefa.roteiro FROM programacao INNER JOIN funcionario ON programacao.cpf=funcionario.cpf INNER JOIN tarefa ON programacao.idtarefa=tarefa.idtarefa WHERE programacao.data BETWEEN '$data_inicial' AND '$data_final' ORDER BY funcionario.nome";
    $sqld=$con->prepare($sql);
    $sqld->execute();
    $res=$sqld->fetchAll(PDO::FETCH_ASSOC);

$nome=" ";
foreach($res as $row){
  if($nome<>$row["nome"]){
    echo "<br><br>";
    echo "Funcionário: ".$row["nome"]."<br><br>";
    echo "<table border='1'>";
    echo "<th>Data</th>";
    echo "<th>Tarefa</th>";
    //echo "<th>Roteiro</th>";

  }
  if($nome==$row["nome"]){
    echo "<table border='1'>";
  }
echo "<tr>";
echo "<td>".$row["data"]."</td>";
echo "<td>".$row["descricao"]."</td>";
//echo "<td>".$row["roteiro"]."</td>";
echo "</tr>";
echo "</table>";
//echo"<br><br>";
$nome=$row["nome"];

}
echo"<br><br>";

$con=null;

?>
<br><br>
<a href="programacao.html">Voltar.</a>
</body>
</html>
