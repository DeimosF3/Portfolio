<?php
require_once 'config/database.php';
?>
<!DOCTYPE html>
<html lang="es">

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
  <link rel="shortcut icon" href="assets/images/cropped-thecore-favico-192x192.webp" type="image/x-icon">
  <link rel="stylesheet" href="./assets/css/home.css">
  <script src="./assets/js/form_functions.js"></script>
</head>

<body>
  <header>
    <h1 class="big">¡Crea tu Currículum Vitae totalmente gratis!</h1>
  </header>
  <main class="form-container">

    <div id="buttons">
      <h1 class="h3 mb-3 fw-bold text-uppercase">Empezar</h1>
      <button id="loginButton" class="btn btn-primary w-100 py-2" onclick="showForm('loginForm')">
        Iniciar sesión
      </button>
      <button id="registerButton" class="btn btn-outline-secondary w-100 py-2 mt-3" onclick="showForm('registerForm')">
        Registrarse
      </button>
    </div>


    <form id="loginForm" action="views/auth/login.php" method="POST" class="hidden">
      <h1 class="h3 mb-3 fw-bold text-uppercase">iniciar sesión</h1>
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
        Continuar
      </button>
      <button id="cancelButton1" type="button" class="btn btn-outline-secondary w-100 py-2 mt-3" onclick="cancelForm()">
        Cancelar
      </button>
    </form>


    <form id="registerForm" action="views/auth/register.php" method="POST" class="hidden">
      <h1 class="h3 mb-3 fw-bold text-uppercase">Registrarse</h1>
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
      <button class="btn btn-primary w-100 py-2" type="submit">
        Continuar
      </button>
      <button id="cancelButton2" type="button" class="btn btn-outline-secondary w-100 py-2 mt-3" onclick="cancelForm()">
        Cancelar
      </button>
    </form>
  </main>
</body>
</html>