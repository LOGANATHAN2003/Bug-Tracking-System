<?php
include './db.php';
    $id = $_POST['id'];
    if(isset($_POST['delbutton'])) {
        //header("Location:edit.php?k=d&v=$id[0]");
        mysqli_query($link,"delete from empdetails where id=$id[0]") or die(mysqli_error($link));
        header("Location:edit1.php");
    } else if(isset($_POST['editbutton'])) {
        header("Location:updateform.php?k=e&v=$id[0]");
    } else if(isset($_POST['viewbutton'])) {
        header("Location:viewemp.php?id=$id[0]");
    }
?>