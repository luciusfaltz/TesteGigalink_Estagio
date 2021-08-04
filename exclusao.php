<DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>    
        <link href="estilo.css" rel="stylesheet">
        <title>Excluir</title>
    </head>
    <body>
        <?php
            require_once('conexao.php');
            $tipo = $_GET["tipo"];
            $id = $_GET["id"];

            if($tipo == 'tel' || $tipo == 'email'){
                $fornecedor = $_GET["fornecedor"];
                echo "<h2>Você tem certeza?</h2>
                <a href='excluir.php?tipo=$tipo&id=$id&fornecedor=$fornecedor'><button>Sim</button></a><br><br><a href='contatos.php?id_for=$fornecedor'><button>Não. Voltar para a página de contatos</button></a>";
            }
            if($tipo == 'fornecedor'){
                echo "<h2>Você tem certeza?</h2>
                <a href='excluir.php?tipo=$tipo&id=$id'><button>Sim</button></a><br><br><a href='fornecedores.php'><button>Não. Voltar para a página de fornecedores</button></a>";
            }
            if($tipo == 'produto'){
                echo "<h2>Você tem certeza?</h2>
                <a href='excluir.php?tipo=$tipo&id=$id'><button>Sim</button></a><br><br><a href='produtos.php'><button>Não. Voltar para a página de produtos</button></a>";
            }
            if($tipo == 'pedido'){
                echo "<h2>Você tem certeza?</h2>
                <a href='excluir.php?tipo=$tipo&id=$id'><button>Sim</button></a><br><br><a href='pedidos.php'><button>Não. Voltar para a página de pedidos</button></a>";
            }
            if($tipo == 'transportadora'){
                echo "<h2>Você tem certeza?</h2>
                <a href='excluir.php?tipo=$tipo&id=$id'><button>Sim</button></a><br><br><a href='transportadoras.php'><button>Não. Voltar para a página de transportadoras</button></a>";
            }


        ?>
       

    </body>
</html>