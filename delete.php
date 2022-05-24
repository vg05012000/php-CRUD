<?php 

include('Config/db.php');

$req = $db->prepare('DELETE FROM champions WHERE id=:id; DELETE FROM skill WHERE id=:id');
$req->execute([
   'id' => $_GET['id']
]);

header('Location: index.php');
exit;