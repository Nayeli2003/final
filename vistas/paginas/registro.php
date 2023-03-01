<div class="d-flex justify-content-center text-center">
    <form class="p-5 bg-light" method="post">

        <div class="form-group">
            <label for="Id">ID Trabajador:</label>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-user"></i>
                    </span>
                </div>
                <input type="text" class="form-registro" 
                    placeholder="Ingresa tu Id" id="Id" 
                    name="registroId" required>
            </div>
            
        </div>

        <div class="form-group">
            <label for="cargo">Cargo:</label>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                    <i class="fas fa-user"></i>
                    </span>
                </div>
                <input type="cargo" class="form-registro" 
                    placeholder="Ingresa tu Cargo" id="cargo" 
                    name="registroCargo" required>
            </div>
            
        </div>

        <div class="form-group">
            <label for="nombre">Nombre:</label>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                    <i class="fas fa-user"></i>
                    </span>
                </div>
                <input type="nombre" class="form-registro" 
                    placeholder="Ingresa tu nombre" id="nombre" 
                    name="registroNombre" required>
            </div>
            
        </div>

        <div class="form-group">
            <label for="apPaterno">Apellido paterno:</label>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                    <i class="fas fa-user"></i>
                    </span>
                </div>
                <input type="apPaterno" class="form-registro" 
                    placeholder="Ingresa tu apellido paterno" id="apat" 
                    name="registroapPaterno" required>
            </div>
            
        </div>

        <div class="form-group">
            <label for="apMaterno">Apellido materno:</label>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                    <i class="fas fa-user"></i>
                    </span>
                </div>
                <input type="apMaterno" class="form-registro" 
                    placeholder="Ingresa tu apellido materno" id="apMaterno" 
                    name="registroapMaterno" required>
            </div>
            
        </div>

        <div class="form-group">
            <label for="tel">Telefono:</label>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                    <i class="fas fa-user"></i>
                    </span>
                </div>
                <input type="tel" class="form-registro" 
                    placeholder="Ingresa tu Telefono" id="tel" 
                    name="registroTel" required>
            </div>
            
        </div>

        <div class="form-group">
            <label for="direccion">Direccion:</label>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                    <i class="fas fa-user"></i>
                    </span>
                </div>
                <input type="direccion" class="form-registro" 
                    placeholder="Ingresa tu direccion" id="direccion" 
                    name="registroDireccion" required>
            </div>
            
        </div>

        <div class="form-group">
            <label for="fechaNacimiento">Fecha de nacimiento:</label>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                    <i class="fas fa-user"></i>
                    </span>
                </div>
                <input type="salario" class="form-registro" 
                    placeholder="Ingresa tu fecha de nacimiento" id="fechaNacimiento" 
                    name="registroSalario" required>
            </div>
            
        </div>



        <div class="form-group">
            <label for="password">Contraseña:</label>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-lock"></i>
                    </span>
                </div>
                <input type="password" class="form-registro" 
                    placeholder="Ingresa tu contraseña" id="password" 
                    name="registroPassword" required>
            </div>
            
        </div>

        <?php 
        /*************************************
         * Instancia de un método no estáctico
         *************************************/
        //$registro = new ControladorFormularios();
        //$registro -> ctrRegistro();
        /*************************************
         * Instancia de un método estáctico
         *************************************/
        $registro = ControladorFormularios::ctrregistro();

        //validar si se registro
        if ($registro == "ok"){
            
            #Eliminar el cache
            echo '<script>
                if(window.history.replaceState) {
                    window.history.replaceState(null,null,window.location.href);
                }
            </script> ';
            
            
            echo '<div class="alert alert-success">El usuario ha sido registrado</div>';
        }

        if ($registro == "error"){
            
            #Eliminar el cache
            echo '<script>
                if(window.history.replaceState) {
                    window.history.replaceState(null,null,window.location.href);
                }
            </script> ';
            
            
            echo '<div class="alert alert-danger">Error no se permite caracteres especiales</div>';
        }
        ?>

        <button type="submit" class="btn btn-danger">Enviar</button>
    </form>
</div>