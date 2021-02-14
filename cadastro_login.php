<!DOCTYPE html> 
<html lang='pt-br'>
<head>
    <title>Login | Goolbee</title>
    <link rel='stylesheet' type='text/css' href='_css/cabecalho.css'>
    <link rel='stylesheet' type='text/css' href='_css/conteudo.css'>
    <link rel='stylesheet' type='text/css' href='_css/formulario.css'>
    <link rel='stylesheet' type='text/css' href='_css/anunciar.css'>
    <link rel='stylesheet' type='text/css' href='_css/rodape.css'>
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
            require_once('cabecalho.php');
        ?>
    </header>

    <section class='conteudo'>
        
        <div class='container'>
        
            <div class='anuncio-principal'>
                
                <h2>Faça seu cadastro</h2>
                    
                    <div class='formulario form-cadastro-login'>
                        <form action='login_g.php' method='post'>

                            <label for='id_user'>Nome:</label>
                            <input type='text' name='f_user' id='id_user' required='required'>
                           
                            <label for='id_sobreNome'>Sobrenome:</label>
                            <input type='text' name='f_sobreNome' id='id_sobreNome' required='required'>

                            <label for='id_nomeE'>Senha:</label>
                            <input type='text' name='f_nomeE' id='id_nomE' required='required'>
                                
                            <label for='id_email_user'>Email:</label>
                            <input type='email' name='f_email_user'  id='id_email_user' required='required'>

                            <input type='submit' name='f_submit' value='Enviar'> 
                            <a class="btn-voltar" href="login_g.php"> Voltar Login</a>
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

    <footer>

        <?php require_once "rodape.php";?>
    
    </footer>

</body>
</html>