<!doctype html>
<html>
    <body>
<?php
include("userp.php");
include("db.php");
echo "<br><br><br><br><br>";
if(!isset($_GET['rid']) && !isset($_POST['submit'])) {
    $res1 = mysqli_query($link, "select e.id,toid,bugid,b.projid,b.bugdesc,sshot,replymsg from email e,bugs b where e.bugid=b.id and toid=$_SESSION[userid]") or die(mysqli_error($link));
    if(mysqli_num_rows($res1)>0) {
        echo "<table border='1' style='margin:auto;margin-top: 50px;'><tr><th colspan='8'>RECEIVED MAILS";
        echo '<tr><th>Id<th>To Id<th>BugId<th>ProjId<th>Descr<th>Screen<th>Reply<th>Task';
        while($r1 = mysqli_fetch_row($res1)) {
            echo "<tr>";
            foreach($r1 as $k=>$rr) {
                if($k==5)
                    echo "<td><img src='$rr' width='50px' onclick=\"javascript:window.open('$rr')\">";
                else
                    echo "<td>$rr";                
            }
            echo "<th><a href='receivedmail.php?rid=$r1[0]'>Reply</a>";            
        }
    echo "</table>";
    } else {
        echo "<div style='margin-top:100px;text-align:center;'>";
        echo "No Received Mails Found...!";
        echo "</div>";
    }
    mysqli_free_result($res1);
} else if(isset($_GET['rid']) && !isset($_POST['submit'])) {
    $rid = $_GET['rid'];
?>
        <form name="f" action="" method="post">
            <table style="margin:auto;">
                <thead>
                    <tr>
                        <th colspan="2">
                            Send a Solution
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Id</th>
                        <td><input type="text" name="mid" value="<?php echo $rid?>" readonly></td>
                    </tr>                    
                    <tr>
                        <th>Solution</th>
                        <td><textarea name="solution" required></textarea></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="2">
                            <input type="submit" name="submit" value="Send">
                        </th>
                    </tr>
                </tfoot>
            </table>
        </form>
<?php
} else if(isset($_POST['submit'])) {
    $mid = $_POST['mid'];
    $solution = $_POST['solution'];
    
    mysqli_query($link, "update email set replymsg='$solution' where id=$mid") or die(mysqli_error($link));
    echo "<div style='margin-top:100px;text-align:center;'>";
        echo "Reply Send Successfully...<br><a href='receivedmail.php'>Back</a>";
        echo "</div>";
}
?>
</body>
</html>