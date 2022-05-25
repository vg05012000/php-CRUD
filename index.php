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
    <link rel="icon" href="./image/LogoIco.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="Style/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600&display=swap" rel="stylesheet">

    <title>LOL Projet</title>

</head>
<body>
  <?php include('Template/menu.php'); ?>
  <?php include('Config/db.php'); ?>
    <div class="container">
        <h1>Liste des Champions</h1>

      <div class="row">
        <?php while($data = $response->fetch()) : ?>
        <div class="col-6 col-sm-3">
            <div class="card backmsi3">
              <img class="card-img-top" src="<?php echo $data['image']; ?>" style="padding:10px;" />
              <div class="card-img-overlay">
              <span class="badge" style="color:white; margin:0;"><?php echo $data['class']; ?> </span> <br>
              <span class="card-title"><?php echo $data['name']; ?></span>
              </div>
              <div class=" card-body cdbody">
                <a class="btn boutton " href="show.php?id=<?php echo $data['id']; ?>" >Voir</a>
                <a class="btn boutton" href="update.php?id=<?php echo $data['id']; ?>" >Modifier</a>
              </div>  
            </div>
        </div>
        <?php endwhile; ?>
      </div>

    </div> 

    <?php include('Template/footer.php'); ?> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html

<?php $response->closeCursor(); ?>

