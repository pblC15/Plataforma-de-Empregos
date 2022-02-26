<?php 
    require_once __DIR__.'/config/conx.php';
	
    if(isset($_POST['f_submit'])){

        $titulo = $_POST['f_titulo'];
        $conteudo = $_POST['f_conteudo'];

        $dir = '_imgs/noticias';

        if(isset($_POST['f_capa']['name']))

            $arquivo = $_FILES['f_capa']['name'];

            $ex=strtolower(substr($_FILES['f_capa']['name'],-4));

            if($ex === '.jpeg' || $ex === '.jpg' || $ex === '.png' || $ex === '.gif'){
            
                $novo_nome=uniqid().$ex;
                $novo_arquivo = $dir.'/'.$novo_nome;

                move_uploaded_file($_FILES['f_capa']['tmp_name'],$dir.'/'.$novo_nome);

                $sql = "insert into tb_noticias(titulo, conteudo, capa) values('{$titulo}', '{$conteudo}', '{$novo_arquivo}')";

                mysqli_query($conn, $sql);

                $linhas = mysqli_affected_rows($conn);

                if($linhas >= 1){

                    Header("Location: noticias.php");
                
                }else{
                    echo "Dados não cadastrados, favor tentar novamente!";
                }
            }else{
                echo "<script>
                        alert('Extenção não valida!');
                      </script>";
            }
    }   
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
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4577421833675509"
        crossorigin="anonymous">
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
                    
                    <h2>Postar Notícia</h2>

                        <div class='formulario'>
                             
                            <form action='form-noticia.php' method='post' enctype='multipart/form-data'>

                                <label for='id_titulo'>Titulo*</label>
                                <input type='text' name='f_titulo' id='id_titulo' >
                                 
                                <label for='id_conteudo'>Contéudo*</label>
                                <textarea name='f_conteudo' id='id_conteudo' cols="15" rows="15" required='required'></textarea>
                                    
                                <label for='id_capa'>Foto de Capa*</label>
                                <input type='file' name='f_capa'  id='id_capa' required='required'>    

                                <input type='submit' name='f_submit' value='Enviar'> 
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

    </body>
</html>