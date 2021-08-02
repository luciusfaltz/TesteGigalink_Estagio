<DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>    
        <title>Cadastrar pedido</title>
    </head>
    <body>
        <?php
            require_once("conexao.php");
            $idProdutos = $_GET['itens'];
            $quantidade = $_POST['quantidade'];
            $valor = $_POST['valor'];
            $queryID = http_build_query(array('produtos' => $idProdutos));
            $queryQtd = http_build_query(array('quantidade' => $quantidade));
            $queryVal = http_build_query(array('valor' => $valor));

            $notaFiscal = $_POST['nota'];
            $idTransportadora = $_POST['transportadora'];
            $frete = $_POST['valFrete'];
            $desconto = $_POST['desconto'];
            $total = $_POST['valTotal'];


            $insert = "insert into pedido (notafiscal, valorfrete, desconto, valortotal, id_transportadora) values ('$notaFiscal', '$frete', '$desconto', '$total', '$idTransportadora')";
            $resultado = mysqli_query($conexao, $insert);
            $linhasAfetadas = mysqli_affected_rows($conexao);
            if($linhasAfetadas == 1)
            {
                header("Location: insert_item.php?$queryID&$queryQtd&$queryVal&notaFiscal=$notaFiscal");
            }
            else
            {
                echo "Erro ao cadastrar pedido.<p><a href='pedidos.php'>Voltar</a></p>";
            }
            
        ?>
       

    </body>
</html>