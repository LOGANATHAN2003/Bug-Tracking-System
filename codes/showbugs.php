<!doctype html>
<html>
    <body>
<?php
include("userp.php");
include("db.php");
echo "<br><br><br><br><br>";
if(!isset($_GET['reply']) && !isset($_POST['update_button'])) {
$res1 = mysqli_query($link, "select * from bugs where projid in (select id from proj where empid=$_SESSION[userid]) order by id") or die(mysqli_error($link));
    echo "<table border='1' style='margin:auto;margin-top: 50px;'><tr><th colspan='7'>BUGS";
    echo '<tr><th>Id<th>Proj Id<th>Bug Descr<th>Screen<th>Date<th>Status<th>Task';
        while($r1 = mysqli_fetch_row($res1)) {
            echo "<tr>";
            foreach($r1 as $k=>$rr) {
                if($k==3)
                    echo "<td><img src='$rr' width='75px' onclick=\"javascript:window.open('$rr')\">";
                else
                    echo "<td>$rr";                
            }
            echo "<th><a href='showbugs.php?reply&id=$r1[0]'>Reply</a><hr>";            
        }
    echo "</table>";
} else if(isset($_GET['reply']) && !isset($_POST['update_button'])) {
    $id = $_GET['id'];
    $res1 = mysqli_query($link, "select pname,id from proj where id=(select projid from bugs where id=$id)") or die(mysqli_error($link));
    $r1 = mysqli_fetch_row($res1);
    mysqli_free_result($res1);
?>
        <form name="f" action="" method="post">
            <table style="margin:auto;">
                <thead>
                    <tr>
                        <th colspan="2">
                            Reporting a Solution
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Project Id</th>
                        <td>
                            <input type="hidden" name="bugid" value="<?php echo $id?>">
                            <input type="text" name="projid" value="<?php echo $r1[1]?>" readonly></td>
                    </tr>
                    <tr>
                        <th>Project Name</th>
                        <td><input type="text" name="pname" value="<?php echo $r1[0]?>" readonly></td>
                    </tr>
                    <tr>
                        <th>Solution</th>
                        <td><textarea name="solution" required></textarea></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="2">
                            <input type="submit" name="update_button" value="Update">
                        </th>
                    </tr>
                </tfoot>
            </table>
        </form>
<?php        
} else if(isset($_POST['update_button'])) {
    $bugid = $_POST['bugid'];
    $projid = $_POST['projid'];
    $solution = $_POST['solution'];
    
    mysqli_query($link, "insert into solutions (bugid,projid,solution) values ($bugid,$projid,'$solution')") or die(mysqli_error($link));
    mysqli_query($link, "update bugs set status='completed' where id=$bugid") or die(mysqli_error($link));
    header("Location:showbugs.php");
}
    ?>
    </body>
</html>