<DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>    
        <link href="estilo.css" rel="stylesheet">
        <title>Fornecedores cadastrados</title>
    </head>
    <body>
        <h1>Fornecedores cadastrados</h1>
        <?php
            require_once('conexao.php');
            $select = "select * from fornecedor";
            $resultado = mysqli_query($conexao, $select);
            $linhas = mysqli_num_rows($resultado);

            echo "<table><tr>";
            echo "<th>Nome</th>";
            echo "<th>Descrição</th>";
            echo "<th>Cidade</th>";
            echo "<th>Endereço</th>";
            echo "<th>Contatos</th></tr>";

            for ($i=0; $i < $linhas ; $i++) { 
                $registro = mysqli_fetch_row($resultado);
                $id = $registro[0];
                $nome = $registro[1];
                $descricao = $registro[2];
                $cidade = $registro[3];
                $endereco = $registro[4];
                $bairro = $registro[5];
                $numero = $registro[6];

                echo "<tr>";
                echo "<td>$nome</td>";
                echo "<td>$descricao</td>";
                echo "<td>$cidade</td>";
                echo "<td>$endereco, $numero, $bairro</td>";
                echo "<td><a href='contatos.php?id_for=$id'>Tel/Email</a></td>";
                echo "<td><a href='exclusao.php?tipo=fornecedor&id=$id'>Excluir</a></td>";
                echo "<td><a href='editar.php?tipo=fornecedor&id=$id'>Editar</a></td></tr>";
                
            }
            echo "</table><br>";
            echo "<p><a href='cadastro.php?tipo=fornecedor'><button>Cadastrar fornecedor</button></a></p>";
        ?>
       
       <p><a href="index.html"><button>Voltar</button></a></p>
    </body>
</html>
