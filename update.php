<?php

    include('Config/db.php');

    if (
      $_POST &&
      isset($_POST['name']) && $_POST['name'] !== '' &&
      isset($_POST['category']) && $_POST['category'] !== '' && 
      isset($_POST['price']) && $_POST['price'] !== '' && is_numeric($_POST['price']) &&
      isset($_POST['weight']) && $_POST['weight'] !== '' && is_numeric($_POST['weight'])
    ) {
        $req = $db->prepare('UPDATE cereal SET name=:name, category=:category, price=:price, weight=:weight WHERE id=:id');

        $req->execute([
            'name' => $_POST['name'],
            'category' => $_POST['category'],
            'price' => $_POST['price'],
            'weight' => $_POST['weight'],
            'id' => $_GET['id']
        ]);

        header('Location: show.php?id=' . $_GET['id']);
        exit;
    } else {
        $response = $db->query('SELECT * FROM cereal WHERE id=' . $_GET['id']);
        $data = $response->fetch();
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
    <?php include('Template/menu.php'); ?>

    <div class="container">
        <h1 class="teal-text">Création d'un paquet de céréal</h1>

        <form action="" method="POST">
            Nom : <input type="text" name="name" value="<?php echo $data['name']; ?>"> <br>
            Categorie : <input type="text" name="category" value="<?php echo $data['category']; ?>"> <br>
            Prix : <input type="number" name="price" value="<?php echo $data['price']; ?>"> <br>
            Poids en kl : <input type="number" name="weight" value="<?php echo $data['weight']; ?>"> <br>

            <span class="red white-text"><?php echo $errors; ?></span> <br>

            <input type="submit" value="Modifier" class="teal btn">
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html