mostrarPosts2();
function mostrarPosts2(){
axios({
    url:'../backend/api/posts.php?idUsuario=2',
    method: 'get',
    responseType: 'json'
}).then(res=>{
    
    console.log(res);
    document.getElementById('posts2').innerHTML = '';
    for (let i = 0; i < res.data.length; i++) {
        const postt = res.data[i];
        
        document.getElementById('posts2').innerHTML +=
        `<div class="card">
                <img src="${postt.imagen}" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">${postt.contenidoPost}</p>
                </div>
        </div>`
    }
}).catch(error=>{
    console.error(error);
});
}

function perfil(){
    window.location.href="perfilPro.php";
}

function guardarPost(){
    axios({
        url:'../backend/api/posts.php',
        method: 'post',
        responseType: 'json',
        data:{
            codigoPost: 2000,
            codigoUsuario: 2,
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


function cambiarUsuario(){
    window.location.href="index.html"
    $('#logInModal').modal('show');
}