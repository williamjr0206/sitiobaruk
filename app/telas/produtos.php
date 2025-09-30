<?php
session_start();
require_once __DIR__ . '/../../config/database.php';
?>

<html>
<meta charset="utf-8">
    
<head>
     <title>Produtos</title>
     <link href="../css/estilocad.css" rel="stylesheet">
</head>
<body>
<h1><u><i>Formulário de Cadastro de Produtos</h1></u></i>
<form method="POST" action="../inclalt/incluproduto.php" ebctype="multpart/form-data">
<br>
<i><label>Insira código do Produto:</label><br>
<input name="idproduto"type="text" required><br>
<label>Insira o nome do produto:</label><br>
<input name="descricao" type="text"><br>
<label>Insira o preço do produto ou o custo:</label><br>
<input name="preco" type="number" step="0.01"><br>
<label>Insira a unidade do produto:</label><br>
<input name="unidade" type="text">
<br><br>
Família: 
				<select name="familia">
					<option>Selecione</option>
					<?php
						$result_niveis_acessos =$con->prepare( "SELECT * FROM familia order by descricao");
						$result_niveis_acessos->execute();
						$resultado_niveis_acesso = $result_niveis_acessos->fetchAll(PDO::FETCH_ASSOC);
						foreach($resultado_niveis_acesso as $row_niveis_acessos){ ?>
							<option value="<?php echo $row_niveis_acessos['idstatus']; ?>"><?php echo $row_niveis_acessos['descricao']; ?></option> <?php
						}
						
					?>
					</select><br><br>

<label>Entrada do Tipo:Alterar ou Incluir ? </label><br>
<label>
	<input name="opcao" type="radio" value="opcao1">Incluir</label><br>
<label>
	<input name="opcao" type="radio" value="opcao2">Alterar</label><br>
<label>
	<input name="opcao" type="radio" value="opcao3">Excluir</label>
<br><br>
<label>Botao de Cadastrar Produto</label>
<input type="submit" value="Cadastrar">
<br>
<label>Botao de Limpeza de Dados</label>
<input type="reset" value="Limpar"><br><br>
<a href="inicio.php">Voltar para início.</a></i>
</form>
</body>
</html>
