<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="./assets/bootstrap.min.css" rel="stylesheet">
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"> <img src="assets/logo.png" alt="riesgo" style="width: 70px;";></a>
    <a class="navbar-brand" href="/Magerit/index.php">SISTEMA DE RIESGOS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            ACCIONES
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/Magerit/index.php?controlador=Activo&accion=insert">Agregar Activo</a></li>
            <li><a class="dropdown-item" href="/Magerit/index.php?controlador=AmenazaSalvaguarda&accion=insert">Agregar Amenaza y Salvaguardas</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            MAPA DE CALOR
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/Magerit/index.php?controlador=Activo&accion=generarMapaCalor">Generar Mapa de Calor</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="mx-md-3">

