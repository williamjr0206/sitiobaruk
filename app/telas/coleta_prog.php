<?php
session_start();
require_once __DIR__ . '/../../config/database.php';

//Tela de coleta de dados, através das tarefas da programação para funcionário logado

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Coletas</title>
		<meta charset="utf-8">
		<link href="../css/estilocad.css" rel="stylesheet">
	</head>
	</body>
	<h1><u><i>Formulário de Cadastro de Coleta de Tarefas:</h1></u></i>
		<form method="POST" action="../inclalt/inclucoleta.php">
			Data: <input type="date" name="data" required ><br><br>
			Funcionário: <?php echo $_SESSION["nome"]."<br><br>";
            $cpf=$_SESSION["cpf"];
            $datainicial=date('Y/m/d');
            ?>
			Tarefa:
				<select required name="tarefa">
					<option value="">Selecione</option>
					<optgroup label="Tarefa de Hoje">
					<?php
					// Seleção de tarefas para a data de hoje, para funcionário logado

						$result_niveis_acessos =$con->prepare( "SELECT programacao.idtarefa,tarefa.descricao,funcionario.cpf from programacao inner join tarefa on programacao.idtarefa=tarefa.idtarefa inner join funcionario on programacao.cpf=funcionario.cpf where programacao.cpf=$cpf and programacao.data between '$datainicial'and'$datainicial' and programacao.flag=1");
						$result_niveis_acessos->execute();
						$resultado_niveis_acesso = $result_niveis_acessos->fetchAll(PDO::FETCH_ASSOC);
						foreach($resultado_niveis_acesso as $row_niveis_acessos){ ?>
							<option value="<?php echo $row_niveis_acessos['idtarefa']; ?>"><?php echo $row_niveis_acessos['descricao']; ?></option> <?php
						}
						
					?>	
					</optgroup>
					<optgroup label="Nova Tarefa">
					<?php
					// Seleção de alguma outra tarefa fora da programação

						$result_niveis_acessos =$con->prepare( "SELECT * from tarefa order by tarefa.descricao");
						$result_niveis_acessos->execute();
						$resultado_niveis_acesso = $result_niveis_acessos->fetchAll(PDO::FETCH_ASSOC);
						foreach($resultado_niveis_acesso as $row_niveis_acessos){ ?>
							<option value="<?php echo $row_niveis_acessos['idtarefa']; ?>"><?php echo $row_niveis_acessos['descricao']; ?></option> <?php
						}
						
					?>
					</optgroup>
				</select><br><br>
			Observação:		
                <textarea name = "observacao" rows="8" cols="30"></textarea>
                <br><br>
            Início da Tarefa:
                <input type="time" name="inicio" required><br/><br/>
            Fim da Tarefa:
                <input type="time" name="fim" required><br/><br/> 			
				<input type="submit" value="Cadastrar" id="cadastrar"><br><br>
			<a href="inicio.php">Voltar para início.</a>	
		</form>
	</body>
</html>