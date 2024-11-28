<?php
 include './db.php';
    $id = $_GET['id'];
    $res1 = mysqli_query($link, "select pname from proj where id=$id") or die(mysqli_error($link));
    $r1 = mysqli_fetch_row($res1);
    mysqli_free_result($res1);
    echo $r1[0];
?>
