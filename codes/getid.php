<?php
include("db.php");
	$ut=$_POST['k'];
if($ut=="programmer")
$rs=mysqli_query($link,"select ifnull(max(empid),1000)+1 from empdetails where usertype='$ut'") or die(mysql_error());
else if($ut=="teamleader")
$rs=mysqli_query($link,"select ifnull(max(empid),2000)+1 from empdetails where usertype='$ut'") or die(mysql_error());
else if($ut=="projectmanager")
$rs=mysqli_query($link,"select ifnull(max(empid),3000)+1 from empdetails where usertype='$ut'") or die(mysql_error());
$r=mysqli_fetch_row($rs) or die(mysql_error());
echo $r[0];
?>