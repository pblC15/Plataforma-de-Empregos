<?php 
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    require_once __DIR__.'/config/config.php';
    require_once  __DIR__.'/config/conx.php';
 
     if(isset($_SESSION["numLogin"])){
 
        if(isset($_GET["num"])){

            $n1=$_GET["num"];
            
        }else if(isset($_POST["num"])){
            
            $n1=$_POST["num"];
        }
        
        $n2=$_SESSION["numLogin"];
        
        if($n1!=$n2){
        header("Location: noticia-em-destaque.php");
        exit;
        }
     }
?>
<!DOCTYPE html>
<html lang='pt-br'>
    <head>
        <title>Goolbee Empregos - HOME</title>
        <link rel='stylesheet' type='text/css' href='_css/cabecalho.css'>
        <link rel='stylesheet' type='text/css' href='_css/conteudo.css'>
        <link rel='stylesheet' type='text/css' href='_css/rodape.css'>
        <link rel='stylesheet' type='text/css' href='_css/contato.css'>
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
                require_once __DIR__.'/cabecalho.php';
           ?>
        </header>
        
        <!--CONTEUDO -->
        <section class='conteudo'>
            
            <div class='container'>
             
                <div class='anuncio-principal'>
                    
                    <?php 
                        $id = $_GET['id'];

                        $sql = "SELECT * FROM tb_noticias WHERE id={$id}";
                        
                        $result = mysqli_query($conn, $sql);

                        if($exibe = mysqli_fetch_array($result)){

                            echo "<div class='descricao-vaga'>
                                
                                    <div class='titulo-vaga'>";

                                        echo "<h1>Noticías</h1>";
                                        

                                        echo "<div class='clear'></div>
                                        
                                    </div>

                                    <div class='detalhe-noticias'>
                                        <div class='conteudo-noticia-img'>
                                            <h3>".$exibe['titulo']."</h3>
                                            <div class='data-icone1'>
                                            <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' width='13' height='13'><path fill-rule='evenodd' d='M1.643 3.143L.427 1.927A.25.25 0 000 2.104V5.75c0 .138.112.25.25.25h3.646a.25.25 0 00.177-.427L2.715 4.215a6.5 6.5 0 11-1.18 4.458.75.75 0 10-1.493.154 8.001 8.001 0 101.6-5.684zM7.75 4a.75.75 0 01.75.75v2.992l2.028.812a.75.75 0 01-.557 1.392l-2.5-1A.75.75 0 017 8.25v-3.5A.75.75 0 017.75 4z'></path></svg>
                                                <p>Data da publicação: ".date('d/m/Y', strtotime($exibe['data_p']))."</p>
                                            </div>
                                            <img src='".$exibe['capa']."'>                                            
                                        </div>
                                        <div class='desc-noticia'>
                                            
                                            <p>".$exibe['conteudo']."</p>
                                        </div>

                                    </div>

                                <div class='clear'></div>
                            </div><!--FIM DA DIV BREVE-VAGA -->";
                        }
                    ?>                 
                </div>    
                <!-- CONTEUDO LATERAL -->
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
                            <form action="contato.php" method="post">
                                <label for="id_nome">Nome:</label>
                                    <input type="text" name="f_nome_e" id="id_nome" required="required">
                                <label for="id_email">Email: </label>
                                    <input type="email" name="f_email_e" required="required">
                                <label>Tipo de vaga: </label>
                                <select  class='select-receberM' name='f_tipo_e' required='required'>
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
                                        
                                        echo "<p class='mensagemEmail'>Email cadastrado com Sucesso para receber vagas por email!</p>";
                                    
                                    }else {

                                        echo "<p class='mensagemEmail'>Não foi possivel gravar email!</p>";
                                    }
                                }
                            ?>
                        </div>
                </aside>
        
                <div class='clear'></div>

            </div><!-- FIM DA DIV CONTRAINER-->
        </section>

        <footer>
            
            <?php require_once __DIR__."/rodape.php";?>
         
        </footer>
    </body>

    <script>
        $(function(){
            var atributo = $(".tipo-vaga").attr("href");
            console.log(atributo);

        });
    </script>
</html>