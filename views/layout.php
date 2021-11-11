<?php 

if (!isset($_SESSION)) {
    session_start();
}

$auth = $_SESSION['login'] ?? false;

if (!isset($inicio)) {
    $inicio = false;
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Bienes Raíces</title>

    <link rel="stylesheet" href="../build/css/app.css">
</head>
<body>

    <!--CLASE INICIO DE LA PAGINA PRINCIPAL-->
    <header class="header <?=$inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img src="../build/img/logo.svg" alt="Logotipo de Bienes raices">
                </a>

                <div class="mobile-menu">
                    <img src="../build/img/barras.svg" alt="Icono menú responsive">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="../build/img/dark-mode.svg">
                    <nav class="navegacion">
                        <a href="/nosotros">Nosotros</a>
                        <a href="/propiedades">Anuncios</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                        <?php if($auth): ?>
                            <a href="/cerrar-sesion">Cerrar sesión</a>
                        <?php else: ?>
                            <a href="/login.php">Iniciar sesión</a>
                        <?php endif; ?>
                        
                        
                    </nav>
                </div>
                
            </div>

            <!--TITULO DE LA PAGINA PRINCIPAL-->
            <?php if($inicio): ?>
                <h1>Venta de Casas y Departamentos de lujo</h1>
            <?php endif;?>
            
        </div>
    </header>


    <?= $contenido; ?>


    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="/nosotros">Nosotros</a>
                <a href="/propiedades">Anuncios</a>
                <a href="/blog">Blog</a>
                <a href="/contacto">Contacto</a>
            </nav>
        </div>

        <p class="copyright">Todos los derechos reservados <?=date('Y');?>. Diego RoNa &copy;</p>
    </footer>

    <!--COMPILANDO JS y MODERNAIZER-->
    <script src="../build/js/bundle.min.js"></script>
    
</body>
</html>