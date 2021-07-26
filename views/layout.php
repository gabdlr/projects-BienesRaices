<?php

if(!isset($inicio)) {

    $inicio = false;

}

?>



<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bienes Raices</title>

    <link rel="stylesheet" href="/public/build/css/app.css">

</head>

<body>



    <header class="header <?php echo $inicio == true ? 'inicio' : ''; ?>">

        <div class="contenedor contenido-header">

            <div class="barra">

                <a href="/">

                    <img src="/public/build/img/logo.svg" alt="logo">

                </a>

                <div class="mobile-menu">

                    <img src="/public/build/img/barras.svg" alt="menu responsive">

                </div>

                <div class="derecha">

                    <img class="dark-mode-btn" src="/public/build/img/dark-mode.svg" alt="darkmode">

                    <nav class="navegacion">

                        <a href="/nosotros">Nosotros</a>

                        <a href="/propiedades">Anuncios</a>

                        <a href="/blog">Blog</a>

                        <a href="/contacto">Contacto</a>

                    </nav>

                </div>

            </div><!--.barra-->

            <?php echo $inicio ? '<h1>Venta de Casas y Departamentos exclusivos de lujo</h1>' : '';?>

        </div>

    </header>



    <?php 

        echo $contenido;

    ?>



    <footer class="footer seccion">

        <div class="contenedor contenedor-footer">

            <nav class="navegacion">

                <a href="/nosotros">Nosotros</a>

                <a href="/propiedades">Anuncios</a>

                <a href="/blog">Blog</a>

                <a href="/contacto">Contacto</a>

            </nav>

        </div>

        <p class="copyright">Todos los derechos reservados <?php echo date('Y');?> &copy;</p>

    </footer>

    <script src="/public/build/js/bundle.js"></script>

</body>

</html>