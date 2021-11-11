<main class="contenedor seccion">
    <h1>Contacto</h1>

    <?php if($mensaje): ?>
        <p class="alerta exito"><?=$mensaje;?></p>
    <?php endif; ?>
    
    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen Contacto">
    </picture>

    <h2>Llene el formulario de contacto</h2>

    <form class="formulario" action="/contacto" method="POST">
        <fieldset>
            <legend>Información personal</legend>

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="contacto[nombre]" placeholder="Tu nombre">

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="contacto[mensaje]"></textarea>
        </fieldset>

        <fieldset>
            <legend>Información sobre la propiedad</legend>

            <label for="opciones">Vende o compra:</label>
            <select name="contacto[opciones]" id="opciones">
                <option value="" disabled selected>-- Seleccione --</option>
                <option value="compra">Compra</option>
                <option value="vende">Vende</option>
            </select>

            <label for="presupuesto">Precio o presupuesto:</label>
            <input type="number" id="presupuesto" name="contacto[presupuesto]" placeholder="Tu precio o presupuesto">
        </fieldset>

        <fieldset>
            <legend>Información sobre la propiedad</legend>

            <p>Como desea ser contactado</p>

            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono:</label>
                <input type="radio" value="telefono" name="contacto[contacto]" id="contactar-telefono">

                <label for="contactar-email">Correo:</label>
                <input type="radio" value="email" name="contacto[contacto]" id="contactar-email">
            </div>

            <div id="contacto"></div>

        </fieldset>

        <input class="boton-verde" type="submit" value="Enviar">
    </form>
</main>