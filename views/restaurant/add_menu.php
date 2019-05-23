<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>add new menu</title>
    <link rel="stylesheet" href="../../views/css/style.css">
  </head>
  <body>
    <header>
      <nav>
        <ul>
          <li> <a href="#">Home</a> </li>
          <li> <a href="#">sign out</a> </li>
        </ul>
      </nav>
    </header>
    <div class="content-body">
      <div class="title-body">
        <h1 class="titulos-res">Add new menu</h1>
      </div>
      <form class="form" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> method="post">
        <div class="input-form">
          <label for="">Nombre</label>
          <input type="text" name="" value="">
        </div>
        <div class="input-form">
          <label for="">Precio</label>
          <input type="number" name="" value="">
        </div>
        <div class="input-form">
          productos
          <select class="escoger" name="">

          </select>
          <select class="escoger" name="">

          </select>
          <button class="escoger" type="button" name="button">+</button>
        </div>
        <div class="input-form">
          <button class="botones" type="button" name="button">Agregar</button>
        </div>
      </form>
    </div>
  </body>
</html>
