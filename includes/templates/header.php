<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/bienesraices_inicio/build/css/app.css">
</head>
<body>

    <header class="header <?php echo $inicio == true ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/bienesraices_inicio/index.php">
                    <img src="/bienesraices_inicio/build/img/logo.svg" alt="logo">
                </a>
                <div class="mobile-menu">
                    <img src="/bienesraices_inicio/build/img/barras.svg" alt="menu responsive">
                </div>
                <div class="derecha">
                    <img class="dark-mode-btn" src="/bienesraices_inicio/build/img/dark-mode.svg" alt="darkmode">
                    <nav class="navegacion">
                        <a href="/bienesraices_inicio/nosotros.php">Nosotros</a>
                        <a href="/bienesraices_inicio/anuncios.php">Anuncios</a>
                        <a href="/bienesraices_inicio/blog.php">Blog</a>
                        <a href="/bienesraices_inicio/contacto.php">Contacto</a>
                    </nav>
                </div>
            </div><!--.barra-->
            <?php echo $inicio ? '<h1>Venta de Casas y Departamentos exclusivos de lujo</h1>' : '';?>
        </div>
    </header>