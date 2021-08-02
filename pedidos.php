<DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>    
        <title>Pedidos cadastrados</title>
    </head>
    <body>
        <h1>Pedidos cadastrados</h1>
        <?php
            require_once('conexao.php');
            $select = "select * from pedido p join transportadora t on(p.id_transportadora=t.id)";
            $resultado = mysqli_query($conexao, $select);
            $linhas = mysqli_num_rows($resultado);

            echo "<table><tr>";
            echo "<th>Número<th/>";
            echo "<th>Data e Hora<th/>";
            echo "<th>Nota fiscal<th/>";
            echo "<th>Valor do frete<th/>";
            echo "<th>Transportadora<th/>";
            echo "<th>Desconto<th/>";
            echo "<th>Valor total<th/></tr>";

            for ($i=0; $i < $linhas ; $i++) { 
                $registro = mysqli_fetch_row($resultado);
                $numero = $registro[0];
                $dataHora = $registro[1];
                $nota = $registro[2];
                $frete = $registro[3];
                $desconto = $registro[4];
                $valTotal = $registro[5];
                $transportadora = $registro[7];

                echo "<tr>";
                echo "<td>$numero<td/>";
                echo "<td>$dataHora<td/>";
                echo "<td>$nota<td/>";
                echo "<td>$frete<td/>";
                echo "<td>$transportadora<td/>";
                echo "<td>$desconto<td/>";
                echo "<td>$valTotal<td/><tr/>";
                
            }
            echo "</table>";
            echo "<p><a href='cadastro_item.php'>Cadastrar novo pedido</a></p>";
        ?>
       <p><a href="index.html">Voltar</a></p>

    </body>
</html>