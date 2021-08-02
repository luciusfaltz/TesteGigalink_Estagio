<DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>    
        <title>Cadastro</title>
    </head>
    <body>
        <?php
            require_once('conexao.php');
            $tipo = $_GET["tipo"];

            if($tipo == "fornecedor"){
                echo "<h1>Cadastrar novo fornecedor</h1>";
                echo "<form action='insert.php?tipo=$tipo' method='POST'>
                Nome: <input type='text' name='nomeFor'><br>
                Descrição: <input type='text' name='descrFor'><br>
                Cidade: <input type='text' name='cidade'><br>
                Endereço: <input type='text' name='endereco'><br>
                Bairro: <input type='text' name='bairro'><br>
                Numero: <input type='text' name='numFor'><br>
                <br><br>
                <input type='submit' value='Enviar'>
            </form>
            <p><a href='fornecedores.php'>Cancelar</a></p>";
            };
            if($tipo == "email"){
                $fornecedor = $_GET["fornecedor"];
                echo "<h1>Cadastrar novo e-mail</h1>";
                echo "<form action='insert.php?tipo=$tipo&id_fornecedor=$fornecedor' method='POST'>
                E-mail: <input type='text' name='email'><br>
                Referencia: <input type='text' name='referenciaEmail'><br>
                <br><br>
                <input type='submit' value='Enviar'>
            </form>
            <p><a href='contatos.php?id_for=$fornecedor'>Cancelar</a></p>";
            };
            if($tipo == "tel"){
                $fornecedor = $_GET["fornecedor"];
                echo "<h1>Cadastrar novo telefone</h1>";
                echo "<form action='insert.php?tipo=$tipo&id_fornecedor=$fornecedor' method='POST'>
                DDD: <input type='text' name='ddd'><br>
                Numero: <input type='text' name='telefone'><br>
                Referencia: <input type='text' name='referenciaTel'><br>
                <br><br>
                <input type='submit' value='Enviar'>
            </form>
            <p><a href='contatos.php?id_for=$fornecedor'>Cancelar</a></p>";
            };
            if($tipo == "produto"){
                $sqlFornecedor = "select * from fornecedor";
                $resultFornecedor = mysqli_query($conexao, $sqlFornecedor);
                $linhasFornecedor = mysqli_num_rows($resultFornecedor);
                echo "<h1>Cadastrar novo produto</h1>";
                echo "<form action='insert.php?tipo=$tipo' method='POST'>
                Nome: <input type='text' name='nomePro'><br>
                Descrição: <input type='text' name='descPro'><br>
                Selecione o fornecedor:<select name='fornecedor'>";
                for($i = 0; $i < $linhasFornecedor; $i++){
                    $registroFornecedor = mysqli_fetch_row($resultFornecedor);
                    $idFornecedor = $registroFornecedor[0];
                    $nomeFornecedor = $registroFornecedor[1];
                    echo "<option value='$idFornecedor'>$nomeFornecedor</option>";
                }
                echo "</select><br>
                <br><br>
                <input type='submit' value='Enviar'>
                </form>
                <p><a href='produtos.php'>Cancelar</a></p>";
            };
            if($tipo == "transportadora"){
                echo "<h1>Cadastrar nova transportadora</h1>";
                echo "<form action='insert.php?tipo=$tipo' method='POST'>
                Nome: <input type='text' name='nomeTransp'><br>
                <br><br>
                <input type='submit' value='Enviar'>
            </form>
            <p><a href='transportadoras.php'>Cancelar</a></p>";
            };
        ?>
       

    </body>
</html>