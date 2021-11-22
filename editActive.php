<?php
    include('conexion.php');
        $id = $_POST['id'];
        $codigo = $_POST['codigo'];   
        $referencia = $_POST['referencia'];   
        $serial = $_POST['serial'];   
        $dependencia = $_POST['dependencia'];   
        $oficina = $_POST['oficina'];   
        $proveedor = $_POST['proveedor'];   
        $estado = $_POST['estado'];   
        $fCompra = $_POST['fCompra'];   
        $fGarantia = $_POST['fGarantia'];   
        $depreciacion = $_POST['depreciacion'];   
        $responsable = $_POST['responsable'];       
        $query = 'UPDATE activos SET codigo="'.$codigo.'",referencia="'.$referencia.'",serial="'.$serial.'",
        dependencia="'.$dependencia.'",oficina="'.$oficina.'",proveedor="'.$proveedor.'",estado="'.$estado.'",
        fechaCompra="'.$fCompra.'",fechaGarantia="'.$fGarantia.'",depreciacion="'.$depreciacion.'",responsable="'.$responsable.'" WHERE id = '.$id.'';
        $edit = mysqli_query($conexion,$query);
        if("$edit"){
            echo"<script>window.location='activos.php';</script>";
        }
?>