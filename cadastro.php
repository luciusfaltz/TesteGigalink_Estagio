<DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>    
        <link href="estilo.css" rel="stylesheet">
        <title>Cadastro</title>
    </head>
    <body>
        <?php
            require_once('conexao.php');
            $tipo = $_GET["tipo"];

            if($tipo == "fornecedor"){
                echo "<h1>Cadastrar novo fornecedor</h1>";
                echo "<form action='insert.php?tipo=$tipo' method='POST'>
                Nome<br><input type='text' name='nomeFor'><br><br>
                Descrição<br><input type='text' name='descrFor'><br><br>
                Cidade<br><input type='text' name='cidade'><br><br>
                Endereço<br><input type='text' name='endereco'><br><br>
                Bairro<br><input type='text' name='bairro'><br><br>
                Numero<br><input type='text' name='numFor'><br><br>
                <input type='submit' value='Enviar'>
            </form>
            <p><a href='fornecedores.php'><button>Cancelar</button></a></p>";
            };
            if($tipo == "email"){
                $fornecedor = $_GET["fornecedor"];
                echo "<h1>Cadastrar novo e-mail</h1>";
                echo "<form action='insert.php?tipo=$tipo&id_fornecedor=$fornecedor' method='POST'>
                E-mail<br> <input type='text' name='email'><br><br>
                Referencia<br> <input type='text' name='referenciaEmail'><br><br>
                <input type='submit' value='Enviar'>
            </form>
            <p><a href='contatos.php?id_for=$fornecedor'><button>Cancelar</button></a></p>";
            };
            if($tipo == "tel"){
                $fornecedor = $_GET["fornecedor"];
                echo "<h1>Cadastrar novo telefone</h1>";
                echo "<form action='insert.php?tipo=$tipo&id_fornecedor=$fornecedor' method='POST'>
                DDD<br> <input type='text' name='ddd'><br><br>
                Numero<br> <input type='text' name='telefone'><br><br>
                Referencia<br> <input type='text' name='referenciaTel'><br><br>
                <input type='submit' value='Enviar'>
            </form>
            <p><a href='contatos.php?id_for=$fornecedor'><button>Cancelar</button></a></p>";
            };
            if($tipo == "produto"){
                $sqlFornecedor = "select * from fornecedor";
                $resultFornecedor = mysqli_query($conexao, $sqlFornecedor);
                $linhasFornecedor = mysqli_num_rows($resultFornecedor);
                echo "<h1>Cadastrar novo produto</h1>";
                echo "<form action='insert.php?tipo=$tipo' method='POST'>
                Nome<br> <input type='text' name='nomePro'><br><br>
                Descrição<br> <input type='text' name='descPro'><br><br>
                Selecione o fornecedor<br><select name='fornecedor'>";
                for($i = 0; $i < $linhasFornecedor; $i++){
                    $registroFornecedor = mysqli_fetch_row($resultFornecedor);
                    $idFornecedor = $registroFornecedor[0];
                    $nomeFornecedor = $registroFornecedor[1];
                    echo "<option value='$idFornecedor'>$nomeFornecedor</option>";
                }
                echo "</select><br><br>
                <input type='submit' value='Enviar'>
                </form>
                <p><a href='produtos.php'><button>Cancelar</button></a></p>";
            };
            if($tipo == "transportadora"){
                echo "<h1>Cadastrar nova transportadora</h1>";
                echo "<form action='insert.php?tipo=$tipo' method='POST'>
                Nome<br> <input type='text' name='nomeTransp'><br><br>
                <input type='submit' value='Enviar'>
            </form>
            <p><a href='transportadoras.php'><button>Cancelar</button></a></p>";
            };
        ?>
       

    </body>
</html>