<?php

session_start();
require_once __DIR__ . '/../../config/database.php';

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Listagem de Usuários</title>
		<meta charset="utf-8">
        <link href="../css/estilocad.css" rel="stylesheet">
	</head>
	</body>
	<h1><u><i>Listagem de Usuários:</h1></u></i>
<?php
try{
$sql="SELECT usuario.cpf, funcionario.nome, permissao.descricao, usuario.senha from usuario inner join funcionario on usuario.cpf=funcionario.cpf inner join permissao on usuario.id_permissao=permissao.idpermissao order by funcionario.nome";
$res=$con->query($sql);
echo "<table border='1'>";
echo "<th>Código</th>";
echo "<th>Nome</th>";
echo "<th>Permissão</th>";
echo "<th>Senha</th>";
while($row=$res->fetch(PDO::FETCH_ASSOC)){
echo "<tr>";
echo "<td>".$row["cpf"]."</td>";
echo "<td>".$row["nome"]."</td>";
echo "<td>".$row["descricao"]."</td>";
echo "<td>".$row["senha"]."</td>";
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
