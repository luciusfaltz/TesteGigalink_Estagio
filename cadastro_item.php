<DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>    
        <link href="estilo.css" rel="stylesheet">
        <title>Cadastrar pedido</title>
    </head>
    <body>
        <h1>Primeiro, selecione os itens a serem vendidos</h1>
        <?php
            require_once("conexao.php");
            $sqlProd = "select * from produto order by nome";
            $resultProd = mysqli_query($conexao, $sqlProd);
            $linhasProd = mysqli_num_rows($resultProd);
        ?>
        <form action='cadastro_pedido.php' method='POST'>
            Selecione o(s) produto(s):<select name="item[]" multiple>
            <?php 
                for($i = 0; $i < $linhasProd; $i++){
                    $registroProd = mysqli_fetch_row($resultProd);
                    $idProd = $registroProd[0];
                    $nomeProd = $registroProd[1];
                    $descProd = $registroProd[2];
                    echo "<option value='$idProd'>$nomeProd - $descProd</option>";
                }
            ?></select><br>
            <h3>Para selecionar mais de 1 produto, segure a tecla CTRL(Windows)/Command(MacOS) enquanto seleciona os produtos.</h3>
            <input type='submit' value='Adicionar ao carrinho'>
            <p><a href="pedidos.php"><button>Cancelar</button></a></p>
    </body>
</html>