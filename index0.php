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
      href="https://cdn.jsdelivr.net/npm/@docsearch/css@3"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
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

      .form-signin {
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
    </style>
  </head>
  <body>
    <header>
      <img
        src="./assets/images/TheCore_banner.webp"
        alt="Banner The Core School"
        width="400"
        height="200"
      />
    </header>
    <main class="form-signin">
      <form action="index.html" method="POST">
        <h1 class="h3 mb-3 fw-normal">Bienvenido!</h1>
        <button class="btn btn-primary w-100 py-2" type="submit">
          Iniciar sesión
        </button>
      </form>
      <form action="index2.php" method="POST" class="mt-3">
        <button class="btn btn-outline-secondary w-100 py-2" type="submit">
          Registrarse
        </button>
      </form>
    </main>
  </body>
</html>
