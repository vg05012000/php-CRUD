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
    <link rel="icon" href="./image/LogoIco.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="Style/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600&display=swap" rel="stylesheet">
    
    <title>Création d'un champion</title>
</head>
<body>
    <?php include('Template/menu.php'); ?>

    <div class="container">
        <h1 class="teal-text">Création d'un champion</h1>

        <form action="" method="POST">
            <div class="form-outline mb-4">
                <h2> Nom : </h2> <input type="text" class="form-control" name="name"> <br>
            </div>
            <div class="form-outline mb-4">
                <h2>Classe : </h2>
                <select name="class" class="form-select " mb-3>
                    <option value="" disabled selected>--sélection classe--</option>
                    <option value="COMBATTANT">COMBATTANT</option>
                    <option value="MAGE">MAGE</option>
                    <option value="ASSASSIN">ASSASSIN</option>TIREUR
                    <option value="TIREUR">TIREUR</option>SUPPORT
                    <option value="SUPPORT">SUPPORT</option>
                </select> <br>
            </div>
            <div class="form-outline mb-4">
                <h2>Lien d'image : </h2> <input type="text" class="form-control" name="image"> <br>
            </div>
            <div class="form-outline mb-4">
                <h2>Type de dégâts :</h2>
                <select name="damage" class="form-select" mb-3>
                    <option value="" disabled selected>--sélection dégats--</option>
                    <option value="AP">AP</option>
                    <option value="AD">AD</option>
                    <option value="Les deux">Les deux</option>
                </select> <br>
            </div>
            <div class="form-outline mb-4">
                <h2>Nom comptétence A : </h2> <input type="text" class="form-control" name="A"> <br>
                <h2>Nom comptétence Z : </h2> <input type="text" class="form-control" name="Z"> <br>
                <h2>Nom comptétence E : </h2> <input type="text" class="form-control" name="E"> <br>
                <h2>Nom comptétence R : </h2> <input type="text" class="form-control" name="R"> <br>
            </div>
            

            <span class="red white-text"><?php echo $errors; ?></span> <br>

            <input type="submit" value="Envoyer" class="btn boutton">
        </form>
        <?php include('Template/footer.php'); ?> 
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html