<?php
    $conexion = mysqli_connect("localhost","root","","activos");
    if(!$conexion){
        echo"conexion Fallida";
    }