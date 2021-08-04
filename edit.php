<DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>   
        <link href="estilo.css" rel="stylesheet"> 
        <title>Editar</title>
    </head>
    <body>
        <?php
            require_once('conexao.php');
            $tipo = $_GET["tipo"];
            $id = $_GET["id"];

            if($tipo == "fornecedor"){
                $nome = $_POST['nomeFor'];
                $descricao = $_POST['descrFor'];
                $cidade = $_POST['cidade'];
                $endereco = $_POST['endereco'];
                $bairro = $_POST['bairro'];
                $numero = $_POST['numFor'];

                $sqlUpdate = "update fornecedor set nome='$nome', descricao='$descricao', cidade='$cidade', endereco ='$endereco', bairro ='$bairro', numero ='$numero' where id=$id";
	            $resultado = mysqli_query($conexao, $sqlUpdate);
	            $linhasAfetadas = mysqli_affected_rows($conexao);

                if($linhasAfetadas == 1)
                {
                    echo "Fornecedor editado com sucesso!<br/><br/>";
                    echo "<a href='fornecedores.php'><button>Voltar para a Lista de Fornecedores</button></a>";
                }
                else
                {
                    echo "Erro ao editar fornecedor.<p><a href='fornecedores.php'><button>Voltar</button></a></p>";
                }
            };
            if($tipo == "email"){
                $fornecedor = $_GET["fornecedor"];
                $email = $_POST['email'];
                $referencia = $_POST['referenciaEmail'];
                $sqlUpdate = "update email set email='$email', referencia='$referencia', id_fornecedor='$fornecedor' where id=$id";
	            $resultado = mysqli_query($conexao, $sqlUpdate);
	            $linhasAfetadas = mysqli_affected_rows($conexao);

                if($linhasAfetadas == 1)
                {
                    echo "E-mail editado com sucesso!<br/><br/>";
                    echo "<a href='contatos.php?id_for=$fornecedor'><button>Voltar para a Lista de Contatos</button></a>";
                }
                else
                {
                    echo "Erro ao editar e-mail.<p><a href='contatos.php?id_for=$fornecedor'><button>Voltar</button></a></p>";
                }
                
            };
            if($tipo == "tel"){
                $fornecedor = $_GET["fornecedor"];
                $ddd = $_POST['ddd'];
                $numero = $_POST['telefone'];
                $referencia = $_POST['referenciaTel'];
                $sqlUpdate = "update telefone set ddd='$ddd', telefone='$numero', referencia='$referencia', id_fornecedor='$fornecedor' where id=$id";
	            $resultado = mysqli_query($conexao, $sqlUpdate);
	            $linhasAfetadas = mysqli_affected_rows($conexao);

                if($linhasAfetadas == 1)
                {
                    echo "Telefone editado com sucesso!<br/><br/>";
                    echo "<a href='contatos.php?id_for=$fornecedor'><button>Voltar para a Lista de Contatos</button></a>";
                }
                else
                {
                    echo "Erro ao editar telefone.<p><a href='contatos.php?id_for=$fornecedor'><button>Voltar</button></a></p>";
                }
                
            };
            if($tipo == "produto"){
                $nome = $_POST['nomePro'];
                $descricao = $_POST['descPro'];
                $idFornecedor = $_POST['fornecedor'];

                $sqlUpdate = "update produto set nome='$nome', descricao='$descricao', id_fornecedor='$idFornecedor' where id=$id";
	            $resultado = mysqli_query($conexao, $sqlUpdate);
	            $linhasAfetadas = mysqli_affected_rows($conexao);

                if($linhasAfetadas == 1)
                {
                    echo "Produto editado com sucesso!<br/><br/>";
                    echo "<a href='produtos.php?'><button>Voltar para a Lista de Produtos</button></a>";
                }
                else
                {
                    echo "Erro ao editar produto.<p><a href='produtos.php'><button>Voltar</button></a></p>";
                }
                
            };
            if($tipo == "transportadora"){
                $nome = $_POST['nomeTransp'];

                $sqlUpdate = "update transportadora set nome='$nome' where id=$id";
	            $resultado = mysqli_query($conexao, $sqlUpdate);
	            $linhasAfetadas = mysqli_affected_rows($conexao);

                if($linhasAfetadas == 1)
                {
                    echo "Transportadora editada com sucesso!<br/><br/>";
                    echo "<a href='transportadoras.php?'><button>Voltar para a Lista de Transportadoras</button></a>";
                }
                else
                {
                    echo "Erro ao editar transportadora.<p><a href='transportadoras.php'><button>Voltar</button></a></p>";
                }
            };
        ?>
       

    </body>
</html>