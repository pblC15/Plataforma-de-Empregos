<?php 
    require_once "conx.php";

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
        
        <!--CONTEUDO -->
        <section class='conteudo'>
            
            <div class='container'>
             
                <div class='anuncio-principal'>
                    
                    <?php 
                        $id = $_GET['id'];

                        $sql = "SELECT * FROM tb_cadastro WHERE id={$id}";
                        
                        $result = mysqli_query($conn, $sql);

                        if($exibe = mysqli_fetch_array($result)){

                            echo "<div class='descricao-vaga'>
                                
                                    <div class='titulo-vaga'>
                                        <a href='index.php'>HOME</a>><a href='vagas.php'>".strtoupper(str_replace("_"," ",$exibe['tipo_V']))."</a>><a href='#'>".ucwords($exibe['nome_V'])."</a></p>
                                        <h3>Vagas para ".strtoupper($exibe['nome_V'])."</h3>

                                        <div class='data-icone'>
                                        <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' width='13' height='13'><path fill-rule='evenodd' d='M1.643 3.143L.427 1.927A.25.25 0 000 2.104V5.75c0 .138.112.25.25.25h3.646a.25.25 0 00.177-.427L2.715 4.215a6.5 6.5 0 11-1.18 4.458.75.75 0 10-1.493.154 8.001 8.001 0 101.6-5.684zM7.75 4a.75.75 0 01.75.75v2.992l2.028.812a.75.75 0 01-.557 1.392l-2.5-1A.75.75 0 017 8.25v-3.5A.75.75 0 017.75 4z'></path></svg>
                                            <p>Data da publicação: ".date('d/m/Y', strtotime($exibe['data_C']))."</p>
                                        </div>
                                        
                                        <div class='tipo-icone'>
                                        <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' width='13' height='13'><path fill-rule='evenodd' d='M6.75 0A1.75 1.75 0 005 1.75V3H1.75A1.75 1.75 0 000 4.75v8.5C0 14.216.784 15 1.75 15h12.5A1.75 1.75 0 0016 13.25v-8.5A1.75 1.75 0 0014.25 3H11V1.75A1.75 1.75 0 009.25 0h-2.5zM9.5 3V1.75a.25.25 0 00-.25-.25h-2.5a.25.25 0 00-.25.25V3h3zM5 4.5H1.75a.25.25 0 00-.25.25V6a2 2 0 002 2h9a2 2 0 002-2V4.75a.25.25 0 00-.25-.25H5zm-1.5 5a3.484 3.484 0 01-2-.627v4.377c0 .138.112.25.25.25h12.5a.25.25 0 00.25-.25V8.873a3.484 3.484 0 01-2 .627h-9z'></path></svg>
                                            <p>Tipo de vaga: ".$exibe['tipo_V']."</p>
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
                                        <p><b>Requisitos: </b><span class='dados'> ".$exibe['requisitos']."<span></p>
                                        <p><b>Descrição:</b> <span class='dados'>".$exibe['descricao']."</span></p>
                                        
                                        <div class='candidatar'>
                                            <h3>Para se candidatar: </h3>
                                            <p>Para se candidatar a vaga você precisa está dentro dos requisitos da exigidos e mandar email para <span>".$exibe['email']."</span> com assunto ''".$exibe['nome_V']."''.É imprescindével colocar no email ''Essa vaga foi divulgada pela GoolbeeEmpregos com o intuito de me ajudar a entrar no mercado de Trabalho''.</p>

                                            <h4>A vaga se encerra em : ".$exibe['periodo_V']."</h4>

                                            <p>Nós da <b>GoolbeeEmpregos</b> apenas divulgamos as vagas, não temos vinculo nenhum com o contratante, será de total responsabilidade do candidato a seguir no processo seletivo da vaga.</p>
                                        </div>

                                    </div>

                                <div class='clear'></div>
                            </div><!--FIM DA DIV BREVE-VAGA -->";
                        }

                    ?>
                    
                </div>
      
                <!--CONTEUDO LATERAL -->
                <aside class='lateral'>
                    <!--CONTEUDO LATERAL -->
                    <div class='conteudo-lateral'>
                        
                        <h2>Monetização e publicidade</h2>
                            <img src='_imgs/rascunho/curriculo.jpg'>
                    
                    </div><!--FIM DA ASIDE CONTEUDO LATERAL -->

                </aside>
                < <aside class='lateral'>
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
            
            <?php require_once "rodape.html";?>
         
        </footer>
    </body>
</html>