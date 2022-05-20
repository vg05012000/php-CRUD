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

    <title>Cereal</title>
</head>
<body>
    <nav class="teal">
        <div class="nav-wrapper container">
            <a href="#" class="brand-logo">Logo</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="index.php">Liste des céréals</a></li>
                <li><a href="create.php">Création d'un céréal</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1 class="teal-text">Liste des céreals</h1>

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while($data = $response->fetch()) : ?>
                <tr>
                    <td><?php echo $data['name']; ?></td>
                    <td><?php echo $data['class']; ?></td>
                    <td><a href="show.php?id=<?php echo $data['id']; ?>" class="btn">Voir</a></td>
                    <td><a href="update.php?id=<?php echo $data['id']; ?>" class="btn">Modifier</a></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
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
        © 2014 Copyright 
        <a class="grey-text text-lighten-4 right" href="#!">FAQ?</a>
        </div>
      </div>
    </footer>        

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html

<?php $response->closeCursor(); ?>

