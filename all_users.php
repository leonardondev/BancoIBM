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
<?php
  include 'bdfunc.php';
  

//prepara uma tabela. cabecalho primeiro
  echo "<table class='result' border='1' cellpadding='4' align='center' bgcolor='BLACK'>".
      "<tr class='titulo'>".
        "<th colspan='3'>USUÁRIOS</th>".
      "</tr>".
      "<tr>".
        "<th>Username</th>".
        "<th>Senha</th>".
        "<th>ID</th>".
      "</tr>";

$conexao = conecta("clinmed", "ibm16g4", "2414");

  // executa uma busca por dados
$cadeia = "SELECT username, password, iduser FROM Usuario ORDER BY iduser;";
$resutset = consulta($conexao, "$cadeia");
$nlinhas = pg_numrows($resutset);

for ($i=0; $i<$nlinhas; $i++){
  // recupera campos do resultado
  $username = pg_result($resutset, $i, 0);
  $password = pg_result($resutset, $i, 1);
  $id = pg_result($resutset, $i, 2);

  switch ($i%2) {
    case '0':
      echo "<tr bgcolor='#ffffff'>".
        "<td> $username </td>".
        "<td> $password </td>".
        "<td> $id </td>".
        "</tr>";
      break;
    
    case '1':
      echo "<tr bgcolor='#bbbbbb'>".
        "<td> $username </td>".
        "<td> $password </td>".
        "<td> $id </td>".
        "</tr>";
      break;
  }
}
echo "</table>";

desconecta($conexao);
?>
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
