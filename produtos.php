<DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>    
        <link href="estilo.css" rel="stylesheet">
        <title>Produtos cadastrados</title>
    </head>
    <body>
        <h1>Produtos cadastrados</h1>
        <?php
            require_once('conexao.php');
            $select = "select * from produto p join fornecedor f on(p.id_fornecedor=f.id)";
            $resultado = mysqli_query($conexao, $select);
            $linhas = mysqli_num_rows($resultado);

            echo "<table><tr>";
            echo "<th>Nome</th>";
            echo "<th>Descrição</th>";
            echo "<th>Fornecedor</th></tr>";

            for ($i=0; $i < $linhas ; $i++) { 
                $registro = mysqli_fetch_row($resultado);
                $id = $registro[0];
                $nome = $registro[1];
                $descricao = $registro[2];
                $fornecedor = $registro[5];

                echo "<tr>";
                echo "<td>$nome</td>";
                echo "<td>$descricao</td>";
                echo "<td>$fornecedor</td>";
                echo "<td><a href='exclusao.php?tipo=produto&id=$id'>Excluir</a></td>";
                echo "<td><a href='editar.php?tipo=produto&id=$id'>Editar</a></td></tr>";
                
            }
            echo "</table><br>";
            echo "<p><a href='cadastro.php?tipo=produto'><button>Cadastrar produto</button></a></p>";
        ?>
       <p><a href="index.html"><button>Voltar</button></a></p>

    </body>
</html>