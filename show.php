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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="Style/style.css">

    <title>Cereal <?php echo $data['name']; ?></title>
</head>
<body class="backmsi2">
  <?php include('Template/menu.php'); ?>

    <div class="row container">
        <div class="col s12">
          <div class="card backmsi" style=" box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;">
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

<!------Test--------------------->
<div class="container">
  <div class="carousel-item">
        <div class="card">
          <div class="path">HOME / FACE <a>/ CLEANSERS</a>
          </div>
          <div class="row">
            <div class="col-md-6 text-center align-self-center">
              <img class="img-fluid" src="https://i.imgur.com/7a9V4yw.png">
            </div>
            <div class="col-md-6 info">
              <div class="row title">
                <div class="col">
                  <h2>Herbalism 2</h2>
                </div>
                <div class="col text-right">
                  <a href="#">
                    <i class="fa fa-heart-o"></i>
                  </a>
                </div>
              </div>
              <p>Natural herbal wash pro</p>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star-half-full"></span>
              <span id="reviews">1590 Reviews</span>
              <div class="row price">
                <label class="radio">
                  <input type="radio" name="size2" value="small">
                  <span>
                    <div class="row">
                      <big>
                        <b>13.5 oz.</b>
                      </big>
                    </div>
                    <div class="row">$36.95</div>
                    </a>
                  </span>
                </label>
                <label class="radio">
                  <input type="radio" name="size2" value="large" checked>
                  <span>
                    <div class="row">
                      <big>
                        <b>18.4 oz.</b>
                      </big>
                    </div>
                    <div class="row">$61.95</div>
                    </a>
                  </span>
                </label>
              </div>
            </div>
          </div>
          <div class="row lower">
            <div class="col">
              <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <i class="fa fa-arrow-left"></i>
              </a>
              <a class="carousel-control-next" href="#demo" data-slide="next">
                <i class="fa fa-arrow-right"></i>
              </a>
            </div>
            <div class="col text-right align-self-center">
              <button class="btn">Add to cart</button>
            </div>
          </div>
        </div>
      </div>
</div>
          

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

