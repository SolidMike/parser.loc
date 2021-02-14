<?php
$dbh = new PDO('mysql:host=localhost;dbname=stocks_db', 'root', '');

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);