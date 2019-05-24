<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign up</title>
    <link rel="stylesheet" href="../../views/css/style.css">
  </head>
  <body>
    <header>
      <h1 id="title-header">Roundabout restaurant</h1>
      <nav>
        <ul>
          <li><a href="sign_in.php">sign in</a></li>
        </ul>
      </nav>
    </header>
    <h1 id="title-body">Sign up</h1>
    <form class="form" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> method="post">
      <div class="input-form">
        <label for="">name restaurant</label>
        <input type="text" name="name" value="">
      </div>
      <div class="input-form">
        <label for="">NIT</label>
        <input type="number" name="NIT" value="">
      </div>
      <div class="input-form">
        <p>Location</p>
        <label for="">Country</label>
        <select class="" name="">

        </select>
        <label for="">City</label>
        <select class="" name="">

        </select>
        <label for="">Direction</label>
        <input type="text" name="" value="">
      </div>
      <div class="input-form">
        <label for="">specialty</label>
        <select class="" name="">

        </select>
      </div>
      <div class="input-form">
        <label for="">password</label>
        <input type="password" name="" value="">
      </div>
      <div class="input-form">
        <button class="botones" type="submit" name="button">Sign up</button>
      </div>
    </form>
  </body>
</html>
