<DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>    
        <title>Transportadoras cadastradas</title>
    </head>
    <body>
        <h1>Transportadoras cadastradas</h1>
        <?php
            require_once('conexao.php');
            $select = "select * from transportadora";
            $resultado = mysqli_query($conexao, $select);
            $linhas = mysqli_num_rows($resultado);

            echo "<table><tr>";
            echo "<th>Nome<th/></tr>";

            for ($i=0; $i < $linhas ; $i++) { 
                $registro = mysqli_fetch_row($resultado);
                $id = $registro[0];
                $nome = $registro[1];

                echo "<tr>";
                echo "<td>$nome<td/><tr/>";
                
            }
            echo "</table>";
            echo "<p><a href='cadastro.php?tipo=transportadora'>Cadastrar transportadora</a></p>";
        ?>
       <p><a href="index.html">Voltar</a></p>

    </body>
</html>