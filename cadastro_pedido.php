<DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>    
        <title>Cadastrar pedido</title>
    </head>
    <body>
        <?php
        require_once("conexao.php");
            $sqlTransp = "select * from transportadora";
            $resulTransp = mysqli_query($conexao, $sqlTransp);
            $linhasTransp = mysqli_num_rows($resulTransp); 

            $sqlProd = "select * from produto order by nome";
            $resultProd = mysqli_query($conexao, $sqlProd);
            $linhasProd = mysqli_num_rows($resultProd);
            $itensArray = $_POST['item'];
            $itensString = implode(",", $itensArray);
            $itens = explode(",", $itensString);
            $query = http_build_query(array('itens' => $itens));
 
        ?>
        <h1>Cadastrar um novo pedido</h1>
        <form action='insert_pedido.php?<?php echo $query ?>' method='POST'>
            Produto(s):
            <?php 
                $tamItens = count($itens);
                for($i = 0; $i < $tamItens; $i++){
                    $sqlProd = "select nome from produto where id = '$itens[$i]'";
                    $resultProd = mysqli_query($conexao, $sqlProd);
                    $nomeProduto = mysqli_fetch_row($resultProd);
                    echo"$nomeProduto[0]: Quantidade <input type='number' name='quantidade[]'> Valor <input type='text' name='valor[]'><br>";
                }
            
            ?>
            <br>Nota Fiscal: <input type='text' name='nota'><br>
            Transportadora:<select name="transportadora">
            <?php 
                for($i = 0; $i < $linhasTransp; $i++){
                    $registroTransp = mysqli_fetch_row($resulTransp);
                    $idTransp = $registroTransp[0];
                    $nomeTransp = $registroTransp[1];
                    print_r($registroTransp);
                    echo "<option value='$idTransp'>$nomeTransp</option>";
                }
            ?></select><br>
            Valor do frete: <input type='text' name='valFrete'><br>
            Desconto: <input type='text' name='desconto'><br>
            Valor Total: <input type='text' name='valTotal'><br>
            <br><br>
            <input type='submit' value='Enviar'>
        </form>
        <p><a href="pedidos.php">Cancelar</a></p>
       

    </body>
</html>