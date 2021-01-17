<?php 
    require_once 'config.php';
    require_once 'conx.php';

    // if(isset($_SESSION["numLogin"])){

    //     if(isset($_GET["num"])){
   
    //         $n1=$_GET["num"];
            
    //     }else if(isset($_POST["num"])){
            
    //         $n1=$_POST["num"];
    //     }
        
    //     $n2=$_SESSION["numLogin"];
        
    //     if($n1!=$n2){
    //         echo "<p>Login não efetuado</p>";
    //         exit;
    //     }
    // }else{
    //     echo "<p>Esse Login não foi efetuado</p>";
      
    //     exit;
    // }
?>
<!DOCTYPE html>
<html lang='pt-br'>
    <head>
        <title>Goolbee Empregos - HOME</title>
        <link rel='stylesheet' type='text/css' href='_css/cabecalho.css'>
        <link rel='stylesheet' type='text/css' href='_css/conteudo.css'>
        <link rel='stylesheet' type='text/css' href='_css/contato.css'>
        <link rel='stylesheet' type='text/css' href='_css/rodape.css'>
        <link rel='stylesheet' type='text/css' href='_css/formulario.css'>
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

        <!--CONTEUDO PRINCIPAL -->
        <section class='conteudo'>
            
            <div class='container'>
             
                <div class='anuncio-principal'>
                    <div class='banner-contato'>
                    <img src='_imgs/rascunho/baner-contato.png'>
                    </div>
                
                    <div class='formulario-contato'>
                        <div class='mensagem'>
                        <p>Para entrar em contato com nossa equipe da <b>GoolbeeEmpregos</b> basta nos enviar um E-mail preenchendo o formulário abaixo com seu nome, E-email, assunto e a mensagem. Responderemos em até 48horas no máximo, aceitamos sujeitões, elogios, reportar erros, dúvidas ou qualquer tipo de assunto realcionado a emprego, vagas ou ao site</p>
                        <p>Nós da <b>GoolbeeEmpregos</b> estamos aqui para ajudar a população a conseguir um emprego e manter a econômia do Brasil</p>
                        </div>

                        <form  action='email.php' class='formulario-contato1' method='post'>

                            <label for='id_nome'>Nome*</label>
                                <input type='text' name='f_nome' id='id_nome' required='required'>
                            <label for='id_email'>E-mail*</label>
                                <input type='email' name='f_email' id='id_email' required='required'>
                            <label>Assunto: </label>    
                            <select class='select-contato' name='f_assunto' required='required'>
                                <option value='' selected disabled></option>
                                <option value='Anuncio' >Anuncios</option>
                                <option value='Reportar Erro' >Reportar erros</option>
                                <option value='Outros' >Outros</option>
                            </select>    
                            <label for='if_mensagem'>Mensagem*</label>
                                <textarea name='f_mensagem' id='id_mensagem' rows='6' column='65' required='required'></textarea>
                            <input type='submit' name='f_submit' value='Enviar'> 
                        </form>
                    </div>
                </div>

                <!--CONTEUDO LATERAL -->
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
                                require_once "conx.php";
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
        
        <!--FOOTER RODAPE -->    
        <footer>
           
            <?php require_once "rodape.html";?>
            
        </footer>
    </body>
</html>