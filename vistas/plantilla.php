<?php 
session_start();  #iniciar sesion
?>
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALIT-BURGUER</title>
    <!--===================================================================
    plugins de CSS
    =======================================================================-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="vistas/css/bootstrap.css">
 
    <!--===================================================================
    plugins de JS
    =======================================================================-->
    <!-- jQuery library -->
    <script src="vistas/js/jquery-3.6.1.min.js"></script>

    <!-- Popper JS -->
    <script src="vistas/js/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="vistas/js/bootstrap.js"></script>

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/e632f1f723.js" crossorigin="anonymous"></script>

    

</head>

<body>
    <!--================================================================
    Logotipo
    =====================================================================-->
    <header class="container-fluid">
        <h3 class="bg-warning text-danger text-center" >ALIT-BURGUER</h3>
    </header>
    <!--================================================================
    Botonera --- Barra de navegación
    =====================================================================-->
    
    <div class="container p-3 my-3 bg-dark text-white">
        <nav class="container">
            <ul class="nav nav-justified py-2 nav-pills ">
                <?php if(isset($_GET["pagina"])): ?>
                    <!-- Enlace de registro -->
                    <?php if($_GET["pagina"] == "registro"): ?>
                        <li class="nav-item">
                            <a href="index.php?pagina=registro" class="nav-link active 
                            bg-danger navbar-dark ">REGISTRO</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a href="index.php?pagina=registro" class="nav-link text-white">REGISTRO</a>
                        </li>
                    <?php endif ?>

                    <!-- Enlace de ingreso -->
                    <?php if($_GET["pagina"] == "ingreso"): ?>
                        <li class="nav-item">
                            <a href="index.php?pagina=ingreso" class="nav-link active 
                            bg-danger navbar-dark">INGRESO</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item ">
                            <a href="index.php?pagina=ingreso" class="nav-link text-white">INGRESO</a>
                        </li>
                    <?php endif ?>

                    <!-- Enlace de inicio -->
                    <?php if($_GET["pagina"] == "inicio"): ?>
                        <li class="nav-item">
                            <a href="index.php?pagina=inicio" class="nav-link active 
                            bg-danger navbar-dark">TRABAJADORES</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a href="index.php?pagina=inicio" class="nav-link text-white">TRABAJADORES</a>
                        </li>
                    <?php endif ?>

                    <?php if($_GET["pagina"] == "proveedores"): ?>
                        <li class="nav-item">
                            <a href="index.php?pagina=proveedores" class="nav-link active 
                            bg-danger navbar-dark">PROVEEDORES</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a href="index.php?pagina=proveedores" class="nav-link text-white">PROVEEDORES</a>
                        </li>
                    <?php endif ?>

                    <?php if($_GET["pagina"] == "inventario"): ?>
                        <li class="nav-item">
                            <a href="index.php?pagina=inventario" class="nav-link active 
                            bg-danger navbar-dark">INVENTARIO</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a href="index.php?pagina=inventario" class="nav-link text-white">INVENTARIO</a>
                        </li>
                    <?php endif ?>

                    <?php if($_GET["pagina"] == "productos"): ?>
                        <li class="nav-item">
                            <a href="index.php?pagina=productos" class="nav-link active 
                            bg-danger navbar-dark">PRODUCTO</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a href="index.php?pagina=productos" class="nav-link text-white">PRODUCTO</a>
                        </li>
                    <?php endif ?>

                    <!-- Enlace de salir -->
                    <?php if($_GET["pagina"] == "salir"): ?>
                        <li class="nav-item">
                            <a href="index.php?pagina=salir" class="nav-link active 
                            bg-danger navbar-dark">SALIR</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a href="index.php?pagina=salir" class="nav-link text-white">SALIR</a>
                        </li>
                    <?php endif ?>

                <?php else: ?>
                <li class="nav-item ">
                    <a href="index.php?pagina=registro" class="nav-link ">REGISTRO</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?pagina=ingreso" class="nav-link active">INGRESO</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?pagina=inicio" class="nav-link">TRABAJADORES</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?pagina=proveedores" class="nav-link">PROVEEDORES</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?pagina=inventario" class="nav-link">INVENTARIO</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?pagina=productos" class="nav-link">PRODUCTO</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?pagina=salir" class="nav-link">SALIR</a>
                </li>
                <?php endif ?>
            </ul>
        </nav>
    </div>
    <!--================================================================
    Contenido
    =====================================================================-->
    <div class="container">
        <div class="container py-5">
            <?php 
            #isset() Determina si una variable está defina y no es NULL
            if (isset($_GET["pagina"])) {
                #Verificar mis páginas blancas --- evitar valores no permitidos
                if( $_GET["pagina"] == "registro" || 
                    $_GET["pagina"] == "ingreso" ||
                    $_GET["pagina"] == "inicio" ||
                    $_GET["pagina"] == "proveedores" ||
                    $_GET["pagina"] == "inventario" ||
                    $_GET["pagina"] == "productos" ||
                    $_GET["pagina"] == "editar" ||
                    $_GET["pagina"] == "salir" ){

                        include "paginas/" . $_GET["pagina"] . ".php";

                } else {
                    include "paginas/error404.php";
                }

            } else {
                include "paginas/ingreso.php";
            }
            
            ?>
        </div>
    </div>
</body>

</html>