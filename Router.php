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

    //TODAS LAS URL QUE REACCIONAN AL MÉTODO POST
    public function post($url, $fn){//URL Y FUNCION ASICIADA A LA URL
        $this->rutasPOST[$url] = $fn;
    }

    //COMPROBACION SI EXISTEN LAS RUTAS/URL
    public function comprobarRutas(){
        $urlActual = $_SERVER['PATH_INFO'] ?? '/';//ruta actual de la URL
        $metodo = $_SERVER['REQUEST_METHOD']; //metodo

        //SI EL METODO ES GET
        if ($metodo === 'GET') {
            $fn = $this->rutasGET[$urlActual] ?? null;//fn será la funcion de esta RUTA GET
        }else{
            $fn = $this->rutasPOST[$urlActual] ?? null;//fn será la funcion de esta RUTA POST
        }

        //si existe la funcion
        if ($fn) {
            //permite usar una funcion que no sabemos como se llamará
            call_user_func($fn, $this);//recive la funcion callback a ejeutar y el objeto Router

        }else{
            echo 'Pagina no encontrada';
        }
    }


    //MOSTRAR VISTAS
    public function render($view, $datos = []){//vista y variables para la vista

        //Iterar el arreglo de datos que se pasarán a la vista correspondiente
        foreach ($datos as $key => $value) {
            $$key = $value;
        }

        //USAMOS LA VISTA MASTER layout.php PARA IR CAMBIANDO EL CONTENIDO DE LAS VISTAS
        //INICIAR UN ALMACENAMIENTO EN MEMORIA, MOMENTANEAMENTE LA VISTA SE ENCUENTRA EN MEMORIA
        ob_start();
        include __DIR__."/views/$view.php";

        //LIMPIAR MEMORIA, LA VISTA EN MEMORIA PASA A ESTA VARIABLE $contenido
        $contenido = ob_get_clean();

        //VISTA MASTER, $contenido, se pasa a esa vista
        include __DIR__."/views/layout.php";
    }
}
