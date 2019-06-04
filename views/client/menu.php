<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Detail menu</title>
    <link rel="stylesheet" href="../../views/css/style.css">
  </head>
  <body>
    <header>
      <h1 id="title-header">Virtual roundabout</h1>
      <nav>
        <ul>
          <li> <a href="add_direction.php">addDirection</a> </li>
          <li> <a href="orders.php">orders</a> </li>
          <li> <a href="shopping_cart.php">Shopping cart</a> </li>
          <li> <a href="../close_session.php">sign out</a> </li>
        </ul>
      </nav>
    </header>
    <div class="">
      <div class="">
        <h2 class="titulo-h1">Detail of the menu</h2>
      </div>
      <div class="">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Codigo</th>
              <th scope="col">Nombre</th>
              <th scope="col">Precio</th>
              <th scope="col">Productos</th>
            </tr>
          </thead>
          <tbody>
            <?php for ($i=0; $i < count($menu); $i++) {?>
              <tr>
                <th scope="row"><?php echo $i ?></th>
                <td><?php echo $menu[$i] ->getIdMenu() ?></td>
                <td><?php echo $menu[$i] ->getName() ?></td>
                <td><?php echo $menu[$i] ->getPrice() ?></td>
                <td><ul><?php for ($i=0; $i <count($products) ; $i++) {?>
                    <li><?php $products[$i]-> getName() ?></li>
                  <?php } ?>
                </ul>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
        <form class="" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> method="post">
          <?php  ?>
          <input type="hidden" name="menu" value="<?php echo $menu[$i] -> getIdMenu() ?>">
          <button type="submit" name="button">add shoping cart</button>
        </form>
      </div>
    </div>
  </body>
</html>
