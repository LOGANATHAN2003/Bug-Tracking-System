<?php
ob_start();
?>
<!doctype html>
<html>
<script type="text/javascript">
function check() {
id=f.t3.value
ph=f.t5.value
sl=f.a8.value
n="0123456789"
if(f.a1.value==""||f.t3.value==""||f.a2.value==""||f.a3.value==""||f.a4.value==""||f.t4.value==""||f.t5.value==""||f.a5.value==""||f.a6.value==""||f.a7.value==""||f.a8.value=="") {
alert("Field should not be empty")
return false
}
if(!f.r[0].checked && !f.r[1].checked) {
alert("Select the Gender")
return false
}
for(i=0; i<id.length; i++) {
if(n.indexOf(id.substring(i,i+1))==-1) {
alert("Emp Id will consists of digits only")
return false
}
}
for(i=0; i<ph.length; i++) {
if(n.indexOf(ph.substring(i,i+1))==-1) {
alert("Phone no. will consist of digits only")
return false
}
}
for(i=0; i<sl.length; i++) {
if(n.indexOf(sl.substring(i,i+1))==-1) {
alert("Salary will consist of digits only")
return false
}
}
return true
}
function call(p) {
if(p!="") {
if(window.ActiveXObject)
ob=new ActiveXObject("Microsoft.XMLHTTP");
else
ob=new XMLHttpRequest();
ob.onreadystatechange=function() {
if(ob.readyState==4&&ob.status==200) {
f.t3.value=ob.responseText;
}
}
ob.open("POST","getid.php",true);
ob.setRequestHeader("Content-type","application/x-www-form-urlencoded");
ob.send("k="+p);
} else {
f.t3.value="";
}
}
</script>
<body>
<?php
include("adminp.php");

include("db.php");
if(isset($_SESSION['user']) && $_SESSION['user']=="admin") {
if(isset($_SESSION['aflag'])&&$_SESSION['aflag']==true) {
echo "<script type='text/javascript'>alert('Record Created')</script>";
$_SESSION['aflag']=false;
}
$month=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
?>
<br><br><br><br><br><br><br>
<form name="f" action="add.php" method="post" onsubmit="return check()">
<table align="center">
<tr>
<th colspan="2">Employee Registration</th>
</tr>
<tr>
<td style="padding-right:100px;">Employee Name</td>
<td><input type="text" name="a1"></td>
</tr>
<tr>
<td>Empid (UserId)</td>
<td><input type="text" name="t3" size="8" readonly style="background:#9BCFD9"> <font size="1"><B>[ Select Usertype ]</b></font></td>
</tr>
<tr>
<td>Gender</td>
<td><input type="radio" name="r" id="r" value="male" checked>Male <input type="radio" name="r" id="r" value="female">Female</td>
</tr>
<tr>
<td>Date of Birth</td>
<td>
<select name="d">
<?php
for($i=1; $i<=31; $i++)
echo "<option value=$i>$i</option>";
?>
</select>
<select name="m">
<?php
for($i=0; $i<sizeof($month); $i++)
echo "<option value=$month[$i]>$month[$i]</option>";
?>
</select>
<select name="y">
<?php
for($i=1970; $i<=2050; $i++)
echo "<option value=$i>$i</option>";
?>
</select>
</td>
</tr>
<tr>
<td>User Type</td>
<td>
<select name="a3" onchange="call(this.value)">
<option value=""> -- Select -- </option>
<option value="programmer">Programmer</option>
<option value="teamleader">TeamLeader</option>
<option value="projectmanager">ProjectManager</option>
<!--option value="hr">HR</option-->
</select>
</td>
</tr>
<tr>
<td>Department</td>
<td>
<select name="a4">
<option value=""> -- Select -- </option>
<option value="development">Development</option>
<option value="design">Design</option>
<option value="hr">HR</option>
<option value="sales">Sales</option>
</select>
</td>
</tr>
<tr>
<td>Phone</td>
<td><input type="text" name="t5" maxlength="10"></td>
</tr>
<tr>
<td>Contact Address</td>
<td><textarea name="t4"></textarea></td>
</tr>
<tr>
<td>Permanent Address</td>
<td><textarea name="a5"></textarea></td>
</tr>
<tr>
<td>E-Mail Id</td>
<td><input type="text" name="a6"></td>
</tr>
<tr>
<td>Password</td>
<td><input type="text" name="a7"></td>
</tr>
<tr>
<td>Salary</td>
<td><input type="text" name="a8"></td>
</tr>
<tr>
<td>Domain</td>
<td>
    <select name="domain">
                                <option value="Java">Java</option>
                                <option value=".Net">.Net</option>
                                <option value="PHP">PHP</option>
                                <option value="Perl">Perl</option>
                                <option value="J2EE">J2EE</option>
    </select>
</td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="submit" name="submit" value="submit"></td>
</tr>
</table>
</form>
<?php
if(isset($_POST['submit'])) {
	$ename=$_POST['a1'];
//	$un=$_POST['t1'];
//	$pw=$_POST['t2'];
	$empid=$_POST['t3'];
	$sex=$_POST['r'];
	$dob=$_POST['d']."-".$_POST['m']."-".$_POST['y'];
	$usertype=$_POST['a3'];
	$dept=$_POST['a4'];
	$ph=$_POST['t5'];	
	$caddr=$_POST['t4'];
	$paddr=$_POST['a5'];
	$cemail=$_POST['a6'];
	$pemail=$_POST['a7'];
	$sal=$_POST['a8'];
	$dt=date('Y-m-d',time());
        $domain = $_POST['domain'];

	mysqli_query($link,"insert into empdetails (empname,empid,sex,dob,usertype,dept,ph,contactaddr,permaddr,compemailid,persemailid,sal,domain) values('$ename',$empid,'$sex','$dob','$usertype','$dept','$ph','$caddr','$paddr','$cemail','$pemail',$sal,'$domain')") or die(mysql_error());
	//mysqli_query($link,"insert into attendance (empid,empname,attenddate) values ('$empid','$ename','$dt')") or die(mysql_error());
	$_SESSION['aflag']=true;
	header('Location:add.php');
}
}
else {
echo "<hr><h3 align='center'>You are not Authorized to view the page</h3><hr>";
}
?>
</body>
</html>