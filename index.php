<?php 
//Para mostrar os erros na hospedagem
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
        header("Location: index.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang='pt-br' itemscope itemtype="https://schema.org/">
<head>
    <title>Goolbee Empregos - HOME</title>
    <link rel='stylesheet' type='text/css' href='_css/cabecalho.css'>
    <link rel='stylesheet' type='text/css' href='_css/conteudo.css'>
    <link rel='stylesheet' type='text/css' href='_css/rodape.css'>
    <link rel='stylesheet' type='text/css' href='_css/contato.css'>
    <link rel='stylesheet' type='text/css' href='_css/fonticon.css'>
    <link rel='shortcut icon' type='image-x/png' href='_imgs/icone/icone-6.png'> 
    <link rel="canonical" href="http://goolbeempregos.online/"> 
    <meta charset='UTF-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name='description' content='Goolbee Empregos plataforma de divulgação, anucios de empregos, procurando vagas'>
    <meta charset='keywords' content='busca de emrpegos, empregos'>
    <meta charset='author' content='Pablo Cassiano'>
    <meta name="robots" content="index, follow">
    <meta itemprop="name" content="Goolbee Empregos">
    <meta itemprop="descriptoin" content="Goolbee Empregos plataforma de divulgação, anucios de empregos, procurando vagas">
    <meta itemprop="image" content="http://goolbeempregos.online/_imgs/rascunho/vagas-emprego.jpg">
    <meta itemprop="url" content="http://goolbeempregos.online/">
    <meta property="og:url" content="http://goolbeempregos.online/"/>
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Goolbee Empregos plataforma de divulgação, anucios de empregos, procurando vagas"/>
    <meta property="og:description" content="Goolbee Empregos plataforma de divulgação, anucios de empregos, procurando vagas"/>
    <meta property="og:image" content="http://goolbeempregos.online/_imgs/rascunho/vagas-emprego.jpg"/>
    <meta property="og:locale" content="pt_BR"/>
    
    <script type='text/javascript' src='_js/jquery-3.5.1.min.js'></script>
    <script>
        //RESOLVER O MOBILE
        $(document).ready(function(){
            
            $('.menu-mobile').on("click",function(){

                $('.menuMobileBox').slideToggle(500);
                $('.iconMobile').addClass("visible");

            });

            var slides=["#s1","#s2","#s3"];
            slideatual=0;
            slidemax=2;
            tempo=8000;

            $(slides[slideatual]).fadeTo(1000,1);
            setInterval(troca,tempo);	
            
            function troca(){
                $(slides[slideatual]).fadeTo(1000,0, function(){
                    $(slides[slideatual]).hide();
                    slideatual++;

                    if(slideatual > slidemax){
                        slideatual=0;
                    }
                    $(slides[slideatual]).fadeTo(1000,1);
                });
            }          
        });
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
    
    <!--CONTEUDO -->
    <section class='conteudo'>
        
        <div class='container'>
            
            <div class='anuncio-principal'>
                <!--BANER -->
                <div class='banner-contato-1'>
                    <img id="s1" src="_imgs/rascunho/baner-principal.png">
                    <img id="s2" src="_imgs/rascunho/baner-2.jpg">
                    <img id="s3" src="_imgs/rascunho/baner-3.jpg">
                </div>

                <h2>Vagas Recentes</h2>
                <div class="wrap-title"></div>
                
                <?php 
                //INICIO PAGINAÇÃO E EXIBIÇÃO DOS ANUNCIOS

                require_once __DIR__."/config/conx.php";
                require_once __DIR__."/_function/functionTexto.php";

                define('RANGE_PAGINAS', 1);

                //Obtendo a pagina vinda da URL
                $pagina_atual = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT);
                //Se tiver vazia seta o 1
                $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
                //Quantidade de itens
                $qtd_item = 7;

                $inicio = ($pagina -1) * $qtd_item;
                
                $sql = "SELECT * FROM tb_cadastro ORDER BY data_C DESC LIMIT {$inicio}, {$qtd_item}";
                
                $result = mysqli_query($conn, $sql);

                while($exibe = mysqli_fetch_array($result)){

                echo "<div class='breve-vaga'>";

                    if($exibe['tipo_V'] == 'Emprego'){

                        if(!isset($_SESSION['numLogin'])){
                                                            
                        echo "<div class='img-vaga'>
                                <a href='anuncio-vaga.php?id=".$exibe['id']."'><img src='_imgs/rascunho/vagas-emprego.jpg'></a>
                                </div>";

                        }else{

                            echo "<div class='img-vaga'>
                                    <a href='anuncio-vaga.php?num=".$_SESSION['numLogin']."&id=".$exibe['id']."'><img src='_imgs/rascunho/vagas-emprego.jpg'></a>
                                    </div>";

                        }
                    
                    }elseif($exibe['tipo_V'] == 'Estagio'){

                        if(!isset($_SESSION['numLogin'])){

                            echo "
                                <div class='img-vaga'>
                                    <a href='anuncio-vaga.php?id=".$exibe['id']."'><img src='_imgs/rascunho/vagas-estagio01.jpg'></a>
                                </div>";

                        }else{

                            echo "
                                <div class='img-vaga'>
                                    <a href='anuncio-vaga.php?num=".$_SESSION['numLogin']."&id=".$exibe['id']."'><img src='_imgs/rascunho/vagas-estagio01.jpg'></a>
                                </div>";
                        }
                        
                    }elseif($exibe['tipo_V'] == 'Nivel_superior'){

                        if(!isset($_SESSION['numLogin'])){                                   
                            echo "
                            <div class='img-vaga'>
                                <a href='anuncio-vaga.php?id=".$exibe['id']."'><img src='_imgs/rascunho/superior.jpg'></a>
                            </div>";
                        }else{
                            echo "
                            <div class='img-vaga'>
                                <a href='anuncio-vaga.php?num=".$_SESSION['numLogin']."&id=".$exibe['id']."'><img src='_imgs/rascunho/superior.jpg'></a>
                            </div>";
                        }
                        
                    }
                    elseif($exibe['tipo_V'] == 'Diaria'){

                        if(!isset($_SESSION['numLogin'])){

                            echo "
                                <div class='img-vaga'>
                                    <a href='anuncio-vaga.php?id=".$exibe['id']."'><img src='_imgs/rascunho/vagas-emprego.jpg'></a>
                                </div>";

                        }else{
                            echo "
                                <div class='img-vaga'>
                                    <a href='anuncio-vaga.php?num=".$_SESSION['numLogin']."&id=".$exibe['id']."'><img src='_imgs/rascunho/vagas-emprego.jpg'></a>
                                </div>";
                        }                                   
                    }
                    
                    if(!isset($_SESSION['numLogin'])){

                    echo "
                        <div class='desc-vaga'>

                            <h3 class='titulo_vaga'><a href='anuncio-vaga.php?id=".$exibe['id']."'>".ucwords($exibe['nome_V'])."</a></h3>
                            <p><b>Localidade:</b> ".ucwords($exibe['local_T'])."</p>
                            <p><b>Beneficios:</b>".ucwords($exibe['salario_B'])."</p>
                            <p><b>Data da postagem: </b>".date("d/m/Y", strtotime($exibe['data_C']))."</p>
                            <p><a href='anuncio-vaga.php?id=".$exibe['id']."'>Ver mais</a></p>

                        </div>";

                    }else{

                    echo "
                        <div class='desc-vaga'>

                            <h3 class='titulo_vaga'><a href='anuncio-vaga.php?num=".$_SESSION['numLogin']."&id=".$exibe['id']."'>".ucfirst($exibe['nome_V'])."</a></h3>
                            <p><b>Localidade:</b> ".ucwords($exibe['local_T'])."</p>
                            <p><b>Beneficios:</b>".ucwords($exibe['salario_B'])."</p>
                            <p><b>Data da postagem: </b>".date("d/m/Y", strtotime($exibe['data_C']))."</p>
                            <p><a href='anuncio-vaga.php?num=".$_SESSION['numLogin']."&id=".$exibe['id']."'>Ver mais</a></p>

                        </div>";
                    }
                    echo "<div class='clear'></div>
                    </div>";//FIM DA DIV BREVE-VAGA
                    }
                    echo "<div class='paginacao'>";
                    //Contando quantos resultados tem na tabela
                    $result_pg = "SELECT COUNT(id) AS num_result FROM tb_cadastro";
                    
                    //Executando a query
                    $query = mysqli_query($conn, $result_pg);

                    //Transformando em array
                    $result = mysqli_fetch_assoc($query);

                    /* Idêntifica a primeira página */  
                    $primeira_pagina = 1; 

                    //Arredonadando a quantidade de paginas
                    $qtd_pg = ceil($result['num_result'] / $qtd_item);


                    /*Cálcula qual será a página anterior em relação a página atual em exibição*/
                    $pag_ant = ($pagina > 1) ? $pagina -1 : 0;

                    /*Cálcula qual será a pŕoxima página em relação a página atual em exibição*/
                    $pag_prox = ($pagina < $qtd_pg) ? $pagina +1 : 0;

                    /* Cálcula qual será a página inicial do nosso range */    
                    $range_inicial = (($pagina - RANGE_PAGINAS) >= 1) ? $pagina - RANGE_PAGINAS : 1 ;   
                    
                    /* Cálcula qual será a página final do nosso range */    
                    $range_final = (($pagina + RANGE_PAGINAS) <= $qtd_pg ) ? $pagina + RANGE_PAGINAS : $qtd_pg;  

                     /* Verifica se vai exibir o botão "Primeiro" e "Pŕoximo" */   
                    $exibir_botao_inicio = ($range_inicial < $pagina) ? 'mostrar' : 'esconder'; 
   
                    /* Verifica se vai exibir o botão "Anterior" e "Último" */   
                    $exibir_botao_final = ($range_final > $pagina) ? 'mostrar' : 'esconder';  

                    if(!isset($_SESSION['numLogin'])){
                     
                        echo " <a class='$exibir_botao_inicio' href='index.php?page=$primeira_pagina' title='Primeira Página'>Primeira</a>    
                        <a class='$exibir_botao_inicio' href='index.php?page=$pag_ant' title='Página Anterior'>Anterior</a>";
                    }else{
                       
                        echo "<a class='$exibir_botao_inicio' href='index.php?num=".$_SESSION['numLogin']."&page=$primeira_pagina' title='Primeira Página'>Primeira</a>    
                        <a class='$exibir_botao_inicio' href='index.php?num=".$_SESSION['numLogin']."&page=$pag_ant' title='Página Anterior'>Anterior</a>";
                    }


                    //Realizar Looping
                    /* Loop para montar a páginação central com os números */   
                    for ($i=$range_inicial; $i <= $range_final; $i++){

                        $destaque = ($i == $pagina) ? 'destaque' : ' ' ;  
                        
                        if(!isset($_SESSION['numLogin'])){
                       
                            echo "<a class='num_pg $destaque' href='index.php?page=$i'>$i</a>";
                        
                        }else{
    
                            echo "<a class='num_pg $destaque' href='index.php?num=".$_SESSION['numLogin']."&page=$i'>$i</a>";
                        }
 
                    }

                    if(!isset($_SESSION['numLogin'])){
                       
                        echo " <a class='$exibir_botao_final' href='index.php?page=$pag_prox' title='Próxima Página'>Próxima</a>    
                        <a class='$exibir_botao_final' href='index.php?page=$qtd_pg' title='Última Página'>Último</a>";
                    
                    }else{

                        echo " <a class='$exibir_botao_final' href='index.php?num=".$_SESSION['numLogin']."&page=$pag_prox' title='Próxima Página'>Próxima</a>    
                        <a class='$exibir_botao_final' href='index.php?num=".$_SESSION['numLogin']."&page=$qtd_pg' title='Última Página'>Último</a>";
                 
                    }

                    
                    echo "</div>";
                
                ?>

            </div>
            <div class="div_lateral">

            <!--CONTEUDO LATERAL -->
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
            <aside class='lateral'>
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
            </aside>
            <!--Formulário lateral -->
            <aside class='lateral'>
                    <div class="form-lateral">
                        <h2>Receba vagas de sua preferência</h2>
                        <!--Fzer o back end -->
                        <form action="_function/envio-vagas.php" method="post">
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
                <aside class='lateral'>
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
                </aside>   
            </div>
            <div class='clear'></div>
        </div><!-- FIM DA DIV CONTRAINER-->
    </section>

    <footer>
        <?php require_once __DIR__."/rodape.php";?>
    </footer>
</body>
</html>