<?php
session_start();
error_reporting(E_ERROR);
?>
<html>
<body>
<?php
include("db.php");
if(isset($_SESSION['user']) && $_SESSION['user']=="admin") {
include("adminp.php");
$dt=date('m',time());
$rs=mysqli_query($link,"select empid,empname,task,allotdate,finished from tasks where finished is not null and month(finished)='$dt' order by finished-allotdate") or die(mysql_error());
echo "<br><br><br><br><table border='1' align='center'><tr><th colspan='6'><h3>Best Employee of the Month</h3></th></tr>";
echo "<tr><th>Rank</th><th>Emp Id</th><th>Emp Name</th><th>Task</th><th>Allotted On</th><th>Completed On</th></tr>";
$i=1;
while($r=mysqli_fetch_array($rs)) {
echo "<tr><td align='center'><b><font color='green'>".$i++."</font></b></td><td>$r[0]</td><td>$r[1]</td><td>$r[2]</td><td>$r[3]</td><td>$r[4]</td></tr>";
}
echo "</table>";
}
else {
echo "<hr><h3 align='center'>You are not Authorized to view the page</h3><hr>";
}
?>
</body>
</html>