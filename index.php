<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inventario de Marca de Ropa</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      min-height: 100vh;
      background: linear-gradient(135deg, #111827, #1e3a8a, #312e81);
      overflow-x: hidden;
      color: white;
      position: relative;
    }

    body::before {
      content: '';
      position: absolute;
      width: 600px;
      height: 600px;
      background: rgba(255,255,255,0.05);
      border-radius: 50%;
      top: -200px;
      right: -150px;
      animation: mover 10s infinite alternate ease-in-out;
    }

    body::after {
      content: '';
      position: absolute;
      width: 400px;
      height: 400px;
      background: rgba(255,255,255,0.04);
      border-radius: 50%;
      bottom: -120px;
      left: -100px;
      animation: mover2 8s infinite alternate ease-in-out;
    }

    @keyframes mover {
      from {
        transform: translateY(0px) rotate(0deg);
      }
      to {
        transform: translateY(40px) rotate(15deg);
      }
    }

    @keyframes mover2 {
      from {
        transform: translateX(0px);
      }
      to {
        transform: translateX(50px);
      }
    }

    .contenedor {
      position: relative;
      z-index: 10;
      width: 90%;
      max-width: 1200px;
      margin: auto;
      padding: 40px 0;
    }

    .titulo {
      text-align: center;
      margin-bottom: 40px;
      animation: aparecer 1.2s ease;
    }

    .titulo h1 {
      font-size: 3rem;
      margin-bottom: 10px;
      color: #facc15;
    }

    .titulo p {
      color: #d1d5db;
      font-size: 1.1rem;
    }

    @keyframes aparecer {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .panel {
      display: grid;
      grid-template-columns: 1fr 1.2fr;
      gap: 30px;
    }

    .card {
      background: rgba(255,255,255,0.08);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255,255,255,0.1);
      border-radius: 25px;
      padding: 25px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.3);
      transition: 0.4s ease;
      animation: entrada 1s ease;
    }

    .card:hover {
      transform: translateY(-5px) scale(1.01);
    }

    @keyframes entrada {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .card h2 {
      margin-bottom: 20px;
      color: #facc15;
    }

    .grupo {
      margin-bottom: 20px;
    }

    .grupo label {
      display: block;
      margin-bottom: 8px;
      font-weight: 500;
    }

    .grupo input {
      width: 100%;
      padding: 12px;
      border-radius: 12px;
      border: none;
      outline: none;
      font-size: 1rem;
      background: rgba(255,255,255,0.12);
      color: white;
      transition: 0.3s;
    }

    .grupo input:focus {
      background: rgba(255,255,255,0.2);
      transform: scale(1.02);
    }

    .boton {
      width: 100%;
      padding: 14px;
      border: none;
      border-radius: 15px;
      background: linear-gradient(90deg, #facc15, #f59e0b);
      color: #111827;
      font-size: 1rem;
      font-weight: bold;
      cursor: pointer;
      transition: 0.4s ease;
    }

    .boton:hover {
      transform: scale(1.03);
      box-shadow: 0 8px 20px rgba(250,204,21,0.4);
    }

    .tabla-contenedor {
      overflow-x: auto;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    thead {
      background: rgba(255,255,255,0.12);
    }

    th, td {
      padding: 15px;
      text-align: center;
    }

    tbody tr {
      transition: 0.3s ease;
      animation: deslizar 0.5s ease;
    }

    tbody tr:hover {
      background: rgba(255,255,255,0.08);
    }

    @keyframes deslizar {
      from {
        opacity: 0;
        transform: translateX(-30px);
      }
      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    .eliminar {
      background: linear-gradient(90deg, #ef4444, #dc2626);
      border: none;
      color: white;
      padding: 10px 14px;
      border-radius: 10px;
      cursor: pointer;
      transition: 0.3s;
    }

    .eliminar:hover {
      transform: scale(1.05);
      box-shadow: 0 6px 15px rgba(239,68,68,0.4);
    }

    .info {
      margin-top: 20px;
      display: flex;
      justify-content: space-between;
      gap: 15px;
      flex-wrap: wrap;
    }

    .mini-card {
      flex: 1;
      min-width: 150px;
      background: rgba(255,255,255,0.08);
      border-radius: 18px;
      padding: 18px;
      text-align: center;
      transition: 0.4s;
    }

    .mini-card:hover {
      transform: translateY(-4px);
    }

    .mini-card h3 {
      color: #facc15;
      margin-bottom: 8px;
    }

    .mensaje {
      margin-top: 15px;
      text-align: center;
      font-weight: 500;
      color: #bbf7d0;
      opacity: 0;
      transition: 0.4s ease;
    }

    .mostrar {
      opacity: 1;
    }

    @media(max-width: 900px) {
      .panel {
        grid-template-columns: 1fr;
      }

      .titulo h1 {
        font-size: 2.2rem;
      }
    }
  </style>
</head>
<body>

  <div class="contenedor">
    <div class="titulo">
      <h1>Inventario de Marca de Ropa</h1>
      <p>Gestiona artículos, cantidades y bodegas con una interfaz moderna y didáctica.</p>
    </div>

    <div class="panel">

      <div class="card">
        <h2>Agregar Artículo</h2>

        <div class="grupo">
          <label>Marca</label>
          <input type="text" id="marca" placeholder="Ej: Nike, Adidas, Puma">
        </div>

        <div class="grupo">
          <label>Cantidad</label>
          <input type="number" id="cantidad" placeholder="Cantidad de productos">
        </div>

        <div class="grupo">
          <label>Bodega</label>
          <input type="text" id="bodega" placeholder="Ej: Bodega Central">
        </div>

        <button class="boton" onclick="agregarArticulo()">
          Guardar Artículo
        </button>

        <div class="mensaje" id="mensaje">
          Artículo agregado correctamente.
        </div>
      </div>

      <div class="card">
        <h2>Inventario Registrado</h2>

        <div class="tabla-contenedor">
          <table>
            <thead>
              <tr>
                <th>Marca</th>
                <th>Cantidad</th>
                <th>Bodega</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody id="tablaArticulos"></tbody>
          </table>
        </div>

        <div class="info">
          <div class="mini-card">
            <h3>Total Artículos</h3>
            <p id="totalArticulos">0</p>
          </div>

          <div class="mini-card">
            <h3>Total Cantidad</h3>
            <p id="totalCantidad">0</p>
          </div>
        </div>

      </div>

    </div>
  </div>

  <script>
    let articulos = [];

    function agregarArticulo() {
      const marca = document.getElementById('marca').value.trim();
      const cantidad = document.getElementById('cantidad').value.trim();
      const bodega = document.getElementById('bodega').value.trim();

      if (marca === '' || cantidad === '' || bodega === '') {
        alert('Por favor completa todos los campos.');
        return;
      }

      const articulo = {
        id: Date.now(),
        marca,
        cantidad: parseInt(cantidad),
        bodega
      };

      articulos.push(articulo);
      actualizarTabla();
      limpiarFormulario();
      mostrarMensaje();
    }

    function actualizarTabla() {
      const tabla = document.getElementById('tablaArticulos');
      tabla.innerHTML = '';

      let totalCantidad = 0;

      articulos.forEach((articulo) => {
        totalCantidad += articulo.cantidad;

        tabla.innerHTML += `
          <tr>
            <td>${articulo.marca}</td>
            <td>${articulo.cantidad}</td>
            <td>${articulo.bodega}</td>
            <td>
              <button class="eliminar" onclick="eliminarArticulo(${articulo.id})">
                Eliminar
              </button>
            </td>
          </tr>
        `;
      });

      document.getElementById('totalArticulos').innerText = articulos.length;
      document.getElementById('totalCantidad').innerText = totalCantidad;
    }

    function eliminarArticulo(id) {
      articulos = articulos.filter(articulo => articulo.id !== id);
      actualizarTabla();
    }

    function limpiarFormulario() {
      document.getElementById('marca').value = '';
      document.getElementById('cantidad').value = '';
      document.getElementById('bodega').value = '';
    }

    function mostrarMensaje() {
      const mensaje = document.getElementById('mensaje');
      mensaje.classList.add('mostrar');

      setTimeout(() => {
        mensaje.classList.remove('mostrar');
      }, 2500);
    }
  </script>

</body>
</html>
