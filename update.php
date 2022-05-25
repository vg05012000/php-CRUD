<?php

    include('Config/db.php');

    if (
      $_POST &&
      isset($_POST['name']) && $_POST['name'] !== '' &&
      isset($_POST['class']) && $_POST['class'] !== '' && 
      isset($_POST['image']) && $_POST['image'] !== '' &&
      isset($_POST['damage']) && $_POST['damage'] !== ''&&
      isset($_POST['A']) && $_POST['A'] !== '' &&
      isset($_POST['Z']) && $_POST['Z'] !== '' &&
      isset($_POST['E']) && $_POST['E'] !== '' &&
      isset($_POST['R']) && $_POST['R']!== ''
    ) {
        $req = $db->prepare('UPDATE champions SET name=:name, class=:class, image=:image, damage=:damage WHERE id=:id; UPDATE skill SET A=:A, Z=:Z, E=:E, R=:R WHERE id=:id' );

        $req->execute([
            'name' => $_POST['name'],
            'class' => $_POST['class'],
            'image' => $_POST['image'],
            'damage' => $_POST['damage'],

            'A' => $_POST['A'],
            'Z' => $_POST['Z'],
            'E' => $_POST['E'],
            'R' => $_POST['R'],
            
            'id' => $_GET['id']
        ]);

        header('Location: show.php?id=' . $_GET['id']);
        exit;
    } else {
        $response = $db->query('SELECT * FROM champions as c JOIN skill as s ON c.id=s.id WHERE c.id=' . $_GET['id']);
        $data = $response->fetch();
    }

    $errors = '';
    if (isset($_POST['name']) && $_POST['name'] === '') {
      $errors .= 'Nom invalide. ';
    }

    if (isset($_POST['class']) && $_POST['class'] === '') {
      $errors .= 'Classe invalide. ';
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
    
    <title>Correction d'information</title>
</head>
<body>
    <?php include('Template/menu.php'); ?>

    <div class="container">
        <h1 class="teal-text">Correction d'information</h1>

        <form action="" method="POST">
            
                <h2> Nom :</h2> <input type="text" name="name" value="<?php echo $data['name']; ?>"> <br>
                <h2> Classe :</h2>
                <select name="class" >
                    <option value="" disabled selected><?php echo $data['class']; ?></option>
                    <option value="COMBATTANT">COMBATTANT</option>
                    <option value="MAGE">MAGE</option>
                    <option value="ASSASSIN">ASSASSIN</option>TIREUR
                    <option value="TIREUR">TIREUR</option>SUPPORT
                    <option value="SUPPORT">SUPPORT</option>
                </select> <br>
                <h2>Image : </h2> <input type="text" name="image" value="<?php echo $data['image']; ?>" > <br>
                <h2>Type de dégâts :</h2>
                <select name="damage" >
                    <option value="" disabled selected><?php echo $data['damage']; ?></option>
                    <option value="AP">AP</option>
                    <option value="AD">AD</option>
                    <option value="Les deux">Les deux</option>
                </select> <br>
                <h2> A : </h2> <input type="text" name="A" value="<?php echo $data['A']; ?>" class="form-control"> <br>
                <h2> Z : </h2> <input type="text" name="Z" value="<?php echo $data['Z']; ?>" class="form-control"> <br>
                <h2> E : </h2> <input type="text" name="E" value="<?php echo $data['E']; ?>" class="form-control"> <br>
                <h2> R : </h2> <input type="text" name="R" value="<?php echo $data['R']; ?>" class="form-control"> <br>
                <span><?php echo $errors; ?></span> <br>

            <input type="submit" value="Modifier" >
        </form>
        
        <?php include('Template/footer.php'); ?> 
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>