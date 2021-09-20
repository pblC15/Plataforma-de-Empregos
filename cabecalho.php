<!--DIV CONTAINER -->
<div class='container'>
    <!--DIV LOGO -->
    <div class='logo' id='topo'>
    <?php
        if(!isset($_SESSION['numLogin'])){

            echo "<a href='index?pagina=1'><img src='_imgs/logo-02.png' alt='Logo Goolbee Empregos' title='Logo Goolbee Empregos'/></a>";

        }else{

            echo "<a href='index?num=".$_SESSION['numLogin']."&pagina=1'><img src='_imgs/logo-02.png' alt='Goolbee Empregos' title='Logo Goolbee Empregos'/></a>";
        }

    ?>
    </div><!--FIM DA DIV LOGO -->

    <!--NAV MENU -->
    <nav class='menu-desktop'>
        <ul>
            <?php
                if(!isset($_SESSION['numLogin'])){
                
                    echo "<li><a href='index?pagina=1'>HOME</a></li>
                        <li><a href='sobre.php'>SOBRE</a></li>
                        <li><a href='contato.php'>CONTATO</a></li>
                        <li class='botaoLog'><a href='login_g.php'>LOGAR</a></li>";
                }else{

                    echo "<li><a href='index?num=".$_SESSION['numLogin']."&pagina=1'>HOME</a></li>
                    <li><a href='anunciar.php?num=".$_SESSION['numLogin']."'>ANUNCIAR</a></li>
                    <li><a href='sobre.php?num=".$_SESSION['numLogin']."'>SOBRE</a></li>
                    <li><a href='contato.php?num=".$_SESSION['numLogin']."'>CONTATO</a></li>
                    <li class='botaoLog'><a href='logOut.php?token=".md5(session_id())."'>SAIR</a></li>";

                }
            ?>
        </ul>
    </nav><!--FIM DA NAV MENU-->

    <nav  class='menu-mobile'>
    <ul class="iconMobile">
        <li>
            <ul class="menuMobileBox">
            <?php
                if(!isset($_SESSION['numLogin'])){
                
                    echo "<li class='icon-home'><a href='index?pagina=1'>HOME</a></li>
                        <li class='icon-clipboard'><a href='sobre.php'>SOBRE</a></li>
                        <li class='icon-bubbles2'><a href='contato.php'>CONTATO</a></li>
                        <li class='icon-user'><a href='login_g.php'>LOGAR</a></li>";
                }else{

                    echo "<li class='icon-home'><a href='index.php?num=".$_SESSION['numLogin']."&pagina=1'>HOME</a></li>
                    <li class='icon-folder-upload'><a href='anunciar.php?num=".$_SESSION['numLogin']."'>ANUNCIAR</a></li>
                    <li class='icon-clipboard'><a class='sobre.php?num=".$_SESSION['numLogin']."'>SOBRE</a></li>
                    <li class='icon-bubbles2'><a href='contato.php?num=".$_SESSION['numLogin']."'>CONTATO</a></li>
                    <li class='icon-menu3'><span class='abreCat'>CATEGORIAS</span>
                        <ul class='subMenuMobile'>
                            <li class='icon-accessibility'><a href='vagas.php?num=".$_SESSION['numLogin']."&pagina=1'>VAGAS RECENTES</a></li>
                            <li class='icon-user-tie'><a href='nivelsuperior?num=".$_SESSION['numLogin']."&pagina=1'>NIVEL SUPERIOR</a></li>
                            <li class='icon-user-check'><a href='estagio.php?num=".$_SESSION['numLogin']."&pagina=1'>ESTÁGIO</a></li>
                            <li class='icon-phone'><a href='cursos.php?num=".$_SESSION['numLogin']."&pagina=1'>CURSOS</a></li>
                        </ul></li>
                    <li class='icon-newspaper'><a href='noticias.php?num=".$_SESSION['numLogin']."'>NOTICIAS</a></li>
                    <li class='icon-exit'><a href='logOut.php?token=".md5(session_id())."'>SAIR</a></li>";

                }
            ?>
            </ul>
        </li>
    </ul>
    </nav><!--FIM DA NAV MENU -->

    <div class='clear'></div><!--LIMPANDO OS FLOATS -->

