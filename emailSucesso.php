<?php 

session_start();

?>
<!DOCTYPE html> 
<html lang='pt-br'>
    <head>
        <title>Anunciar Vagas</title>
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
                    $('.menuMobileBox').slideDown(500);
                    $('.menuMobileBox').addClass("visible");

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
                require_once __DIR__.'/cabecalho.php';
                require_once __DIR__.'/config/conx.php';

                $nome =  ucwords(filter_input(INPUT_GET, "name", FILTER_SANITIZE_STRING));
                
                $sql = "SELECT * FROM tb_cadastro";
                $result = mysqli_query($conn, $sql);
                $exibe = mysqli_fetch_array($result);

           ?>
        </header>

        <section class='conteudo'>
            
            <div class='container'>
            
                <div class='anuncio-principal1 altura'>

                    <div class='img-sucesso'>
                        <img src="_imgs/icone/icone1.png">
                    </div>

                    <div class='mensagem-sucesso'>
 
                    <p>Obrigado <?php echo "{$nome}"; ?> por entrar em contato conosco, responderemos em até 48 Horas pelo E-mail preenchido no formulário.</p>
                    <p>O proposito do contato conosco é para informar algum erro na plataforma, dicas, informações diversas ou patrocinio.</p>
                    <div class="directionUser">
                            <?php

                            if(!isset($_SESSION['numLogin'])){
                                echo "<a href='index.php'>Pagina Inicial</a>";
                            }else{
                                echo "<a href='index.php?num=".$_SESSION['numLogin']."'>Pagina Inicial</a>";
                            }

                            if(isset($_SESSION['numLogin'])){                                   
                                echo "<a href='contato.php?num=".$_SESSION['numLogin']."'>Novo Contato</a>";
                            }
                            ?>
                        </div>
                    </div>

                    <div class='clear'></div>
                </div><!--FIM DA DIV ANUNCIAR VAGAS-->

                <!--CONTEUDO LATERAL -->
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
                <div class='clear'></div>
            </div>
        </section>
        <footer>
           
             <?php require_once __DIR__."/rodape.php";?>
           
        </footer>
    </body>
</html>