<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home restaurant</title>
    <link rel="stylesheet" href="../../views/css/style.css">
  </head>
  <body>
    <header>
      <h1 id="title-header">Virtual roundabout</h1>
      <nav>
        <ul>
          <li> <a href="add_menu.php">Add menu</a> </li>
          <li> <a href="orders.php">Orders</a> </li>
          <li> <a href="../close_session.php">sign out</a> </li>
        </ul>
      </nav>
    </header>
    <div class="content-body">
      <div class="title-body">
        <h1 class="nuevo">Your menus</h1>
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
            <?php for ($i=0; $i < count($menus); $i++) {?>
              <tr>
                <th scope="row"><?php echo $i ?></th>
                <td><?php echo $menus[$i] ->getName() ?></td>
                <td><?php echo $menus[$i] ->getIdMenu() ?></td>
                <td><?php echo $menus[$i] ->getPrice() ?></td>
                <td> <input type="button" name="" value="add"> </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
