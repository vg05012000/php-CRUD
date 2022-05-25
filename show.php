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
    <link rel="icon" href="./image/LogoIco.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="Style/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600&display=swap" rel="stylesheet">

    <title>Détail <?php echo $data['name']; ?></title>
</head>
<body>
  <?php include('Template/menu.php'); ?>

    <div class=" container">
        <div class="col s12">
          <div class="card backmsi" style=" box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;padding:10px;">
            <div class="card-content white-text">
              <span class="card-title">
                <?php echo $data['name']; ?>
              </span>
              <span class="new badge" data-badge-caption=""><?php echo $data['class']; ?> </span>
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
              <a href="update.php?id=<?php echo $data['id']; ?>" class="btn boutton">Editer</a>
              <a class="btn boutton" href="#modalDelete">Supprimer</a>
            </div>
          </div>
        </div>
    </div>
    <?php include('Template/footer.php'); ?>
    

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

<!------Test--------------------->

          

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems);
      });
    </script>
</body>
</html>

<?php $response->closeCursor(); ?>

