var codigoUser;
mostrarPosts();

function mostrarPosts(){

    axios({
        url:'../backend/api/posts.php?idUsuario=1',
        method: 'get',
        responseType: 'json'
    }).then(res=>{
        console.log(res);
        document.getElementById('posts').innerHTML = '';
        for (let i = 0; i < res.data.length; i++) {
            const post = res.data[i];
            
            document.getElementById('posts').innerHTML +=
            `<div class="card">
                    <img src="${post.imagen}" class="card-img-top" alt="..." class="imagenes">
                    <div class="card-body">
                      <p class="card-text">${post.contenidoPost}</p>
                    </div>
            </div>`
        }
    }).catch(error=>{
        console.error(error);
    });   

}
mostrarPosts();


function obtenerUsuarios(){
    axios({
        url: '../backend/api/usuarios.php',
        method: 'get',
        responseType: 'json'
    }).then(res=>{
        for (let i = 0; i < res.data.length; i++) {
            document.getElementById('usuarios').innerHTML +=
                `<option value="${res.data[i].codigoUsuario}">${res.data[i].nombre}</option>`;
        }
        document.getElementById('usuarios').value = null;
    }).catch(error=>{
        console.error(error);
    });
}

obtenerUsuarios();

function login(){
    axios({
        url: "../backend/api/login.php",
        method: "post",
        responseType: "json",
        data: {
            correo: document.getElementById('correo').value,
            contrasena: document.getElementById('contrasena').value
        }
    }).then(res=>{
        if(res.data.codigoResultado==1 && codigoUser==1){
            window.location.href="principal.php";
        }if(res.data.codigoResultado==1 && codigoUser!==0){
            window.location.href="principalPro.php";
        }if(res.data.codigoResultado==0){
            window.location.href="401.html";
        }else{
            document.getElementById('error').style.display = 'block';
            document.getElementById('error').innerHTML = res.data.mensaje;
        }
            
        console.log(res);
    }).catch(error=>{
        console.error(error);
    });
}

function cambiarUsuario(){
    window.location.href="index.html"
    $('#logInModal').modal('show');
}






function perfil(){
    window.location.href="perfil.php";
}

function guardarPost(){
    axios({
        url:'../backend/api/posts.php',
        method: 'post',
        responseType: 'json',
        data:{
            codigoPost: 2000,
            codigoUsuario: 1,
            contenidoPost: document.getElementById('contenido-post').value,
            imagen: document.getElementById('url-imagen').value
        }
    }).then(res=>{
        console.log(res);
        mostrarPosts();
        $('#nuevo-post').modal('hide');
    }).catch(error=>{
        console.error(error);
    });
}

function principal(){
    window.location.href="principal.php";
}

