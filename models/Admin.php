<?php 

namespace Model;

class Admin extends ActiveRecord{
    //Tabla de la BD
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'email', 'password'];

    public $id;
    public $email;
    public $password;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function valiar(){
        if (!$this->email) {
            self::$errores[] = 'El correo es obligatorio';
        }

        if (!$this->password) {
            self::$errores[] = 'La contraseña es obligatoria';
        }

        return self::$errores;
    }

    //VERIFICAR SI EXISTE EL USUARIO
    public function existeUsuario(){
        $query = "SELECT * FROM ".self::$tabla." WHERE email = '".$this->email."' LIMIT 1;";

        $resultado = self::$db->query($query);

        if (!$resultado->num_rows) {//No hay resultado
            self::$errores[] = 'El usuario no existe';
            return;
        }

        return $resultado;
    }


    //COMPROBACION DEL PASSWORD
    public function comprobarPassword($resultado){
        $usuario = $resultado->fetch_object();//El usuario que sí existe

        //comparar contraseña
        $autenticado = password_verify($this->password, $usuario->password);//pass ingresada, pass de la BD

        if (!$autenticado) {
            self::$errores[] = 'Contraseña incorrecta';
        }

        return $autenticado;
    }



    //AUTENTICAR
    public function autenticar(){
        
        session_start();

        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;//helper

        header('Location: /admin');
        
    }
}
