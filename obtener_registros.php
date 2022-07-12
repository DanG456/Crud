<?php

    include("conexion.php");
    include("funciones.php");

    $query = "";
    $salida = array();#Regresara los datos en formato json

    $query = "SELECT * FROM usuarios ";

    #If para filtar por la barra de busqueda con los parametros de nombre o apellidos
    if(isset($_POST["search"]["value"])){
        $query .= 'WHERE nombre LIKE "%' . $_POST["search"]["value"] . '%" '; #Equivale a añadir el where al valor previo de query para filtrar la consulta
        $query .= 'OR apellidos LIKE "%' . $_POST["search"]["value"] . '%" '; #Equivale a añadir el where al valor previo de query para filtrar la consulta
    }

    #Para saber si se intento ordenar la tabla por medio de alguno de los criterios
    if(isset($_POST["order"]["value"])){
        $query .= 'ORDER BY' . $_POST["order"]['0']['column'] .' '.
        $_POST["order"][0]['dir'] . ' '; #Equivale a añadir el where al valor previo de query para filtrar la consulta
        
    }else{
        $query .= 'ORDER BY id DESC ';
    }

    #Checa que por lo menos haya un registro
    if($_POST["length"] != -1){
        $query .= 'LIMIT ' . $_POST["start"] . ','. $_POST["length"];
    }

    $stmt = $conexion->prepare($query);
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    $datos = array();
    $filtered_rows = $stmt->rowCount();

    foreach($resultado as $fila){
        $imagen = '';
        if($fila["imagen"] != ''){
            $imagen = '<img src="img/>' . $fila["imagen"] . '"class="img-thumbnail" width="50" height="50"';
        }else{
            $imagen = '';
        }

        $sub_array = array();

        $sub_array[] = $fila["id"];
        $sub_array[] = $fila["nombre"];
        $sub_array[] = $fila["apellidos"];
        $sub_array[] = $fila["telefono"];
        $sub_array[] = $fila["email"];
        $sub_array[] = $imagen;
        $sub_array[] = $fila["fecha_creacion"];

        $sub_array[] = '<button type="button" name="editar" id="'.$fila["id"].'" class="btn btn-warning btn-xs
        editar">Editar</button>';

        $sub_array[] = '<button type="button" name="borrar" id="'.$fila["id"].'" class="btn btn-warning btn-xs
        borrar">Borrar</button>';

        $datos[] = $sub_array;
    }

    #Parametros necesarios para DataTables
    $salida = array(
        "draw"=> intval($_POST["draw"]),
        "recordsTotal" => $filtered_rows,
        "recordsFiltered" => obtener_todos_registros(),
        "data" => $datos
    );

    echo json_encode($salida)
?>