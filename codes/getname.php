<?php
include("db.php");
	$ut=$_POST['k'];
$rs=mysql_query("select empname from empdetails where empid=$ut") or die(mysql_error());
$r=mysql_fetch_row($rs) or die(mysql_error());
echo $r[0];
?>