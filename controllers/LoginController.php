<?php 

namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController{


    //  /login
    public static function login(Router $router){

        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Admin($_POST);

            $errores = $auth->validar();

            if (empty($errores)) {
                //Validar si el usuario existe
                $resultado = $auth->existeUsuario();

                if (!$resultado) {
                    $errores = Admin::getErrores();
                }else {
                    //VERIFICAR LA CONSTRASEÑA
                    $autenticado = $auth->comprobarPassword($resultado);

                    //AUTENTICAR AL USUARIO
                    if ($autenticado) {
                        //autenticado
                        $auth->autenticar();
                    }else {
                        //contraseña incorrecta
                        $errores = Admin::getErrores();
                    }
                }
            }

        }

        $router->render('auth/login', [
            'errores' => $errores
        ]);
    }

    //  /logout
    public static function logout(){
        session_start();

        $_SESSION = [];//limpiar la sesion
        
        header('Location: /');
    }
}
