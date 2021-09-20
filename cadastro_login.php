<?php 
  require_once "Config/conx.php";
                            

  //Obter dados do formulario
  if(isset($_POST['f_submit'])){

    $nome = trim(filter_var($_POST['f_user'], FILTER_SANITIZE_STRING));
    $sobreNome = trim(filter_var($_POST['f_sobreNome'], FILTER_SANITIZE_STRING));
    $password = trim($_POST['f_passwrd'], FILTER_SANITIZE_SPECIAL_CHARS);
    $email = trim(filter_var($_POST['f_email_user']), FILTER_VALIDATE_EMAIL);

    if(!empty($email)){

        $sql = "SELECT * FROM tb_usuario WHERE email_user = {$email}";

        $res = mysqli_query($conn, $sql);
        $ret = mysqli_affected_rows($conn);
        // $ret = mysqli_fetch_array($res);

        if($ret > 0){

            Header('Location: cadastro_login.php?sucess=error');

        }else {
        
            $sql = "INSERT INTO tb_usuario(nome_user, sobre_nome, password_user, email_user, acesso) VALUES('{$nome}', '{$sobreNome}', '{$password}', '{$email}', 1)";

            $res = mysqli_query($conn, $sql);
            $ret = mysqli_affected_rows($conn);

            if($ret >= 1){

                Header('Location: login_g.php?sucess=accept');
            

            }else {
                echo "<p class='mensagemEmail'>Login não cadastrado!</p>";
            }
        }
    }

  }
  
?>

<!DOCTYPE html> 
<html lang='pt-br'>
<head>
    <title>Cadastro Login | Goolbee</title>
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
                
                <h2>Faça seu Cadastro</h2>
                    
                    <div class='formulario form-cadastro-login'>
                        <form action='cadastro_login.php' method='post'>

                            <label for='id_user'>Nome:</label>
                            <input type='text' name='f_user' id='id_user' required='required'>
                           
                            <label for='id_sobreNome'>Sobrenome:</label>
                            <input type='text' name='f_sobreNome' id='id_sobreNome' required='required'>

                            <label for='id_nomeE'>Senha:</label>
                            <input type='text' name='f_passwrd' id='id_nomE' required='required'>
                                
                            <label for='id_email_user'>Email:</label>
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
        title: 'Oops...',
        text: 'O email já existe, favor tente novamente!'
        });
        </script>
        ";
    }


?>
</body>
</html>