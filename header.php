<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>IZI Cars</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Baloo+Chettan+2|Open+Sans&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="fontawesome-free-5.12.1-web/css/all.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta charset="utf-8">


</head>
<body>

<nav class="navbar navbar-dark bg-dark-gray-blue  fixed-top navbar-shadow">
  <a class="btn btn-outline-primary" href="index.php">Accueil</a>
  <div class="">
      <?php
      if (isset($_SESSION["userNum"])){
        echo'
          <form action="includes/logout.inc.php" method="post">
            <a href="add.php" class="btn btn-outline-info mr-2">Ajouter annonce</a>
            <a href="view.php" class="btn btn-outline-warning mr-2">Mes annonces</a>
            <button type="submit" name="logout-submit" class="btn btn-outline-danger mr-2">Se déconnecter</button>
          </form>';
      }
      else{
        echo'
          <form action="includes/login.inc.php" method="post" class="form-inline">
            <input type="text" placeholder="Username/E-mail" name="uid" class="form-control mr-2">
            <input type="password" placeholder="Password" name="upwd" class="form-control mr-2">
            <button type="submit" name="login-submit" class="btn btn-outline-success mr-2">Login</button>
            <a href="signup.php" class="btn btn-outline-light" role="button">Signup</a>
          </form>';
      }
      ?>
  </div>
  
</nav>

</body>
</html>
