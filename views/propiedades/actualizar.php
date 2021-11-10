<main class="contenedor seccion">
    <h1>Actualizar propiedad</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <!--MENSAJES DE ERROR-->
    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?=$error;?>
        </div>
    <?php endforeach; ?>

    <form action="" method="POST" class="formulario" enctype="multipart/form-data">
        
        <?php include __DIR__.'/formulario.php'; ?>
        
        <input type="submit" class="boton boton-verde" value="Actualizar propiedad">
    </form>
</main>