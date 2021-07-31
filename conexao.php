
	<?php
		$servidor = "localhost";
		$usuario = "root";
		$senha = "";
		$banco = "teste_gigalink";

		$conexao = mysqli_connect($servidor, $usuario, $senha);
		if(!$conexao)
			die("Não foi possível conectar " - mysqli_connect_error());
		mysqli_select_db($conexao, $banco) or die ("Error ao selecionar banco " . mysqli_connect_error());
	?>