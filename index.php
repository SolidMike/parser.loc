<?php
namespace Facebook\WebDriver;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;

require_once('vendor/autoload.php');
include('PDO.php');



function parse($dbh) {
$host = 'http://localhost:4444';

$driver = RemoteWebDriver::create($host, DesiredCapabilities::chrome());

$driver->get('https://rozetka.com.ua');

$tag = WebDriverBy::className('main-slider__title');

$links = $driver->findElements($tag);

    foreach ($links as $key => $value) {
        $link = $value->getAttribute("innerText");
        try {
            $sql = "INSERT INTO parsed (title) VALUES ('".$link."')";
            $dbh->query($sql);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}

if (isset($_GET['parse'])) {
    parse($dbh);
}

function delete($dbh) {
    try {
        $sql = "DELETE FROM parsed";
        $dbh->query($sql);
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
}

if (isset($_GET['delete'])) {
    delete($dbh);
}

?>
<!doctype html>
<html lang="en">
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
        <div class="buttons-wrapper">
            <a href="/?parse=true" class="btn btn-primary">Распарсить акции</a>
            <a href="/?delete=true" class=" btn btn-primary">Удалить старые данные</a>
            <a href="/show.php" class="btn btn-primary">Просмотреть данные</a>
        </div>
    </div>
</div>
</body>
</html>

