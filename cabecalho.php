 <!--DIV CONTAINER -->
 <div class='container'>
    <!--DIV LOGO -->
    <div class='logo' id='topo'>
        <a href='index?pagina=1'><img src='_imgs/logo-02.png' alt='Goolbee Empregos'/></a>
    </div><!--FIM DA DIV LOGO -->

    <!--NAV MENU -->
    <nav class='menu-desktop'>
        <ul>
            <li><a href='index?pagina=1'>HOME</a></li>
            <li><a href='anunciar.php'>ANUNCIAR</a></li>
            <li><a href='sobre.php'>SOBRE</a></li>
            <li><a href='contato.php'>CONTATO</a></li>
        </ul>
    </nav><!--FIM DA NAV MENU-->

    <nav id='idmenu-mobile' class='menu-mobile'>
        <ul>
            <li><a href='index?pagina=1'>HOME</a></li>
            <li><a href='anunciar.php'>ANUNCIAR</a></li>
            <li><a href='sobre.php'>SOBRE</a></li>
            <li><a href='contato.php'>CONTATO</a></li>
            <li><a href='vagas.php?pagina=1'>VAGAS</a></li>
            <li><a href='estagio.php?pagina=1'>ESTAGIO</a></li>
            <li><a href='nivelsuperior.php?pagina=1'>NIVEL SUPERIOR</a></li>
            <li><a href='concurso.php'>CONCURSOS</a></li>
            <li><a href='cursos.php'>CURSOS</a></li>
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

                if($arquivo === "concurso.php"){
                    echo "<li class='estilo-item'><a href='concurso.php'>CONCURSOS</a></li>";
                }else{
                    echo "<li><a href='concurso.php'>CONCURSOS</a></li>";
                }

                if($arquivo === "cursos.php"){
                    echo "<li class='estilo-item'><a href='cursos.php'>CURSOS</a></li>";
                }else{
                    echo "<li><a href='cursos.php'>CURSOS</a></li>";
                }

                if($arquivo === "anunciar.php"){
                    echo "<li class='estilo-item'><a href='anunciar.php'>ANUNCIAR</a></li>";
                }else{
                    echo "<li><a href='anunciar.php'>ANUNCIAR</a></li>";
                }
                
            ?>
        </ul>
    </nav>
    <div class='clear'></div>

</div>
