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
      <?php if (!empty($info)): ?>
        <h5 style="background-color: rgb(139, 255, 252);"><?php echo $info ?></h5>
      <?php endif; ?>
      <form class="form" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> method="post">
        <div class="input-form">
          <label for="">Nombre</label>
          <input type="text" name="name" value="" required>
        </div>
        <div class="input-form">
          <label for="">Precio</label>
          <input type="number" name="price" value="" required>
        </div>
        <div class="input-form">
          <label for="">Categoria</label>
          <select class="" name="category">
            <?php for ($i=0; $i < count($categories) ; $i++) :?>
              <option value=<?php echo $categories[$i]['idCategoria']; ?>><?php echo $categories[$i]['nombre']; ?></option>
            <?php endfor; ?>
          </select>
        </div>
        <hr>
        <div class="input-form">
          <p style="font-weight: bold;">Ingredentes</p>
          <label for=""></label>
          <select id="ingredients" class="" name="ingredient[0]">
            <?php for ($i=0; $i < count($ingredients); $i++) :?>
              <option value=<?php echo $ingredients[$i]->getIdIngredient(); ?>><?php echo $ingredients[$i]->getName(); ?></option>
            <?php endfor; ?>
          </select>
        </div>
        <div class="action-form">
          <button type="button" id="add-ingredient" name="other-ingredent">+</button>
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
    <script src="../../views/js/product.js" language="javascript" charset="utf-8"></script>
  </body>
</html>
