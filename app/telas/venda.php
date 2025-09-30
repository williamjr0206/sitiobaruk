<?php
session_start();
require_once __DIR__ . '/../../config/database.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Venda</title>
		<meta charset="utf-8">
		<link href="../css/estilocad.css" rel="stylesheet">
	</head>
	</body>
	<h1><u><i>Formulário de Cadastro de Vendas:</h1></u></i>
		<form method="POST" action="../inclalt/incluvendas.php">
            Documento: <input type="text" name="documento"><br><br>
			Data: <input type="date" name="data" ><br><br>
			Cliente: 
				<select name="cliente">
					<option>Selecione</option>
					<?php
						$result_niveis_acessos =$con->prepare("SELECT * FROM cliente order by razao");
						$result_niveis_acessos->execute();
						$resultado_niveis_acesso = $result_niveis_acessos->fetchAll(PDO::FETCH_ASSOC);
						foreach($resultado_niveis_acesso as $row_niveis_acessos){?>
							<option value="<?php echo $row_niveis_acessos['idcliente']; ?>"><?php echo $row_niveis_acessos['razao']; ?></option> <?php
						}
						
					?>
				</select><br><br>
			Produto: 
				<select name="produto">
					<option>Selecione</option>
					<?php
						$result_niveis_acessos =$con->prepare( "SELECT * FROM produto where idstatus = 1 order by descricao");
						$result_niveis_acessos->execute();
						$resultado_niveis_acesso = $result_niveis_acessos->fetchAll(PDO::FETCH_ASSOC);
						foreach($resultado_niveis_acesso as $row_niveis_acessos){ ?>
							<option value="<?php echo $row_niveis_acessos['idproduto']; ?>"><?php echo $row_niveis_acessos['descricao']; ?></option> <?php
						}
						
					?>
					</select><br><br>
			Quantidade:<input type="number" name="quantidade" step="0.1" required><br><br>                
			<input type="submit" value="Cadastrar"><br><br>
<a href="inicio.php">Voltar para início.</a><br><br><br>
<a href="vendasporprodutos.html">Ver Vendas por Produtos.</a><br><br><br>
<a href="vendasporclientes.html">Ver Vendas por Clientes</a>				
		</form>
	</body>
</html>