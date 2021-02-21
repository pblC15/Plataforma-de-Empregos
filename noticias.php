
<?php 
    require_once 'config/config.php';
    require_once 'config/conx.php';

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
        <title>Goolbee Empregos - HOME</title>
        <link rel='stylesheet' type='text/css' href='_css/cabecalho.css'>
        <link rel='stylesheet' type='text/css' href='_css/conteudo.css'>
        <link rel='stylesheet' type='text/css' href='_css/rodape.css'>
        <link rel='stylesheet' type='text/css' href='_css/contato.css'>
        <link rel='shortcut icon' type='image-x/png' href='_imgs/icone/icone-6.png'> 
        <meta charset='UTF-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name='description' content='Goolbee Empregos'>
        <meta charset='keywords' content='busca de emrpegos, empregos'>
        <meta charset='author' content='Pablo Cassiano'>
        <script type='text/javascript' src='_js/jquery-3.5.1.min.js'></script>
        <script>
            $(document).ready(function(){
                
                $('#idmenu-mobile').click(function(){
                    $('#idmenu-mobile ul').toggle();
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
    </head>
    <body>
        <!--Cabeçalho principal -->
        <header class='cabecalho-principal'>
           <?php 
                require_once'cabecalho.php';
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
                    
                    <?php 
                        require_once "config/conx.php";
                        require_once "_function/functionTexto.php";
                        //Obtendo a pagina vinda da URL
                        $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
                        //Se tiver vazia seta o 1
                        $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
                        //Quantidade de itens
                        $qtd_item = 5;

                        $inicio = ($qtd_item * $pagina) - $qtd_item;
                        
                        $sql = "SELECT * FROM tb_noticias ORDER BY data_p DESC LIMIT $inicio, $qtd_item";
                        
                        $result = mysqli_query($conn, $sql);

                        while($exibe = mysqli_fetch_array($result)){

                            echo "<div class='breve-vaga'>";

                                echo "
                                <div class='img-vaga'>

                                    <a href='anuncio-vaga.php?id=".$exibe['id']."'><img src=".$exibe['capa']."></a>

                                </div>
                                <div class='desc-vaga'>
                                    <h3 class='titulo_vaga'><a href='#'>".ucwords($exibe['titulo'])."</a></h3>
                                    <p><b>Data da postagem: </b>".date("d/m/Y", strtotime($exibe['data_p']))."</p>
                                    <p><b>Descrição:</b> ".reduzindoTexto($exibe['conteudo'])." ...</p>
                                    <p><a href='#'>Ver mais</a></p>
                                </div>
                                <div class='clear'></div>
                            </div><!--FIM DA DIV BREVE-VAGA -->";
                        }
                        echo "<div class='paginacao'>";
                        //Contando quantos resultados tem na tabela
                        $result_pg = "SELECT COUNT(id) AS num_result FROM tb_noticias";
                        //Executando a query
                        $query = mysqli_query($conn, $result_pg);
                        //Transformando em array
                        $result = mysqli_fetch_assoc($query);

                        //Arredonadando a quantidade de paginas
                        $qtd_pg = ceil($result['num_result'] / $qtd_item);

                        echo "<a class='pri_pg' href='noticias.php?pagina=1'>Primeira</a>";


                        for($i = 1; $i <= $qtd_pg; $i++){
                
                             if($i >= 1){

                                if(!isset($_SESSION['numLogin'])){
                                    
                                    echo "<a class='num_pg' href='noticias.php?pagina=$i'>$i</a>";
                                    
                                }else{
                
                                    echo "<a class='num_pg' href='noticias.php?num=".$_SESSION['numLogin']."&pagina=$i'>$i</a>";
                
                                }
                    
                            }
                        }
                        echo "<a class='ult_pg' href='noticias.php?pagina=$qtd_pg'>Último</a>";
                        echo "</div>";
                    ?>

                </div>
                 <div class="div_lateral">

                <!--CONTEUDO LATERAL -->
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
                                        <button><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24'><path fill-rule='evenodd' d='M14.53 15.59a8.25 8.25 0 111.06-1.06l5.69 5.69a.75.75 0 11-1.06 1.06l-5.69-5.69zM2.5 9.25a6.75 6.75 0 1111.74 4.547.746.746 0 00-.443.442A6.75 6.75 0 012.5 9.25z'></path></svg></button>
                                    </div>
                                 </form>";
                        }else{

                            echo "<form action='pesquisa.php?num=".$_SESSION['numLogin']."' method='POST' name='form_pesquisar'>
                                    <div class='box_pesquisa'>
                                        <input type='text' name='f_name' placeholder='Busque vagas pelo nome' required='required'>
                                        <button><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24'><path fill-rule='evenodd' d='M14.53 15.59a8.25 8.25 0 111.06-1.06l5.69 5.69a.75.75 0 11-1.06 1.06l-5.69-5.69zM2.5 9.25a6.75 6.75 0 1111.74 4.547.746.746 0 00-.443.442A6.75 6.75 0 012.5 9.25z'></path></svg></button>
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
                        <h2>Dicas</h2>
                            <img src='_imgs/rascunho/curriculo.jpg'>
                    
                    </div><!--FIM DA ASIDE CONTEUDO LATERAL -->

                </aside>
                <!--Formulário lateral -->
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
                                require_once "config/conx.php";
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
                        <h2>Dicas</h2>
                            <img src='_imgs/rascunho/curriculo.jpg'>
                    
                    </div><!--FIM DA ASIDE CONTEUDO LATERAL -->

                </aside>   
                
                </div>
                <div class='clear'></div>

            </div><!-- FIM DA DIV CONTRAINER-->
        </section>

        <footer>
            <?php require_once "rodape.php";?>
        </footer>
    </body>
</html>