<?php
session_start();
require_once __DIR__ . '/../../config/database.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title> Programação</title>
		<meta charset="utf-8">
		<link href="../css/estilocad.css" rel="stylesheet">
	</head>
	</body>
	<h1><u><i>Formulário de Cadastro de Programação de Tarefas:</h1></u></i>
		<form method="POST" action="../inclalt/incluprog.php">
			Data: <input type="date" name="data" ><br><br>
			Funcionário: 
				<select name="funcionario">
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
			Tarefa: 
				<select name="tarefa">
					<option>Selecione</option>
					<?php
						$result_niveis_acessos =$con->prepare( "SELECT * FROM tarefa order by descricao");
						$result_niveis_acessos->execute();
						$resultado_niveis_acesso = $result_niveis_acessos->fetchAll(PDO::FETCH_ASSOC);
						foreach($resultado_niveis_acesso as $row_niveis_acessos){ ?>
							<option value="<?php echo $row_niveis_acessos['idtarefa']; ?>"><?php echo $row_niveis_acessos['descricao']; ?></option> <?php
						}
						
					?>
					</select><br><br>
			Observação:		
                <textarea name = "observacao" rows="8" cols="30"></textarea>
                <br><br>
                
				<input type="submit" value="Cadastrar"><br><br>
<a href="inicio.php">Voltar para início.</a>				
		</form>
	</body>
</html>