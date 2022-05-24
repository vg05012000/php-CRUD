<?php

include('Config/db.php');

$response = $db->query('SELECT * FROM champions as c JOIN skill as s ON c.id=s.id WHERE c.id=' . $_GET['id']);
$data = $response->fetch();
if ($data === false) {
    header('Location: Template/error404.php');
    exit;
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <title>Cereal <?php echo $data['name']; ?></title>
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

    <div class="row container">
        <div class="col s12">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">
                <?php echo $data['name']; ?>
                <span class="new badge" data-badge-caption=""><?php echo $data['class']; ?> </span>
              </span>
              <p>
                <br>
                <img src="<?php echo $data['image']; ?>" /> <br>
                Dégats : <?php echo $data['damage']; ?> <br>
                SKILLS:<br>
                A - <?php echo $data['A'];?><br>
                Z - <?php  echo$data['Z'];?> <br>
                E - <?php  echo$data['E'];?> <br>
                R - <?php echo$data['R']; ?>
                
              </p>
            </div>
            <div class="card-action">
              <a href="update.php?id=<?php echo $data['id']; ?>" class="btn white teal-text">Editer</a>
              <a class="btn white red-text modal-trigger" href="#modalDelete">Supprimer</a>
            </div>
          </div>
        </div>
    </div>

    <!-- Modal Structure -->
    <div id="modalDelete" class="modal">
      <div class="modal-content">
        <h4>Validation de la suppression</h4>
        <p>Etes-vous sûr de vouloir supprimer ce jolie paquet de céréal ???</p>
      </div>
      <div class="modal-footer">
        <a href="delete.php?id=<?php echo $data['id']; ?>" class="btn white red-text">Supprimer</a>
      </div>
    </div>
          

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems);
      });
    </script>
</body>
</html>

<?php $response->closeCursor(); ?>

