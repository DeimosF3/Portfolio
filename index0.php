<?php
require_once 'config/database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portfolio Web - Inicio</title>
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@docsearch/css@3" />
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      min-height: 100vh;
      margin: 0;
      background-color: rgba(211, 211, 211, 0.575);
    }

    header img {
      margin-bottom: 20px;
    }

    .form-container {
      width: 100%;
      max-width: 400px;
      padding: 15px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
    }

    .hidden {
      display: none;
    }
  </style>
</head>

<body>
  <header>
    <img
      src="./assets/images/TheCore_banner.webp"
      alt="Banner The Core School"
      width="400"
      height="200" />
  </header>
  <main class="form-container">

    <div id="buttons">
      <h1 class="h3 mb-3 fw-normal">Bienvenido!</h1>
      <button class="btn btn-primary w-100 py-2" onclick="showForm('loginForm')">
        Iniciar sesión
      </button>
      <button class="btn btn-outline-secondary w-100 py-2 mt-3" onclick="showForm('registerForm')">
        Registrarse
      </button>
    </div>


    <form id="loginForm" action="views/auth/login.php" method="POST" class="hidden">
      <h1 class="h3 mb-3 fw-normal">Por favor, inicie sesión</h1>
      <div class="form-floating">
        <input
          type="text"
          class="form-control"
          id="floatingInput"
          name="username"
          placeholder="Nombre Usuario"
          required />
        <label for="floatingInput">Nombre de usuario</label>
      </div>
      <div class="form-floating">
        <input
          type="email"
          class="form-control"
          id="floatingInput"
          name="email"
          placeholder="name@example.com" />
        <label for="floatingInput">Email</label>
      </div>
      <div class="form-floating">
        <input
          type="password"
          class="form-control"
          id="floatingPassword"
          name="password"
          placeholder="Password" />
        <label for="floatingPassword">Contraseña</label>
      </div>
      <div class="form-check text-start my-3">
        <input
          class="form-check-input"
          type="checkbox"
          value="remember-me"
          id="flexCheckDefault" />
        <label class="form-check-label" for="flexCheckDefault">
          Recuérdame
        </label>
      </div>
      <button class="btn btn-primary w-100 py-2" type="submit">
        Iniciar sesión
      </button>
      <button type="button" class="btn btn-outline-secondary w-100 py-2 mt-3" onclick="cancelForm()">
        Cancelar
      </button>
    </form>


    <form id="registerForm" action="views/auth/register.php" method="POST" class="hidden">
      <h1 class="h3 mb-3 fw-normal">Regístrate</h1>
      <div class="form-floating">
        <input
          type="text"
          class="form-control"
          id="registerUsername"
          name="username"
          placeholder="Nombre de usuario"
          required />
        <label for="registerUsername">Nombre de usuario</label>
      </div>
      <div class="form-floating">
        <input
          type="email"
          class="form-control"
          id="registerEmail"
          name="email"
          placeholder="name@example.com"
          required />
        <label for="registerEmail">Email</label>
      </div>
      <div class="form-floating">
        <input
          type="password"
          class="form-control"
          id="registerPassword"
          name="password"
          placeholder="Contraseña"
          required />
        <label for="registerPassword">Contraseña</label>
      </div>
      <button class="btn btn-outline-secondary w-100 py-2" type="submit">
        Regístrate
      </button>
      <button type="button" class="btn btn-outline-secondary w-100 py-2 mt-3" onclick="cancelForm()">
        Cancelar
      </button>
    </form>
  </main>

  <script>
    function showForm(formId) {

      document.getElementById('buttons').classList.add('hidden');
      document.getElementById('loginForm').classList.add('hidden');
      document.getElementById('registerForm').classList.add('hidden');


      document.getElementById(formId).classList.remove('hidden');
    }

    function cancelForm() {

      document.getElementById('buttons').classList.remove('hidden');
      document.getElementById('loginForm').classList.add('hidden');
      document.getElementById('registerForm').classList.add('hidden');
    }
  </script>
</body>

</html>