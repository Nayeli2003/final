<?php

Class ControladorPlantilla {
    /***********************
     * Llamada a la plantilla
     ***********************/
    public function ctrTraerPlantilla() {
        # include() se utiliza para invocar -- cargar un archivo que 
        # que contiene código html - php
        include "vistas/plantilla.php";
    }
} 