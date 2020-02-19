<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Agregar nuevo ingrediente</title>
    <link rel="stylesheet" href="../../views/css/style.css">
    <script type="text/javascript" src="../../views/js/jquery-3.4.1.min.js" charset="utf-8"></script>
  </head>
  <body>
    <header>
      <h1 id="title-header">Virtual roundabout</h1>
      <nav>
        <ul>
          <li> <a href="add_product.php">Regresa</a> </li>
        </ul>
      </nav>
    </header>
    <div class="content-body">
      <div class="title-body">
        <h1 class="titulos-res">Add new Ingredient</h1>
      </div>
      <?php if (!empty($info)): ?>
        <h5 style="background-color: rgb(139, 255, 252);"><?php echo $info ?></h5>
      <?php endif; ?>
      <form class="form" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> method="post">
        <div class="input-form">
          <label for="">Nombre</label>
          <input type="text" name="name" value="" required>
        </div>
        <div class="input-form">
          <label for="">Cantidad</label>
          <input type="number" name="quantity" value="" required>
        </div>
        <p>Modificable: </p>
        <div>
          <input type="radio" name="modifiable" value="yes">
          <label for="huey">Si</label>
        </div>

        <div>
          <input type="radio" name="modifiable" value="no" checked>
          <label for="dewey">No</label>
        </div>
        <div class="modifiable-form">

        </div>

        <div class="input-form">
          <button class="botones" type="submit" name="button">Agregar</button>
        </div>
      </form>
    </div>
    <script src="../../views/js/ingredient.js" language="javascript" charset="utf-8"></script>
  </body>
</html>
