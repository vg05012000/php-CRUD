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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <title>Correction d'information</title>
</head>
<body>
    <?php include('Template/menu.php'); ?>

    <div class="container">
        <h1 class="teal-text">Correction d'information</h1>

        <form action="" method="POST">
            Nom : <input type="text" name="name" value="<?php echo $data['name']; ?>"> <br>
            Classe : <input type="text" name="class" value="<?php echo $data['class']; ?>"> <br>
            Image : <input type="text" name="image" value="<?php echo $data['image']; ?>"> <br>
            Type de dégâts : <input type="text" name="damage" value="<?php echo $data['damage']; ?>"> <br>
            A : <input type="text" name="A" value="<?php echo $data['A']; ?>"> <br>
            Z : <input type="text" name="Z" value="<?php echo $data['Z']; ?>"> <br>
            E : <input type="text" name="E" value="<?php echo $data['E']; ?>"> <br>
            R : <input type="text" name="R" value="<?php echo $data['R']; ?>"> <br>
            <span class="red white-text"><?php echo $errors; ?></span> <br>

            <input type="submit" value="Modifier" class="teal btn">
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html