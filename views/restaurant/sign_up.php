<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign up</title>
    <link rel="stylesheet" href="../../views/css/style.css">
    <script type="text/javascript" src="../../views/js/jquery-3.4.1.min.js" charset="utf-8"></script>
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
        <input type="text" name="name" value="" required>
      </div>
      <div class="input-form">
        <label for="">NIT</label>
        <input type="number" name="NIT" value="" required>
      </div>
      <div class="input-form">
        <p>Localizacion</p>
        <label for="country">Pais</label>
        <select class="" name="country" id="country">
          <option disabled selected>Escoje tu pais</option>
          <?php for ($i=0; $i <count($countries) ; $i++): ?>
            <option value=<?php echo $countries[$i]['idPais']; ?>><?php echo $countries[$i]['pais']; ?></option>
          <?php endfor; ?>
        </select>
        <label for="city">Ciudad</label>
        <select class="" name="city" id="city">
          <?php if(empty($cities)): ?>
            <option disabled selected>Escoje tu pais</option>
          <?php endif; ?>
        </select>
        <label for="nomenclature">Direccion</label>
        <input type="text" name="nomenclature" value="">
      </div>
      <div class="input-form">
        <label for="specialty">Especialidad</label>
        <select class="" name="specialty">
          <option disabled selected>Escoje la especialidad</option>
          <?php for ($i=0; $i < count($specialties); $i++): ?>
            <option value=<?php echo $specialties[$i]['idEspecialidades'] ?>><?php echo $specialties[$i]['nombre'] ?></option>
          <?php endfor; ?>
        </select>
      </div>
      <div class="input-form">
        <label for="password">Password</label>
        <input type="password" name="password" value="">
      </div>
      <div class="input-form">
        <button class="botones" type="submit" name="button">Sign up</button>
      </div>
    </form>
    <script src="../../views/js/cities.js" charset="utf-8"></script>
  </body>
</html>
