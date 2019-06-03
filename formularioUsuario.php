<!DOCTYPE html>
<html>
  <head>
    <title>Informações do Usuário</title>
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
          <tr><td><a href='ajuda.php'            >Ajuda                  </a></td></tr>
        </table>
      </div>
      <div id='content'>
        <form method='post' action='inserir_usuario.php'>  
          <header>
          <i>Cadastro de Usuários</i><hr><br>
          </header>
          <!--NOME-->
          <h4>Nome de Usuário: 
            <input type='text' size='20' maxlength='20' name='username'><br></h4>  

          <!--SENHA-->
          <h4>
            Senha: <input type='text' size='12' maxlength='16' name='senha'>
          <h4>
            ID do Funcionário: 
              <?php
                include 'bdfunc.php';
                include 'formfunc.php';

                $conexao = conecta("clinmed", "ibm16g4", "2414");
                $opcoes = pulldown($conexao,"Funcionario","idfuncionario");
                $n = pg_num_rows($opcoes);
                
                echo "<select name='idfunc'>".
                "<option></option>";
                for ($i=0; $i < $n; $i++) { 
                  $v = pg_result($opcoes, $i, 0);
                  echo "<option value=$v >".$v."</option>";
                }
                echo "</select>";
                desconecta($conexao);
              ?>
          <br></h4>
           
          <input value='Cadastrar' name='submit' type='submit'> 
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
