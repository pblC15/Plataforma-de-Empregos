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
            session_start(); 
            session_destroy(); 
            header("Location: apCurriculo.php");
            exit;
            // echo "<h1>Erro, login não efetuado!</h1>";
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
                require_once __DIR__.'/cabecalho.php';
           ?>
        </header>
        
        <!--CONTEUDO -->
        <section class='conteudo'>
            
            <div class='container'>
             
                <div class='anuncio-principal'>
                    <div class='titulo-vaga'>
                    <a href='index.php?pagina=1'>HOME</a>><a href='apCurriculo.php'>CURRÍCULO</a>
                    </div>
                    
                    <h1 class='tituloCurriculo'>Aprenda a fazer seu currículo e ter mais chances de ser selecionando</h1>

                    <div class='banner-contato'>
                        <div class='data-icone1'>
                        <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' width='13' height='13'><path fill-rule='evenodd' d='M1.643 3.143L.427 1.927A.25.25 0 000 2.104V5.75c0 .138.112.25.25.25h3.646a.25.25 0 00.177-.427L2.715 4.215a6.5 6.5 0 11-1.18 4.458.75.75 0 10-1.493.154 8.001 8.001 0 101.6-5.684zM7.75 4a.75.75 0 01.75.75v2.992l2.028.812a.75.75 0 01-.557 1.392l-2.5-1A.75.75 0 017 8.25v-3.5A.75.75 0 017.75 4z'></path></svg>
                            <p>Data da publicação: 15/01/2022</p>
                        </div>
                        <img src="_imgs/vagas-emprego-pat.jpg">
                    </div>

                    <div class='descCurriculo'>
                        <p>Quem está em busca do primeiro emprego ou apenas procurando uma nova oportunidade de trabalho, precisa saber como montar um currículo bom (CV). Afinal, ele é a chave para conseguir entrevistas com recrutadores.</p>
                        <p>Pensando nisso, criamos um texto bem informativo e com várias dicas para elaborar um currículo moderno. Também vamos explicar o que é carta de apresentação e de recomendação, dois importantes documentos ajudam a tornar o CV mais atrativo para as empresas. Então, siga com a leitura!</p>

                        <h2>A importância de um currículo bem feito</h2>

                        <p>O currículo é o primeiro contato do recrutador com quem está se candidatando para uma vaga de trabalho.</p>
                        <p>Sendo assim, o documento precisa ter um conteúdo que apresente o melhor perfil profissional do candidato, de modo a chamar atenção. Do contrário, você vai acabar perdido em meio a centenas, ou até milhares, de currículos que chegam ao setor de Recursos Humanos das empresas.</p>
                        <p>Na verdade, em geral, os recrutadores dedicam no máximo 10 segundos à leitura de um CV. Então, qualquer erro no documento ou a presença de informações confusas fará você perder pontos e até ser descartado do processo seletivo.</p>

                        <h2>O que precisa ter em um currículo?</h2>

                        <div class='banner-contato'>
                            <img src="_imgs/curriculofoto.jpeg">
                            <p class='contentCurriculo'>Aprender como montar um currículo é fundamental para quem vai entrar no mercado de trabalho.</p>
                        </div>

                        <p>Antes de saber como montar um currículo incrível, é preciso entender o que é necessário colocar nesse documento, vamos lá?</p>
                        <p>Apesar de ser algo relativamente simples de se elaborar, muita gente fica perdida na hora de desenvolver um currículo: quais as informações obrigatórias? Como resumir as qualificações? É preciso colocar foto? Qual a ordem de cada tópico?</p>
                        <p>Todas essas dúvidas aparecem para quase 30% dos jovens, de acordo com uma pesquisa feita pelo Núcleo Brasileiro de Estágios, em 2017.</p>
                        <p>Tendo isso em mente, criamos sete tópicos detalhados com tudo o que precisa ter em um currículo. A ordem abaixo é a mesma que você deve seguir no momento de montar o documento.</p>
                        <p>Quer conhecer os 6 principais erros ao criar um currículo e aprender como evitá-los? Clique aqui!</p>
                        <h2 class='tituloDescCurriculo'>1. Dados pessoais</h2>
                        <p>Os dados pessoais, em um currículo moderno, devem ser concisos e listar apenas informações fundamentais. Isso inclui nome completo, idade, número de telefone e e-mail. Lembre-se que o e-mail deve conter, preferencialmente, apenas nome e sobrenome. Nada de apelidos ou diminutivos.</p>
                        <p>No caso dos telefones, você também pode incluir números para recado. É só colocar a indicação “recados com” e o nome da pessoa. Se desejar, pode incluir, ainda, o endereço. Porém, não precisa colocar os dados completos, apenas bairro, cidade e estado.</p>
                        <p>É importante ressaltar que você não deve colocar no currículo seus números de RG e CPF. Já as fotos, só são necessárias para empregos específicos, como de modelo ou atriz/ator.</p>
                        <h2 class='tituloDescCurriculo'>2. Objetivo</h2>
                        <p>O objetivo também precisa ser algo direto, tendo não mais que duas linhas. É nele que você vai indicar a oportunidade de trabalho para a qual deseja se candidatar. Por exemplo: busco vaga de assistente editorial.</p>
                        <p>Este tópico não é algo fixo, ou seja, ajuste o conteúdo dependendo da empresa para onde for enviar o currículo.</p>
                        <p>Caso a companhia não esteja com uma vaga específica em aberto, você deve indicar em qual setor deseja trabalhar. Por exemplo: busco oportunidade no setor de fotografia.</p>
                        <h2 class='tituloDescCurriculo'>3. Habilidades e Competências</h2>
                        <div class='banner-contato'>
                            <img src="_imgs/emprego.jpg">
                            <p class='contentCurriculo'>Além de saber como montar um currículo moderno, é essencial pensar em formas de destacar suas habilidades conquistadas até o momento.</p>
                        </div>
                        <p>Seguindo com a elaboração do currículo, chegamos na área destinada às suas competências e habilidades. Esse é o momento de apresentar os seus diferenciais para a vaga que deseja.</p>
                        <p>Aqui você pode listar as habilidade técnicas que possui, incluindo:</p>
                        <ul class='listCurriculo'>
                            <li>domínio de programas, como Photoshop e AutoCad.</li>
                            <li>conhecimentos específicos, por exemplo de copywriter, Ux Design, Direito Ambiental, Nutrição esportiva, etc.</li>
                        </ul>
                        <p>Também é importante apresentar suas competências de forma geral. Assim, você pode dizer que tem facilidade com liderança, trabalho sob pressão, oratória, inteligência emocional, entre outros temas adequados ao seu perfil.</p>
                        <h2 class='tituloDescCurriculo'>4. Formação Acadêmica</h2>
                        <p>A formação acadêmica serve para mostrar como você adquiriu todas as habilidades que citou. Aqui entram cursos técnicos, graduações, especializações, mestrados, doutorados e cursos de extensão, basicamente.</p>
                        <p>Na hora de listá-los, comece sempre pela formação mais recente até chegar até a mais antiga. Quem está na faculdade ou já se formou não precisa colocar informações sobre o ensino médio.</p>
                        <p>Lembre-se que, se tiver feito muitos cursos livres ou de extensão, selecione apenas aqueles que têm relação direta com a vaga para a qual está se candidatando.</p>
                        <h2 class='tituloDescCurriculo'>5. Experiência Profissional</h2>
                        <p>Para você que está aprendendo como montar um currículo, é importante ter em mente que a experiência profissional é uma das seções que merece maior atenção. É aqui que os recrutadores vão analisar toda a sua vivência no mercado de trabalho, verificando se o seu perfil combina com o da vaga em aberto.</p>
                        <p>A formatação dessa etapa não é muito diferente daquela usada na formação acadêmica. Ou seja, você precisa listar os locais em que trabalhou em ordem inversa: do mais recente ao mais antigo.</p>
                        <p>Caso tenha muitas experiências, coloque apenas as que são mais relevantes para o cargo desejado. Em contrapartida, se estiver em busca do primeiro emprego, dê ênfase nas atividades de estágio, monitoria e de trabalho voluntário que já tenha feito.</p>
                        <p>Apresente também as conquistas alcançadas em cada emprego. Isso agrega muito mais valor do que apenas listar suas responsabilidades.</p>
                        <p>Então, foque nas ações que realmente fizeram diferença para você e para a empresa. Isso pode incluir uma boa média de aprovação dos gestores, algum treinamento que ministrou, uma experiência desafiadora etc.</p>
                        <h2 class='tituloDescCurriculo'>6. Idiomas</h2>
                        <div class='banner-contato'>
                            <img src="_imgs/curriculoDesc.jpg">
                            <p class='contentCurriculo'>Nas dicas de como montar um currículo não poderia faltar um tópico sobre destacar, no documento, caso você domine uma segunda língua.</p>
                        </div>
                        <p>Ter domínio de uma segunda língua aumenta as chances de contratação, além de elevar o seu salário. Uma pesquisa feita pela Catho mostrou que pessoas fluentes em inglês, por exemplo, chegam a ganhar 70% mais do que aquelas que não possuem tal habilidade.</p>
                        <p>Sendo assim, elaborar com atenção o tópico de idiomas em um currículo moderno é muito importante. Para isso não há mistério, basta colocar o local onde estudou seguido do idioma, nível de fluência (básico, intermediário, avançado e fluente) e ano de finalização do curso.</p>
                        <h2 class='tituloDescCurriculo'>7. Informações adicionais</h2>
                        <p>Em nossa lista de o que apresentar em um currículo, as informações adicionais aparecem por último por um motivo: elas não são obrigatórias. Neste espaço, você vai incluir tudo aquilo que acha relevante, mas não se enquadra nos tópicos anteriores. Isso inclui:</p>
                        <ul class='listCurriculo'>
                            <li>palestras das quais participou ou que apresentou;</li>
                            <li>concursos que ganhou;</li>
                            <li>algum artigo científico que escreveu;</li>
                            <li>programas de intercâmbio;</li>
                            <li>disponibilidade para viajar profissionalmente;</li>
                            <li>disponibilidade para trabalhar aos finais de semana etc.</li>
                        </ul>
                        <p>Agora que você já sabe tudo o que precisa ter no documento, bora aprender como montar um currículo moderno? A seguir, confira 4 dicas muito legais!</p>
                        <h2>O que é uma carta de apresentação?</h2>
                        <div class='banner-contato'>
                            <img src="_imgs/curriculofotodes.jpg">
                            <p class='contentCurriculo'>Para além de aprender como montar um currículo, existem outras coisas que uma empresa pode solicitar na sua candidatura, como a carta de apresentação!</p>
                        </div>
                        <p>Além de precisar pensar em como montar um currículo para uma vaga de emprego, pode ser que você precise fazer uma carta de apresentação. Mas, afinal, o que é isso? Bem, como o nome sugere, ela é um conteúdo usado para que o candidato se apresente à empresa.</p>
                        <p>Em geral, isso é feito usando o e-mail. Assim, quando for anexar o currículo e enviá-lo ao setor de RH, você precisará escrever algo para o remetente. O ideal é que esse texto siga um padrão, de modo a despertar o interesse do recrutador.</p>
                        <p>Então, inicie sua carta usando pronomes de tratamento formais e faça um breve resumo de quem é você. Diga seu nome, qual a sua área de atuação e a experiência que tem naquele setor.</p>
                        <p>Em seguida, explique para qual vaga está se candidatando e onde viu o anúncio da seleção. Explique qual o seu interesse no cargo e descreva, rapidamente, suas competências.</p>
                        <p>Informe que seu currículo está anexado ao e-mail, despeça-se e coloque seu telefone para contato. Simples, não é mesmo?</p>
                        <h2>O que é uma carta de recomendação?</h2>
                        <p>Além da carta de apresentação e currículo, algumas empresas exigem, no processo de seleção, que o candidato envie uma carta de recomendação junto com o currículo. Essa carta nada mais é do que um documento fornecido pelos locais onde você já trabalhou.</p>
                        <p>O objetivo dela é listar as atividades que foram desenvolvidas por você durante o tempo de trabalho e informar se foram bem desempenhadas. Para conseguir esse tipo de carta, basta fazer contato com o setor de RH do seu antigo emprego e solicitá-la.</p>

                    </div>
                        
                </div>
                <div class="div_lateral">

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
                
                </div>
                <div class='clear'></div>

            </div><!-- FIM DA DIV CONTRAINER-->
        </section>

        <footer>
            
          <?php require_once __DIR__."/rodape.php";?>
           
        </footer>
    </body>
</html>