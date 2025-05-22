<?php
	session_start();
	require_once __DIR__ . '/../config/database.php';
	$data_inicial = $_POST["data_inicio"];
	$data_final = $_POST["data_final"];
	$funcionario = $_POST["cpf"];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Programação por Funcionário</title>
		<meta charset="utf-8">
        <link href="css/estilocad.css" rel="stylesheet">
	</head>
	</body>
		<h1><u><i>Programação por Funcionário:</h1></u></i>
		<?php
			$sql="SELECT funcionario.nome FROM coleta INNER JOIN funcionario on coleta.cpf=funcionario.cpf where coleta.cpf='$funcionario'";
			$res=$con->query($sql);
			$contador=0;
			while($line=$res->fetch(PDO::FETCH_ASSOC)){
				if($contador==0){
					echo "Funcionário: ".$line["nome"]."<br><br>";
				}
				$contador=1;
			}
				
			$sql="SELECT coleta.data,funcionario.nome,tarefa.descricao,coleta.inicio,coleta.fim,coleta.comentario FROM coleta INNER JOIN funcionario on coleta.cpf=funcionario.cpf INNER JOIN tarefa on coleta.idtarefa=tarefa.idtarefa where coleta.data BETWEEN '$data_inicial' AND '$data_final' and coleta.cpf='$funcionario' order by coleta.data";
			$res=$con->query($sql);
			echo "<table border='1'>";
			echo "<th>Data</th>";
			echo "<th>Tarefa</th>";
			echo "<th>Início</th>";
			echo "<th>Fim</th>";
			echo "<th>Comentários</th>";

			while($line=$res->fetch(PDO::FETCH_ASSOC)){

			echo "<tr>";
			echo "<td>".$line["data"]."</td>";
			echo "<td>".$line["descricao"]."</td>";
			echo "<td>".$line["inicio"]."</td>";
			echo "<td>".$line["fim"]."</td>";
			echo "<td>".$line["comentario"]."</td>";
			echo "</tr>";
			}
			echo "</table>";
		?>
		<br><br>
		<a href="horarioporfunc.php">Voltar.</a>
	</body>
</html>