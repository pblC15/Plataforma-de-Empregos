<?php 

require_once 'config.php';

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
                require_once "cabecalho.php";
                require_once "conx.php";
                

                $sql = "SELECT * FROM tb_cadastro ";

                $result = mysqli_query($conn, $sql);

                $exibe = mysqli_fetch_array($result);
           ?>
        </header>

        <section class='conteudo'>
            
            <div class='container'>
            
                <div class='anuncio-principal1'>

                    <div class='img-sucesso'>
                        <img src="_imgs/icone/icone1.png">
                    </div>

                    <div class='mensagem-sucesso'>
 
                    <p>Obrigado por anunciar sua vaga de emprego na <b>GoolbeeEmpregos</b>, estamos aqui para ajudar a população a entrarem no mercado de trabalho e gerar economia para o Brasil.</p>
                    <p>Seu anuncio foi postado com sucesso para ver a postagem acesse esse <a href='index.php?num=<?php echo $_SESSION['numLogin'];?>'>Click aqui</a> que redirecionará para a página da postagem.</p>
                      
                    </div>
                    
                    <div class='clear'></div>
                </div><!--FIM DA DIV ANUNCIAR VAGAS-->

                <aside class='lateral'>

                    <!--Pesquisa lateral -->
                    <div class="form-lateral">
                        <h2>Buscar vagas</h2>
                        <!--Fazer o back-end -->
                        <form action="pesquisa.php" method="get" name='form_pesquisar'>
                            <div class="box_pesquisa">
                                <input type="text" name="f_name" placeholder="Busque vagas pelo nome" required="required">
                                <button><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M14.53 15.59a8.25 8.25 0 111.06-1.06l5.69 5.69a.75.75 0 11-1.06 1.06l-5.69-5.69zM2.5 9.25a6.75 6.75 0 1111.74 4.547.746.746 0 00-.443.442A6.75 6.75 0 012.5 9.25z"></path></svg></button>
                            </div>
                        </form>
                        
                    </div><!--Fim da pesquisa lateral -->
                </aside>

                <aside class='lateral'>
                <div class="form-lateral">
                            <h2>Receba as vagas de sua preferência</h2>

                            <form action="" method="" >
                                <label>Nome:</label>
                                    <input type="text" name="" required="required">
                                <label>Email: </label>
                                    <input type="email" name="" required="required">
                                <label>Tipo de vaga: </label>
                                <select  class='select-receberM' name='f_tipo' required='required'>
                                    <option value="" selected disabled></option>
                                    <option value="Empregos">Empregos</option>
                                    <option value="Estagio">Estágio</option>
                                    <option value="Nivel-superior">Nivél Superior</option>
                                </select>

                                <input type="button" value="Enviar">
                            </form>
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