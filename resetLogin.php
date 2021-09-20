<?php 
  require_once "Config/conx.php";
                            

  //Obter dados do formulario
  if(isset($_POST['f_submit'])){

    $newPasswr = trim(filter_var($_POST['f_passw'], FILTER_SANITIZE_SPECIAL_CHARS));
    $passward = trim(filter_var($_POST['f_passw_res'], FILTER_SANITIZE_SPECIAL_CHARS));
    $email = trim(filter_var($_POST['f_email_user'], FILTER_VALIDATE_EMAIL));

    if($newPasswr != $passward){

        Header("Location:resetLogin.php?sucess=error");
        echo"deu ruim";
        exit();

    }else{

        $sql = "SELECT * FROM tb_usuario WHERE email_user = '{$email}'";

        $exec = mysqli_query($conn, $sql);
        $reslt = mysqli_affected_rows($conn);

        if($reslt >= 1){

            $stmt = "UPDATE tb_usuario SET password_user = '{$newPasswr}'";

            $exec = mysqli_query($conn, $stmt);
            $reslt = mysqli_affected_rows($conn);

            if($reslt >= 1){

                Header("Location: login_g.php?sucess=acceptRet");
                exit();

            }

        }else{

            Header("Location: resetLogin.php?sucess=errorEmail");
            exit();

        }
    }

  }

?>

<!DOCTYPE html> 
<html lang='pt-br'>
<head>
    <title>Login | Goolbee</title>
    <link rel='stylesheet' type='text/css' href='_css/cabecalho.css'>
    <link rel='stylesheet' type='text/css' href='_css/conteudo.css'>
    <link rel='stylesheet' type='text/css' href='_css/formulario.css'>
    <link rel='stylesheet' type='text/css' href='_css/anunciar.css'>
    <link rel='stylesheet' type='text/css' href='_css/rodape.css'>
    <link rel='shortcut icon' type='image-x/png' href='_imgs/icone/icone-6.png'> 
    <meta charset='UTF-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">   
    <meta name='description' content='Goolbee Empregos'>
    <meta charset='keywords' content='busca de emrpegos, empregos'>
    <meta charset='author' content='Pablo Cassiano'>
    <script type='text/javascript' src='_js/jquery-3.5.1.min.js'></script>
    <script>
        $(document).ready(function(){
            
            $('#idmenu-mobile').click(function(){
                $('#idmenu-mobile ul').toggle();
            });
        });
    </script>
</head>
<body>
    <!--Cabeçalho principal -->
    <header class='cabecalho-principal'>
        <?php 
            require_once('cabecalho.php');
        ?>
    </header>

    <section class='conteudo'>
        
        <div class='container'>
        
            <div class='anuncio-principal'>
                
                <h2>Redefinir Senha: </h2>
                    
                    <div class='formulario form-cadastro-login'>
                        <form action='resetLogin.php' method='post'>

                            <label for='id_user'>Nova Senha:</label>
                            <input type='text' name='f_passw' id='id_user' required='required'>

                            <label for='id_nomeE'>Comfirmar Senha:</label>
                            <input type='text' name='f_passw_res' id='id_nomE' required='required'>
                                
                            <label for='id_email_user'>Informe seu Email:</label>
                            <input type='email' name='f_email_user'  id='id_email_user' required='required'>

                            <input type='submit' name='f_submit' value='Enviar'> 
                            <a class="btn-voltar" href="login_g.php"> Voltar Login</a>
                        </form>
                        <?php 
                          
                        ?>
                    </div>
            </div><!--FIM DA DIV ANUNCIAR VAGAS-->
            
            <aside class='lateral'>
                <!--CONTEUDO LATERAL -->
                <div class='conteudo-lateral'>
                    
                    <h2>Monetização e publicidade</h2>
                        <img src='_imgs/rascunho/curriculo.jpg'>
                
                </div><!--FIM DA ASIDE CONTEUDO LATERAL -->

            </aside>
            <aside class='lateral'>
                    <div class="form-lateral">
                        <h2>Receba as vagas de sua preferência</h2>
                        <!--Fzer o back end -->
                        <form action="envio-vagas.php" method="post">
                            <label for="id_nome">Nome:</label>
                                <input type="text" name="f_nome_e" id="id_nome" required="required">
                            <label for="id_email">Email: </label>
                                <input type="email" name="f_email_e" required="required">
                            <label>Tipo de vaga: </label>
                            <select  class='select-receber' name='f_tipo_e' required='required'>
                                <option value="" selected disabled></option>
                                <option value="Emprego">Empregos</option>
                                <option value="Estagio">Estágio</option>
                                <option value="Nivel_superior">Nivél Superior</option>
                                <option value="Diaria">Diaria</option>
                            </select>

                            <input type="submit" name="f_submit_email" value="Enviar">
                        </form>
                        
                    </div>
            </aside>

            <div class='clear'></div>
        </div>
    </section>

    <footer>

        <?php require_once "rodape.php";?>
    
    </footer>
<?php


    if($_GET['sucess'] === 'error'){
        echo "
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
        Swal.fire({
        icon: 'error',
        text: 'As senhas são diferentes, favor tentar novamente!'
        });
        </script>
        ";
    }

    if($_GET['sucess'] === 'errorEmail'){
        echo "
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
        Swal.fire({
        icon: 'error',
        text: 'O email informado não existe!'
        });
        </script>
        ";
    }


?>
</body>
</html>