<?php

    function sube_imagen(){
        #Isset determina si la variable está definida y no es NULL
        if(isset($_FILES["imagen_usuario"])){#$_FILES es un array de los elementos subidos con el metodo POST
            $extension = explode('.', $_FILES["imagen_usuario"]['name']);#El primer elemento es el delimitador y el segundo es la cadena de entrada
            $nuevo_nombre = rand() . '.' . $extension[1]; #Genera nuevo nombre para que no se repita para ninguna imagen y se borren en consecuencia
            $ubicacion = './img/' . $nuevo_nombre;
            move_uploaded_file($_FILES["imagen_usuario"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }

    function obtener_nombre_img($id_user){
        include('conexion.php');
        $stmt = $conexion->prepare("SELECT imagen FROM usuarios WHERE id='$id_user'");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            return $fila["imagen"];
        }
    }

    function obtener_todos_registros(){
        include('conexion.php');
        $stmt = $conexion->prepare("SELECT * FROM usuarios");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        return $stmt->rowCount();
    }
?>