<main class="contenedor seccion">
    <h1>Administrador de Bienes Raíces</h1>

    <!--MENSAJES DE CREACION O ACTUALIZACIÓN DE PROPIEDAD-->
    <?php 
    if ($resultado) {
        $mensaje = mostrarNotificacion(intval($resultado));    
        if ($mensaje) { ?>
            <p class="alerta exito"><?=s($mensaje);?></p>
        <?php } ?>
    <?php } ?>
    
    <a href="/propiedad/crear" class="boton boton-verde">Nueva propiedad</a>
    <a href="/vendedor/crear" class="boton boton-amarillo">Nuevo vendedor</a>

    <h2>Propiedades</h2>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <!--foreach para recorrer ARREGLOS-->
            <?php foreach($propiedades as $propiedad): ?>
            
                <tr>
                    <td><?=$propiedad->id;?></td>
                    <td><?=$propiedad->titulo;?></td>
                    <td><img src="/imagenes/<?=$propiedad->imagen;?>" class="imagen-tabla"></td>
                    <td>$ <?=$propiedad->precio;?></td>
                    <td>
                        <form method="POST" class="w-100" action="/propiedad/eliminar">
                            <input type="hidden" name="id" value="<?=$propiedad->id;?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                    
                        <a href="/propiedad/actualizar?id=<?=$propiedad->id;?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            
            <?php endforeach; ?>
            
        </tbody>
    </table>

    <h2>Vendedores</h2>


    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody> -->
            <!--foreach para recorrer ARREGLOS-->
            <?php foreach($vendedores as $vendedor): ?>
            
                <tr>
                    <td><?=$vendedor->id;?></td>
                    <td><?=$vendedor->nombre.' '.$vendedor->apellidos;?></td>
                    <td><?=$vendedor->telefono;?></td>
                    <td>
                        <form method="POST" class="w-100" action="/vendedor/eliminar">
                            <input type="hidden" name="id" value="<?=$vendedor->id;?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                    
                        <a href="/vendedor/actualizar?id=<?=$vendedor->id;?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            
            <?php endforeach; ?>
            
        </tbody>
    </table>
</main>
