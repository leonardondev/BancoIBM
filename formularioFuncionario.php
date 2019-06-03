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
              <td><ul id='menu'><li><a href='formularioPaciente.php'>Paciente</a></li></ul></td>
              <td><ul id='menu'><li class='selected'><a href='formularioFuncionario.php'>Funcionário</a></li></ul></td>
            </tr>
          </table>
        </div>
      <div class='sidebar'>
        <table class='link'>
          <?php
          echo "<tr><td><a href=".$_SESSION['tipo'].">Início</a></td></tr>";
          switch ($_SESSION['tipo']) {
      case "home_adm.php":
        echo "<tr><td><a href='formularioUsuario.php' >Novo<br>Usuário        </a></td></tr>
        	  <tr><td><a href='all_users.php'         >Visualizar<br>Usuários </a></td></tr>
              <tr><td><a href='busca_funcionario.php' >Busca<br>Funcionário   </a></td></tr>
              <tr><td><a href='ajuda.php'             >Ajuda                  </a></td></tr>";
        break;
      case "home_esp.php":
        echo "<tr><td><a href='novo_atendimento.php'  >Novo Atendimento     </a></td></tr>
              <tr><td><a href='busca_paciente.php'    >Busca<br>Paciente    </a></td></tr>
              <tr><td><a href='busca_funcionario.php' >Busca<br>Funcionário </a></td></tr>
              <tr><td><a href='ajuda.php'             >Ajuda                </a></td></tr>";
        break;
      case "home_secr.php":
        echo "<tr><td><a href='novo_atendimento.php'  >Novo Atendimento     </a></td></tr>
              <tr><td><a href='cadastros.php'         >cadastros            </a></td></tr>
              <tr><td><a href='busca_paciente.php'    >Busca<br>Paciente    </a></td></tr>
              <tr><td><a href='busca_funcionario.php' >Busca<br>Funcionário </a></td></tr>
              <tr><td><a href='ajuda.php'             >Ajuda                </a></td></tr>";
        break;
      case "home_enf.php":
        echo "<tr><td><a href='busca_paciente.php'    >Busca<br>Paciente    </a></td></tr>
              <tr><td><a href='busca_funcionario.php' >Busca<br>Funcionário </a></td></tr>
              <tr><td><a href='ajuda.php'             >Ajuda                </a></td></tr>";
        break;
      }
          ?>
        </table>
      </div>
      <div id='content'>  
				<form method='post' action='inserir_funcionario.php'>  
				<header>
				<i>Cadastro do Funcionário</i><hr><br>
				</header>

				<!--NOME-->
				<h4>Nome:  
					<input size='20' maxlength='32' name='Fname' type='text'><br></h4>  

				<!--DATA DE NASC -->
				<h4>Data de nascimento: 
					<input size='2' maxlength='2' name='Fdia' type='text'> / 
					<input size='2' maxlength='2' name='Fmes' type='text'> / 
					<input size='4' maxlength='4' name='Fano' type='text'><br></h4>
							 

				<!--SEXO-->	
				<h4>Sexo: 
					<input type='radio' name='gender' value='masculino' checked> Masculino
					<input type='radio' name='gender' value='feminino'> Feminino<br></h4>

				<!--TELEFONE-->
				<h4>Contato: (<input size='2' maxlength='2' name='codarea' type='text'>) - 
					<input size='5' maxlength='5' name='fonei' type='text'>-
					<input size='4' maxlength='4' name='fonef' type='text'><br></h4>

				<!--ENDEREÇO-->	 
				<h4>Rua: <input size='20' maxlength='32' name='Frua' type='text'>
					Nº: <input size='3' maxlength='5' name='Fnumerocasa' type='text'>
					CEP: 
						<?php
							  include 'bdfunc.php';
							  include 'formfunc.php';

							  $conexao = conecta("clinmed", "ibm16g4", "2414");
							  $opcoes = pulldown($conexao,"Cep","nro_cep");
							  $n = pg_num_rows($opcoes);
							  
							  echo "<select name='Pcep'>".
							  "<option></option>";
							  for ($i=0; $i < $n; $i++) { 
							    $v = pg_result($opcoes, $i, 0);
							    echo "<option value=$v >".$v."</option>";
							  }
							  echo "</select>";
							  desconecta($conexao);
							?>
					<br></h4>
			 
				<h4>Selecione o tipo do funcionário: 
					<?php
					  $conexao = conecta("clinmed", "ibm16g4", "2414");
					  $opcoes = pulldown($conexao,"Funcionario","tipo");
					  $n = pg_num_rows($opcoes);
					  
					   echo "<select name='tipoFuncionario'>".
					   "<option></option>";
					  for ($i=0; $i < $n; $i++) { 
					    $v = pg_result($opcoes, $i, 0);
					    echo "<option value=$v >".$v."</option>";
					  }
					  echo "</select>";
					  desconecta($conexao);
					?>
				<br></h4>

				<h4>Data de Contrato: 
					<input size='2' maxlength='2' name='Cdia' type='text'> / 
					<input size='2' maxlength='2' name='Cmes' type='text'> / 
					<input size='4' maxlength='4' name='Cano' type='text'><br></h4>

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










