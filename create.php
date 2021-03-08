<?php
require_once('session.php');
require_once('db.php');

$title = $_POST['title'] ?? null;
$description = $_POST['description'] ?? null;

if($title !== null && $description !== null) {
    $sql = "INSERT INTO `todo` (`uId`, `title`, `description`, `status`, `createdAt`, `deadTime`) VALUES (:uId, :title, :description,  0, :createdAt, :deadTime)";
    $stmt = $db->prepare($sql);
    $stmt->execute([
        ':uId' => $_SESSION['userId'],
        ':title' => $title,
        ':description' => $description,
        ':createdAt' => time(),
        ':deadTime' => time() + 7 * 24 * 3600,
    ]); 
}

header('Location: index.php');