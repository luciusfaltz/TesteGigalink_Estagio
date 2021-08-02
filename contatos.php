<DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>    
        <title>Contatos</title>
    </head>
    <body>
        <h1>Contatos do fornecedor</h1>
        <?php
            require_once('conexao.php');
            $fornecedor = $_GET['id_for'];
            $selectTel = "select * from telefone where id_fornecedor = '$fornecedor'";
            $resultadoTel = mysqli_query($conexao, $selectTel);
            $linhasTel = mysqli_num_rows($resultadoTel);

            echo "<h2>Telefone(s)</h2>";
            echo "<table><tr>";
            echo "<th>DDD<th/>";
            echo "<th>Número<th/>";
            echo "<th>Referência<th/></tr>";

            for ($i=0; $i < $linhasTel ; $i++) { 
                $registroTel = mysqli_fetch_row($resultadoTel);
                $ddd = $registroTel[1];
                $numero = $registroTel[2];
                $referencia = $registroTel[3];

                echo "<tr>";
                echo "<td>$ddd<td/>";
                echo "<td>$numero<td/>";
                echo "<td>$referencia<td/></tr>";
            }
            echo "</table>";
            echo "<p><a href='cadastro.php?tipo=tel&fornecedor=$fornecedor'>Cadastrar telefone</a></p>";

            $selectEmail = "select * from email where id_fornecedor = $fornecedor";
            $resultadoEmail = mysqli_query($conexao, $selectEmail);
            $linhasEmail = mysqli_num_rows($resultadoEmail);

            echo "<h2>E-mail(s)</h2>";
            echo "<table><tr>";
            echo "<th>E-mail<th/>";
            echo "<th>Referência<th/></tr>";

            for ($i=0; $i < $linhasTel ; $i++) { 
                $registroEmail = mysqli_fetch_row($resultadoEmail);
                $email = $registroEmail[1];
                $referenciaEmail = $registroEmail[2];

                echo "<tr>";
                echo "<td>$email<td/>";
                echo "<td>$referenciaEmail<td/></tr>";  
            }
            echo "</table>";
            echo "<p><a href='cadastro.php?tipo=email&fornecedor=$fornecedor'>Cadastrar E-mail</a></p>";
            echo "<br><br><p><a href='fornecedores.php'>Voltar</a></p>";
        ?>
       
    </body>
</html>