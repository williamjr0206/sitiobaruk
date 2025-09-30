<?php

session_start();
require_once __DIR__ . '/../../config/database.php';

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Listagem de Produtos</title>
		<meta charset="utf-8">
        <link href="../css/estilocad.css" rel="stylesheet">
	</head>
	</body>
	<h1><u><i>Listagem de Produtos:</h1></u></i>
<?php
try{
$sql="SELECT idproduto,produto.descricao,preco,unidade,familia.descricao as 'familia' from produto inner join familia on produto.idstatus = familia.idstatus order by familia.descricao";
$res=$con->query($sql);
echo "<table border='1'>";
echo "<th>Código</th>";
echo "<th>Produto</th>";
echo "<th>Preço</th>";
echo "<th>Unidade</th>";
echo "<th>Familia</th>";
while($row=$res->fetch(PDO::FETCH_ASSOC)){
echo "<tr>";
echo "<td>".$row["idproduto"]."</td>";
echo "<td>".$row["descricao"]."</td>";
echo "<td style='text-align:right;'>"."R$ ".number_format($row["preco"],2,',','.')."</td>";
echo "<td>".$row["unidade"]."</td>";
echo "<td>".$row["familia"]."</td>";
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
