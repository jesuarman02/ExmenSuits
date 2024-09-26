const registrarProducto = () => {
    let nombreProducto = document.getElementById('nombre-producto').value;
    let precioProducto = document.getElementById('precio').value;
  
    const regexPrecio = /^\d+(\.\d{1,2})?$/;
    const regexNombre = /^[A-Za-záéíóúÁÉÍÓÚñÑ\s]+$/;
  
    if (!regexNombre.test(nombreProducto)) {
      alert("El nombre del producto solo debe contener letras y espacios.");
      return;
    }
  
    if (!regexPrecio.test(precioProducto)) {
      alert("El precio debe contener solo números, con hasta dos decimales. Ejemplo: 100.99");
      return;
    }
  
    let data = new FormData();
    data.append("nombre_producto", nombreProducto);
    data.append("precio_producto", precioProducto);
    data.append("accion", "agregar");
  
    fetch('app/controller/inicio.php', {
      method: 'POST',
      body: data,
    })
      .then(response => response.json())
      .then(resultado => {
        if (resultado.status === 1) {
          alert("Producto registrado correctamente");
          const listaProductos = document.getElementById('lista-productos');
          listaProductos.insertAdjacentHTML(
            'beforeend',
            `<li class="list-group-item d-flex justify-content-between align-items-center">
              <span>${nombreProducto} - $${precioProducto}</span>
              <div>
                <button class="btn btn-warning btn-sm mr-2" onclick="editarProducto(${resultado.index})">Editar</button>
                <button class="btn btn-danger btn-sm" onclick="eliminarProducto(${resultado.index})">Eliminar</button>
              </div>
            </li>`
          );
          document.getElementById('nombre-producto').value = '';
          document.getElementById('precio').value = '';
        } else {
          alert("Error al registrar el producto: " + resultado.message);
        }
      })
      .catch(error => console.error('Error:', error));
  };
  
  document.getElementById('btn_registrar').addEventListener('click', registrarProducto);
  
  window.eliminarProducto = (index) => {
    if (confirm("¿Estás seguro de eliminar este producto?")) {
      let data = new FormData();
      data.append("index", index);
      data.append("accion", "eliminar");
  
      fetch('app/controller/inicio.php', {
        method: 'POST',
        body: data,
      })
        .then(response => response.json())
        .then(resultado => {
          if (resultado.status === 1) {
            alert("Producto eliminado correctamente");
            location.reload();
          } else {
            alert("Error al eliminar el producto: " + resultado.message);
          }
        })
        .catch(error => console.error('Error:', error));
    }
  };
  
  window.editarProducto = (index) => {
    const nombreProducto = prompt("Ingresa el nuevo nombre del producto:");
    const precioProducto = prompt("Ingresa el nuevo precio del producto:");
    const regexPrecio = /^\d+(\.\d{1,2})?$/;
    const regexNombre = /^[A-Za-záéíóúÁÉÍÓÚñÑ\s]+$/;
  
    if (!regexNombre.test(nombreProducto)) {
      alert("El nombre del producto solo debe contener letras y espacios.");
      return;
    }
  
    if (!regexPrecio.test(precioProducto)) {
      alert("El precio debe contener solo números, con hasta dos decimales. Ejemplo: 100.99");
      return;
    }
  
    let data = new FormData();
    data.append("index", index);
    data.append("nombre_producto", nombreProducto);
    data.append("precio_producto", precioProducto);
    data.append("accion", "editar");
  
    fetch('app/controller/inicio.php', {
      method: 'POST',
      body: data,
    })
      .then(response => response.json())
      .then(resultado => {
        if (resultado.status === 1) {
          alert("Producto actualizado correctamente");
          location.reload();
        } else {
          alert("Error al actualizar el producto: " + resultado.message);
        }
      })
      .catch(error => console.error('Error:', error));
  };
  