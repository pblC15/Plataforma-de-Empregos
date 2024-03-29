<div class="container">
    <div class='footer-side1'>

        <div class='div_seta'>
            <a class='botao_cima' href="#topo" alt='Ir para o Topo'>
                <img class='img_cima' src='_imgs/icone/seta-pra-cima-3.png' alt='Ir para o Topo'>
            </a>
        </div>

        <div class="menu-content">

            <nav class='menu-footer'>
                <h1>Menu:</h1>
                <div class="divisoria"></div>
                <ul>
                    <?php 

                    if(!isset($_SESSION['numLogin'])){

                        echo "<li><a href='index.php?pagina=1'>HOME</a></li>
                            <li><a href='sobre.php'>SOBRE</a></li>
                            <li><a href='contato.php'>CONTATO</a></li>";
                        
                    }else{

                        echo "<li><a href='index.php?num=".$_SESSION['numLogin']."&pagina=1'>HOME</a></li>
                            <li><a href='anunciar.php?num=".$_SESSION['numLogin']."'>ANUNCIAR</a></li>
                            <li><a href='sobre.php?num=".$_SESSION['numLogin']."'>SOBRE</a></li>
                            <li><a href='contato.php?num=".$_SESSION['numLogin']."'>CONTATO</a></li>";
                    }

                    ?>
                </ul>
            </nav>


            <nav class='submenu-footer'>
                <h1>Categorias:</h1>
                <div class="divisoria"></div>
                <ul>
                    <?php
                    if(!isset($_SESSION['numLogin'])){
                        
                        echo "<li><a href='vagas.php'>VAGAS</a></li>
                            <li><a href='estagio.php'>ESTÁGIO</a></li>
                            <li><a href='noticias.php'>NOTÍCIAS</a></li>
                            <li><a href='#'>CURSOS</a></li>
                            <li><a href='nivelsuperior.php'>NIVEL SUPERIOR</a></li>";
                    }else{

                        echo "<li><a href='vagas.php?num=".$_SESSION['numLogin']."'>VAGAS</a></li>
                            <li><a href='estagio.php?num=".$_SESSION['numLogin']."'>ESTÁGIO</a></li>
                            <li><a href='noticias.php?num=".$_SESSION['numLogin']."'>NOTÍCIAS</a></li>
                            <li><a href='#'>CURSOS</a></li>
                            <li><a href='nivelsuperior.php?num=".$_SESSION['numLogin']."'>NIVEL SUPERIOR</a></li>
                            <li><a href='anunciar.php?num=".$_SESSION['numLogin']."'>ANUNCIAR</a></li>";
                    }
                    ?>

                </ul>
            </nav>
        </div>

        <div class='clear'></div>
    </div>


    <div class='footer-lateral'>
        <div class="img-footer">
            <?php
            if(!isset($_SESSION['numLogin'])){

                echo "<a href='index?pagina=1'><img src='_imgs/logo-02.png' alt='Goolbee Empregos' title='Logo Goolbee Empregos'></a>";

            }else{
                
                echo "<a href='index?num=".$_SESSION['numLogin']."&pagina=1'><img src='_imgs/logo-02.png' alt='Goolbee Empregos' title='Logo Goolbee Empregos'/></a>";
            }
            
            ?>
        </div>
        <div class="footer-netsocial">
            <div class="redes-sociais">
                <span class="icon-facebook"></span>
                <span class="icon-twitter"></span>
                <span class="icon-instagram"></span>
                <span class="icon-mail2"></span>
            </div>
            <p>Acesse nossas redes socias</p>
        </div>
    </div>
    <div class='clear'></div>

</div>
<div class="ultimo-footer">
    <p>Desenvolvido por Pablo Cassiano</p>
    <p>&copy; 2020 - Todos os direitos autorais reservados a <b>GoolbeEmpregos</b></p>
    <div class="clear"></div>
</div>

<script type="text/javascript" src="_js/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        //Função para rolar para cima suave
        $('.botao_cima').click(function(e) { //Obtém o id do elemento que vai acionar a ação 
            e.preventDefault(); //Coloca as definições padrão 
            var id = $(this).attr('href'), //pega o valor do href do .botao_cima
                targetOffset = $(id).offset().top;
            $('html,body').animate({
                scrollTop: targetOffset
            }, 1000);
        });

    });
</script>