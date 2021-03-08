<?php
require_once('session.php');
require_once('db.php');

$id = $_GET['id'] ?? null;

if($id === null) {
    die("Niepoprawne żądanie!");
}

$sql = "UPDATE `todo` SET status=1 WHERE uId=:uId and id=:id";
$stmt = $db->prepare($sql);
$stmt->execute([
    ':id' => $id,
    ':uId' => $_SESSION['userId'],
]); 


header('Location: index.php');    