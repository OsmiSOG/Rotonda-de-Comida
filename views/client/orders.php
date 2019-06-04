<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ordenes cliente</title>
    <link rel="stylesheet" href="../../views/css/style.css">
  </head>
  <body>
    <header>
      <h1 id ="title-header">Virtual roundabout</h1>
      <nav>
        <ul>
          <li> <a href="restaurants.php">restaurants</a> </li>
          <li> <a href="add_direction.php">ddDirection</a></li>
          <li> <a href="shopping_cart.php">Shopping cart</a></li>
          <li> <a href="../close_session.php">sign out</a></li>
        </ul>
      </nav>

    </header>
    <div class="content-body">
      <h1 id="title-body">Orders</h1>
    </div>
    <div class="">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Codigo</th>
            <th scope="col">Precio</th>
            
          </tr>
        </thead>
        <tbody>
          <?php for ($i=0; $i < count($orders); $i++) {?>
            <tr>
              <th scope="row"><?php echo $i ?></th>
              <td><?php echo $orders[$i] ->getName() ?></td>
              <td><?php echo $orders[$i] ->getIdMenu() ?></td>
              <td><?php echo $orders[$i] ->getPrice() ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </body>
</html>
