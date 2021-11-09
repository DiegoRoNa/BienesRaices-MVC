<?php 
//ESTE ARCHIVO CONTIENE TODAS LAS RUTAS DE LA WEB

namespace MVC;

class Router{

    //Necesitan ser arreglos para la funcion get o post
    public $rutasGET = [];
    public $rutasPOST = [];

    //TODAS LAS URL QUE REACCIONAN AL MÉTODO GET
    public function get($url, $fn){//URL Y FUNCION ASICIADA A LA URL
        $this->rutasGET[$url] = $fn;
    }

    //COMPROBACION SI EXISTEN LAS RUTAS/URL
    public function comprobarRutas(){
        $urlActual = $_SERVER['PATH_INFO'] ?? '/';//ruta actual de la URL
        $metodo = $_SERVER['REQUEST_METHOD']; //metodo

        //SI EL METODO ES GET
        if ($metodo === 'GET') {
            $fn = $this->rutasGET[$urlActual];//fn será la funcion de esta RUTA
        }

        //si existe la funcion
        if ($fn) {
            //permite usar una funcion que no sabemos como se llamará
            call_user_func($fn, $this);//recive la funcion callback a ejeutar y la ruta
        }else{
            echo 'Pagina no encontrada';
        }
    }
}
