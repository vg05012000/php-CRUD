<?php
 //isset($_POST['image']) && $_POST['price'] !== '' && is_numeric($_POST['price']) &&
 //isset($_POST['damage']) && $_POST['weight'] !== '' && is_numeric($_POST['weight'])

 //$req = $db->prepare('INSERT INTO champions (name, class, image, damage, A, Z, E, R) VALUES(:name, :class, :image, :damage, :A, :Z, :E, :R)');

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
        include('Config/db.php');
       

        $req = $db->prepare(
            'INSERT INTO champions (name, class, image, damage) VALUES(:name, :class, :image, :damage);
                INSERT INTO skill (A, Z, E, R) VALUES(:A, :Z, :E, :R)');

        $req->execute([
            'name' => $_POST['name'],
            'class' => $_POST['class'],
            'image' => $_POST['image'],
            'damage' => $_POST['damage'],
            'A' => $_POST['A'],
            'Z' => $_POST['Z'],
            'E' => $_POST['E'],
            'R' => $_POST['R']
        ]);

        header('Location: index.php');
        exit;
    } 

    $errors = '';
    if (isset($_POST['name']) && $_POST['name'] === '') {
      $errors .= 'Nom invalide. ';
    }

    if (isset($_POST['class']) && $_POST['class'] === '') {
      $errors .= 'Categorie invalide. ';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Création d'un champion</title>
</head>
<body>
    <nav class="teal">
        <div class="nav-wrapper container">
            <a href="#" class="brand-logo">Logo</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="index.php">Liste des champion</a></li>
                <li><a href="create.php">Création d'un céréal</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1 class="teal-text">Création d'un champion</h1>

        <form action="" method="POST">
            Nom : <input type="text" name="name"> <br>
            <select name="class" class="form-select form-select-lg" mb-3>
                <option value="" disabled selected>--sélection classe--</option>
                <option value="COMBATTANT">COMBATTANT</option>
                <option value="MAGE">MAGE</option>
                <option value="ASSASSIN">ASSASSIN</option>TIREUR
                <option value="TIREUR">TIREUR</option>SUPPORT
                <option value="SUPPORT">SUPPORT</option>
            </select> <br>
            Lien d'image : <input type="text" name="image"> <br>
            <select name="damage" class="form-select form-select-lg" mb-3>
                <option value="" disabled selected>--sélection dégats--</option>
                <option value="AP">AP</option>
                <option value="AD">AD</option>
                <option value="Les deux">Les deux</option>
            </select> <br>
            Nom comptétence A : <input type="text" name="A"> <br>
            Nom comptétence Z : <input type="text" name="Z"> <br>
            Nom comptétence E : <input type="text" name="E"> <br>
            Nom comptétence R : <input type="text" name="R"> <br>
            

            <span class="red white-text"><?php echo $errors; ?></span> <br>

            <input type="submit" value="Envoyer" class="teal btn">
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html