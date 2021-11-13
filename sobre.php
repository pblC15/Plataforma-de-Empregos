<?php 
  ini_set('display_errors', 1);
  error_reporting(E_ALL);
  require_once __DIR__.'/config/config.php';

  if(isset($_SESSION["numLogin"])){

    if(isset($_GET["num"])){

        $n1=$_GET["num"];
        
    }else if(isset($_POST["num"])){
        
        $n1=$_POST["num"];
    }
    
    $n2=$_SESSION["numLogin"];
    
    if($n1!=$n2){
        header("Location: sobre.php");
        exit;
    }
}
   
?>

<!DOCTYPE html>
<html lang='pt-br'>
    <head>
        <title>Goolbee Empregos - SOBRE</title>
        <link rel='stylesheet' type='text/css' href='_css/cabecalho.css'>
        <link rel='stylesheet' type='text/css' href='_css/conteudo.css'>
        <link rel='stylesheet' type='text/css' href='_css/rodape.css'>
        <link rel='stylesheet' type='text/css' href='_css/contato.css'>
        <link rel='stylesheet' type='text/css' href='_css/sobre.css'>
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
                require_once  __DIR__.'/cabecalho.php';
           ?>
        </header>
        
        <section class='conteudo'>
            
            <div class='container'>
             
                <div class='anuncio-principal'>
                    <div class='banner-contato'>
                    <img src='_imgs/rascunho/baner-sobre.png'>
                    </div>
                    <div class='conteudo-sobre'> 
                        <h3>Quem somos:</h3>
                            <p>Somos uma equipe de desenvolvedores que iniciamos nossas atividades no ano de 2020 com o intuito de divulgar vagas para combater o desemprego diante dessa pamdemia. Nosa equipe e composta por programadores, investidores e apoiadores, caso tenha interesse em ser um colaborador entre em contato conosco na página de <a href='contato'>CONTATO</a>.</p>
                        <h3>Nosso Porpósito:</h3>
                            <p>Durante esse ano de 2020 a situação em que nos encontramos não está fácil para ninguém, com a chegada da pandemia no Brasil vimos o desemprego aumentar a cada dia que se passava fazendo com que a população perdesse seus empregos e dificultasse sua vida financeira. Com toda essa difuculdade nós decidimos criar um site que ajudasse as pessoas a conseguir uma oportunidade de entrar no mercado de trabalho para ter uma qualidade de vida melhor e gerar economia para o Brasil.</p>
                        <h3>Serviços: </h3>
                            <p>Nossas vagas são totalmente disponibilizadas pelos contratantes, nos da GoolbeeEmpregos apenas disponibilizamos a o site para a divulgação dessas vagas sem nemhum vinculo com conosco qualquer empregador pode anunciar sua vaga. No site você tem pode encontrar artigos de <a href='#'>COMO VOCÊ PODE FAZER SEU CURRÍCULO</a> da maneira certa para aumentar suas chances de conseguir ser escolhido para uma entrevista, artigos de <a href='#'>CURSOS</a> profissionalizante online de varias áreas e também um área onde você pode ver novas vagas e editais de concursos publicos na sessão de <a href='#'>CONCURSO</a>.</p>
                    </div>
                </div>
                <aside class='lateral'>
                    <!--Pesquisa lateral -->
                    <div class="form-lateral">
                    <h2>Buscar vagas</h2>
                    <!--Fazer o back-end -->
                    <?php 

                        if(!isset($_SESSION['numLogin'])){
                            
                            echo "<form action='pesquisa.php' method='get' name='form_pesquisar'>
                                    <div class='box_pesquisa'>
                                        <input type='text' name='f_name' placeholder='Busque vagas pelo nome' required='required'>
                                        <button><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='30' height='30'><path fill-rule='evenodd' d='M14.53 15.59a8.25 8.25 0 111.06-1.06l5.69 5.69a.75.75 0 11-1.06 1.06l-5.69-5.69zM2.5 9.25a6.75 6.75 0 1111.74 4.547.746.746 0 00-.443.442A6.75 6.75 0 012.5 9.25z'></path></svg></button>
                                    </div>
                                 </form>";
                        }else{

                            echo "<form action='pesquisa.php?num=".$_SESSION['numLogin']."' method='POST' name='form_pesquisar'>
                                    <div class='box_pesquisa'>
                                        <input type='text' name='f_name' placeholder='Busque vagas pelo nome' required='required'>
                                        <button><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='30' height='30'><path fill-rule='evenodd' d='M14.53 15.59a8.25 8.25 0 111.06-1.06l5.69 5.69a.75.75 0 11-1.06 1.06l-5.69-5.69zM2.5 9.25a6.75 6.75 0 1111.74 4.547.746.746 0 00-.443.442A6.75 6.75 0 012.5 9.25z'></path></svg></button>
                                    </div>
                                </form>";

                        }
                    ?>                    
                </div><!--Fim da pesquisa lateral -->
                </aside>
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
                                        
                                        echo "<p class='mensagemEmail'>Email cadastrado com Sucesso para receber vagas por email!</p>";
                                    
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