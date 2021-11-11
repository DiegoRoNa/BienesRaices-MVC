<?php 

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{

    //  /
    public static function index(Router $router){

        $propiedades = Propiedad::get(3);
        $inicio = true;
        
        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }


    //  /nosotros
    public static function nosotros(Router $router){
        $router->render('paginas/nosotros');
    }


    //  /propiedades
    public static function propiedades(Router $router){

        $propiedades = Propiedad::all();

        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }


    //  /propiedad
    public static function propiedad(Router $router){

        //VALIDACION DE ID EN LAS URL
        $id = validarOredireccionar('/propiedades');

        $propiedad = Propiedad::find($id);

        if (!$propiedad) {
            header('Location: /propiedades');
        }

        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
        
        
    }


    //  /blog
    public static function blog(Router $router){
        $router->render('paginas/blog');
    }


    //  /entrada
    public static function entrada(Router $router){
        $router->render('paginas/entrada');
    }


    //  /contacto
    public static function contacto(Router $router){

        $mensaje = null;
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //DATOS DEL FORMULARIO
            $respuestas = $_POST['contacto'];

            //CONFIGURACION DEL ENVIO DE CORREO
            //INSTANCIAR OBJETO DE phpmailer
            $mail = new PHPMailer();

            //CONFIGURAR SMTP (protocolo de envio de emails)
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';//configuracion que usamos de mailtrap->Laravel
            $mail->SMTPAuth = true;//autenticacion para mailtrap
            $mail->Username = '6af1d46c425e21';
            $mail->Password = '48839d180320e5';
            $mail->SMTPSecure = 'tls';//Transport Layer Security
            $mail->Port = 2525;

            //CONFIGURAR EL CONTENIDO DEL EMAIL
            $mail->setFrom('admin@bienesraices.com');//Quien envía el email
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');//A quien se envía el email
            $mail->Subject = 'Tienes un nuevo mensaje';//Mensaje que aparece en el email

            //HABILITAR HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            //DEFINIR EL CONTENIDO DEL EMAIL
            $contenido = '<html>';
            $contenido .= '<h1>Tienes un nuevo mensaje</h1>';
            $contenido .= '<p><strong>Nombre: </strong>'.$respuestas['nombre'].'</p>';

            //CONDICIONAR EL TIPO DE CONTACTO
            if ($respuestas['contacto'] === 'telefono') {
                $contenido .= '<p>Contactar por teléfono</p>';
                $contenido .= '<p><strong>Teléfono: </strong>'.$respuestas['telefono'].'</p>';
                $contenido .= '<p><strong>Fecha contacto: </strong>'.$respuestas['fecha'].'</p>';
                $contenido .= '<p><strong>Hora: </strong>'.$respuestas['hora'].'</p>';
            }else {
                $contenido .= '<p>Contactar por correo</p>';
                $contenido .= '<p><strong>Correo: </strong>'.$respuestas['email'].'</p>';
            }

            $contenido .= '<p><strong>Mensaje: </strong>'.$respuestas['mensaje'].'</p>';
            $contenido .= '<p><strong>Vende o Compra: </strong>'.$respuestas['opciones'].'</p>';
            $contenido .= '<p><strong>Precio o Presupuesto: </strong> $'.$respuestas['presupuesto'].'</p>';
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es contenido sin HTML';//Contenido cuando el lector no soporta HTML

            //ENVIAR EL EMAIL
            if ($mail->send()) {
                $mensaje = 'Correo enviado correctamente';
            }else{
                $mensaje = 'No se pudo enviar el correo...';
            }

            
        }
        

        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }
}
