<?php
session_start();
require_once __DIR__ . '/../../config/database.php';	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Programação por Funcionário</title>
		<meta charset="utf-8">
		<link href="../css/estilocad.css" rel="stylesheet">
	</head>
	</body>
	<h1><u><i>Consulta de Programação por Funcionário:</h1></u></i>
		<form method="POST" action="../cons/conprog_func.php">
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
			<a href="../cons/consultas.php">Voltar as Consultas</a>	
		</form>
	</body>
</html>