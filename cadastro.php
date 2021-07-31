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
            </form>";
            };
            if($tipo == "email"){
                $fornecedor = $_GET["fornecedor"];
                echo "<h1>Cadastrar novo e-mail</h1>";
                echo "<form action='insert.php?tipo=$tipo&id_fornecedor=$fornecedor' method='POST'>
                E-mail: <input type='text' name='email'><br>
                Referencia: <input type='text' name='referenciaEmail'><br>
                <br><br>
                <input type='submit' value='Enviar'>
            </form>";
            };
            if($tipo == "tel"){
                $fornecedor = $_GET["fornecedor"];
                echo "<h1>Cadastrar novo telefone</h1>";
                echo "<form action='insert.php?tipo=$tipo&id_fornecedor=$fornecedor' method='POST'>
                DDD: <input type='text' name='ddd' placeholder='Ex:(22)'><br>
                Numero: <input type='text' name='telefone' placeholder='Ex: 99999-9999'><br>
                Referencia: <input type='text' name='referenciaTel'><br>
                <br><br>
                <input type='submit' value='Enviar'>
            </form>";
            };
            if($tipo == "produto"){
                echo "<h1>Cadastrar novo produto</h1>";
                echo "<form action='insert.php?tipo=$tipo' method='POST'>
                Nome: <input type='text' name='nomePro'><br>
                Descrição: <input type='text' name='descPro'><br>
                <br><br>
                <input type='submit' value='Enviar'>
            </form>";
            };
            if($tipo == "transportadora"){
                echo "<h1>Cadastrar nova transportadora</h1>";
                echo "<form action='insert.php?tipo=$tipo' method='POST'>
                Nome: <input type='text' name='nomeTransp'><br>
                <br><br>
                <input type='submit' value='Enviar'>
            </form>";
            };
        ?>
       

    </body>
</html>