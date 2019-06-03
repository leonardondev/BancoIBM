<?php 

	/*arquivo com funções de conexão*/
	include 'bdfunc.php';

	/*informações o formulário*/
	$nome_form = $_POST['Fname'];
	$sexo_form = $_POST['gender'];
	$rua_form = $_POST['Frua'];
	$numeroCasa_form = (int)$_POST['Fnumerocasa'];
	$cep_form = $_POST['Pcep'];
	$tipoFuncionario_form = $_POST['tipoFuncionario'];

	$dia_form = $_POST['Fdia'];
	$mes_form = $_POST['Fmes'];
	$ano_form = $_POST['Fano'];
	$data_form = "$ano_form-$mes_form-$dia_form";
	
	$ddd = $_POST['codarea'];
	$fonei = $_POST['fonei'];
	$fonef = $_POST['fonef'];
	$telefone_form = "$ddd-$fonei-$fonef";
	
	$dia_form = $_POST['Cdia'];
	$mes_form = $_POST['Cmes'];
	$ano_form = $_POST['Cano'];
	$dataContrato_form = "$ano_form-$mes_form-$dia_form";

	/* atributos "NOT NULL" */
		if (!(
		$nome_form AND
		$data_form AND
		$sexo_form AND
		$rua_form AND
		$numeroCasa_form AND
		$dataContrato_form AND
		$tipoFuncionario_form AND
		$cep_form
		)){
		echo "NÃO FOI PREENCHIDO TODOS OS CAMPOS OBRIGATÓRIOS.";
		exit();
		}


	$conexao = conecta("clinmed", "ibm16g4", "2414");

	$cadeia = "INSERT INTO Funcionario(idfuncionario, nome_func, dta_nasc, sexo, telefone, rua, num_casa, dta_contrato, tipo, cep_nro_cep) VALUES( NEXTVAL ('sec_funcionario'), '$nome_form', '$data_form', '$sexo_form', '$telefone_form', '$rua_form', '$numeroCasa_form', '$dataContrato_form', '$tipoFuncionario_form', '$cep_form' );";

	$result = pg_query($conexao, "$cadeia");

//echo "<br>result:  ".$result;
//echo "<br>  $nome_form <br>  $data_form <br>  $sexo_form <br>  $telefone_form <br>  $rua_form <br>  $numeroCasa_form <br>  $dataContrato_form <br>  $tipoFuncionario_form <br>  $cep_form  ";

if ($result){
      echo "<p align='center'>CADASTRO REALIZADO COM SUCESSO!</p><br>";
    }
    else{ 
      echo "<p align='center'>Não deu certo!</p><br>";
    }

desconecta($conexao); 
echo "<br><a href='cadastros.php'>Voltar</a>";
?> 