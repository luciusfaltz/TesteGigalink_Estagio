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
            $id = $_GET["id"];

            if($tipo == "fornecedor"){
                $select = "select * from fornecedor where id=$id";
                $resultado = mysqli_query($conexao, $select);
                $registro = mysqli_fetch_row($resultado);
                $nome = $registro[1];
                $descricao = $registro[2];
                $cidade = $registro[3];
                $endereco = $registro[4];
                $bairro = $registro[5];
                $numero = $registro[6];
                echo "<h1>Editar fornecedor</h1>";
               
                echo "<form action='edit.php?tipo=$tipo&id=$id' method='POST'>
                Nome<br> <input type='text' name='nomeFor' value='$nome' ><br><br>
                Descrição<br> <input type='text' name='descrFor' value='$descricao'><br><br>
                Cidade<br> <input type='text' name='cidade' value='$cidade'><br><br>
                Endereço<br> <input type='text' name='endereco' value='$endereco'><br><br>
                Bairro<br> <input type='text' name='bairro' value='$bairro'><br><br>
                Numero<br> <input type='text' name='numFor' value='$numero'><br><br>
                <input type='submit' value='Enviar'>
            </form>
            <p><a href='fornecedores.php'><button>Cancelar</button></a></p>";
            };
            if($tipo == "email"){
                $fornecedor = $_GET["fornecedor"];
                $selectEmail = "select * from email where id = $id";
                $resultadoEmail = mysqli_query($conexao, $selectEmail);
                $registroEmail = mysqli_fetch_row($resultadoEmail);
                $email = $registroEmail[1];
                $referenciaEmail = $registroEmail[2];

                echo "<h1>Editar e-mail</h1>";
                echo "<form action='edit.php?tipo=$tipo&id=$id&fornecedor=$fornecedor' method='POST'>
                E-mail<br> <input type='text' name='email' value='$email'><br><br>
                Referencia<br> <input type='text' name='referenciaEmail' value='$referenciaEmail'><br><br>
                <input type='submit' value='Enviar'>
            </form>
            <p><a href='contatos.php?id_for=$fornecedor'><button>Cancelar</button></a></p>";
            };
            if($tipo == "tel"){
                $fornecedor = $_GET["fornecedor"];
                $selectTel = "select * from telefone where id = $id";
                $resultadoTel = mysqli_query($conexao, $selectTel);
                $registroTel = mysqli_fetch_row($resultadoTel);
                $ddd = $registroTel[1];
                $numero = $registroTel[2];
                $referencia = $registroTel[3];

                echo "<h1>Editar telefone</h1>";
                echo "<form action='edit.php?tipo=$tipo&id=$id&fornecedor=$fornecedor' method='POST'>
                DDD<br> <input type='text' name='ddd' value='$ddd'><br><br>
                Numero<br> <input type='text' name='telefone'value='$numero'><br><br>
                Referencia<br> <input type='text' name='referenciaTel' value='$referencia'><br><br>
                <input type='submit' value='Enviar'>
            </form>
            <p><a href='contatos.php?id_for=$fornecedor'><button>Cancelar</button></a></p>";
            };
            if($tipo == "produto"){
                $sqlFornecedor = "select id, nome from fornecedor";
                $resultFornecedor = mysqli_query($conexao, $sqlFornecedor);
                $linhasFornecedor = mysqli_num_rows($resultFornecedor);

                $select = "select * from produto where id=$id";
                $resultado = mysqli_query($conexao, $select);
                $registro = mysqli_fetch_row($resultado);
                $id = $registro[0];
                $nome = $registro[1];
                $descricao = $registro[2];
                $fornecedor = $registro[3];

                echo "<h1>Editar produto</h1>";
                echo "<form action='edit.php?tipo=$tipo&id=$id' method='POST'>
                Nome<br> <input type='text' name='nomePro' value='$nome'><br><br>
                Descrição<br> <input type='text' name='descPro' value='$descricao'><br><br>
                Selecione o fornecedor<br><select name='fornecedor'>";
                for($i = 0; $i < $linhasFornecedor; $i++){
                    $registroFornecedor = mysqli_fetch_row($resultFornecedor);
                    $idFornecedor = $registroFornecedor[0];
                    $nomeFornecedor = $registroFornecedor[1];
                    if($idFornecedor == $fornecedor)
                        echo "<option value='$idFornecedor' selected>$nomeFornecedor</option>";
                    else
                        echo "<option value='$idFornecedor'>$nomeFornecedor</option>";

                }
                echo "</select><br><br>
                <input type='submit' value='Enviar'>
                </form>
                <p><a href='produtos.php'><button>Cancelar</button></a></p>";
            };
            if($tipo == "transportadora"){
                $select = "select nome from transportadora where id=$id";
                $resultado = mysqli_query($conexao, $select);
                $registro = mysqli_fetch_row($resultado);
                $nome = $registro[0];
                echo "<h1>Editar transportadora</h1>";
                echo "<form action='edit.php?tipo=$tipo&id=$id' method='POST'>
                Nome<br> <input type='text' name='nomeTransp' value='$nome'><br><br>
                <input type='submit' value='Enviar'>
            </form>
            <p><a href='transportadoras.php'><button>Cancelar</button></a></p>";
            };
        ?>
       

    </body>
</html>