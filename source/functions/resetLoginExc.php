<?php 
  require_once "../../config/conx.php";

  //Para mostrar os erros na hospedagem
  ini_set('display_errors', 1);
  error_reporting(E_ALL);               

  //Obter dados do formulario
if(isset($_POST['f_submit'])){

    $newPasswr = trim(filter_var($_POST['f_passw'], FILTER_SANITIZE_SPECIAL_CHARS));
    $passward = trim(filter_var($_POST['f_passw_res'], FILTER_SANITIZE_SPECIAL_CHARS));
    $email = trim(filter_var($_POST['f_email_user'], FILTER_VALIDATE_EMAIL)); 

    if($newPasswr != $passward){

        Header("Location: ../../resetLogin.php?errorS=errorS");
        exit();
        
    }else{

        $sql = "SELECT * FROM tb_usuario WHERE email_user = '{$email}'";
        $exec = mysqli_query($conn, $sql);
        $reslt = mysqli_affected_rows($conn);


        if($reslt >= 1){

            $stmt = "UPDATE tb_usuario SET password_user = '{$newPasswr}' WHERE email_user = '{$email}'";
            $exec = mysqli_query($conn, $stmt);
            $reslt = mysqli_affected_rows($conn);

            if($reslt >= 1){
                
                Header("Location: ../../login_g.php?sucess=acceptRet");
                exit();

            }else{

                Header("Location: ../../resetLogin.php?errorU=errorU");
                exit();

            }

        }else{

            Header("Location: ../../resetLogin.php?errorE=errorEmail");
            exit();

        }
    }
 }

?>