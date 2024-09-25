const enviar_registro = () => {
  let nombre = document.getElementById("nombre").value;
  let apellido = document.getElementById("apellido").value;
  let email = document.getElementById("email").value;
  let password = document.getElementById("password").value;

  if (nombre === "") {
    alert("El campo nombre no puede estar vacío.");
    return;
  }
  if (apellido === "") {
    alert("El campo apellido no puede estar vacío.");
    return;
  }

  if (!email.includes("@")) {
    alert("El correo electrónico debe contener '@'.");
    return;
  }

  if (password.length < 8) {
    alert("La contraseña debe tener al menos 8 caracteres.");
    return;
  }

  let data = new FormData();
  data.append("nombre", nombre);
  data.append("apellido", apellido);
  data.append("email", email);
  data.append("password", password);

  fetch("app/controller/registro.php", {
    method: "POST",
    body: data,
  })
    .then((respuesta) => respuesta.json())
    .then((respuesta) => {
      if (respuesta[0] == 1) {
        alert(respuesta[1]);
        setTimeout(() => {
          window.location = "login.php";
        });
      } else {
        alert(respuesta[1]);
      }
    })
    .catch((error) => {
      console.error("Error al registrar: ", error);
      alert("Hubo un error en el registro.");
    });
};

document
  .getElementById("btn_registrar")
  .addEventListener("click", enviar_registro);
