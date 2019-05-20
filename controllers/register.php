<?php

include '../includes/header.php';

$db1Host = $_POST['host-1'];
$db1User = $_POST['user-1'];
$db1Password = $_POST['password-1'];
$db1Database = $_POST['database-1'];

$db2Host = $_POST['host-2'];
$db2User = $_POST['user-2'];
$db2Password = $_POST['password-2'];
$db2Database = $_POST['database-2'];


$list = array(array($db1Host, $db1User, $db1Password, $db1Database, $db2Host, $db2User, $db2Password, $db2Database), );

print_r($list);

$fp = fopen('../db.csv', 'w');

foreach ($list as $fields) {
    fputcsv($fp, $fields);
}

fclose($fp);

header( 'Location: ../previewDB.php');
exit;


