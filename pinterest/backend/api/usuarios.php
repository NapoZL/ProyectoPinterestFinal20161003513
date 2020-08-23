<?php
    session_start();
    header("Content-Type: application/json"); 
    include_once("../class/class-usuario.php");
    if(!isset($_SESSION["token"])){
        echo '{"mensaje": "Acceso no Autorizado"}';
        exit;
    }
    if(!isset($_COOKIE["token"])){
        echo '{"mensaje": "Acceso no Autorizado"}';
        exit;
    }
    if($_SESSION["token"] != $_COOKIE["token"]){
        echo '{"mensaje": "Acceso no Autorizado"}';
        exit;  
    }
    
    switch($_SERVER['REQUEST_METHOD']){
        case 'POST':
            //guardar
        break;
        case 'GET':
            if (isset($_GET['id'])){
                Usuario::obtenerUsuario($_GET['id']);
                //$resultado["mensaje"] = "Retornar el usuario con el id: ". $_GET['id'];
                //echo json_encode($resultado);
            }else{
                Usuario::obtenerUsuarios();
                //$resultado["mensaje"] = "Retornar todos los usuarios";
                //echo json_encode($resultado);
            }
        case 'PUT':
            //Actualizar
        break;
        case 'DELETE':
            //eliminar
        break;
    }

?>