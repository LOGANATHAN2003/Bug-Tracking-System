<!doctype html>
<html>
<script type="text/javascript">
function confm() {
rv=confirm("Are You sure to Delete")
return rv
}
</script>
<body>
<?php
include("adminp.php");
include("db.php");
$res1 = mysqli_query($link, "select distinct usertype from empdetails order by usertype") or die(mysqli_error($link));
$res2 = mysqli_query($link, "select empid from empdetails order by empid") or die(mysqli_error($link));
?>
    <br><br><br><br>
    <center>
<form name="f" action="edit.php" method="post">
    USER DISPLAY <BR><br>
    Select Usertype
    <select name="usertype">
        <?php
        while($r1 = mysqli_fetch_row($res1)) {
            echo "<option value='$r1[0]'>$r1[0]</option>";
        }
        mysqli_free_result($res1);
        ?>
    </select>
    <br>
    <input type="submit" name="submit" value="Show Records">
</form>
        <br><br><br>
<form name="f" action="edit.php" method="post">
    USER DISPLAY <br>
    Select Employee Id
    <select name="empid">
        <?php
        while($r1 = mysqli_fetch_row($res2)) {
            echo "<option value='$r1[0]'>$r1[0]</option>";
        }
        mysqli_free_result($res2);
        ?>
    </select>
    <br>
    <input type="submit" name="submit1" value="Show Records">
</form>        
    </center>
<?php

?>
</body>
</html>