</div><!--FIM DA DIV CONTAINER -->

</header><!--FIM DO CABEÇALHO PRINCIPAL -->

<!--CABEÇALHO SUBMENU -->
<header class='cabecalho-submenu'>
<div class='container'>

    <nav class='sub-menu'>
        <ul>
            <?php
                 if(!isset($_SESSION['numLogin'])){
                
                 //se não esxistir
                    $arquivo = substr($_SERVER['SCRIPT_NAME'], 28);
                    
                    if($arquivo === "vagas.php"){
                        echo "<li class='estilo-item'><a href='vagas.php'>VAGAS</a></li>";
                    }else{
                        echo "<li><a href='vagas.php'>VAGAS</a></li>";
                    }

                    if($arquivo === "estagio.php"){
                        echo "<li class='estilo-item'><a href='estagio.php'>ESTAGIO</a></li>";
                    }else{
                        echo "<li><a href='estagio.php'>ESTAGIO</a></li>";
                    }

                    if($arquivo === "nivelsuperior.php"){
                        echo "<li class='estilo-item'><a href='nivelsuperior.php'>NIVEL SUPERIOR</a></li>";
                    }else{
                        echo "<li><a href='nivelsuperior.php'>NIVEL SUPERIOR</a></li>";
                    }

                    if($arquivo === "noticias.php"){
                        echo "<li class='estilo-item'><a href='noticias.php'>NOTÍCIAS</a></li>";
                    }else{
                        echo "<li><a href='noticias.php'>NOTÍCIAS</a></li>";

                    }

                    if($arquivo === "cursos.php"){
                        echo "<li class='estilo-item'><a href='cursos.php'>CURSOS</a></li>";
                    }else{
                        echo "<li><a href='cursos.php'>CURSOS</a></li>";
                    }
                 /**/
                }else{

                //se existir
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
                    
                    $arquivo = substr($_SERVER['SCRIPT_NAME'], 28);
                    
                    if($arquivo === "vagas.php"){
                        echo "<li class='estilo-item'><a href='vagas.php'>VAGAS</a></li>";
                    }else{
                        echo "<li><a href='vagas.php?num=".$_SESSION['numLogin']."'>VAGAS</a></li>";
                    }

                    if($arquivo === "estagio.php"){
                        echo "<li class='estilo-item'><a href='estagio.php'>ESTAGIO</a></li>";
                    }else{
                        echo "<li><a href='estagio.php?num=".$_SESSION['numLogin']."'>ESTAGIO</a></li>";
                    }

                    if($arquivo === "nivelsuperior.php"){
                        echo "<li class='estilo-item'><a href='nivelsuperior.php'>NIVEL SUPERIOR</a></li>";
                    }else{
                        echo "<li><a href='nivelsuperior.php?num=".$_SESSION['numLogin']."'>NIVEL SUPERIOR</a></li>";
                    }

                    if($arquivo === "noticias.php"){
                        echo "<li class='estilo-item'><a href='noticias.php'>NOTÍCIAS</a></li>";
                    }else{
                        echo "<li><a href='noticias.php?num=".$_SESSION['numLogin']."'>NOTÍCIAS</a></li>";

                    }

                    if($arquivo === "cursos.php"){
                        echo "<li class='estilo-item'><a href='cursos.php'>CURSOS</a></li>";
                    }else{
                        echo "<li><a href='cursos.php'>CURSOS</a></li>";
                    }

                    if($arquivo === "anunciar.php"){
                        echo "<li class='estilo-item'><a href='anunciar.php?num=".$_SESSION['numLogin']."'>ANUNCIAR</a></li>";
                    }else{
                        echo "<li><a href='anunciar.php?num=".$_SESSION['numLogin']."'>ANUNCIAR</a></li>";
                    }
                /**********************************/

                }
            
            ?>
        </ul>
    </nav>
    <div class='clear'></div>

</div>
<script type="text/javascript" src="_js/jquery-3.5.1.min.js"></script>
<script>
   $(function(){

        
   });
</script>
