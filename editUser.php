<?php
    include('conexion.php');
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $contrasena = sha1($_POST['contrasena']);
        $cargo = $_POST['cargo'];
        $tipoPermiso = $_POST['permiso'];
        $query = 'UPDATE usuarios SET nombre="'.$nombre.'",correo="'.$correo.'",contrasena="'.$contrasena.'",cargo="'.$cargo.'",tipoPermiso="'.$tipoPermiso.'" WHERE id = '.$id.'';
        $edit = mysqli_query($conexion,$query);
        if("$edit"){
            echo"<script>window.location='usuarios.php'; alert('Se edito el usuario correctamente');</script>";
        }
?>