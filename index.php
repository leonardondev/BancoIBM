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
        <form action='usuario.php' method='POST'><div class='login'>
          Usuário <input type='text' name='string_user' maxlength='20'>
          Senha <input type='password' name='pass' size='10' maxlength='16'>
          <input type='submit' name='botaologin' value='Login'></div> 
        </form>
      </div>
      <div id='logo'></div>
    </div>
    <div id='content_header'></div>
    <div id='site_content'>
      <div></div>      
        <div id='tmenubar'>
          <table> 
          </table>
        </div>
      <div class='sidebar'>
        <table class='link'>
          <tr></tr>
        </table>
      </div>
      <div id='content'>
        <!-- insert the page content here -->
      </div>
    </div>
    <div id='content_footer'></div>
    <div id='footer'>
          Banco de Dados II - 2017. COPYRIGHT &copy; - Grupo 4
    </div>
  </div>
</body>

</html>
