function registrar(){
    const datos = new FormData(document.getElementById('formulario'));
    fetch("http://localhost/eva/php/encriprsa.php",{method:'POST',body:datos})
    .then(respuesta=>respuesta.json())
    .then(registros=>{
        if(registros.response=='1'){
            alert("Usuario registrado");
            reload();
            
        } 
        else
            alert("Verifique los registros");
            
    }) 
}

function eliminarid(id) {

    if (window.confirm("Eliminar usuario")) {
        fetch("http://localhost/eva/php/elimrsa.php?id=" + id, { method: 'GET' })
            .then(respuesta => respuesta.json())
            .then(registros => {
                if (registros.response == '1'){
                    alert("Usuario eliminado");
                    location.reload();
                }
                    
                else
                    alert("Error")
            })
    }
}