<?php

include('Config/db.php');

$response = $db->query('SELECT * FROM champions');

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="boutton.css">
    <link rel="stylesheet" href="Style/style.css">
    <title>lol</title>
</head>
<body>
  <?php include('Template/menu.php'); ?>
  <?php include('Config/db.php'); ?>
    <div class="container">
        <h1 class="teal-text">Liste des Champions</h1>
        <select name="class" class="form-select form-select-sm" mb-3>
                <option value="" disabled selected>--Filtrer--</option>
                <option value="COMBATTANT">COMBATTANT</option>
                <option value="MAGE">MAGE</option>
                <option value="ASSASSIN">ASSASSIN</option>TIREUR
                <option value="TIREUR">TIREUR</option>SUPPORT
                <option value="SUPPORT">SUPPORT</option>
            </select> <br>




      <div class="row">
        <?php while($data = $response->fetch()) : ?>
        <div class="col-6 col-sm-3">
            <div class="card backmsi3">
              <img class="card-img-top" src="<?php echo $data['image']; ?>" style="padding:10px;" />
              <div class="card-body">
                <span class="card-title"><?php echo $data['name']; ?></span>
                <span class="badge bg-secondary" style="color:white; margin:0;"><?php echo $data['class']; ?> </span> <br>
                <a class="btn btn-secondary" href="show.php?id=<?php echo $data['id']; ?>" class="btn">Voir</a>
                <a class="btn btn-secondary" href="update.php?id=<?php echo $data['id']; ?>" class="btn">Modifier</a>
              </div>
            </div>
        </div>
        <?php endwhile; ?>
      </div>

    </div> 

    <footer class="page-footer teal">
      <div class="container">
        <div class="row">
          <div class="col l6 s12">
            <h5 class="white-text">Footer Content</h5>
            <p class="grey-text text-lighten-4">Un site de céréal...</p>
          </div>
          <div class="col l4 offset-l2 s12">
            <h5 class="white-text">Links</h5>
            <ul>
              <li><a class="grey-text text-lighten-3" href="index.php">Liste des céréals</a></li>
              <li><a class="grey-text text-lighten-3" href="create.php">Création d'un céréal</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
        © 2022 Copyright 
        <a class="grey-text text-lighten-4 right" href="#!">FAQ?</a>
        </div>
      </div>
    </footer>        

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html

<?php $response->closeCursor(); ?>

