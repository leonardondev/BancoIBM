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
              <td><ul id='menu'><li class='selected'><a href='index.html'>Início</a></li></ul></td>
              <td><ul id='menu'><li><a href='pag1.html'>menu1</a></li></ul></td>
              <td><ul id='menu'><li><a href='pag2.html'>menu2</a></li></ul></td>
              <td><ul id='menu'><li><a href='pag3.html'>menu3</a></li></ul></td>
              <td><ul id='menu'><li><a href='pag4.html'>menu4</a></li></ul></td>
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
        <!-- insert the page content here -->
        <h1>Examples</h1>
        <p>This page contains examples of all the styled elements available as part of this design. Use this page for reference, whilst you build your website.</p>
        <h2>Headings</h2>
        <p>These are the different heading formats:</p>
        <h1>Heading 1</h1>
        <h2>Heading 2</h2>
        <h3>Heading 3</h3>
        <h4>Heading 4</h4>
        <h5>Heading 5</h5>
        <h6>Heading 6</h6>
        <h2>Text</h2>
        <p>The following examples show how the text (within '&lt;p&gt;&lt;/p&gt;' tags) will appear:</p>
        <p><strong>This is an example of bold text</strong></p>
        <p><i>This is an example of italic text</i></p>
        <p><a href='#'>This is a hyperlink</a></p>
        <h2>Lists</h2>
        <p>This is an unordered list:</p>
        <ul>
          <li>Item 1</li>
          <li>Item 2</li>
          <li>Item 3</li>
          <li>Item 4</li>
        </ul>
        <p>This is an ordered list:</p>
        <ol>
          <li>Item 1</li>
          <li>Item 2</li>
          <li>Item 3</li>
          <li>Item 4</li>
        </ol>
        <h2>Images</h2>
        <p>images can be placed on the left, in the center or on the right:</p>
        <span class='left'><img src='style/graphic.png' alt='example graphic' /></span>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
          incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
          exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
          irure dolor in reprehenderit in voluptate velit esse cillum.
        </p>
        <span class='center'><img src='style/graphic.png' alt='example graphic' /></span>
        <span class='right'><img src='style/graphic.png' alt='example graphic' /></span>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
          incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
          exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
          irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
          pariatur.
        </p>
        <h2>Tables</h2>
        <p>Tables should be used to display data and not used for laying out your website:</p>
        <table style='width:100%; border-spacing:0;'>
          <tr><th>Item</th><th>Description</th></tr>
          <tr><td>Item 1</td><td>Description of Item 1</td></tr>
          <tr><td>Item 2</td><td>Description of Item 2</td></tr>
          <tr><td>Item 3</td><td>Description of Item 3</td></tr>
          <tr><td>Item 4</td><td>Description of Item 4</td></tr>
        </table>
        <h2>Form Elements</h2>
        <form action='#' method='post'>
          <div class='form_settings'>
            <p><span>Form field example</span><input type='text' name='name' value=' '/></p>
            <p><span>Textarea example</span><textarea rows='8' cols='50' name='name'></textarea></p>
            <p><span>Checkbox example</span><input class='checkbox' type='checkbox' name='name' value=' '/></p>
            <p><span>Dropdown list example</span><select id='id' name='name'><option value='1'>Example 1</option><option value='2'>Example 2</option></select></p>
            <p style='padding-top: 15px'><span>&nbsp;</span><input class='submit' type='submit' name='name' value='button' /></p>
          </div>
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
