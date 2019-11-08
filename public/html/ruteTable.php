<?php
include '../../app/BDConnectio/DBConnection.php';
include '../../app/Model/Rute.php';

$array = [];
$sql = "SELECT * FROM rutes;";
$stmt = DBConnection::getInstance()->getConnection()->prepare($sql);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
    $array[] = $var = new Rute($row[0], $row[1], $row[2], $row[3]);
}

//var_dump($array);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <style>
        table, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>

<h1>Rutes</h1>

<table>
    <?php foreach ($array as $rute) : ?>
        <tr>
            <td><?= $rute->getId() ?></td>
            <td><?= $rute->getZone() ?></td>
            <td><?= $rute->getKm() ?></td>
            <td><?= $rute->getDifficulty() ?></td>
        </tr>

    <?php endforeach; ?>
</table>
</body>
</html>