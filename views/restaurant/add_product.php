<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Agregar nuevo producto</title>
    <link rel="stylesheet" href="../../views/css/style.css">
  </head>
  <body>
    <header>
      <h1 id="title-header">Virtual roundabout</h1>
      <nav>
        <ul>
          <li> <a href="add_menu.php">Regresa</a> </li>
        </ul>
      </nav>
    </header>
    <div class="content-body">
      <div class="title-body">
        <h1 class="titulos-res">Add new product</h1>
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

        <hr>
        <div class="input-form">
          <p style="font-weight: bold;">Ingredentes</p>
          <label for=""></label>
          <select class="" name="">

          </select>
        </div>
        <div class="action-form">
          <button type="button" name="other-ingredent">+</button>
        </div>
        <div class="action-form">
          No están los ingredientes que quieres? Agregalos <a href="add_ingredient.php">aqui</a>
        </div>
        <hr>
        
        <div class="input-form">
          <button class="botones" type="submit" name="button">Agregar</button>
        </div>
      </form>
    </div>
  </body>
</html>
