<?php
require_once('session.php');
require_once('db.php');

$id = $_GET['id'] ?? null;

if($_GET === null)
{
    die("Niepodążane żądanie!");
}

$sql = "DELETE from todo where uId=:uId and id=:id";
$stmt = $db->prepare($sql);
$stmt->execute([
    ':id' => $id,
    ':uId' => $_SESSION['userId'],
]);

header("Location: index.php");

?>