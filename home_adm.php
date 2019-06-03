<!DOCTYPE html>
<html>

<head>
  <title>MULTIcare</title>
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
            </tr> 
          </table>
        </div>
      <div class='sidebar'>
        <table class='link'>
          <tr><td><a href='home_adm.php'          >Início                 </a></td></tr>
          <tr><td><a href='formularioUsuario.php' >Novo<br>Usuário        </a></td></tr>
          <tr><td><a href='all_users.php'         >Visualizar<br>Usuários </a></td></tr>
          <tr><td><a href='busca_funcionario.php' >Busca<br>Funcionário   </a></td></tr>
          <tr><td><a href='ajuda.php'             >Ajuda                  </a></td></tr>
        </table>
      </div>
      <div id='content'>
<!-- insert the page content here -->

<!--fim coluna central-->
	  	</div>
    </div>
    <div id='content_footer'></div>
    <div id='footer'>
          Banco de Dados II - 2017. COPYRIGHT &copy; - Grupo 4
    </div>
  </div>
</body>
</html>
