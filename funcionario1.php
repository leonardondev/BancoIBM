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
              <td><ul id='menu'><li class='selected'><a href='funcionario1.php'>Por id</a></li></ul></td>
              <td><ul id='menu'><li><a href='funcionario2.php'>Por nome</a></li></ul></td>
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
<?php
  include 'bdfunc.php';
  

//prepara uma tabela. cabecalho primeiro
  echo "<table class='result' border='1' cellpadding='4' align='center' bgcolor='BLACK'>".
      "<tr class='titulo'>".
        "<th colspan='9'>PACIENTES</th>".
      "</tr>".
      "<tr>".
        "<th>ID</th>".
        "<th>Nome</th>".
        "<th>Nascimento</th>".
        "<th>Sexo</th>".
        "<th>Telefone	</th>".
        "<th>Rua</th>".
        "<th>Nº</th>".
        "<th>Data de Contrato</th>".
        "<th>CEP</th>".
      "</tr>";

$conexao = conecta("clinmed", "ibm16g4", "2414");

  // executa uma busca por dados
$cadeia = "SELECT * FROM Funcionario WHERE dta_demissao IS NULL ORDER BY idfuncionario;";
$resutset = consulta($conexao, "$cadeia");
$nlinhas = pg_numrows($resutset);

for ($i=0; $i<$nlinhas; $i++){
  // recupera campos do resultado
        $idpa = pg_result($resutset, $i, 0);
        $Nome = pg_result($resutset, $i, 1);
        $Nasc = pg_result($resutset, $i, 2);
        $Sexo = pg_result($resutset, $i, 3);
        $Fone = pg_result($resutset, $i, 4);
        $Rua = pg_result($resutset, $i, 5);
        $Nro = pg_result($resutset, $i, 6);
        $Cont = pg_result($resutset, $i, 7);
        $CEP = pg_result($resutset, $i, 8);

  switch ($i%2) {
    case '0':
      echo "<tr bgcolor='#ffffff'>".
        "<td> $idpa </td>".
        "<td> $Nome </td>".
        "<td> $Nasc </td>".
        "<td> $Sexo </td>".
        "<td> $Fone </td>".
        "<td> $Rua </td>".
        "<td> $Nro </td>".
        "<td> $Cont </td>".
        "<td> $CEP </td>".
        "</tr>";
      break;
    
    case '1':
      echo "<tr bgcolor='#bbbbbb'>".
        "<td> $idpa </td>".
        "<td> $Nome </td>".
        "<td> $Nasc </td>".
        "<td> $Sexo </td>".
        "<td> $Fone </td>".
        "<td> $Rua </td>".
        "<td> $Nro </td>".
        "<td> $Cont </td>".
        "<td> $CEP </td>".
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
