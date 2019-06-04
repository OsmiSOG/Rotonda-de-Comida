<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add direction</title>
    <link rel="stylesheet" href="../../views/css/style.css">
    <script type="text/javascript" src="../../views/js/jquery-3.4.1.min.js" charset="utf-8"></script>
  </head>
  <body>
    <header>
      <h1 id="title-header">Virtual roundabout</h1>
      <nav>
        <ul>
          <li> <a href="restaurants.php">restaurants</a> </li>
          <li> <a href="orders.php">orders</a> </li>
          <li> <a href="shopping_cart.php">Shopping cart</a></li>
          <li> <a href="../close_session.php">sign out</a></li>
        </ul>
      </nav>
    </header>
    <div class="input-form">
      <form class="form" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> method="post">
        <label class="escoger "for="">country</label>
        <select class="" name="">

        </select>
        <label class="escoger" for="">city</label>
        <select class="" name="">

        </select>
        <label for="">direction</label>
        <input type="text" name="" value="">
        <button class="botones" type="submit" name="button">agregar</button>
      </form>
      <script src="../../views/js/cities.js" charset="utf-8"></script>
    </div>
  </body>
</html>
