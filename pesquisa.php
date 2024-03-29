
<?php 
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    require_once __DIR__.'/config/config.php';
    require_once __DIR__.'/config/conx.php';

    if(isset($_SESSION["numLogin"])){

        if(isset($_GET["num"])){
   
            $n1=$_GET["num"];
            
        }else if(isset($_POST["num"])){
            
            $n1=$_POST["num"];
        }
        
        $n2=$_SESSION["numLogin"];
        
        if($n1!=$n2){
            echo "<p>Login não efetuado</p>";
            exit;
        }
    }

?>


<!DOCTYPE html>
<html lang='pt-br'>
    <head>
        <title>Pesquisa</title>
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
           ?>
        </header>
        
        <!--CONTEUDO -->
        <section class='conteudo'>
            
            <div class='container'>
             
                <div class='anuncio-principal'>
                
                <?php 

                require_once __DIR__."/_function/functionTexto.php";
                require_once __DIR__."/config/conx.php";

                    if(isset($_POST['f_name'])){

                        echo "<h2>Vagas de ".ucwords($_POST['f_name'])."</h2>";

                        $nome_pesq = $_POST['f_name'];

                    }else if($_GET['f_name']){
                        
                        echo "<h2>Vagas de ".ucwords($_GET['f_name'])."</h2>";
                        $nome_pesq = $_GET['f_name'];
                    }
                


                    //Obtendo a pagina vinda da URL
                    $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
                    //Se tiver vazia seta o 1
                    $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
                    //Quantidade de itens
                    $qtd_item = 5;
                    
                    $inicio = ($qtd_item * $pagina) - $qtd_item;
                    
                    //Sql para seleciona tudo da tabela tb-cadastro onde nome da vaga tenha a variavel ordernar por data 
                    $sql = "SELECT * FROM tb_cadastro WHERE nome_V LIKE '%$nome_pesq%' ORDER BY data_C DESC LIMIT $inicio, $qtd_item";

                    $result = mysqli_query($conn, $sql);
                    
                    $resultado = mysqli_affected_rows($conn);

                    if(empty($resultado)){

                        echo "<p class='alerta-mensagem'>Não existe vagas com nome '".ucwords($nome_pesq)."'</p>";
                    
                    }

                    while($exibe = mysqli_fetch_array($result)){

                        
                        if(!isset($_SESSION['numLogin'])){

                            echo "<div class='breve-vaga'>
                            
                            <div class='img-vaga'>
                            <a href='anuncio-vaga.php?id=".$exibe['id']."'><img src='_imgs/rascunho/vagas-emprego.jpg'></a>
                            </div>

                            <div class='desc-vaga'>
                                <h3><a href='#'>".$exibe['nome_V']."</a></h3>
                                <p><b>Localidade:</b> ".$exibe['nome_E']."</p>
                                <p><b>Beneficios:</b>".$exibe['salario_B']."</p>
                                <p><b>Descrição:</b> ".reduzindoTexto($exibe['descricao'])."...</p>
                                <p><a href='anuncio-vaga.php?id=".$exibe['id']."'>Ver mais...</a></p>
                            </div>
                            <div class='clear'></div>
                            </div><!--FIM DA DIV BREVE-VAGA -->";

                        }else{

                            echo "<div class='breve-vaga'>
                            
                            <div class='img-vaga'>
                            <a href='anuncio-vaga.php?num=".$_SESSION['numLogin']."&id=".$exibe['id']."'><img src='_imgs/rascunho/vagas-emprego.jpg'></a>
                            </div>

                            <div class='desc-vaga'>
                                <h3><a href='anuncio-vaga.php?num=".$_SESSION['numLogin']."&id=".$exibe['id']."'>".$exibe['nome_V']."</a></h3>
                                <p><b>Localidade:</b> ".$exibe['nome_E']."</p>
                                <p><b>Beneficios:</b>".$exibe['salario_B']."</p>
                                <p><b>Descrição:</b> ".reduzindoTexto($exibe['descricao'])."...</p>
                                <p><a href='anuncio-vaga.php?num=".$_SESSION['numLogin']."&id=".$exibe['id']."'>Ver mais...</a></p>
                            </div>
                            <div class='clear'></div>
                            </div><!--FIM DA DIV BREVE-VAGA -->";

                        }
                        

                    
                    }   
                    echo "<div class='paginacao'>";
                    //Contando quantos resultados tem na tabela
                    $result_pg = "SELECT COUNT(id) AS num_result FROM tb_cadastro WHERE tipo_V = 'Emprego'";
                    //Executando a query
                    $query = mysqli_query($conn, $result_pg);
                    //Transformando em array
                    $result = mysqli_fetch_assoc($query);

                    //Arredonadando a quantidade de paginas
                    $qtd_pg = ceil($result['num_result'] / $qtd_item);

                    if(!isset($_SESSION['numLogin'])){
                        echo "<a class='pri_pg' href='pesquisa.php?pagina=1'>Primeira</a>";
                    }else{
                        echo "<a class='pri_pg' href='pesquisa.php?num=".$_SESSION['numLogin']."&pagina=1'>Primeira</a>";
                    }
                    
                    for($i = 1; $i <= $qtd_item; $i++){
            
                        if($qtd_pg > 1){

                            if(!isset($_SESSION['numLogin'])){

                                echo "<a class='num_pg' href='pesquisa.php?pagina=$i'>$i</a>";

                            }else{

                                echo "<a class='num_pg' href='pesquisa.php?num=".$_SESSION['numLogin']."&pagina=$i'>$i</a>";

                            }
            
                        }
                    }
                    if(!isset($_SESSION['numLogin'])){
                        echo "<a class='ult_pg' href='pesquisa.php?pagina=$qtd_pg'>Último</a>";
                    }else{
                        echo "<a class='ult_pg' href='pesquisa.php?num=".$_SESSION['numLogin']."&pagina=$qtd_pg'>Último</a>";
                    }
                    
                    echo "</div>";

                ?>
                    
                </div>
                <div class='div_lateral'>
                    <aside class='lateral'>

                    <!--Pesquisa lateral -->
                    <div class="form-lateral">
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
                </div>
            </div>

            </div><!-- FIM DA DIV CONTRAINER-->
        </section>

        <footer>
            
          <?php require_once __DIR__."/rodape.php"?>
           
        </footer>
    </body>
</html>