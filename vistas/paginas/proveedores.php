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

$usuarios = ControladorFormulariosP::ctrSeleccionarRegistroP(null, null);
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>Nombre</th>
            <th>tipo</th>
            <th>Fecha</th>
            <th>Precio</th>
            <th>Precio Unidad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($usuarios as $key => $value): ?>
        <tr>
            <td><?php echo ($key+1); ?></td>
            <td><?php echo $value["id_proveedor"]; ?></td>
            <td><?php echo $value["nom_proveedor"]; ?></td>
            <td><?php echo $value["tipo"]; ?></td>
            <td><?php echo $value["fecha"]; ?></td>
            <td><?php echo $value["precio"]; ?></td>
            <td><?php echo $value["precio_unidad"]; ?></td>
            <td>
                <div class="btn-group">
                    <div class="px-1">
                        <a href="index.php?pagina=editar&id=<?php echo $value["id"]; ?>" class="btn btn-warning">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </div>
                    <div class="px-1">

                        <form method="post">
                            <input type="hidden" name="eliminarRegistro" 
                                value="<?php echo $value["id"]; ?>" >
                                
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                        <?php 
                            $eliminar = new ControladorFormularios();
                            $eliminar->ctrEliminarRegistro();
                        ?>
                    </div>
                </div>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>