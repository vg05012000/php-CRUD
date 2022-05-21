<?php
 //isset($_POST['image']) && $_POST['price'] !== '' && is_numeric($_POST['price']) &&
 //isset($_POST['damage']) && $_POST['weight'] !== '' && is_numeric($_POST['weight'])
    if (
      $_POST &&
      isset($_POST['name']) && $_POST['name'] !== '' &&
      isset($_POST['class']) && $_POST['class'] !== '' && 
      isset($_POST['image']) && $_POST['image'] !== '' &&
      isset($_POST['damage']) && $_POST['damage'] !== '' &&
      isset($_POST['A']) && $_POST['A'] !== '' &&
      isset($_POST['Z']) && $_POST['Z'] !== '' &&
      isset($_POST['E']) && $_POST['E'] !== '' &&
      isset($_POST['R']) && $_POST['R'] !== '' 

    ) {
        include('Config/db.php');

        $req = $db->prepare('INSERT INTO lol(name, class, image, damage, A, Z, E, R) VALUES(:name, :class, :image, :damage, :A, :Z, :E, :R)');

        $req->execute([
            'name' => $_POST['name'],
            'class' => $_POST['class'],
            'image' => $_POST['image'],
            'damage' => $_POST['damage']
            'A' => $_POST['A']
            'Z' => $_POST['Z']
            'E' => $_POST['E']
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
        <h1 class="teal-text">Création d'un paquet de céréal</h1>

        <form action="" method="POST">
            Nom : <input type="text" name="name"> <br>
            Classe : <input type="text" name="class"> <br>
            Image : <input type="text" name="image"> <br>
            Damage : <input type="text" name="damage"> <br>
            A : <input type="text" name="A"> <br>
            Z : <input type="text" name="Z"> <br>
            E : <input type="text" name="E"> <br>
            R : <input type="text" name="R"> <br>
            

            <span class="red white-text"><?php echo $errors; ?></span> <br>

            <input type="submit" value="Envoyer" class="teal btn">
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html