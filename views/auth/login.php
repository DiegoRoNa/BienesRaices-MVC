<main class="contenedor seccion contenido-centrado">
    <h1 data-cy="heading-login">Iniciar sesión</h1>

    <!--MOSTRAR ERRORES DE INPUT VACIOS-->
    <?php foreach($errores as $error): ?>
        <div data-cy="alerta-login" class="alerta error"><?=$error;?></div>
    <?php endforeach; ?>
    
    <form data-cy="formulario-login" class="formulario" method="POST" action="/login">
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