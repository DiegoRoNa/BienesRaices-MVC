<main class="contenedor seccion">
        <h1>Registrar vendedor</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <!--MENSAJES DE ERROR-->
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?=$error;?>
            </div>
        <?php endforeach; ?>

        <form action="/vendedor/crear" method="POST" class="formulario">
            
            <?php include __DIR__.'/formulario.php'; ?>
            
            <input type="submit" class="boton boton-verde" value="Registrar vendedor">
        </form>
    </main>