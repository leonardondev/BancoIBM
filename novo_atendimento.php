<!DOCTYPE html>
<html>
	<head>
		<title>Informações do funcionário</title>
		<meta name='description' content='website description' />
	  <meta name='keywords' content='website keywords, website keywords' />
	  <meta charset='UTF-8'>
	  <link rel='stylesheet' type='text/css' href='style/tema_clinmed.css' title='style' />
	</head>

<body>
  <div id='main'>
    <div id='header'>
      <div id='login'>
        <?php session_start();
          echo 
            "<form action='index.php' method='POST'><div class='login'>".
              "<b>". $_SESSION['nome']."</b> ".
              "<input type='submit' name='botaologin' value='Logout'></div>".
            "</form>";?>
      </div>
      <div id='logo'></div>
    </div>
    <div id='content_header'></div>
    <div id='site_content'>
      <div></div>      
        <div id='tmenubar'>
          <table> 
          	<tr>
              <td><ul id='menu'><li><a href='novo_atendimento.php'>Paciente</a></li></ul></td>
              <td><ul id='menu'><li class='selected'><a href='AtendimentoFormulario.php'>Funcionário</a></li></ul></td>
            </tr>
          </table>
        </div>
      <div class='sidebar'>
        <table class='link'>
          <tr><td><a href='home_secr.php'         >Início               </a></td></tr>
          <tr><td><a href='novo_atendimento.php'  >Novo Atendimento     </a></td></tr>
          <tr><td><a href='agenda.php'            >Agenda               </a></td></tr>
          <tr><td><a href='cadastros.php'         >cadastros            </a></td></tr>
          <tr><td><a href='busca_paciente.php'    >Busca<br>Paciente    </a></td></tr>
          <tr><td><a href='busca_funcionario.php' >Busca<br>Funcionário </a></td></tr>
          <tr><td><a href='ajuda.html'            >Ajuda                </a></td></tr>
        </table>
      </div>
      <div id='content'>  
				<form method='post' action='inserir_funcionario.php'>  
				<header>
				<i>Cadastro do Funcionário</i><hr><br>
				</header>

				<!--ID PACIENTE-->
				<h4>ID paciente:
				<?php
					  include 'bdfunc.php';
					  include 'formfunc.php';

					  $conexao = conecta("clinmed", "ibm16g4", "2414");
					  $opcoes = pulldown($conexao,"Paciente","idpaciente");
					  $n = pg_num_rows($opcoes);
					  
					  echo "<select name='idpaciente'>".
					  "<option></option>";
					  for ($i=0; $i < $n; $i++) { 
					    $v = pg_result($opcoes, $i, 0);
					    echo "<option value=$v >".$v."</option>";
					  }
					  echo "</select>";
					  desconecta($conexao);
					?>

				<!--TIPO CONSULTA-->
				<h4>Nome da consulta:  
					<input size='20' maxlength='32' name='tipoConsulta' type='text'><br></h4>

				<!--DATA DE ATENDIMENTO -->
				<h4>Data de atendimento: 
					<input size='2' maxlength='2' name='dia' type='text'> / 
					<input size='2' maxlength='2' name='mes' type='text'> / 
					<input size='4' maxlength='4' name='ano' type='text'><br></h4>

				<!--HORA ATENDIMENTO-->
				<h4>Hora de atendimento
					<input size='2' maxlength='2' name='hora' type='text'> / 
					<input size='2' maxlength='2' name='minuto' type='text'> / 
					<input size='2' maxlength='2' name='segundo' type='text'><br></h4>
			 
				<input value='Enviar' name='submit' type='submit'> 
			</form>
		</div>
    </div>
    <div id='content_footer'></div>
    <div id='footer'>
          Banco de Dados II - 2017. COPYRIGHT &copy; - Grupo 4
    </div>
  </div>
</body>
</html>










