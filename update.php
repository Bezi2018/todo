<?php
require_once('session.php');
require_once('db.php');

$STATUS = [
    'Zadanie rozpoczęte',
    'Zadanie zakończone',
    'Zadanie usunięte',
    'Zadanie wstrzymane',
];

$id = $_GET['id'] ?? null;

if($id === null) {
    die("Niepoprawne żądanie!");
}

$sql = "SELECT * FROM `todo` WHERE uId=:uId and id=:id";
$stmt = $db->prepare($sql);
$stmt->execute([
    ':id' => $id,
    ':uId' => $_SESSION['userId'],
]); 

$data = $stmt->fetch();

if(empty($data)) {
    header('Location: index.php'); 
    return;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Lista zadań</h1>

    <form action="update-save.php" method="post">
        <input type="text" name="title" placeholder="Tytuł" value="<?= $data['title'] ?>"> <br />   
        <textarea name="description" id="descripiton" cols="30" rows="10"><?= $data['description'] ?></textarea>
        <input type="hidden" name="todoId" value="<?= $data['id'] ?>">
        
        <select name='status'>
        <?php foreach($STATUS as $key => $item): ?>
            <option value = "<?= $key ?>" <?= $key == $data['status'] ? "selected=selected" : ""?>><?= $item ?></option>
        <? endforeach; ?>
        </select>
        
        <button type="submit">Zmień</button>
    </form>

    <a href="index.php">Anuluj</a>
</body>
</html>