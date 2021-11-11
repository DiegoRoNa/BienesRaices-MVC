<main class="contenedor seccion contenido-centrado">
    <h1><?=$propiedad->titulo;?></h1>

    <picture>
        <img loading="lazy" src="imagenes/<?=$propiedad->imagen;?>" alt="Imagen de la propiedad">
    </picture>

    <div class="resumen-propiedad">
        <p class="precio">$<?=$propiedad->precio;?></p>

        <ul class="iconos-caracteristicas">
            <li>
                <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                <p><?=$propiedad->wc;?></p>
            </li>
            <li>
                <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                <p><?=$propiedad->estacionamiento;?></p>
            </li>
            <li>
                <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                <p><?=$propiedad->habitaciones;?></p>
            </li>
        </ul>

        <p><?=$propiedad->descripcion;?></p>
    </div>
</main>