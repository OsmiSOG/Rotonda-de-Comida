<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>add new menu</title>
    <link rel="stylesheet" href="../../views/css/style.css">
  </head>
  <body>
    <header>
      <h1 id="title-header">Virtual roundabout</h1>
      <nav>
        <ul>
          <li> <a href="home.php">Home</a> </li>
          <li> <a href="orders.php">Orders</a> </li>
          <li> <a href="../close_session.php">sign out</a> </li>
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
          <input type="text" name="" value="" required>
        </div>
        <div class="input-form">
          <label for="">Precio</label>
          <input type="number" name="" value="" required>
        </div>
        <div class="input-form">
          <p style="font-weight: bold;">productos</p>
          <label for="">Entrada</label>
          <select class="escoger" name="" required>

          </select> <br>
          <label for="">Plato Fuerte</label>
          <select class="escoger" name="">

          </select> <br>
          <label for="">Bebida</label>
          <select class="escoger" name="">

          </select> <br>
          <label for="">Postre</label>
          <select class="escoger" name="">

          </select> <br>
          <label for="">Acompañamiento</label>
          <select class="escoger" name="">

          </select> <br>
        </div>
        <div class="">
          No están los productos que quieres? Agregalos <a href="add_product.php">aqui</a>
        </div>
        <div class="input-form">
          <button class="botones" type="submit" name="button">Agregar</button>
        </div>
      </form>
    </div>
  </body>
</html>
