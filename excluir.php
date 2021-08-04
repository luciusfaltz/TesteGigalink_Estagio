<DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>  
        <link href="estilo.css" rel="stylesheet">  
        <title>Excluir</title>
    </head>
    <body>
        <?php
            require_once('conexao.php');
            $tipo = $_GET["tipo"];
            $id = $_GET["id"];

            if($tipo == "fornecedor"){
                $sqlDelete = "delete from fornecedor where id=$id";
                $resultado = mysqli_query($conexao, $sqlDelete);
                $linhasAfetadas = mysqli_affected_rows($conexao);

                if($linhasAfetadas == 1)
                {
                    echo "Fornecedor excluído com sucesso!<br/><br/>";
                    echo "<a href='fornecedores.php'><button>Voltar para a Lista de Fornecedores</button></a>";
                }
                else
                {
                    echo "Erro ao excluir fornecedor.<p><a href='fornecedores.php'><button>Voltar</button></a></p>";
                }
            };
            if($tipo == "email"){
                $fornecedor = $_GET["fornecedor"];
                $sqlDelete = "delete from email where id=$id";
                $resultado = mysqli_query($conexao, $sqlDelete);
                $linhasAfetadas = mysqli_affected_rows($conexao);

                if($linhasAfetadas == 1)
                {
                    echo "E-mail excluído com sucesso!<br/><br/>";
                    echo "<a href='contatos.php?id_for=$fornecedor'><button>Voltar para a Lista de Contatos</button></a>";
                }
                else
                {
                    echo "Erro ao excluir e-mail.<p><a href='contatos.php?id_for=$fornecedor'><button>Voltar</button></a></p>";
                }
                
            };
            if($tipo == "tel"){
                $fornecedor = $_GET["fornecedor"];
                $sqlDelete = "delete from telefone where id=$id";
                $resultado = mysqli_query($conexao, $sqlDelete);
                $linhasAfetadas = mysqli_affected_rows($conexao);

                if($linhasAfetadas == 1)
                {
                    echo "Telefone excluído com sucesso!<br/><br/>";
                    echo "<a href='contatos.php?id_for=$fornecedor'><button>Voltar para a Lista de Contatos</button></a>";
                }
                else
                {
                    echo "Erro ao excluir telefone.<p><a href='contatos.php?id_for=$fornecedor'><button>Voltar</button></a></p>";
                }
                
            };
            if($tipo == "produto"){
                $sqlDelete = "delete from produto where id=$id";
                $resultado = mysqli_query($conexao, $sqlDelete);
                $linhasAfetadas = mysqli_affected_rows($conexao);

                if($linhasAfetadas == 1)
                {
                    echo "Produto excluído com sucesso!<br/><br/>";
                    echo "<a href='produtos.php?'><button>Voltar para a Lista de Produtos</button></a>";
                }
                else
                {
                    echo "Erro ao excluir produto.<p><a href='produtos.php'><button>Voltar</button></a></p>";
                }
                
            };
            if($tipo == "transportadora"){
                $sqlDelete = "delete from transportadora where id=$id";
                $resultado = mysqli_query($conexao, $sqlDelete);
                $linhasAfetadas = mysqli_affected_rows($conexao);

                if($linhasAfetadas == 1)
                {
                    echo "Transportadora excluída com sucesso!<br/><br/>";
                    echo "<a href='transportadoras.php?'><button>Voltar para a Lista de Transportadoras</button></a>";
                }
                else
                {
                    echo "Erro ao excluir transportadora.<p><a href='transportadoras.php'><button>Voltar</button></a></p>";
                }
            };
            if($tipo == "pedido"){
                $select = "select * from item where id_pedido=$id";
                $resultado = mysqli_query($conexao, $select);
                $linhas = mysqli_num_rows($resultado);

                $sqlDeleteItens = "delete from item where id_pedido=$id";
                $resultadoItens = mysqli_query($conexao, $sqlDeleteItens);
                $linhasAfetadasItens = mysqli_affected_rows($conexao);
                if($linhasAfetadasItens == $linhas){
                    $sqlDelete = "delete from pedido where id=$id";
                    $resultado = mysqli_query($conexao, $sqlDelete);
                    $linhasAfetadas = mysqli_affected_rows($conexao);
                    if($linhasAfetadas == 1){
                        echo "Pedido excluído com sucesso!<br/><br/>";
                        echo "<a href='pedidos.php?'><button>Voltar para a Lista de Pedidos</button></a>";
                    }
                    else{
                        echo "Erro ao excluir pedido. <p><a href='pedidos.php'><button>Voltar</button></a></p>";
                    }   
                }
                else
                {
                    echo "Erro ao excluir itens do pedido.<p><a href='pedidos.php'><button>Voltar</button></a></p>";
                }
            };
        ?>
       

    </body>
</html>