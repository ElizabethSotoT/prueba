<?php 

if(!empty($_POST["btnregistrar"])){

    if(!empty($_POST["sku"]) 
        and !empty($_POST["articulo"]) 
        and !empty($_POST["marca"]) 
        and !empty($_POST["modelo"]) 
        and !empty($_POST["dep"]) 
        and !empty($_POST["clases"]) 
        and !empty($_POST["familias"]) 
        and !empty($_POST["stock"]) 
        and !empty($_POST["cantidad"])
    ){
        $sku=$_POST["sku"];
        $articulo=$_POST["articulo"];
        $marca=$_POST["marca"];
        $modelo=$_POST["modelo"];
        $id_dep=$_POST["dep"];
        $clase = explode("-", $_POST['clases']);
        $id_clase=$clase[0];
        $nombre_clase=$clase[1];
        $fam = explode("-", $_POST['familias']);
        $id_fam=$fam[0];
        $nombre_fam=$fam[1]; 
        $stock=$_POST["stock"];
        $cantidad=$_POST["cantidad"];

 /*       echo $sku;
        echo $articulo;
        echo $marca;
        echo $modelo;
        echo $id_dep;
        echo $id_clase;
        echo $nombre_clase;
        echo $id_fam;
        echo $nombre_fam;
        echo $stock;
        echo $cantidad;
*/
        $sql=$conection->query(" call articulo_alta($sku, '$articulo', '$marca', '$modelo', $id_dep, $id_clase, '$nombre_clase', $id_fam, '$nombre_fam', '$stock', '$cantidad')");
        if ($sql==1){
            echo '<div class="alert alert-success"> Artículo registrado correctamente</div>';
            header("location:../articulo/index.php");
        }else{
            echo '<div class="alert alert-danger">Error al registrar artículo</div>';
        }

    }else{
        echo '<div class="alert alert-waring">Uno de los campos esta vacío</div>';
    }
}
?>