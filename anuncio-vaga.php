<?php 

    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    require_once __DIR__.'/config/config.php';
    require_once __DIR__.'/config/conx.php';


    date_default_timezone_set('America/Sao_Paulo');

    $id = $_GET['id'];

    if(isset($_SESSION["numLogin"])){

        if(isset($_GET["num"])){

            $n1=$_GET["num"];
            
        }else if(isset($_POST["num"])){
            
            $n1=$_POST["num"];
        }
        
        $n2=$_SESSION["numLogin"];
        
        if($n1!=$n2){
            header("Location: anuncio-vaga.php?id=".$id);
            exit;
        }
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "SELECT * FROM tb_cadastro WHERE id={$id}";
                        
        $result = mysqli_query($conn, $sql);

        $exibe = mysqli_fetch_array($result);
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
        <meta charset='keywords' content='busca de emrpegos, empregos, plataforma de empregos, procure empregos'>
        <meta charset='author' content='Pablo Cassiano'>
        <meta name='description' content='<?php echo ucwords($exibe['nome_V']); ?>'>
        <meta name="robots" content="index, follow">
        <meta itemprop="name" content="Goolbee Empregos">
        <meta itemprop="descriptoin" content="<?php echo ucwords($exibe['nome_V']); ?>">
        <meta itemprop="image" content="http://goolbeempregos.online/_imgs/rascunho/vagas-emprego.jpg">
        <meta itemprop="url" content="http://goolbeempregos.online/">
        <!--FACEBOOK -->
        <meta property="og:url" content="http://goolbeempregos.online/"/>
        <meta property="og:image" content="http://goolbeempregos.online/_imgs/rascunho/vagas-emprego.jpg"/>
        <meta property="og:locale" content="pt_BR"/>
        <meta property="og:type" content="article" />
        <meta property="og:title" content='<?php echo ucwords($exibe['nome_V']); ?>'/>
        <meta property="og:description" content="Nós da GoolbeeEmpregos apenas divulgamos as vagas, não temos vínculo nenhum com o contratante, será de total responsabilidade do candidato a seguir no processo seletivo da vaga.&hellip;"/>
        <meta property="og:site_name" content="Goolbee Empregos"/>
        <meta property="article:published_time" content="<?php echo date("d/m/Y H:i");?>" />
        <meta property="og:image:width" content="550" />
        <meta property="og:image:height" content="300" />

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
        
        <!--CONTEUDO -->
        <section class='conteudo'>
            
            <div class='container'>
             
                <div class='anuncio-principal'>
                    
                    <?php 
                        $id = $_GET['id'];

                        $sql = "SELECT * FROM tb_cadastro WHERE id={$id}";
                        
                        $result = mysqli_query($conn, $sql);

                        if($exibe = mysqli_fetch_array($result)){

                            $exibeVaga = $exibe['nome_V'];

                            echo "<div class='descricao-vaga'>
                                
                                    <div class='titulo-vaga'>";

                                        if(!isset($_SESSION['numLogin'])){

                                            echo "<a href='index.php?pagina=1'>HOME</a>><a href='vagas.php?pagina=1'>".strtoupper(str_replace("_"," ",$exibe['tipo_V']))."</a>><a href='#'>".ucwords($exibe['nome_V'])."</a>
                                            <h3>Vagas para <span itemprop='name'>".ucwords($exibe['nome_V'])."</span></h3>";
                                            
                                        }else{

                                            
                                            echo "<a href='index.php?num=".$_SESSION['numLogin']."&pagina=1'>HOME</a>><a href='vagas.php?num=".$_SESSION['numLogin']."&pagina=1'>".strtoupper(str_replace("_"," ",$exibe['tipo_V']))."</a>><a href='#'>".ucwords($exibe['nome_V'])."</a>
                                            <h3>Vagas para ".ucwords($exibe['nome_V'])."</h3>";
                                        }
                                        

                                        echo "<div class='data-icone'>
                                        <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' width='13' height='13'><path fill-rule='evenodd' d='M1.643 3.143L.427 1.927A.25.25 0 000 2.104V5.75c0 .138.112.25.25.25h3.646a.25.25 0 00.177-.427L2.715 4.215a6.5 6.5 0 11-1.18 4.458.75.75 0 10-1.493.154 8.001 8.001 0 101.6-5.684zM7.75 4a.75.75 0 01.75.75v2.992l2.028.812a.75.75 0 01-.557 1.392l-2.5-1A.75.75 0 017 8.25v-3.5A.75.75 0 017.75 4z'></path></svg>
                                            <p>Data da publicação: ".date('d/m/Y', strtotime($exibe['data_C']))."</p>
                                        </div>
                                        
                                        <div class='tipo-icone'>
                                        <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' width='13' height='13'><path fill-rule='evenodd' d='M6.75 0A1.75 1.75 0 005 1.75V3H1.75A1.75 1.75 0 000 4.75v8.5C0 14.216.784 15 1.75 15h12.5A1.75 1.75 0 0016 13.25v-8.5A1.75 1.75 0 0014.25 3H11V1.75A1.75 1.75 0 009.25 0h-2.5zM9.5 3V1.75a.25.25 0 00-.25-.25h-2.5a.25.25 0 00-.25.25V3h3zM5 4.5H1.75a.25.25 0 00-.25.25V6a2 2 0 002 2h9a2 2 0 002-2V4.75a.25.25 0 00-.25-.25H5zm-1.5 5a3.484 3.484 0 01-2-.627v4.377c0 .138.112.25.25.25h12.5a.25.25 0 00.25-.25V8.873a3.484 3.484 0 01-2 .627h-9z'></path></svg>
                                            <p>Tipo de vaga: ".ucwords(str_replace("_"," ",$exibe['tipo_V']))."</p>
                                        </div>
                                        <div class='clear'></div>
                                    </div>

                                    <div class='detalhe-vaga'>
                                        <p><b>Empresa: </b><span class='dados'>".ucwords($exibe['nome_E'])."</span></p>
                                        <p><b>Quantidade de vagas: </b><span class='dados'> ".$exibe['qtd_V']."</span></p>
                                        <p><b>Localidade:</b> <span class='dados'>".ucwords($exibe['local_T'])."</span></p>
                                        <p><b>Carga Horária: </b> <span class='dados'>".$exibe['carga_H']."</span></p>
                                        <p><b>Sálario e Beneficios:</b><span class='dados'>".$exibe['salario_B']."</span></p>
                                        <p><b>Tipo de Vaga: </b><span class='dados'>".str_replace("_"," ",$exibe['tipo_V'])."</span></p>
                                        <p class='requisitos'><b>Requisitos: </b><span class='dados'> ".$exibe['requisitos']."<span></p>
                                        <p class='desc'><b>Descrição:</b> <span class='dados'>".$exibe['descricao']."</span></p>
                                        
                                        <div class='candidatar'>
                                            <h3>Para se candidatar: </h3>

                                            <p>Para se candidatar a vaga você precisa está dentro dos requisitos exigidos informado a cima, e mandar email para <span>".$exibe['email']."</span> com assunto ''".$exibe['nome_V']."''.É imprescindével colocar no email ''Essa vaga foi divulgada pela GoolbeeEmpregos com o intuito de me ajudar a entrar no mercado de Trabalho''.</p>


                                            <h4>A vaga se encerra em : ".$exibe['periodo_V']."</h4>

                                            <p>Nós da <b>GoolbeeEmpregos</b> apenas divulgamos as vagas, não temos vinculo nenhum com o contratante, será de total responsabilidade do candidato a seguir no processo seletivo da vaga.</p>
                                        </div>

                                    </div>

                                <div class='clear'></div>
                            </div><!--FIM DA DIV BREVE-VAGA -->";
                        }

                    ?>
                    
                </div>
                <div class='div_lateral'>
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