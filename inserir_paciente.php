<?php 

	/*arquivo com funções de conexão*/
	include 'bdfunc.php';

	/*informações o formulário*/
	$nome_form = $_POST['Pname'];
	$sexo_form = $_POST['gender'];
	$rua_form = $_POST['Prua'];
	$numeroCasa_form = (int)$_POST['Pnumerocasa'];
	$cep_form = $_POST['Pcep'];

	$data_form = $_POST['dta_nasc'];
	
	$ddd = $_POST['codearea'];
	$Ponei = $_POST['Ponei'];
	$Ponef = $_POST['Ponef'];
	$telefone_form = "$ddd"."-"."$Ponei"."-"."$Ponef";

	/* atributos "NOT NULL" */
		if (!(
		$nome_form AND
		$data_form AND
		$sexo_form AND
		$rua_form AND
		$numeroCasa_form AND
		$cep_form
		)){
		echo "NÃO FOI PREENCHIDO TODOS OS CAMPOS OBRIGATÓRIOS.";
		exit();
		}


	$conexao = conecta("clinmed", "ibm16g4", "2414");

	$cadeia = "INSERT INTO Paciente(idpaciente,nome_paciente,dta_nasc,sexo,telefone,rua,num_casa, cep_nro_cep) VALUES (NEXTVAL ('sec_funcionario'),'$nome_form','$data_form','$sexo_form','$telefone_form','$rua_form','$numeroCasa_form','$cep_form');";

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