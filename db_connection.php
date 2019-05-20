<?php
$filename = 'db.csv';
if (!file_exists($filename)) {
    $myfile = fopen("db.csv", "w");
}

$old = ini_set('memory_limit', '60000M');
$time_limit = set_time_limit(6000);

$row = 1;
if (($handle = fopen("db.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $host1 = $data[0];
        $user1 = $data[1];
        $password1 = $data[2];
        $dbname1 = $data[3];
        $host2 = $data[4];
        $user2 = $data[5];
        $password2 = $data[6];
        $dbname2 = $data[7];
    }
    fclose($handle);
}


$db1 = mysqli_connect($host1, $user1, $password1, $dbname1);
$db2 = mysqli_connect($host2, $user2, $password2, $dbname2);


?>
