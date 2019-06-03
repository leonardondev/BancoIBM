<?php
	session_start();
	require("bdfunc.php");
	  
	if (isset($_POST['botaologin'])) {
		$User = $_POST['string_user'];
		$Pass= $_POST['pass'];
	}

	// tratar atributos "NOT NULL"
	if (!( $User AND $Pass)){
	echo "NÃO FOI PREENCHIDO TODOS OS CAMPOS OBRIGATÓRIOS.<br>";
	$inicio = "href=index.php";
	echo"<br><a "."href=index.php".">Voltar</a>";
	exit();
	}

	$conexao = conecta("clinmed", "ibm16g4", "2414");
	
	$cadeia = "
SELECT Funcionario.tipo, Funcionario.nome_func 
FROM Funcionario, Usuario 
WHERE username = '$User' 
AND Usuario.iduser = Funcionario.idfuncionario;
	";
	
	// executa uma busca por dados
	$resutset = consulta($conexao, $cadeia);
	$nlinhas = pg_numrows($resutset);

	if (nlinhas == 0) {
		desconecta($conexao);
		header("Location: index.php");
	}

	// recupera campos do resutset, linha, coluna
	$tipo = pg_result($resutset, 0, 0);
	$_SESSION['nome'] = pg_result($resutset, 0, 1);

	desconecta($conexao);


	if($tipo == 'administrador'){
		$_SESSION['tipo'] = "home_adm.php";
		header("Location: home_adm.php");
	}
	elseif($tipo == 'especialista'){
		$_SESSION['tipo'] = "home_esp.php";
		header ("Location: home_esp.php"); 
	}
	elseif($tipo == 'secretaria'){
		$_SESSION['tipo'] = "home_secr.php";
		header ("Location: home_secr.php"); 
	}
	elseif($tipo == 'enfermeiro'){
		$_SESSION['tipo'] = "home_enf.php";
		header ("Location: home_enf.php"); 
	}
?>
