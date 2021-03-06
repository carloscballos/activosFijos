<?php
    include('conexion.php');
    session_start();
    $nombre = $_SESSION['nombre'];
    $tipoPermiso = $_SESSION['permiso'];
    if($_POST){
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena =sha1($_POST['contrasena']);
    $cargo = $_POST['cargo'];
    $permiso = $_POST['permiso'];
    $query = "INSERT INTO usuarios (nombre,correo,contrasena,cargo,tipoPermiso) VALUES ('$nombre','$correo','$contrasena','$cargo','$permiso')";
    $insert = mysqli_query($conexion,$query);
    if("$insert"){
        echo "<script>alert('Se creo el usuario correctamente'); window.location='usuarios.php';</script>";
    }
}   
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="home.php">Activos Fijos</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <ul class="navbar-nav ms-auto me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $nombre; ?>
                        <i class="fas fa-user fa-fw"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Configuraci??n</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="cierreSesion.php">Cerrar Sesion</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Principal</div>
                            <a class="nav-link" href="home.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Tablero
                            </a>
                            <a class="nav-link" href="activos.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Activos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>                            
                            <?php if($tipoPermiso == "Administrador") {?>
                            <div class="sb-sidenav-menu-heading">configuraci??n</div>                                                     
                            <div>
                                <a class="nav-link" href="usuarios.php">Usuarios</a>  
                                <a class="nav-link" href="dependencias.php">Dependencias</a>   
                                <a class="nav-link" href="oficinas.php">Oficinas</a>   
                                <a class="nav-link" href="proveedores.php">Proveedores</a>   
                                <a class="nav-link" href="cargos.php">Cargos</a>   
                            </div>
                            <?php } ?>  
                        </div>
                    </div>                            
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h2 class="text-center mt-3">Crear Usuario</h2>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="mt-3 w-50 m-auto">
                            <label class="form-label">Nombre</label>
                            <input class="form-control" type="text" name="nombre">
                            <label class="form-label">Correo</label>
                            <input class="form-control" type="email" name="correo">
                            <label class="form-label">Contrase??a</label>
                            <input class="form-control" type="password" name="contrasena">
                            <label class="form-label">Cargo</label>
                            <select class="form-select" name="cargo" id="">
                                <?php
                                    $sentencia = "SELECT * FROM cargos";
                                    $lista = mysqli_query($conexion,$sentencia);                   
                                    while ($valores = mysqli_fetch_array($lista)) {                                            
                                        echo '<option value="'.$valores['cargo'].'">'.$valores['cargo'].'</option>';
                                    }
                                ?>
                            </select>
                            <label class="form-label">Permiso</label>
                            <select class="form-select" name="permiso" id="">
                                <option value="Administrador">Administrador</option>
                                <option value="Usuario">Usuario</option>
                            </select>
                            <br>
                            <input class="btn btn-primary" type="submit" value="Guardar">
                        </form>
                    </div>  
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
