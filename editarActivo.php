<?php
    include('conexion.php');
    session_start();
    $nombre = $_SESSION['nombre'];
    $tipoPermiso = $_SESSION['permiso'];
    $id = $_GET['id'];
    $query = 'SELECT * FROM activos WHERE id = '.$id.'';
    $edit = mysqli_query($conexion,$query);
    $row = $edit->fetch_object();    
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
                        <li><a class="dropdown-item" href="#!">Configuración</a></li>
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
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseActivos" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Activos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseActivos" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">                                    
                                    <a class="nav-link" href="crearActivo.php">Crear Activo</a>                                   
                                    <a class="nav-link" href="crearUsuario.php">Editar Activo</a>
                                </nav>
                            </div>
                            <?php if($tipoPermiso == "Administrador") {?>
                            <div class="sb-sidenav-menu-heading">configuración</div>                                                     
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
                    <div class="container-fluid row">
                        <h2 class="text-center mt-3">Crear Activo</h2>                        
                        <form action="editActive.php" method="post" class="mt-3 w-50 m-auto row row-cols-2">
                            <div class="col">
                                <label class="form-label">Codigo</label>
                                <input class="form-control" type="text" name="codigo" value="<?php echo $row->codigo ?>">
                            </div>
                            <div class="col">
                                <label class="form-label">Referencia</label>
                                <input class="form-control" type="text" name="referencia" value="<?php echo $row->referencia ?>">
                            </div>
                            <div class="col">
                                <label class="form-label">Serial</label>
                                <input class="form-control" type="text" name="serial" value="<?php echo $row->serial ?>">
                            </div>
                            <div class="col">
                                <label class="form-label">Dependencia</label>
                                <select class="form-select" name="dependencia" id="">
                                <?php
                                    $sentencia = "SELECT * FROM dependencias";
                                    $lista = mysqli_query($conexion,$sentencia);                   
                                    while ($valores = mysqli_fetch_array($lista)) {                                            
                                        echo '<option value="'.$valores['dependencia'].'">'.$valores['dependencia'].'</option>';
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="col">
                                <label class="form-label">Oficina</label>
                                <select class="form-select" name="oficina" id="">
                                <?php
                                    $sentencia = "SELECT * FROM oficinas";
                                    $lista = mysqli_query($conexion,$sentencia);                   
                                    while ($valores = mysqli_fetch_array($lista)) {                                            
                                        echo '<option value="'.$valores['oficina'].'">'.$valores['oficina'].'</option>';
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="col">
                                <input class="form-control" type="hidden" name="id" value="<?php echo $row->id ?>">
                                <label class="form-label">Proveedor</label>
                                <select class="form-select" name="proveedor" id="">
                                    <option value=""><?php echo $row->proveedor ?></option>
                                <?php
                                    $sentencia = "SELECT * FROM proveedores";
                                    $lista = mysqli_query($conexion,$sentencia);                   
                                    while ($valores = mysqli_fetch_array($lista)) {                                            
                                        echo '<option value="'.$valores['razonSocial'].'">'.$valores['razonSocial'].'</option>';
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="col">
                                <label class="form-label">Estado</label>
                                <select class="form-select" name="estado" id="">
                                    <option value=""><?php echo $row->estado ?></option>
                                    <option value="Uso">Uso</option>
                                    <option value="Inactivo">Inactivo</option>
                                    <option value="Arrendado">Arrendado</option>
                                </select>
                            </div>
                            <div class="col">
                                <label class="form-label">F. Compra</label>
                                <input class="form-control" type="date" name="fCompra" value="<?php echo $row->fechaCompra ?>">
                            </div>
                            <div class="col">
                                <label class="form-label">F. Garantia</label>
                                <input class="form-control" type="date" name="fGarantia" value="<?php echo $row->fechaGarantia ?>">
                            </div>
                            <div class="col">
                                <label class="form-label">Depreciacion</label>
                                <input class="form-control" type="number" name="depreciacion" value="<?php echo $row->depreciacion ?>">
                                </div>                            
                            <div class="col">
                                <label class="form-label">Responsable</label>
                                <select class="form-select" name="responsable" id="">
                                    <option value=""><?php echo $row->responsable ?></option>
                                <?php
                                    $sentencia = "SELECT * FROM responsables";
                                    $lista = mysqli_query($conexion,$sentencia);                   
                                    while ($valores = mysqli_fetch_array($lista)) {                                            
                                        echo '<option value="'.$valores['nombre'].'">'.$valores['nombre'].'</option>';
                                    }
                                ?>
                                </select>
                            </div>                            
                            <div class="col">
                                <label class="form-label" for=""></label>
                                <input class="btn btn-primary form-control" type="submit" value="Guardar">
                            </div>
                        </form>
                    </div>  
                    <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Codigo</th>
                                            <th>Referencia</th>
                                            <th>Serial</th>
                                            <th>Dependencia</th>
                                            <th>Oficina</th>
                                            <th>Proveedor</th>
                                            <th>Estado</th>
                                            <th>F. Compra</th>
                                            <th>F. Garantia</th>
                                            <th>Depreciacion</th>
                                            <th>Responsable</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include("conexion.php");
				                    $sql = "SELECT * FROM activos";
    	                			$ejecutar = $conexion->query($sql);
	        			            while ($filas = $ejecutar->fetch_object()){
                					    echo "<tr>";					
			                		    echo "<td class='text-center'>".$filas->codigo."</td>";            	    				       			                		
			                		    echo "<td class='text-center'>".$filas->referencia."</td>";            	    				       			                		
			                		    echo "<td class='text-center'>".$filas->serial."</td>";            	    				       			                		
			                		    echo "<td class='text-center'>".$filas->dependencia."</td>";            	    				       			                		
			                		    echo "<td class='text-center'>".$filas->oficina."</td>";            	    				       			                		
			                		    echo "<td class='text-center'>".$filas->proveedor."</td>";            	    				       			                		
			                		    echo "<td class='text-center'>".$filas->estado."</td>";            	    				       			                		
			                		    echo "<td class='text-center'>".$filas->fechaCompra."</td>";            	    				       			                		
			                		    echo "<td class='text-center'>".$filas->fechaGarantia."</td>";            	    				       			                		
			                		    echo "<td class='text-center'>".$filas->depreciacion."</td>";            	    				       			                		
			                		    echo "<td class='text-center'>".$filas->responsable."</td>";            	    				       			                		
	    			    	            echo "<td class='text-center'>
    				        		            <a class='btn btn-info' href='editarActivo.php?id=".$filas->id."'>Editar</a>
        						                <a class='btn btn-danger' href='eliminarCargo.php?id=".$filas->id."'>eliminar</a>	
						                    </td>";
					                    echo "</tr>";
				                        }			
			                        ?>                                                                               
                                    </tbody>
                                </table>
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
