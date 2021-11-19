<?php
    include('conexion.php');
        $id = $_POST['id'];
        $dependencia = $_POST['dependencia'];        
        $query = 'UPDATE dependencias SET dependencia="'.$dependencia.'" WHERE id = '.$id.'';
        $edit = mysqli_query($conexion,$query);
        if("$edit"){
            echo"<script>window.location='dependencias.php';</script>";
        }
?>