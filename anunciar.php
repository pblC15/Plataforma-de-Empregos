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
    }else{
        echo "<p>Esse Login não foi efetuado</p>";
      
        exit;
    }

    if(isset($_POST['f_submit'])){

        $nomeV = ucwords(strtolower($_POST['f_nomeV']));
        $empresa = empty($_POST['f_nomeE']) ? "Não Informado" : ucfirst(strtolower($_POST['f_nomeE']));
        $quantidade = $_POST['qtdV'];
        $local = ucfirst(strtolower($_POST['f_local']));
        $carga = empty($_POST['f_carga']) ? "Não Informado" : $_POST['f_carga'] ;
        $salarioB = empty($_POST['f_salarioB']) ? "Não Informado": $_POST['f_salarioB'];
        $tipoV = $_POST['f_tipoV'];
        $requisitos = empty($_POST['f_req']) ? "Não Informado" :  ucfirst(strtolower($_POST['f_req']));
        $descricao = ucfirst(strtolower($_POST['f_desc']));
        $periodo = $_POST['f_periodo'];
        $email = trim($_POST['f_email']);


        $sql = "INSERT INTO tb_cadastro(nome_V, nome_E, qtd_V, local_T, carga_H, salario_B, tipo_V, requisitos, descricao, periodo_V, email) VALUES('$nomeV', '$empresa', $quantidade, '$local', '$carga', '$salarioB', '$tipoV', '$requisitos', '$descricao', '$periodo', '$email')";

        $res = mysqli_query($conn, $sql);
        
        $ret = mysqli_affected_rows($conn);
        

        if($ret >= 1){
            
            Header('Location: anuncioSucesso.php?num='.$_SESSION['numLogin']);

        }else {
            echo "<p class='mensagemEmail'>Erro ao salvar os dados!</p>";
            
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
                
                $('.iconMobile').on("click",function(){

                    $('.menuMobileBox').slideDown(500);

                });

                $(".abreCat").click(function(){
                        $(".subMenuMobile").slideToggle(500, function(){
                            $(".menuMobileBox li:nth-of-type(5)").css("padding-bottom","0px");

                                var icone = $(".abreCat").parent().get();
                                $(icone).attr("class", "icon-menu4"); 
                                if(!$(".subMenuMobile").is(":visible")){
                            
                            var icone = $(".abreCat").parent().get();
                            $(icone).attr("class", "icon-menu3"); 
                            console.log($(this));
                        }
                        
                        });
                        
                        
                });
                $(".menuMobileBox li:nth-of-type(5)").css("padding","30px 20px");
            });
        </script>
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
                    
                    <h2>Anunciar Vaga</h2>

                        <div class='text-alert'>
                            <p>Anuncie sua vaga de emprego no maior portal de emprego do Brasil. Aqui você poderá anunciar sua vaga preenchendo o formulário a baixo com as informações da vaga como, nome da vaga, tipo, carga horária, email, período etc.</p>
                            <p>Nós da <i>GoolbeeEmpregos</i> deixamos claro que não temos nenhum vínculo contratual com o empregador e não nos responsabilizamos pelo candidato. Nosso proposito é apenas a divulgação da vaga, disponibilizando-a para o máximo possível de pessoas.</p>
                            <p><b>Campos em * são obrigatórios</p>
                        </div><!--FIM DA DIV TEXT-ALERT -->  
                        
                        <div class='formulario'>
                            <form action='anunciar.php?num=<?php echo $_SESSION['numLogin'] ?>' method='post'>
                                
                                <label for='id_nomeV'>Nome Vaga*</label><input type='text' name='f_nomeV' id='id_nomV' placeholder='Ex: Auxiliar de Cozinha, Repositor' required='required'>

                                <label for='id_nomeE'>Empresa</label><input type='text' name='f_nomeE' id='id_nomE' placeholder='Ex: Goolbee Empregos'>
                                
                                <label>Quantidade de Vagas*</label><input type='number' name='qtdV' min='1' max='999' required='required'>
                                
                                <label for='id_local'>Local de Trabalho*</label><input type='text' name='f_local' id='id_local' placeholder='Cidade' required='required'>
                                
                                <label for='id_carga'>Carga Horária</label><input type='text' name='f_carga' id='id_carga' placeholder='Ex: 12x36 / 8:00 as 18:00 Segunda a Sexta'>
                                
                                <label for='id_salarioB'>Salário e Benefícios</label><input type='text' name='f_salarioB' id='id_salarioB' placeholder='Ex: 1200 VT + VA'>
                                
                                <label for='id_tipoV'>Tipo de Vaga*:</label>
                                <select name='f_tipoV' id='id_tipoV' required='required'>
                                    <option value='' selected disabled></option>
                                    <option value='Emprego'>Emprego CLT</option>
                                    <option value='Estagio'>Estágio</option>
                                    <option value='Nivel_superior'>Nível Superior</option>
                                    <option value='Diaria'>Diaria</option>
                                </select>

                                <label for='id_req'>Requisitos da Vaga:</label>
                                    <textarea name='f_req' id='id_req' rows='6' cols='55'></textarea>
                                
                                <label for='id_desc'>Descrição da Vaga*:</label>
                                    <textarea name='f_desc' id='id_desc' rows='6' cols='55' required='required'></textarea>
                                 

                                <label for='id_periodo'>Periodo da vaga*</label><input type='text' value="05/08/2020" name='f_periodo' id='id_periodo' placeholder='Ex: 19/02/2020' min="10" max="10" required='required'>
                                    
                                <label for='id_email'>Email*</label><input type='email' name='f_email'  id='id_email' placeholder='Ex: goolbee@gmail.com' required='required'>    
                                
                                <div class='checkmensag'> 
                                
                                    <input type='checkbox' id='id_checkbox' required='required'><label for='id_checkbox'>Eu concordo que não tenho vinculo e autorizo a divulgação dos dados da vaga no Site <strong>GoolbeeEmpregos</strong></label>
                                    <div class='clear'></div>
                                
                                </div>

                                <input type='submit' name='f_submit' value='Enviar'> 
                            </form>
                        </div>
                </div><!--FIM DA DIV ANUNCIAR VAGAS-->
                
                <aside class='lateral'>
                    <!--CONTEUDO LATERAL -->
                    <div class='conteudo-lateral'>
                        
                        <h2>Monetização e publicidade</h2>
                            <img src='_imgs/rascunho/curriculo.jpg'>
                    
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

                <div class='clear'></div>
            </div>
        </section>

        <footer>

          <?php require_once "rodape.php";?>
        
        </footer>

    </body>
</html>