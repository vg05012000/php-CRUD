<?php

    if (
      $_POST &&
      isset($_POST['name']) && $_POST['name'] !== '' &&
      isset($_POST['category']) && $_POST['category'] !== '' && 
      isset($_POST['price']) && $_POST['price'] !== '' && is_numeric($_POST['price']) &&
      isset($_POST['weight']) && $_POST['weight'] !== '' && is_numeric($_POST['weight'])
    ) {
        include('Config/db.php');

        $req = $db->prepare('INSERT INTO cereal(name, category, price, weight) VALUES(:name, :category, :price, :weight)');

        $req->execute([
            'name' => $_POST['name'],
            'category' => $_POST['category'],
            'price' => $_POST['price'],
            'weight' => $_POST['weight']
        ]);

        header('Location: index.php');
        exit;
    } 

    $errors = '';
    if (isset($_POST['name']) && $_POST['name'] === '') {
      $errors .= 'Nom invalide. ';
    }

    if (isset($_POST['category']) && $_POST['category'] === '') {
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

    <title>Création d'un paquet de céréal</title>
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
        <h1 class="teal-text">Création d'un paquet de céréal</h1>

        <form action="" method="POST">
            Nom : <input type="text" name="name"> <br>
            Categorie : <input type="text" name="category"> <br>
            Prix : <input type="number" name="price" value="<?php echo isset($_POST['price']) ? $_POST['price'] : ''; ?>"> <br>
            Poids en kl : <input type="number" name="weight"> <br>

            <span class="red white-text"><?php echo $errors; ?></span> <br>

            <input type="submit" value="Envoyer" class="teal btn">
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html