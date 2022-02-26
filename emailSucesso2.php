<?php 

session_start();

?>
<!DOCTYPE html> 
<html lang='pt-br'>
    <head>
        <title>Email Sucesso</title>
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
        <!--Google Adsens-->
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4577421833675509"
        crossorigin="anonymous">
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
    </head>
    <body>
        <!--Cabeçalho principal -->
        <header class='cabecalho-principal'>
           <?php 
                require_once __DIR__.'/cabecalho.php';
                require_once __DIR__."/config/conx.php";

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

                    <?php 
                        $tipo = $_GET['tipo'];
                    ?>
 
                    <p>Obrigado por cadastrar seu email para receber vagas de emprego recentes de "<?php echo "$tipo"; ?>" a qual você escolheu.</p>
                    <p>Será enviado emails da vaga desejada toda semana, caso não queria mais receber emails, favor clicar em "Não quero mais receber vagas" na parte inferior de qualquer email enviado.
                        <div class="directionUser">
                            <?php

                                if(!isset($_SESSION['numLogin'])){
                                    echo "<a href='index.php'>Pagina Inicial</a>";
                                }else{
                                    echo "<a href='index.php?num=".$_SESSION['numLogin']."'>Pagina Inicial</a>";
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
                        
                        <div class="form-lateral">
                            <!--Fazer o back-end -->
                                <form action="pesquisa.php" method="get" name='form_pesquisar'>
                                    <div class="box_pesquisa">
                                        <input type="text" name="f_name" placeholder="Busque vagas pelo nome" required="required">
                                        <button><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30" height="30"><path fill-rule="evenodd" d="M14.53 15.59a8.25 8.25 0 111.06-1.06l5.69 5.69a.75.75 0 11-1.06 1.06l-5.69-5.69zM2.5 9.25a6.75 6.75 0 1111.74 4.547.746.746 0 00-.443.442A6.75 6.75 0 012.5 9.25z"></path></svg></button>
                                    </div>
                                </form>
                        
                        </div><!--Fim da pesquisa lateral -->
                    </aside>
                    <aside class="lateral">
                        <!--CONTEUDO LATERAL -->
                        <div class='conteudo-lateral'>
                        <!--Propaganda -->
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