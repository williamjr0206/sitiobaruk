<?php
session_start();
require_once __DIR__ . '/../../config/database.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title> Produção</title>
		<meta charset="utf-8">
		<link href="../css/estilocad.css" rel="stylesheet">
	</head>
	</body>
	<h1><u><i>Formulário de Cadastro de Produção:</h1></u></i>
		<form method="POST" action="../inclalt/incluproducao.php">
			Data: <input type="date" name="data" ><br><br>
			Funcionário: <?php echo $_SESSION["nome"]?>;<br><br>
			Produtos: 
				<select name="produto">
					<option>Selecione</option>
					<?php
						$result_niveis_acessos =$con->prepare( "SELECT * FROM produto order by descricao");
						$result_niveis_acessos->execute();
						$resultado_niveis_acesso = $result_niveis_acessos->fetchAll(PDO::FETCH_ASSOC);
						foreach($resultado_niveis_acesso as $row_niveis_acessos){ ?>
							<option value="<?php echo $row_niveis_acessos['idproduto']; ?>"><?php echo $row_niveis_acessos['descricao']; ?></option> <?php
						}
						
					?>
					</select><br><br>
			Quantidade:		
                <input type="number" name="quantidade" step=".1" required ><br><br>
                <br><br>
                
				<input type="submit" value="Cadastrar"><br><br>
<a href="coleta_prog.php">Voltar.</a>				
		</form>
	</body>
</html>