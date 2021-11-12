<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar sesión</h1>

    <!--MOSTRAR ERRORES DE INPUT VACIOS-->
    <?php foreach($errores as $error): ?>
        <div class="alerta error"><?=$error;?></div>
    <?php endforeach; ?>
    
    <form class="formulario" method="POST" action="/login">
        <fieldset>
            <legend>Correo y contraseña</legend>

            <label for="email">Correo:</label>
            <input type="email" id="email" name="email" placeholder="Tu correo">

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" placeholder="Tu contraseña">
        </fieldset>

        <input type="submit" value="Ingregsar" class="boton boton-verde">
    </form>
</main>