<div class="contenedor-anuncios">
    <?php foreach($propiedades as $propiedad): ?>
        <div class="anuncio" data-cy="anuncio">
            <picture>
                <img loading="lazy" src="/imagenes/<?=$propiedad->imagen;?>" alt="anuncio">
            </picture>

            <div class="contenido-anuncio">
                <h3><?=$propiedad->titulo;?></h3>
                <p><?=$propiedad->descripcion;?></p>
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

                <a data-cy="enlace-propiedad" href="/propiedad?id=<?=$propiedad->id;?>" class="boton-amarillo-block">Ver propiedad</a>
            </div><!--contenido-anuncio-->
        </div><!--anuncio-->
    <?php endforeach; ?>
</div><!--contenedor-anuncios-->
