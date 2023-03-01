<?php 
#validar al usuario si se ha firmado a la aplicación
if(!isset($_SESSION["validarIngreso"])){
    echo '<script>window.location = "index.php?pagina=ingreso";</script>';
    return;
} else {
    if($_SESSION["validarIngreso"] != "ok"){
        echo '<script>window.location = "index.php?pagina=ingreso";</script>';
        return;
    }
}

//Recibir el parámetro
if(isset($_GET["idRegistro"])){
    $item = "idRegistro";  //nombre del campo en la tabla
    $valor = $_GET["idRegistro"];  //nombre del parámetro en la liga
    $usuario = ControladorFormularios::ctrSeleccionarRegistros($item, $valor);

} else {
    session_destroy();
    echo '<script>
        window.location = "index.php?pagina=ingreso";
      </script>';
    return;
}


?>

<div class="d-flex justify-content-center text-center">
    <form class="p-5 bg-light" method="post">

    <div class="form-group">
            <label for="idRegistro">idRegistro:</label>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-user"></i>
                    </span>
                </div>
                <input type="text" class="form-control" 
                    value="<?php echo $usuario["idRegistro"]; ?>"
                    placeholder="Ingresa tu idRegistro" id="idRegistro" 
                    name="actualizaridRegistro" required>
            </div>    
    
    <div class="form-group">
            <label for="nombre">Nombre:</label>

            <div class="input-group">
                </span>
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-user"></i>
                </div>
                <input type="text" class="form-control" 
                    value="<?php echo $usuario["nombre"]; ?>"
                    placeholder="Ingresa tu nombre" id="nombre" 
                    name="actualizarNombre" required>
            </div>
            
        </div>

        <div class="form-group">
            <label for="direccion">Dirección:</label>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-envelope"></i>
                    </span>
                </div>
                <input type="direccion" class="form-control" 
                    value="<?php echo $usuario["direccion"]; ?>"
                    placeholder="Ingresa tu direccion" id="direccion" name="actualizarDireccion">
            </div>
            
        </div>

        <div class="form-group">
            <label for="tel_cel">Telefono:</label>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-user"></i>
                    </span>
                </div>
                <input type="text" class="form-control" 
                    value="<?php echo $usuario["tel_cel"]; ?>"
                    placeholder="Ingresa tu tel_cel" id="tel_cel" 
                    name="actualizarTel_cel" required>
            </div>

        <div class="form-group">
            <label for="pwd">Contraseña:</label>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-lock"></i>
                    </span>
                </div>
                <input type="password" class="form-control" 
                    placeholder="Ingresa contraseña si cambia" id="pwd" 
                    name="actualizarPassword">
            </div>
            
        </div>
        <!-- información oculta -->
        <input type="hidden" name="passwordActual" value="<?php echo $usuario["password"]; ?>">
        <input type="hidden" name="idRegistro" value="<?php echo $usuario["id"]; ?>">

        <?php 
        $actualizar = ControladorFormularios::ctrActualizarRegistro();

        //verificar la actualización
        if($actualizar == "ok"){
            echo '<script>
                if(window.history.replaceState){
                    window.history.replaceState(null,null,window.location.ref);
                }
            </script>';

            echo '<div class="alert alert-success">El usuario ha sido actualizado</div>';

            echo '<script>
                setTimeout(function(){
                    window.location = "index.php?pagina=inicio";
                },3000);
            </script>';
        }
        
        ?>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>