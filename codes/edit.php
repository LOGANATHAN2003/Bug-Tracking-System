<!doctype html>
<html>    
<script type="text/javascript">
function confm() {
rv=confirm("Are You sure to Delete")
return rv
}
function call() {
window.print();
}
</script>
<body>
<?php
include("adminp.php");
?>
    <style>
    a.button {
        text-decoration: none;
        font-weight: normal;
        color: black;
        border: solid thin gray;
        padding: 3px 5px;
        border-radius: 4px;
        background: rgba(250,250,250,1);
        background: -webkit-linear-gradient(rgba(250,250,250,1),rgba(210,210,210,1));
        background: -o-linear-gradient(rgba(250,250,250,1),rgba(210,210,210,1));
        background: -moz-linear-gradient(rgba(250,250,250,1),rgba(210,210,210,1));
        background: linear-gradient(rgba(250,250,250,1),rgba(210,210,210,1));
        cursor:default;
    }
</style>
    <?php
if(isset($_SESSION['user']) && $_SESSION['user']=="admin") {
include("db.php");
if(isset($_POST['submit'])) {
$utype = $_POST['usertype'];
//$rs=mysqli_query($link,"select id,empname,empid,sex gender,dob,usertype,dept,ph,contactaddr,permaddr,compemailid as mailid,persemailid as password,sal from empdetails where usertype='$utype'");
$rs=mysqli_query($link,"select id,empname,empid,usertype,dept,sal from empdetails where usertype='$utype'");
include './empbyjob.php';
} else if(isset($_POST['submit1'])) {
    $empid = $_POST['empid'];
    $rs=mysqli_query($link,"select id,empname,empid,usertype,dept,sal from empdetails where empid='$empid'");
    
    for($i=0; $i<mysqli_num_fields($rs); $i++) {
$ob =  mysqli_fetch_field($rs);
$h[] = $ob->name;
}

if(isset($_SESSION['dflag'])&&$_SESSION['dflag']==true) {
echo "<script type='text/javascript'>alert('Record Deleted')</script>";
$_SESSION['dflag']=false;
}
if(!isset($_REQUEST['k']) && !isset($_POST['edit'])) {
?>
<br><br><br><br>
<form action="edit.php" method="post">
<table border="1" align="center" bgcolor="#ffcc99">
<tr>
<?php
foreach($h as $hh)
echo "<th>".strtoupper($hh)."</th>";
//echo "<th>CHOICE</th>";
echo "</tr>";
while($r=mysqli_fetch_row($rs)) {
echo "<tr>";
foreach($r as $rr)
echo "<td>$rr</td>";
echo "<tr><th colspan='6' style='height: 50px;'><a class='button' href='edit.php?k=d&v=$r[0]&av=$r[4]' onclick='return confm()'>Delete</a>&nbsp;<a class='button' href='updateform.php?k=e&v=$r[0]'>Edit</a>&nbsp;<a class='button' href='viewemp.php?id=$r[0]'>View</a></td></tr>";
}
?>
</table>
</form>
<br><br>
<div align="right">
<!--input type="button" name="b1" value="Print" onclick="call()"-->
</div>
<?php
}
else if(isset($_REQUEST['k']) && !isset($_POST['edit'])) {
    
if($_REQUEST['k']=="d") {
mysqli_query($link,"delete from empdetails where id=$_REQUEST[v]") or die(mysqli_error($link));
//mysqli_query($link,"delete from attendance where empid=$_REQUEST[av]") or die(mysql_error());
$_SESSION['dflag']=true;
header('Location:edit.php');
}

} else {
	$un=$_POST['t1'];
	$pw=$_POST['t2'];
	$eid=$_POST['h'];
mysqli_query($link,"update empdetails set user='$un',pass='$pw' where eid=$eid") or die("Err:".mysqli_error($link));
}
}
} else {
echo "<hr><h3 align='center'>You are not Authorized to view the page</h3><hr>";
}
?>
</body>
</html>