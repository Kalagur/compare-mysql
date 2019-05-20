<?php
include 'includes/header.php';

$countTablesFromDb1 = "SELECT count(*) as count1 FROM
                information_schema.TABLES
            WHERE
                TABLE_SCHEMA = '.$dbname1.' order by TABLE_NAME asc;";
$countTablesResultDb1 = mysqli_query($db1, $countTablesFromDb1);
$countForDb1 = mysqli_fetch_assoc($countTablesResultDb1);

$showListTablesDb1 = "SELECT
                    cl.TABLE_NAME TABLE_NAME,
                    cl.COLUMN_NAME COLUMN_NAME,
                    cl.COLUMN_TYPE COLUMN_TYPE
                  FROM information_schema.columns cl,  information_schema.TABLES ss
                  WHERE
                    cl.TABLE_NAME = ss.TABLE_NAME AND
                    cl.TABLE_SCHEMA = '.$dbname1.'
                  ORDER BY
                    cl.table_name";


$resultShowListTablesDb1 = mysqli_query($db1, $showListTablesDb1);

$countTablesFromDb2 = "SELECT count(*) as count1 FROM
                information_schema.TABLES
            WHERE
                TABLE_SCHEMA = '.$dbname1.' order by TABLE_NAME asc;";
$countTablesResultDb2 = mysqli_query($db2, $countTablesFromDb2);
$countForDb2 = mysqli_fetch_assoc($countTablesResultDb2);

$showListTablesDb2 = "SELECT
                    cl.TABLE_NAME TABLE_NAME,
                    cl.COLUMN_NAME COLUMN_NAME,
                    cl.COLUMN_TYPE COLUMN_TYPE
                  FROM information_schema.columns cl,  information_schema.TABLES ss
                  WHERE
                    cl.TABLE_NAME = ss.TABLE_NAME AND
                    cl.TABLE_SCHEMA = '.$dbname1.'
                  ORDER BY
                    cl.table_name";
$resultShowListTablesDb2 = mysqli_query($db2, $showListTablesDb2);

if ($countForDb1['count1'] == $countForDb2['count1']) {
    $countClass = 'text-success';
} else {
    $countClass = 'text-danger';
}
?>

<div class="container pt-5">
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">
                        <p><?php echo $dbname1; ?></p>
                        <p class="text-secondary"><?php echo $host1; ?> <sup
                                    class="<?php echo $countClass; ?>"><?php echo $countForDb1['count1']; ?></sup></p>
                    </th>
                    <th scope="col">
                        <p><?php echo $dbname2; ?></p>
                        <p class="text-secondary"><?php echo $host2; ?> <sup
                                    class="<?php echo $countClass; ?>"><?php echo $countForDb2['count1']; ?></sup></p>
                    </th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>
                        <?php
                        while ($rowsDb1 = mysqli_fetch_assoc($resultShowListTablesDb1)) {
                            echo "<h5>$rowsDb1[TABLE_NAME]</h5>";

                        }
                        ?>
                    </td>

                    <td>
                        <?php
                        while ($rowsDb2 = mysqli_fetch_assoc($resultShowListTablesDb2)) {
                            echo "<h5>$rowsDb2[TABLE_NAME]</h5>";
                        }
                        ?>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>


<?php

include 'includes/footer.php';
?>