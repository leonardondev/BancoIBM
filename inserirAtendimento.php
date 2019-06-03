<?php 

	/*arquivo com funções de conexão*/
	include 'bdfunc.php';

	/*informações o formulário*/
	$idPaciente_form = $_POST['idpaciente']

	$tipoConsulta_form = $_POST['TipoConsulta'];

	$dia_form = $_POST['dia'];
	$mes_form = $_POST['mes'];
	$ano_form = $_POST['ano'];
	$data_form = "$ano_form-$mes_form-$dia_form";
	
	$hora_form = $_POST['hora'];
	$minuto_form = $_POST['minuto'];
	$segundo_form = $_POST['segundo'];
	$horario_form = "$ano_form-$mes_form-$dia_form";

	/* atributos "NOT NULL" */
		if (!(
		$tipoConsulta_form AND
		$data_form AND
		$horario_form
		)){
		echo "NÃO FOI PREENCHIDO TODOS OS CAMPOS OBRIGATÓRIOS.";
		exit();
		}


	$conexao = conecta("clinmed", "ibm16g4", "2414");

	$cadeia = "INSERT INTO atendimento(idatendimento, paciente_idpaciente, tipoConsulta, dta_atend, hora_atend) VALUES( NEXTVAL ('sec_atendimento'),'idpaciente_form','$tipoConsulta_form', '$data_form', '$horario_form' );";

	$result = pg_query($conexao, "$cadeia");

//echo "<br>result:  ".$result;
//echo "<br>  $nome_form <br>  $data_form <br>  $sexo_form <br>  $telefone_form <br>  $rua_form <br>  $numeroCasa_form <br>  $dataContrato_form <br>  $tipoFuncionario_form <br>  $cep_form  ";

if ($result){
      echo "<p align='center'>ATENDIMENTO CADASTRADO REALIZADO COM SUCESSO!</p><br>";
    }
    else{ 
      echo "<p align='center'>Não deu certo!</p><br>";
    }

desconecta($conexao); 
echo "<br><a href='formularioAtendimento.php'>Voltar</a>";
?> 