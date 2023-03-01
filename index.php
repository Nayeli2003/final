<?php
# index: muestra la vista al usuario y también es la puerta de entrada a la aplicación 
# por medio del controlador 

#require: establece que el código del archivo invocado es requerido, es decir obligatorio
# si el archivo no esta disponible, la aplicación tendra un fatal error, se detendra

# require_once: la diferencia en la anterior es que si ya se agrego, no lo vuelve a incluir

require_once "controladores/plantilla.controlador.php";

//formularios
require_once "controladores/formularios.controlador.php";
require_once "modelos/formularios.modelo.php";

//Crear una instación 
$plantilla = new ControladorPlantilla();
$plantilla -> ctrTraerPlantilla();
