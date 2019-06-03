<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>List of menus</title>
    <link rel="stylesheet" href="../../views/css/style.css">
  </head>
  <body>
    <header>
      <h1 id ="title-header">Virtual roundabout</h1>
      <nav>
        <ul>
          <li></li>
          <li> <a href="add_direction.php">ddDirection</a></li>
          <li> <a href="orders.php">orders</a> </li>
          <li> <a href="shopping_cart.php">Shopping cart</a></li>
          <li> <a href="../close_session.php">sign out</a></li>
        </ul>
      </nav>
    </header>
    <div class="">
      <div class="">
        <h2 class="titulo-h1">List of menus</h2>
      </div>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Codigo</th>
            <th scope="col">Precio</th>
          </tr>
        </thead>
        <tbody>
          <?php for ($i=0; $i < count($menus); $i++) {?>
            <tr>
              <th scope="row"><?php echo $i ?></th>
              <td><?php echo $menus[$i] ->getName() ?></td>
              <td><?php echo $menus[$i] ->getIdMenu() ?></td>
              <td><?php echo $menus[$i] ->getPrice() ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </body>
</html>
