<div class="d-flex justify-content-center text-center">
    <form class="p-5 bg-light" method="post">

        <div class="form-group">
            <label for="idRegistro">ID Registro:</label>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                    <i class="fas fa-user"></i>
                    </span>
                </div>
                <input type="idRegistro" class="form-control" 
                    placeholder="Ingresa tu idRegistro" id="idRegistro" 
                    name="ingresoidRegistro" required>
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
                <input type="password" class="form-control" 
                    placeholder="Ingresa tu contraseña" id="password" 
                    name="ingresoPassword" required>
            </div>
            
        </div>

        <?php 
        $ingreso = new ControladorFormularios();
        $ingreso -> ctrIngreso();
        
        ?>
       
        <button type="submit" class="btn btn-danger">Ingresar</button>
    </form>
</div>
