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
              <td><ul id='menu'><li><a href='formularioPaciente.php'>Paciente</a></li></ul></td>
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
	  </div>
    </div>
    <div id='content_footer'></div>
    <div id='footer'>
          Banco de Dados II - 2017. COPYRIGHT &copy; - Grupo 4
    </div>
  </div>
</body>
</html>
