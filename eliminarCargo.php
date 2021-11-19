<?php
    include("conexion.php");
    $id = $_GET["id"];

    $query = 'DELETE FROM cargos WHERE id = '.$id.'';
    $delete = mysqli_query($conexion,$query);
    if("$delete"){
        echo"<script>window.location='cargos.php';</script>";
    }
?>