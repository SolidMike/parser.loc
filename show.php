<?php
include('PDO.php');

$stmt = $dbh->query('SELECT * FROM parsed');
$data = $stmt->fetchAll();
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Наименование акции</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data as $key => $val) :?>
            <tr>

                <th scope="row"><?=$val['id']; ?></th>
                <td><?=$val['title']; ?></td>
            </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <div class="row">
        <a href="/" class="btn btn-primary">Назад</a>
    </div>
</div>
</body>
</html>


