<?php
session_start();
require_once __DIR__ . '/../../config/database.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Custos / Despesas</title>
		<meta charset="utf-8">
		<link href="../css/estilocad.css" rel="stylesheet">
	</head>
	</body>
	<h1><u><i>Formulário de Cadastro de Custos e Despesas:</h1></u></i>
		<form method="POST" action="../inclalt/inclucusto.php">
			Data: <input type="date" name="data" ><br><br>
			Centro de Custo: 
				<select name="centrodecusto">
					<option>Selecione</option>
					<?php
						$result_niveis_acessos =$con->prepare("SELECT * FROM centrodecusto order by descricao");
						$result_niveis_acessos->execute();
						$resultado_niveis_acesso = $result_niveis_acessos->fetchAll(PDO::FETCH_ASSOC);
						foreach($resultado_niveis_acesso as $row_niveis_acessos){?>
							<option value="<?php echo $row_niveis_acessos['idcentro']; ?>"><?php echo $row_niveis_acessos['descricao']; ?></option> <?php
						}
						
					?>
				</select><br><br>
			Valor em R$:<input type="number" name="valor" step="0.1" required><br><br>                
			<input type="submit" value="Cadastrar"><br><br>
<a href="inicio.php">Voltar para início.</a><br><br><br>
<a href="custos.html">Ver Análise de Custos.</a><br><br><br>
		</form>
	</body>
</html>