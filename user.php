<?php
require_once("db.php");

session_start();


// $sql = "select * from dane";

// $stmt = $db->prepare($sql);
// $stmt->execute();
// $dane = $stmt->fetchAll();

$sql = "select * from dane where id=:id";

$stmt = $db->prepare($sql);
$stmt->execute([
    ':id' => 2,
]);
$dane = $stmt->fetchAll();

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
    <pre>
        <?php
        print_r($dane);
        ?>
    </pre>
</body>
</html>
