<DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>    
        <title>Cadastrar pedido</title>
    </head>
    <body>
        <?php
            require_once("conexao.php");
            $idProdutos = $_GET['produtos'];
            $quantidade = $_GET['quantidade'];
            $valor = $_GET['valor'];
            $notaFiscal = $_GET['notaFiscal'];


            $select = "select id from pedido where notafiscal = $notaFiscal";
            $resultado = mysqli_query($conexao, $select);
            $registro = mysqli_fetch_row($resultado);
            $idPedido = $registro[0];

            $qtdProdutos = count($idProdutos);
            $c = 0;

            for($i = 0; $i < $qtdProdutos; $i++){
                $insert = "insert into item (quantidade, valor, id_produto, id_pedido) values ('$quantidade[$i]', '$valor[$i]' ,'$idProdutos[$i]', '$idPedido')";
                $resultadoItens = mysqli_query($conexao, $insert);
                $linhasAfetadas = mysqli_affected_rows($conexao);
                if($linhasAfetadas == 1){
                    $c++;
                }
            }
            echo $c;

            if($c == $qtdProdutos)
            {
                echo "Pedido cadastrado com sucesso <p><a href='pedidos.php'>Voltar para a lista de pedidos</a></p>";
            }
            else
            {
                echo "Erro ao cadastrar itens do pedido.<p><a href='pedidos.php'>Voltar</a></p>";
            }
            
        ?>
       

    </body>
</html>