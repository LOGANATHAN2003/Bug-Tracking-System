<?php
for($i=0; $i<mysqli_num_fields($rs); $i++) {
$ob =  mysqli_fetch_field($rs);
$h[] = $ob->name;
}

if(isset($_SESSION['dflag'])&&$_SESSION['dflag']==true) {
echo "<script type='text/javascript'>alert('Record Deleted')</script>";
$_SESSION['dflag']=false;
}
?>
<br><br><br><br>
<form action="delete.php" method="post">
<table border="1" align="center" bgcolor="#ffcc99">
<tr><th>*
<?php
foreach($h as $hh)
echo "<th>".strtoupper($hh);
//echo "<th>CHOICE</th>";
echo "</tr>";
$spkey=0;
while($r=mysqli_fetch_row($rs)) {
echo "<tr>";
if($spkey==0)
echo "<td><input type='radio' name='id[]' value='$r[0]' checked>";
else
echo "<td><input type='radio' name='id[]' value='$r[0]'>";    
$spkey++;
    foreach($r as $rr)
    echo "<td>$rr";
//echo "<td><a href='edit.php?k=d&v=$r[0]&av=$r[4]' onclick='return confm()'>Delete</a>&nbsp;<a href='updateform.php?k=e&v=$r[0]'>Edit</a>&nbsp;<a href='viewemp.php?id=$r[0]'>View</a></td></tr>";
}
//echo "<tr><th colspan='7' style='height:50px;'><a class='button' href='delete.php' onclick=\"javascript:return confirm('Sure to Delete ?')\">Delete</a>&nbsp;<a class='button' href='updateform.php?k=e&v=$r[0]'>Edit</a>&nbsp;<a  class='button' href='viewemp.php?id=$r[0]'>View</a>";
?>
<tr><th colspan="7">
        <input type="submit" name="delbutton" value="Delete">
        <input type="submit" name="editbutton" value="Edit">
        <input type="submit" name="viewbutton" value="View">
</table>
</form>