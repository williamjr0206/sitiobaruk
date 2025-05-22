<?php
session_start();
require_once __DIR__ . '/../config/database.php';	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Consulta de Horários por Funcionário</title>
		<meta charset="utf-8">
		<link href="estilocad.css" rel="stylesheet">
	</head>
	</body>
	<h1><u><i>Consulta de Horários por Funcionário:</h1></u></i>
		<form method="POST" action="conhorarporfunc.php">
			Funcionário: 
				<select name="cpf">
					<option>Selecione</option>
					<?php
						$result_niveis_acessos =$con->prepare("SELECT * FROM funcionario order by nome");
						$result_niveis_acessos->execute();
						$resultado_niveis_acesso = $result_niveis_acessos->fetchAll(PDO::FETCH_ASSOC);
						foreach($resultado_niveis_acesso as $row_niveis_acessos){?>
							<option value="<?php echo $row_niveis_acessos['cpf']; ?>"><?php echo $row_niveis_acessos['nome']; ?></option> <?php
						}
						
					?>
				</select><br><br>
            Data Inicial:
                <input type="date" name="data_inicio" required><br/><br/>
			Data Final:
			<input type="date" name="data_final" required><br/><br/>
				<input type="submit" value="Consultar"><br><br>
			<a href="inicio.php">Voltar para início.</a>	
		</form>
	</body>
</html>