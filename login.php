<?php
require_once('db.php');

session_start();

$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;
$data = null;
if($username !== null && $password !== null) {
    $sql = "select id from user where username=:username and password=:password";
    $stmt = $db->prepare($sql);
    $stmt->execute([
        ':username' => $username,
        ':password' => $password,
    ]);

    $data = $stmt->fetch();

    if($data !== false) {
        $_SESSION['userId'] = $data['id'];
        header('Location: index.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularze</title>
</head>
<body>
    <h1>Logowanie</h1>
    <?php if($data === false): ?>
        <h2>Błędne dane logowania</h2>
    <?php endif; ?>
    <form method="post">
        <input type="text" name="username" placeholder="login">    
        <input type="text" name="password" placeholder="password">  
        <input type="hidden" name="imie" value="<?= $_GET['imie']  ?>">  
        <button type="submit">Wyślij</button>
    </form>
</body>
</html>