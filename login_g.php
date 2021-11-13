<?php 

require_once __DIR__.'/config/conx.php';

if(isset($_POST['f_submit'])){

    $email = $_POST['f_email_user'];
    $password = $_POST['f_senha'];

    $sql = "SELECT * FROM tb_usuario WHERE email_user = '$email' AND password_user = '$password'";

    $query = mysqli_query($conn, $sql);//Executa a query

    $res = mysqli_fetch_array($query);//Transforma as quary em um array

    if($res == 0){//Verifica se a query obteve resultado
        
        Header("Location: login_g.php?sucess=warning");
        exit();
        
    }else{

        $chave1 = "abcdefghijklmnopqrstuvxwz";
        $chave2 = "ABCDEFGHIJLKMNOPQSRTUVXYZ";
        $chave3 = "0123456789";
        $chave = str_shuffle($chave1.$chave2.$chave3);

        $tam = strlen($chave);
        $num = "";

        $qtde=rand(20, 50);

        for($i = 0; $i<$qtde; $i++){
            $pos = rand(0, $tam);
            $num.=substr($chave, $pos, 1);
        }
        
        session_start();
        $_SESSION['numLogin'] = $num;
        $_SESSION['email'] = $email;
        $_SESSION['username'] = $res['nome_user'];
        $_SESSION['acesso'] = $res['acesso'];
        header("Location: index.php?num=$num");
    }
}
mysqli_close($conn);
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
    <link rel='stylesheet' type='text/css' href='_css/fonticon.css'>
    <link rel='shortcut icon' type='image-x/png' href='_imgs/icone/icone-6.png'> 
    <meta charset='UTF-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">   
    <meta name='description' content='Goolbee Empregos'>
    <meta charset='keywords' content='busca de emrpegos, empregos'>
    <meta charset='author' content='Pablo Cassiano'>
    <script type='text/javascript' src='_js/jquery-3.5.1.min.js'></script>
    <script>
        $(document).ready(function(){
            
            $('.menu-mobile').on("click",function(){
                $('.menu-mobile .menuMobileBox').slideToggle(500);
            });
        });
    </script>
    <!--Google Adsens-->
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7468802787882377"
        crossorigin="anonymous"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-188173005-1">
    </script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-188173005-1');
    </script>
</head>
<body>
    <!--Cabeçalho principal -->
    <header class='cabecalho-principal'>
        <?php 
            require_once __DIR__.'/cabecalho.php';
        ?>
    </header>

    <section class='conteudo'>
        
        <div class='container'>
        
            <div class='anuncio-principal'>
                
                <h2>Faça seu Login</h2>
                    
                    <div class='formulario form-login'>
                        <form action='login_g.php' method='post'>

                            <label for='id_email_user'>Email:</label>
                            <input type='email' name='f_email_user'  id='id_email_user' required='required'>

                            <label for='id_senha'>Senha:</label>
                            <input type='password' name='f_senha' id='id_senha' required='required'>
                            
                            <div class="login_links">
                                <p><a href="cadastroLogin.php">Cadastrar-se</a></p>
                                <p><a href="resetLogin.php">Esqueceu a senha?</a></p>
                            </div>    
                            
                            <input type='submit' name='f_submit' value='Logar'> 
                        </form>
                    </div>
            </div><!--FIM DA DIV ANUNCIAR VAGAS-->
            
            <aside class='lateral'>
                <!--CONTEUDO LATERAL -->
                <div class='conteudo-lateral'>              
                    <?php
                        if(!isset($_SESSION['numLogin'])){
                            echo "<a href='apCurriculo.php'>
                                    <h2>Dicas</h2>
                                    <img src='_imgs/rascunho/curriculo.jpg'>
                                    </a>";
                        }else{

                            echo "<a href='apCurriculo.php?num=".$_SESSION['numLogin']."'>
                                    <h2>Dicas</h2>
                                    <img src='_imgs/rascunho/curriculo.jpg'>
                                    </a>";
                        }
                     ?>
                
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
                        <?php 
                            require_once __DIR__."/config/conx.php";
                            //Obter dados do formulario
                            if(isset($_POST['f_submit_email'])){

                                $nome = $_POST['f_nome_e'];
                                $email = $_POST['f_email_e'];
                                $tipo = $_POST['f_tipo_e'];

                                //Gravar no banco de dados
                                $sql_email = "INSERT INTO envio_email(nome_e, email_e, tipo_e) value('$nome', '$email', '$tipo')";
                                
                                $query1 = mysqli_query($conn, $sql_email);
                                
                                $result1 = mysqli_affected_rows($conn);

                                if($result1 >= 1){
                                    
                                    echo "<p class='mensagemEmail'>Email cadastrado com Sucesso!</p>";
                                
                                }else {

                                    echo "<p class='mensagemEmail'>Não foi possivel gravar email!</p>";
                                }
                            }
                            
                            
                        ?>
                    </div>
            </aside>

            <div class='clear'></div>
        </div>
    </section>

    <footer>

        <?php require_once __DIR__."/rodape.php";?>
    
    </footer>
    <?php

    if($_GET['sucess'] === 'accept'){
        echo "
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
         
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Usuário cadastrado com sucesso!',
            showConfirmButton: false,
            timer: 1500
        })
        </script>
        ";
    }

    if($_GET['sucess'] === 'warning'){
        echo "
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
         
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Email ou senha incorreto, tente novamente!',
            showConfirmButton: false,
            timer: 1500
        })
        </script>
        ";
    }

    if($_GET['sucess'] === 'acceptRet'){
        echo "
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Senha Refefinida com Sucesso!',
            showConfirmButton: false,
            timer: 1500
          })
        </script>
        ";
    }
    ?>

        
</body>
</html>