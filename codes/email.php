<!doctype html>
<html>
    <body>
<?php
include("userp.php");
include("db.php");
echo "<br><br><br><br><br>";
if(!isset($_POST['submit'])) {
    $res1 = mysqli_query($link, "select empid from empdetails where empid != $_SESSION[userid] and domain='$_SESSION[lang]'") or die(mysqli_error($link));
    $res2 = mysqli_query($link, "select id,bugdesc from bugs where projid in (select id from proj where empid=$_SESSION[userid]) order by id") or die(mysqli_error($link));
?>
<form name="f" action="" method="post">
            <table style="margin:auto;">
                <thead>
                    <tr>
                        <th colspan="2">
                            E-Mail
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>To Id</th>
                        <td>
                            <select name="toid">
                                <?php
                                while($r1 = mysqli_fetch_row($res1)) {
                                    echo "<option value=$r1[0]>$r1[0]</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Subject of Error</th>
                        <td>
                            <select name="bugid">
                                <?php
                                while($r1 = mysqli_fetch_row($res2)) {
                                    echo "<option value=$r1[0]>$r1[1]</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>                    
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="2">
                            <input type="submit" name="submit" value="Send Mail">
                        </th>
                    </tr>
                </tfoot>
            </table>
        </form>
<?php
                mysqli_free_result($res1);
                mysqli_free_result($res2);
} else {
    $fromid = $_SESSION['userid'];
    $toid = $_POST['toid'];
    $bugid = $_POST['bugid'];
        
    mysqli_query($link, "insert into email (fromid,toid,bugid) values ($fromid,$toid,$bugid)") 
or die("<div style='margin-top:100px;text-align:center;'>Mail Already sent for this user<br><a href='email.php'>Back</a></div>");
    echo "<div style='margin-top:100px;text-align:center;'>";
    echo "E-Mail Send Successfully...<br><a href='email.php'>Back</a>";
    echo "</div>";   
}
    $res1 = mysqli_query($link, "select e.id,toid,bugid,b.projid,b.bugdesc,replymsg from email e,bugs b where e.bugid=b.id and fromid=$_SESSION[userid]") or die(mysqli_error($link));
    if(mysqli_num_rows($res1)>0) {
        echo "<table border='1' style='margin:auto;margin-top: 50px;'><tr><th colspan='7'>SENT MAILS";
    echo '<tr><th>Id<th>To Id<th>BugId<th>ProjId<th>Descr<th>Reply';
        while($r1 = mysqli_fetch_row($res1)) {
            echo "<tr>";
            foreach($r1 as $k=>$rr) {                
                    echo "<td>$rr";                
            }
            //echo "<th><a href='email.php?id=$r1[0]'></a><hr>";            
        }
    echo "</table>";
    } else {
        echo "<div style='margin-top:100px;text-align:center;'>";
        echo "No Send Mails Found...!";
        echo "</div>";
    }
    mysqli_free_result($res1);
?>
</body>
</html>