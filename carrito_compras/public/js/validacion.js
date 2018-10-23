/*Roles
1:admin
2:socio
3:usuario
*/
function obtenerListaUsuarios(){
    var listaUsuarios = JSON.parse(localStorage.getItem('listaUsuariosLs'));

    if(listaUsuarios == null){
        listaUsuarios =[
            //id, nombre, apellido, correo, contraseña, fecha nac,rol
            ['1','admin','arroyave','carlosarroyave991@gmail.com','123','2000-03-06','1'],
            ['2','usuario','salamandra','salamandra@gmail.com','123','1993-04-17','2'],
            ['3','socio','karman','socio@gmail.com','123','1998-08-30','3']
        ]
    }
    return listaUsuarios;
}

function validarCredenciales(pusuario, pcontrasenna){
    var listaUsuarios = obtenerListaUsuarios();
    var bacceso = false;
    for(var i=0;i< listaUsuarios.length;i++){
        if(pusuario == listaUsuarios[i][1] && pcontrasenna == listaUsuarios[i][4]){
            bacceso=true;
            //sessionStorage.setItem('usuarioActivo',listaUsuarios[i][1]+''+listaUsuarios[i][2]);
            sessionStorage.setItem('rolActivo',listaUsuarios[i][6]);
        }
    }
    return bacceso;
}