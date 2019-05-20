<?php
include 'includes/header.php';

$table_name = 'sms_hlrs';
$step = 10000;



$queryMaxIdDB1 = "SELECT max(id) FROM $table_name";
$resultMaxDB1 = mysqli_query($db1, $queryMaxIdDB1);
$resultMaxDB2 = mysqli_query($db2, $queryMaxIdDB1);
$maxIDdb1 = mysqli_fetch_row($resultMaxDB1);
$maxIDdb2 = mysqli_fetch_row($resultMaxDB2);

$queryMinIdDB1 = "SELECT min(id) FROM $table_name";
$resultMinDB1 = mysqli_query($db1, $queryMinIdDB1);
$resultMinDB2 = mysqli_query($db2, $queryMinIdDB1);
$minIDdb1 = mysqli_fetch_row($resultMinDB1);
$minIDdb2 = mysqli_fetch_row($resultMinDB2);

if ($minIDdb1[0] <= $minIDdb2[0]) {
    $start_id = $minIDdb1[0];
} else {
    $start_id = $minIDdb2[0];
}

if ($maxIDdb1[0] <= $maxIDdb2[0]) {
    $finish_id = $maxIDdb1[0];
} else {
    $finish_id = $maxIDdb2[0];
}

echo 'Таблица: <b>', $table_name, '</b><br>';
echo 'Стартовый ID: ', $start_id, '<br>';
echo 'Максимальный ID: ', $finish_id, '<br>';

for ($i = $start_id; $i <= $finish_id; $i = $i + $step) {

    if ($i + $step > $finish_id) {
        $counter = $finish_id;
        $mainQuery = "SELECT * FROM $table_name WHERE id >= 0 + $i AND id <= $finish_id ORDER BY id ASC";
    } else {
        $counter = $i + $step - 1;
        $mainQuery = "SELECT * FROM $table_name WHERE id >= 0 + $i AND id < $step + $i ORDER BY id ASC";
    }
    $resultDB1 = mysqli_query($db1, $mainQuery);
    $resultDB2 = mysqli_query($db2, $mainQuery);
    $arrayDB1 = mysqli_fetch_all($resultDB1);
    $arrayDB2 = mysqli_fetch_all($resultDB2);

    if ($arrayDB1 == $arrayDB2) {
        echo '<div class="text-success">Строки равны. От (' . $i . ') до (' . $counter . ') </div>';
    } else {
        $doubleResultDB1 = mysqli_query($db1, $mainQuery);
        $doubleResultDB2 = mysqli_query($db2, $mainQuery);
        $doubleArrayDB1 = mysqli_fetch_all($doubleResultDB1);
        $doubleArrayDB2 = mysqli_fetch_all($doubleResultDB2);
        if ($doubleArrayDB1 == $doubleArrayDB2) {
            echo '<div class="text-info">Строки равны. От (' . $i . ') до (' . $counter . ')</div>';
        } else {
            echo '<div class="text-danger">Строки не равны. От (' . $i . ') до (' . $counter . ') </div>';

            if ($i + $step > $finish_id) {
                $counterS = $finish_id;
                $queryToDB1 = "SELECT * FROM $table_name WHERE id >= 0 + $i AND id <= $finish_id ORDER BY id ASC";
            } else {
                $counter = $i + $step - 1;
                $queryToDB1 = "SELECT * FROM $table_name WHERE id >= 0 + $i AND id < $step + $i ORDER BY id ASC";
            }
            $resultDB1 = mysqli_query($db1, $queryToDB1);
            $resultDB2 = mysqli_query($db2, $queryToDB1);

            $queryMinIdDB1 = "SELECT min(id) FROM $table_name WHERE id >= 0 + $i AND id < $step + $i ORDER BY id ASC";
            $resultMinDB1 = mysqli_query($db1, $queryMinIdDB1);
            $resultMinDB2 = mysqli_query($db2, $queryMinIdDB1);
            $minIDdb1 = mysqli_fetch_row($resultMinDB1);
            $minIDdb2 = mysqli_fetch_row($resultMinDB2);

            $queryMaxIdDB1 = "SELECT max(id) FROM $table_name WHERE id >= 0 + $i AND id < $step + $i ORDER BY id ASC";
            $resultMaxDB1 = mysqli_query($db1, $queryMaxIdDB1);
            $resultMaxDB2 = mysqli_query($db2, $queryMaxIdDB1);
            $maxIDdb1 = mysqli_fetch_row($resultMaxDB1);
            $maxIDdb2 = mysqli_fetch_row($resultMaxDB2);

            $rowsDB1 = array();
            while ($rowDB1 = $resultDB1->fetch_assoc()) {
                $rowsDB1[] = $rowDB1;
            }

            $rowsDB2 = array();
            while ($rowDB2 = $resultDB2->fetch_assoc()) {
                $rowsDB2[] = $rowDB2;
            }

            if ($minIDdb1[0] <= $minIDdb2[0]) {
                $minID = $minIDdb1[0];
            } else {
                $minID = $minIDdb1[0];
            }

            if ($maxIDdb1[0] >= $maxIDdb2[0]) {
                $maxID = $maxIDdb1[0];
            } else {
                $maxID = $maxIDdb2[0];
            }

            $new_array = array();
            $new_array[] = array_merge($rowsDB1, $rowsDB2);

            foreach ($new_array as $k => $v) {
                for ($iS = $minID; $iS <= $maxID; $iS++) {
                    $couple = array();
                    foreach ($v as $k2 => $v2) {
                        if ($v2['id'] == $iS) {
                            $couple[] = $v2;
                        }
                    }
                    if (!empty($couple[0]['id'])) {
                        if (empty($couple[1])) {
                            echo "<b>Для id = ", $couple[0]['id'], '</b><br>';
                            echo "<label class='text-primary'>Уникальная строка: </label><br>";
                            echo print_r($couple[0], true), "<br><br>";
                        } else {
                            $merge_couple = array_diff($couple[0], $couple[1]);
                            if (empty($merge_couple)) {
                                // echo "<b>Для id = ", $couple[0]['id'], '</b><br>';
                                // echo "<label class='text-success'>Различий не найдено.</label> <br><br>";
                            } else {
                                echo "<b>Для id = ", $couple[0]['id'], '</b><br>';
                                echo "<label class='text-danger'>Различие найдено:</label><br>";
                                echo print_r($merge_couple, true), '<br><br>';
                            }
                        }
                    }
                }
            }
        }
    }
}




?>

<div class="container">
    <div class="row">


    </div>
</div>

<?php


include 'includes/footer.php';
?>

