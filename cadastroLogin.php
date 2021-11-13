<!DOCTYPE html> 
<html lang='pt-br'>
<head>
    <title>Cadastro Login | Goolbee</title>
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
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-188173005-1">
    </script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-188173005-1');
    </script>
    <!--Google Adsens-->
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7468802787882377"
        crossorigin="anonymous"></script>
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
                        <form action='source/functions/cadastroLoginExc.php' method='post'>

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
                        
                    </div>
            </aside>

            <div class='clear'></div>
        </div>
    </section>

    <footer>

        <?php require_once __DIR__."/rodape.php";?>
    
    </footer>
<?php

    if(isset($_GET['sucess']) == 'error'){
        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
        <script>
        swal('Error', 'O email já existe, favor tente novamente!', 'error');
        </script>";
    }

    if(isset($_GET['errorU']) == 'errorU'){
        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
        <script>
        swal('Error', 'Não foi possível resetar senha!', 'error');
        </script>";
    }


?>
</body>
</html>