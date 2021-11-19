<?php
    include('conexion.php');
        $id = $_POST['id'];
        $oficina = $_POST['oficina'];              
        $query = 'UPDATE oficinas SET oficina="'.$oficina.'" WHERE id = '.$id.'';
        $edit = mysqli_query($conexion,$query);
        if("$edit"){
            echo"<script>window.location='oficinas.php';</script>";
        }
?>