<?php 

if(!empty($_POST["btnupdate"])){

    if( !empty($_POST["id"])
        and!empty($_POST["sku"]) 
        and !empty($_POST["articulo"]) 
        and !empty($_POST["marca"]) 
        and !empty($_POST["modelo"])
        and !empty($_POST["dep"]) 
        and !empty($_POST["class"]) 
        and !empty($_POST["fam"]) 
        and !empty($_POST["stock"]) 
        and !empty($_POST["cantidad"])
        and isset($_POST['descontinuado'])
        and isset($_POST['fecha_baja'])){
        
        $sku_bf=$_POST["id"];
        $sku=$_POST["sku"];
        $articulo=$_POST["articulo"];
        $marca=$_POST["marca"];
        $modelo=$_POST["modelo"];
        $id_dep=$_POST["dep"];
        $clase = explode("-", $_POST["class"]);
        $id_clase=$clase[0];
        $nombre_clase=$clase[1];
        $fam = explode("-", $_POST["fam"]);
        $id_fam=$fam[0];
        $nombre_fam=$fam[1];
        $stock=$_POST["stock"];
        $cantidad=$_POST["cantidad"];
        $descontinuado=$_POST["descontinuado"];
        $fecha_baja=$_POST["fecha_baja"];
        echo $fecha_baja;
        if($descontinuado == 1){
            $fecha_baja = date("Y-m-d");
        }else

        echo $fecha_baja;
        echo $id_clase;
            $sql=$conection->query(" call articulo_act($sku_bf, $sku, '$articulo', '$marca', '$modelo', $id_dep, $id_clase, '$nombre_clase', $id_fam, '$nombre_fam', '$stock', '$cantidad', '$descontinuado', '$fecha_baja')");
            if ($sql==1){
                echo '<div class="alert alert-success"> Artículo actualizado correctamente</div>';
                header("location:../articulo/index.php");
            }else{
                echo '<div class="alert alert-danger">Error al actualizar artículo</div>';
            }

        
    }else{
        echo '<div class="alert alert-waring">Campo vacío</div>';
    }
}
?>