<?php
include 'includes/header.php';

$countTablesFromDb1 = "SELECT count(*) as count1 from information_schema.`COLUMNS` WHERE TABLE_SCHEMA='zaymer' AND EXTRA = 'auto_increment' order by TABLE_NAME asc;";
$countTablesResultDb1 = mysqli_query($db1, $countTablesFromDb1);
$countForDb1 = mysqli_fetch_assoc($countTablesResultDb1);

$showListTablesDb1 = "select TABLE_NAME from information_schema.`COLUMNS` WHERE TABLE_SCHEMA='zaymer' AND EXTRA = 'auto_increment' GROUP BY table_name ORDER BY TABLE_NAME ASC";
$resultShowListTablesDb1 = mysqli_query($db1, $showListTablesDb1);

//
//$countTablesFromDb2= "SELECT count(*) as count1 from information_schema.`COLUMNS` WHERE TABLE_SCHEMA='zaymer' AND EXTRA = 'auto_increment' order by TABLE_NAME asc;";
//$countTablesResultDb2 = mysqli_query($db2, $countTablesFromDb2);
//$countForDb2 = mysqli_fetch_assoc($countTablesResultDb2);
//
//$showListTablesDb2 = "select TABLE_NAME from information_schema.`COLUMNS` WHERE TABLE_SCHEMA='zaymer' AND EXTRA = 'auto_increment' GROUP BY table_name ORDER BY TABLE_NAME ASC";
//$resultShowListTablesDb2 = mysqli_query($db2, $showListTablesDb2);


?>

    <div class="container pt-5">
        <div class="row">
            <div class="col">
                <h3>Хост: <?php echo $host1; ?></h3>
                <h5 class="text-secondary"><?php echo $countForDb1['count1']; ?> - таблиц</h5>
                <form method="post" action="preview.php">

                <?php
                while($rowsDb1 = mysqli_fetch_assoc($resultShowListTablesDb1)) {
                    echo "<div class='form-check'>";
                    echo "<input type='checkbox' name='' class='form-check-input' id='exampleCheck1'>";
                    echo "<label class='form-check-label' for='exampleCheck1'>"."$rowsDb1[TABLE_NAME]"."</label></div>";
                }
                ?>

            </div>
<!--            <div class="col">-->
<!--                <h3>Хост: --><?php //echo $host2; ?><!--</h3>-->
<!--                <h5 class="text-secondary">--><?php //echo $countForDb2['count1']; ?><!-- - таблиц</h5>-->
<!--                --><?php
//                while($rowsDb2 = mysqli_fetch_assoc($resultShowListTablesDb2)) {
//                    echo "<div class='form-check'>";
//                    echo "<input type='checkbox' class='form-check-input' id='exampleCheck1'>";
//                    echo "<label class='form-check-label' for='exampleCheck1'>"."$rowsDb2[TABLE_NAME]"."</label></div>";
//                }
//                ?>
<!--            </div>-->
            </div>
        </div>
    </div>



<?php

include 'includes/footer.php';
?>
