<?php
session_start();
require_once __DIR__ . '/../../config/database.php';

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Usuários</title>
		<meta charset="utf-8">
		<link href="../css/estilocad.css" rel="stylesheet">
	</head>
	<body>
	<h1><u><i>Formulário de Cadastro de Usuários:</h1></u></i>
		<form method="POST" action="../inclalt/incluusuario.php">
			Usuário: 
				<select name="usuario">
					<option>Selecione</option>
					<?php
						$result_niveis_acessos =$con->prepare("SELECT * FROM funcionario order by nome");
						$result_niveis_acessos->execute();
						$resultado_niveis_acesso = $result_niveis_acessos->fetchAll(PDO::FETCH_ASSOC);
						foreach($resultado_niveis_acesso as $row_niveis_acessos){ ?>
							<option value="<?php echo $row_niveis_acessos['cpf']; ?>"><?php echo $row_niveis_acessos['nome']; ?></option> <?php
						}
						
					?>
				</select><br><br>
				Permissão: 
				<select name="permissao">
					<option>Selecione</option>
					<?php
						$result_niveis_acessos =$con->prepare( "SELECT * FROM permissao order by descricao");
						$result_niveis_acessos->execute();
						$resultado_niveis_acesso = $result_niveis_acessos->fetchAll(PDO::FETCH_ASSOC);
						foreach($resultado_niveis_acesso as $row_niveis_acessos){ ?>
							<option value="<?php echo $row_niveis_acessos['idpermissao']; ?>"><?php echo $row_niveis_acessos['descricao']; ?></option> <?php
						}
						
					?>
				</select><br><br>

            Senha:
                <input type="password" name="senha"><br/><br/>
				<input type="submit" value="Cadastrar"><br><br>
			<a href="inicio.php">Voltar para início.</a>	
		</form>
	</body>
</html>