const enviar_datos = () => {
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;
    let data = new FormData(); //FormData es para formularios
    data.append("email",email); //append: para añadir elementos
    data.append("loginPassword",password); 

    fetch("app/controller/login.php",{ //Es una funcion que nos permite el envio y la restricción de datos que usa http, y https que estos son protocolos de envio y recepción de datos 
        method:"POST",
        body:data
    }).then(respuesta => respuesta.json()) 
    .then(respuesta =>{
        if(respuesta[0] == 1){
            alert(respuesta[1]);
            window.location="index.php";
        }else{
            alert(respuesta[1]);
        }
    })
}

document.getElementById("btn_saludar").addEventListener("click",()=>{
    enviar_datos();
});


//URL: Es una dirección externa (Puedes acceder desde cualquier lugar, también nombrada dirección privada)
//URI: Es una dirección interna (Debe existir dentro del proyecto para poder acceder, o también nombrada dirección publica)
//notacion objeto javascript (json)
