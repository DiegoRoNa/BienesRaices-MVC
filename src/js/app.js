
//FUNCIONABILIDAD DEL MENU RESPONSIVE

//DOMContentLoaded - HTML, CSS y JS cargados
document.addEventListener('DOMContentLoaded', function(){
    eventListeners();

    darkMode();
});

//FUNCION DE DARK MODE
function darkMode(){

    //TOMA EL COLOR DEL SISTEMA OPERATIVO
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');
    //console.log(prefiereDarkMode.matches);
    
    if (prefiereDarkMode.matches) {
        document.body.classList.add('dark-mode');
    }else{
        document.body.classList.remove('dark-mode');
    }

    //SIN RECARGAR LA PAGINA, AL MOMENTO DE QUE EL USER CAMBIE EN SU SO EL TEMA, LA PAGINA LO HARÁ AL MISMO TIEMPO
    prefiereDarkMode.addEventListener('change', function(){
        if (prefiereDarkMode.matches) {
            document.body.classList.add('dark-mode');
        }else{
            document.body.classList.remove('dark-mode');
        }
    });

    const botonDarkMode = document.querySelector('.dark-mode-boton');

    botonDarkMode.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode');
    });
}

function eventListeners(){
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive);//FUNCION AL DAR CLICK


    //MOSTRAR CAMPOS CONDICIONALES PARA EL FORMULARIO DE CONTACTO
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodoContacto));
    
}

function navegacionResponsive(){
    const navegacion = document.querySelector('.navegacion');

    //toggle, condiciona si existe la clase mostrar, si está la quita, si no, la coloca
    navegacion.classList.toggle('mostrar');
    
}

function mostrarMetodoContacto(e){
    const contactoDiv = document.querySelector('#contacto');

    if (e.target.value === 'telefono') {
        contactoDiv.innerHTML = `
            <label for="telefono">Teléfono:</label>
            <input data-cy="input-telefono" type="tel" id="telefono" name="contacto[telefono]" placeholder="Tu telefono">

            <p>Seleccione la fecha y la hora</p>

            <label for="fecha">Fecha:</label>
            <input data-cy="input-fecha" type="date" id="fecha" name="contacto[fecha]">

            <label for="hora">Hora:</label>
            <input data-cy="input-hora" type="time" id="hora" name="contacto[hora]" min="09:00" max="18:00">
        `;
    }else{
        contactoDiv.innerHTML = `
            <label for="email">Correo:</label>
            <input data-cy="input-email" type="email" id="email" name="contacto[email]" placeholder="Tu correo">
        `;
    }

    
}