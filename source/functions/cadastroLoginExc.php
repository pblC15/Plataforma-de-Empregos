<?php 
  require_once "../../config/conx.php";

  ini_set('display_erros', 1);
  error_reporting(E_ALL);
             

  //Obter dados do formulario
  if(isset($_POST['f_submit'])){

    $nome = trim(filter_var($_POST['f_user'], FILTER_SANITIZE_STRING));
    $sobreNome = trim(filter_var($_POST['f_sobreNome'], FILTER_SANITIZE_STRING));
    $password = trim(filter_var($_POST['f_passwrd'], FILTER_SANITIZE_SPECIAL_CHARS));
    $email = trim(filter_var($_POST['f_email_user']), FILTER_VALIDATE_EMAIL);


    if(!empty($email)){

        $sql = "SELECT * FROM tb_usuario WHERE email_user = {$email}";

        $res = mysqli_query($conn, $sql);
        $ret = mysqli_affected_rows($conn);
        // $ret = mysqli_fetch_array($res);

        if($ret >= 1){

            Header('Location: cadastro_login.php?sucess=error');
            exit();

        }else {
        
            $sql = "INSERT INTO tb_usuario(nome_user, sobre_nome, password_user, email_user, acesso) VALUES('{$nome}', '{$sobreNome}', '{$password}', '{$email}', 1)";

            $res = mysqli_query($conn, $sql);
            $ret = mysqli_affected_rows($conn);

            if($ret >= 1){

                Header('Location: ../../login_g.php?sucess=accept');
                exit();
            
            }else {

                Header('Location: ../../cadastro_login.php?errorU=errorU');
                exit();
            
            }
        }
    }

  }
  
?>
