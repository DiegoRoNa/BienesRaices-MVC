<?php 

namespace Controllers;
use MVC\Router;
use Model\Vendedor;

class VendedorController{
    //  /vendedor/crear
    public static function crear(Router $router){

        $vendedor = new Vendedor;

        //ARREGLO DE MENSAJES DE ERRORES
        $errores = Vendedor::getErrores();

        //DATOS DEL FORMULARIO
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $vendedor = new Vendedor($_POST['vendedor']);

            $errores = $vendedor->validar();

            //Insertar registros en la tabla VENDEDORES validando que errores esté vacío
            if (empty($errores)) {

                //GUARDAR OBJETO EN LA BD
                $vendedor->guardar();  
            }
            
        }

        $router->render('vendedores/crear', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    //  /vendedor/actualizar
    public static function actualizar(Router $router){
        //ARREGLO DE MENSAJES DE ERRORES
        $errores = Vendedor::getErrores();

        $id = validarOredireccionar('/admin');

        //CONSULTAR TODOS LOS VENDEDORES
        $vendedor = Vendedor::find($id);

        //DATOS DEL FORMULARIO
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Asignar los valores nuevos
            $args = $_POST['vendedor'];

            //sincronizar el objeto $vendedor con el arreglo $args
            $vendedor->sincronizar($args);

            //validar que no esten vacios los input
            $errores = $vendedor->validar();


            //Insertar registros en la tabla VENDEDORES validando que errores esté vacío
            if (empty($errores)) {
                
                //actualizar
                $vendedor->guardar();
            }
            
        }

        $router->render('vendedores/actualizar', [
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);
    }


    //  /vendedor/eliminar
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
                    $vendedor = Vendedor::find($id);//Devuelve un OBJETO

                    //ELIMINA PROPIEDAD
                    $vendedor->eliminar();
                }
                
            }
        }
    }
}