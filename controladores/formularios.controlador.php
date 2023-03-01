<?php

class ControladorFormularios{
    /* =================================================
    Registro
    =================================================== */
    static public function ctrRegistro(){
        #isset() si existe el objeto
        if(isset($_POST["registroId"])){
            //validar la informacion del formulario//
            if(!preg_match("/^[a-zA-Z'-]+$/",$_POST["registroId"])){
                $tabla = "registro";
                //preparar los datos a enviar
                $datos = array("idRegistro"   => $_POST["registroId"],
                            "nombre"    => $_POST["registroNombre"],
                            "apPaterno"    => $_POST["registroapPaterno"],
                            "apMaterno"    => $_POST["registroapMaterno"],
                           
                            "direccion"    => $_POST["registroDireccion"],
                            "tel_cel"    => $_POST["registroTel"],
                            "cargo"    => $_POST["registroCargo"],
                            "password" => $_POST["registroPassword"] );

                $respuesta  = ModeloFormularios::mdlRegistro($tabla, $datos);

                return $respuesta;
                }else{
                    $respuesta = "error";
                    return $respuesta;
                }
            }
        }

        /* =================================================
        Seleccionar Registros
        =================================================== */
        static public function ctrSeleccionarRegistro($item, $valor){
            $tabla = "registro";

            $respuesta = ModeloFormularios::mdlSeccionarRegistros($tabla,$item,$valor);

            return $respuesta;
    }

    /* =================================================
    Ingreso
    =================================================== */
    public function ctrIngreso(){
       
        if(isset($_POST["ingresoidRegistro"])){
            $tabla = "registro";
            $item = "idRegistro";
            $valor = $_POST["ingresoidRegistro"];

            $respuesta = ModeloFormularios::mdlSeccionarRegistros($tabla,$item,$valor);
           
            if(isset($respuesta["idRegistro"])){
               // echo "con respuesta";

                if($respuesta["idRegistro"] == $_POST["ingresoidRegistro"] && 
                    $respuesta["password"] == $_POST["ingresoPassword"]){
                    
                    #crear una variable de sesion
                    $_SESSION["validarIngreso"] = "ok";

                    echo '<script>
                        if(window.history.replaceState){
                            window.history.replaceState(null,null,window.location.href);
                        }
                        window.location = "index.php?pagina=inicio";
                    </script>';
                } else {
                    echo '<script>
                    if(window.history.replaceState){
                        window.history.replaceState(null,null,window.location.href);
                    }
                    </script>';
                    echo '<div class="alert alert-danger">Errror al ingresar al sistema,
                            el email o contraseña no coinciden</div>';
                }
            } else {
                //echo "sin respuesta";
                echo '<script>
                    if(window.history.replaceState){
                        window.history.replaceState(null,null,window.location.href);
                    }
                    </script>';
                echo '<div class="alert alert-danger">Errror al ingresar al sistema,
                            el email o contraseña no coinciden</div>';
            }
        } // si existe el correo
    }

    /* =================================================
    Actualizar registro
    =================================================== */
    static public function ctrActualizarRegistro(){
        if(isset($_POST["actualizaridRegistro"])){

            //Si hay un nuevo password
            if($_POST["actualizarPassword"] != ""){
                $password = $_POST["actualizarPassword"];
            } else {
                $password = $_POST["passwordActual"];
            }

            $tabla = "registro";

            $datos = array("id" => $_POST["idRegistro"],
                        "nombre" => $_POST["actualizarNombre"],
                        "tel_cel" => $_POST["actualizarTel_cel"],
                        "cargo" => $_POST["actualizarCargo"],
                        "apPaterno" => $_POST["actualizarapPaterno"],
                        "apMaterno" => $_POST["actualizarapMaterno"],
                        "direccion" => $_POST["actualizaDireccion"],
                        "cargo" => $_POST["actualizarCargo"],
                        "password" => $password);
        
            $respuesta = ModeloFormularios::mdlActualizarRegistro($tabla,$datos);
            
            return $respuesta;
        }
    }

    /* =================================================
    Eliminar registro
    =================================================== */
    public function ctrEliminarRegistro(){
        //validar información
        if(isset($_POST["eliminaridRegistro"])){
            //preparar información
            $tabla = "registro";
            $valor = $_POST["eliminaridRegistro"];
            //llamar al modelo para su eliminación
            $respuesta = ModeloFormularios::mdlEliminarRegistro($tabla,$valor);
            //validar la eliminación
            if($respuesta == "ok"){
                echo '<script>
                    if(window.history.replaceState) {
                        window.history.replaceState(null,null,window.location.href);
                    }

                    window.location = "index.php?pagina=inicio";
                </script>';
            }
        }
    }

}