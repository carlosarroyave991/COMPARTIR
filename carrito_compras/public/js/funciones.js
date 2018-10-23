
document.querySelector("#ingresar_sistema").addEventListener('click',IniciarSesion);

function IniciarSesion(){
    var sUsuario = '';
    var sContrasenna = '';
    var bacceso = false;

    sUsuario = document.querySelector('#username').value;
    sContrasenna = document.querySelector('#password').value;
    
    bacceso = validarCredenciales(sUsuario,sContrasenna);
    console.log(bacceso);
    if(bacceso == true){
        ingresar();
    }
}

function ingresar(){
    var rol = sessionStorage.getItem('rolActivo');
    switch(rol){
        case '1':
        window.location.href = 'admin.php';
        break;
        case '2':
        window.location.href = 'usuario.php';
        break;
        case '3':
        window.location.href = 'socio.php'
        break;
        default:
        window.location.href = 'index.php';
        break;
    }

}