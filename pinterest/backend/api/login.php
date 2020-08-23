<?php
    session_start();
    header("Content-Type: application/json"); 
    include_once("../class/class-usuario.php");
    $_POST = json_decode(file_get_contents('php://input'),true);
    switch($_SERVER['REQUEST_METHOD']){
        case 'POST':
            $usuario = Usuario::validarUsuario($_POST['correo'], $_POST['contrasena']);
            if ($usuario){
                //echo '{"codigoResultado":1, "mensaje": "Usuario autentificado", "token": "'.sha1(uniqid(rand(),true)).'"}';
                $resultado = array(
                    "codigoResultado"=>1,
                    "mensaje"=>"Usuario autenticado",
                    "token"=>sha1(uniqid(rand(),true)) 
                );
                $_SESSION["token"] = $resultado["token"];
                setcookie("token",$resultado["token"],time()+(60*60*24*31),"/");
                setcookie("codigoUsuario", $usuario["codigoUsuario"], time()+(60*60*24*31),"/");
                setcookie("nombre", $usuario["nombre"], time()+(60*60*24*31),"/");
                setcookie("apellido", $usuario["apellido"], time()+(60*60*24*31),"/");
                echo json_encode($resultado);
            }else{
                setcookie("token","",time()-1,"/");
                setcookie("codigoUsuario", "", time()-1,"/");
                setcookie("nombre", "", time()-1,"/");
                setcookie("apellido", "", time()-1,"/");
                echo '{"codigoResultado":0, "mensaje": "Usuario/Password incorrectos"}';
            }//echo json_encode($_POST);
        break;
    }

?>