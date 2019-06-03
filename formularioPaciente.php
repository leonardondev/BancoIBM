<!DOCTYPE html>
<html>
	<head>
		<title>Informações do Paciente</title>
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
              <td><ul id='menu'><li class='selected'><a href='formularioPaciente.php'>Paciente</a></li></ul></td>
              <td><ul id='menu'><li><a href='formularioFuncionario.php'>Funcionário</a></li></ul></td>
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
				<form method='post' action='inserir_paciente.php'>  
					<header>
					<i>Cadastro do Paciente</i><hr><br>
					</header>
					<!--NOME-->
					<!--Size permitido = 20-->
					<h4>Nome: <input size='20' maxlength='32' name='Pname' type='text'><br></h4>  

					<!--DATA DE NASC -->
					<h4>
						Data de nascimento: 
					<input size='1' maxlength='2' name='Pdia' type='text'> / 
					<input size='1' maxlength='2' name='Pmes' type='text'> / 
					<input size='1' maxlength='4' name='Pano' type='text'><br>
					</h4>
					 
					<!--SEXO -->
					<h4>Sexo:  
						<input value='masculino' name='gender' type='radio'> Masculino 
						<input value='feminino' name='gender' type='radio'> Feminino<br></h4>
					
					<!--TELEFONE-->
					<h4>Contato: (<input size='1' maxlength='2' name='Ptelefone' type='text'>) - 
						<input size='8' maxlength='9' name='Ptelefone' type='text'><br></h4>

					<!--ENDEREÇO-->
					<h4>
						Rua: <input size='20' maxlength='32' name='rua' type='text'>
						Nº: <input size='3' maxlength='5' name='Pnumerocasa' type='text'><br></h4>
					<h4>
						Complemento: <input size='12' maxlength='32' name='Fcomplemento' type='text'>
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
