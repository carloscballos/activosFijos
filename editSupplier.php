<?php
    include('conexion.php');
        $id = $_POST['id'];
        $nit = $_POST['nit'];        
        $razonSocial = $_POST['razonSocial'];        
        $query = 'UPDATE proveedores SET nit="'.$nit.'", razonSocial="'.$razonSocial.'" WHERE id = '.$id.'';
        $edit = mysqli_query($conexion,$query);
        if("$edit"){
            echo"<script>window.location='proveedores.php';</script>";
        }
?>