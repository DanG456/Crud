<?php

    function sube_imagen(){
        if(isset($_FILES["imagen_usuario"])){
            $extension = explode('.', $_FILES["imagen_usuario"]['name']);
            $nuevo_nombre = rand(). '.' . $extension[1];
            $ubicacion = './img/' . $nuevo_nombre;
            move_uploaded_file($_FILES["imagen_usuario"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }

?>