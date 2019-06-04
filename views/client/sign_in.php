<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign in</title>
    <link rel="stylesheet" href="../../views/css/style.css">
  </head>
  <body>
    <header>
      <h1 id="title-header">Roundabout restaurant</h1>
      <nav>
        <ul>
          <li><a href="sign_up.php">sign up</a></li>
        </ul>
      </nav>
    </header>
    <h1 class="titulo-h1">Sign in</h1>
    <?php if (!empty($runState)) :?>
      <p><?php echo $runState; ?></p>
    <?php endif; ?>
    <form class="form" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> method="post">
      <div class="input-form">
        <label for="">cellphone</label>
        <input type="text" name=" cellphone" value="">
      </div>
      <div class="input-form">
        <label for="">password</label>
        <input type="text" name="password" value="">
      </div>
      <div class="input-form">
        <button class="botones" type="button" name="button  ">sign in</button>
      </div>
    </form>
  </body>
</html>
