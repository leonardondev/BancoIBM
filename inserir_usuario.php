<?php 

    /*arquivo com funções de conexão*/
    include 'bdfunc.php';

    /*informações o formulário*/
    if (isset($_POST['submit'])) {
      $username = $_POST['username'];
      $password = $_POST['senha'];
      $iduser = (int)$_POST['idfunc'];


      /* atributos "NOT NULL" */
        if ( !($username AND $password AND $iduser) ){
        echo "NÃO FOI PREENCHIDO TODOS OS CAMPOS OBRIGATÓRIOS.";
        exit();
        }


      $conexao = conecta("clinmed", "ibm16g4", "2414");

      $cadeia = "SELECT username,iduser FROM Usuario WHERE username = '$username' OR iduser = '$iduser';";
      $result = pg_query($conexao, "$cadeia");
      $n = pg_num_rows($result);

      if ($n > 0) {
        echo "USUÁRIO JÁ CADASTRADO!.";
      }

      else{
        $cadeia = "INSERT INTO Usuario(username, password, iduser) VALUES( '$username', '$password', '$iduser' );";
        $result = pg_query($conexao, "$cadeia");

        if ($result){
          echo "<p align='center'>CADASTRO REALIZADO COM SUCESSO!</p><br>";
        }
        else{ 
          echo "<p align='center'>Não deu certo!</p><br>";
        }
      }
    desconecta($conexao);
    }
    echo "<br><a href='formularioUsuario.php'>Voltar</a>";
?> 