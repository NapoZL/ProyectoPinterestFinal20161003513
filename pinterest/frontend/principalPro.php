<?php
  session_start();
  if(!isset($_SESSION["token"]))
  header("Location: 401.html");

  if(!isset($_COOKIE["token"]))
  header("Location: 401.html");

  if($_SESSION["token"] != $_COOKIE["token"])
  header("Location: 401.html"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinterest</title>
    <link rel="stylesheet" href="css/estilos-p.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/favicons.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/ed3fe56a91.js" crossorigin="anonymous"></script>
</head>
<body>
    <!--NAVBAR-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img class="logo" src="img/logo.png" alt="">
        <a class="navbar-brand" href="#">Inicio</a>
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="navbar-brand" href="#">Siguiendo</a>
                <a href="logout.php">Cerrar Sesion</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="search" class="form-control mr-sm-2" type="search" style="width: 780px" placeholder="🔎 Search" aria-label="Search">
                    <button class="btn-navar"><i class="fas fa-bell"></i></button><!--Notificaciones-->
                    <button class="btn-navar"><i class="fas fa-comment-dots"></i></button><!--Bandeja de entrada-->
                    <button class="btn-navar" type="button" onclick="perfil()"><i class="fas fa-user-circle"></i></button><!--Perfil-->
                    <select id="usuarios" class="form-control" style="width: 10px;" onchange="cambiarUsuario()">
                    </select>
                    

          </form>

      </nav>
      <form action="">
    <div id="nPost">
      <button id="nPost2" type="button" data-toggle="modal" data-target="#nuevo-post" ><i class="fas fa-plus"></i></button>
      </div>
    </form>
    <div class="modal fade" id="nuevo-post" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Nuevo post</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <textarea class="form-control" id="contenido-post" placeholder="Escribe algo"></textarea>
              <input id="url-imagen" type="text" class="form-control" placeholder="Url-imagen">            
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-danger" onclick="guardarPost()">Publicar</button>
            </div>
          </div>
        </div>
      </div>
    <!--cards-->

    <div class="card-columns" class="container-fluid">

            <div class="row">
            <div id="posts2">
                
                </div>
            </div>
               
    </div>
        
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>  
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    
    <script src="js/funciones2.js"></script>
        
</body>
</html>