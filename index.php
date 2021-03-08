<?php
require_once('session.php');
require_once('db.php');

$sql = "select * from todo where uId=:uId";
$stmt = $db->prepare($sql);
$stmt->execute([
    ':uId' => $_SESSION['userId'],
]);

$data = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo</title>
</head>
<body>
    <h1>Lista zadań</h1>

    <form action="create.php" method="post">
        <input type="text" name="title" placeholder="Tytuł">    
        <textarea name="description" id="descripiton" cols="30" rows="10"></textarea>
        
        <button type="submit">Dodaj</button>
    </form>

    <ul>
    <?php foreach($data as $item): ?>
        <li><?= $item['title'] ?> <a href="delete.php?id=<?= $item['id']?>">usuń</a></li>
    <?php endforeach; ?>

    <?php if(empty($data)): ?>
        <li>Brak zadań</li>
    <?php endif; ?>
    </ul>

    <a href="logout.php">Wyjście</a>
</body>
</html>
