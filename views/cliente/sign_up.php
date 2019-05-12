<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign up User</title>
    <link rel="stylesheet" href="../css/style.css">
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
    <form class="form" action="#" method="post">
      <div class="input-form">
        <label for="">nombre</label>
        <input type="text" name="name" value="" placeholder="Tu nombre">
      </div>
      <div class="input-form">
        <label for="">cedula</label>
        <input type="number" name="identification" value="" placeholder="Numero de identificación">
      </div>
      <div class="input-form">
        <label for="">fecha de nacimiento</label>
        <input type="date" name="birthdate" value="">
      </div>
      <div class="input-form">
        <label for="">correo</label>
        <input type="email" name="email" value="" placeholder="example@dominio">
      </div>
      <div class="input-form">
        <label for="">direccion</label>
        <div class="input-form">
          <label for="">pais</label>
          <select class="select-form" name="country">
          </select>
          <label for="">ciudad</label>
          <select class="select-form" name="city">
          </select>
          <label for="">direccion</label>
          <input type="text" name="" value="">
        </div>
      </div>
      <div class="input-form">
        <label for="">password</label>
        <input type="password" name="" value="" placeholder="password">
      </div>
      <div class="input-form">
      <button class="botones" type="button" name="button">Registrar </button>
      </div>
    </form>
  </body>
</html>
