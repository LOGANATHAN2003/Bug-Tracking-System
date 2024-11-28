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
include("db.php");
    $id = $_GET['id'];
    $res = mysqli_query($link, "select id,empname,empid,sex gender,dob,usertype,dept,ph,contactaddr,permaddr,compemailid as mailid,persemailid as password,sal,domain from empdetails where id=$id") or die(mysqli_error($link));
    for($i=0; $i<mysqli_num_fields($res); $i++) {
        $ob =  mysqli_fetch_field($res);
        $h[] = $ob->name;
    }
    echo "<br><br><br><table class='singleemp' bgcolor='#ffcc99'><thead><tr><th>Heading<th>Value<tbody>";
        $r = mysqli_fetch_row($res);
        foreach($r as $k=>$rr) {
            echo "<tr><th>$h[$k]<td>".ucfirst($r[$k]);
        }        
    echo "</table>";
?>
</body>
</html>