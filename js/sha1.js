
function registrar(){
    const datos = new FormData(document.getElementById('formulario'));
    fetch("http://localhost/eva/php/encripsha1.php",{method:'POST',body:datos})
    .then(respuesta=>respuesta.json())
    .then(registros=>{
        if(registros.response=='1'){
            alert("Usuario registrado");
            window.location.reload();
           
        } 
        else
            alert("Verifique los registros");
            
    }) 
}

function eliminarid(id) {

    if (window.confirm("Eliminar usuario")) {
        fetch("http://localhost/eva/php/elimsha.php?id=" + id, { method: 'GET' })
            .then(respuesta => respuesta.json())
            .then(registros => {
                if (registros.response == '1'){
                    alert("Usuario eliminado");
                    window.location.reload();
                }
                    
                else
                    alert("Error")
            })
    }
}