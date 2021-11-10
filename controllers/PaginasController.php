<?php 

namespace Controllers;
use MVC\Router;

class PaginasController{

    //  /
    public static function index(){
        echo 'Pagina principal';
    }


    //  /nosotros
    public static function nosotros(){
        echo 'Pagina nosotros';
    }


    //  /propiedades
    public static function propiedades(){
        echo 'Pagina propiedades';
    }


    //  /propiedad
    public static function propiedad(){
        echo 'Pagina propiedad';
    }


    //  /blog
    public static function blog(){
        echo 'Pagina blog';
    }


    //  /entrada
    public static function entrada(){
        echo 'Pagina entrada';
    }


    //  /contacto
    public static function contacto(){
        echo 'Pagina contacto';
    }
}
