<DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'> 
        <link href="estilo.css" rel="stylesheet">   
        <title>Cadastrar pedido</title>
    </head>
    <body>
		<?php
		require_once("conexao.php");
		$tipo = $_GET['tipo'];

		if($tipo == 'fornecedor'){
			$nome = $_POST['nomeFor'];
			$descricao = $_POST['descrFor'];
			$cidade = $_POST['cidade'];
			$endereco = $_POST['endereco'];
			$bairro = $_POST['bairro'];
			$numero = $_POST['numFor'];

			$insert = "insert into fornecedor (nome, descricao, cidade, endereco, bairro, numero) values ('$nome', '$descricao', '$cidade', '$endereco', '$bairro', '$numero')";
			$resultado = mysqli_query($conexao, $insert);
			$linhasAfetadas = mysqli_affected_rows($conexao);
			if($linhasAfetadas == 1)
			{
				echo "Fornecedor cadastrado com sucesso!<br><br>";
				echo "<a href='fornecedores.php'><button>Voltar para a Lista de Fornecedores</button></a>";
			}
			else
			{
				echo "Erro ao cadastrar fornecedor.<br><br><p><a href='fornecedor.php'><button>Voltar</button></a></p>";
			}
		}
		if($tipo == 'email'){
			$idFornecedor = $_GET["id_fornecedor"];
			$email = $_POST['email'];
			$referencia = $_POST['referenciaEmail'];

			$insert = "insert into email (email, referencia, id_fornecedor) values ('$email', '$referencia', '$idFornecedor')";
			$resultado = mysqli_query($conexao, $insert);
			$linhasAfetadas = mysqli_affected_rows($conexao);
			if($linhasAfetadas == 1)
			{
				echo "E-mail cadastrado com sucesso!<br><br>";
				echo "<a href='contatos.php?id_for=$idFornecedor'><button>Voltar para a Lista de Contatos</button></a>";
			}
			else
			{
				echo "Erro ao cadastrar e-mail.<br><br><p><a href='contatos.php?id_for=$idFornecedor'><button>Voltar</button></a></p>";
			
			}
		}
		if($tipo == 'tel'){
			$idFornecedor = $_GET["id_fornecedor"];
			$ddd = $_POST['ddd'];
			$numero = $_POST['telefone'];
			$referencia = $_POST['referenciaTel'];

			$insert = "insert into telefone (ddd, telefone, referencia, id_fornecedor) values ('$ddd', '$numero', '$referencia', '$idFornecedor')";
			$resultado = mysqli_query($conexao, $insert);
			$linhasAfetadas = mysqli_affected_rows($conexao);
			if($linhasAfetadas == 1)
			{
				echo "Telefone cadastrado com sucesso!<br><br>";
				echo "<a href='contatos.php?id_for=$idFornecedor'><button>Voltar para a Lista de Contatos</button></a>";
			}
			else
			{
				echo "Erro ao cadastrar telefone.<br><br><p><a href='contatos.php?id_for=$idFornecedor'><button>Voltar</button></a></p>";
			}
		}

		if($tipo == 'produto'){
			$nome = $_POST['nomePro'];
			$descricao = $_POST['descPro'];
			$idFornecedor = $_POST['fornecedor'];

			$insert = "insert into produto (nome, descricao, id_fornecedor) values ('$nome', '$descricao', '$idFornecedor')";
			$resultado = mysqli_query($conexao, $insert);
			$linhasAfetadas = mysqli_affected_rows($conexao);
			if($linhasAfetadas == 1)
			{
				echo "Produto cadastrado com sucesso!<br><br>";
				echo "<a href='produtos.php'><button>Voltar para a Lista de Produtos</button></a>";
			}
			else
			{
				echo "Erro ao cadastrar produto.<br><br><p><a href='produtos.php'><button>Voltar</button></a></p>";
			}
		}

		if($tipo == 'transportadora'){
			$nome = $_POST['nomeTransp'];

			$insert = "insert into transportadora (nome) values ('$nome')";
			$resultado = mysqli_query($conexao, $insert);
			$linhasAfetadas = mysqli_affected_rows($conexao);
			if($linhasAfetadas == 1)
			{
				echo "Transportadora cadastrada com sucesso!<br><br>";
				echo "<a href='transportadoras.php'><button>Voltar para a Lista de transportadoras</button></a>";
			}
			else
			{
				echo "Erro ao cadastrar transportadora.<br><br><p><a href='transportadoras.php'><button>Voltar</button></a></p>";
			}
		}
		?>
	</body>
</html>