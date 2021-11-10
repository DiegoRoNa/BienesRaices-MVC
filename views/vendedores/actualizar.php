<main class="contenedor seccion">
    <h1>Actualizar vendedor</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <!--MENSAJES DE ERROR-->
    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?=$error;?>
        </div>
    <?php endforeach; ?>

    <form method="POST" class="formulario">
        
        <?php include __DIR__.'/formulario.php'; ?>
        
        <input type="submit" class="boton boton-verde" value="Actualizar vendedor">
    </form>
</main>