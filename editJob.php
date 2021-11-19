<?php
    include('conexion.php');
        $id = $_POST['id'];
        $cargo = $_POST['cargo'];        
        $query = 'UPDATE cargos SET cargo="'.$cargo.'" WHERE id = '.$id.'';
        $edit = mysqli_query($conexion,$query);
        if("$edit"){
            echo"<script>window.location='cargos.php';</script>";
        }
?>