<?php 

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController{

    //  /admin
    public static function index(Router $router){

        //TRAER TODAS LAS PROPIEDADES
        $propiedades = Propiedad::all();
        //TRAER TODAS LAS PROPIEDADES
        $vendedores = Vendedor::all();

        $resultado = $_GET['resultado'] ?? null;//ISSET()

        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'vendedores' => $vendedores,
            'resultado' => $resultado
        ]);
    }

    //  /propiedad/crear
    public static function crear(Router $router){

        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();

        //ARREGLO DE MENSAJES DE ERRORES
        $errores = Propiedad::getErrores();

        //LA MISMA RUTA PERO SI EL METODO ES POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $propiedad = new Propiedad($_POST['propiedad']);

            //Generar un nombre a la imagen
            $nombreImagen = md5( uniqid( rand(), true ) ).'.jpg';

            //validar si existe una imagen
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                //subir la imagen a la memoria del servidor con la libreria Intervention Image
                //Realiza un resize a la imagen
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);//tamaño de las imagenes
                
                //GUARAR EN LA BD
                $propiedad->setImagen($nombreImagen);

            }

            $errores = $propiedad->validar();


            //Insertar registros en la tabla PROPIEDADES validando que errores esté vacío
            if (empty($errores)) {

                //SUBIDA DE ARCHIVOS
                //crear la carpeta de imagenes
                if (!is_dir(CARPETA_IMAGENES)) {//Constante de funciones.php
                    mkdir(CARPETA_IMAGENES);
                }

                //GUARDAR EN EL SERVIDOR
                $image->save(CARPETA_IMAGENES.$nombreImagen);

                //GUARDAR OBJETO EN LA BD
                $propiedad->guardar();  
            }
            
        }

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    //  /propiedad/actualizar
    public static function actualizar(Router $router){
        
        //VALIDACION DE ID EN LAS URL
        $id = validarOredireccionar('/admin');

        $propiedad = Propiedad::find($id);
        $vendedores = Vendedor::all();

        //ARREGLO DE MENSAJES DE ERRORES
        $errores = Propiedad::getErrores();

        //DATOS DEL FORMULARIO
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Asignar los valores nuevos
            $args = $_POST['propiedad'];

            //sincronizar el objeto $propiedad con el arreglo $args
            $propiedad->sincronizar($args);

            //validar que no esten vacios los input
            $errores = $propiedad->validar();

            //SUBIDA DE IMAGEN NUEVA
            //Generar un nombre a la imagen
            $nombreImagen = md5( uniqid( rand(), true ) ).'.jpg';

            //validar si existe una imagen
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                //subir la imagen a la memoria del servidor con la libreria Intervention Image
                //Realiza un resize a la imagen
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);//tamaño de las imagenes
                
                //GUARAR EN LA BD
                $propiedad->setImagen($nombreImagen);
            }

            //Insertar registros en la tabla PROPIEDADES validando que errores esté vacío
            if (empty($errores)) {
                //validar si existe una imagen
                if ($_FILES['propiedad']['tmp_name']['imagen']) {
                    //GUARDAR IMAGEN EN EL SERVIDOR
                    $image->save(CARPETA_IMAGENES.$nombreImagen);
                }
                
                //actualizar
                $propiedad->guardar();
            }
            
        }

        $router->render('propiedades/actualizar', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }


    //  /propiedad/eliminar
    public static function eliminar(){
        //ELIMINAR EL REGISTRO
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //VALIDAR QUE SEA UN int
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            //ELIMINAR
            if ($id) {

                //ELIMINAR VENDEDOR O PROPIEDAD
                $tipo = $_POST['tipo'];

                if (validarTipoContenido($tipo)) {
                    //Verificar que existe ese ID
                    $propiedad = Propiedad::find($id);//Devuelve un OBJETO

                    //ELIMINA PROPIEDAD
                    $propiedad->eliminar();
                }
                
            }
        }
    }
}
