<?php
include './db.php';
    $eid = $_GET['eid'];
    $rs = mysqli_query($link, "select domain from empdetails where empid='$eid'");
    $r = mysqli_fetch_row($rs);
    mysqli_free_result($rs);
    echo $r[0];
?>