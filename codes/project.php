<!doctype html>
<html>
    <body>
<?php
include("adminp.php");
include("db.php");
if(!isset($_POST['submit'])) {
    $res1 = mysqli_query($link, "select empid from empdetails where empid not in (select empid from proj)") or die(mysqli_error($link));
?>
<br><br><br><br><br><br><br>
<style>
    table tbody tr th {
        text-align: left;
    }
</style>
        <form name="f" action="" method="post">
            <table style="margin:auto;">
                <thead>
                    <tr>
                        <th colspan="2">
                            Project Creation
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th style="padding-right:100px;">Project Name</th>
                        <td><input type="text" name="pname" required></td>
                    </tr>
                    <tr>
                        <th>Contract Date</th>
                        <td><input type="text" name="cdate" required></td>
                    </tr>
                    <tr>
                        <th>Contract Years</th>
                        <td><input type="text" name="cyears" required></td>
                    </tr>                    
                    <tr>
                        <th>Employee Id</th>
                        <td>
                            <select name="empid" onchange="call1(this.value)" required>
                                <option value="">--Select Id--</option>
                                <?php
                                    while($r1 = mysqli_fetch_row($res1))
                                            echo "<option value='$r1[0]'>$r1[0]</option>";
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Domain</th>
                        <td>
                            <!--select name="domain">
                                <option value="Java">Java</option>
                                <option value=".Net">.Net</option>
                                <option value="PHP">PHP</option>
                                <option value="Perl">Perl</option>
                                <option value="J2EE">J2EE</option>
                            </select-->
                            <input type="text" name="domain" id="domain" required>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" name="submit" value="Create Project">
                        </td>
                    </tr>
                </tfoot>
            </table>
        </form>
<?php
} else {
    $pname = $_POST['pname'];
    $cdate = $_POST['cdate'];
    $cyears = $_POST['cyears'];
    $domain = $_POST['domain'];
    $empid = $_POST['empid'];
    
    mysqli_query($link, "insert into proj (pname,cdate,cyears,domain,empid) values ('$pname','$cdate','$cyears','$domain',$empid)") or die(mysqli_error($link));
    $_SESSION['flag']=true;
    header("Location:project.php");
}
    $res1 = mysqli_query($link, "select * from proj order by id") or die(mysqli_error($link));
    echo "<table border='1' style='margin:auto;margin-top: 50px;'>";
    echo '<tr><th>Id<th>Project<th>Contract Dt<th>Years<th>Domain<th>EmpId<th>Task';
        while($r1 = mysqli_fetch_row($res1)) {
            echo "<tr>";
            foreach($r1 as $rr)
                echo "<td>$rr";
            echo "<td><a href='project.php?did=$r1[0]' onclick=\"javascript:return confirm('Are You Sure to Delete ?')\">Delete</a>";
        }
    echo "</table>";
    if(isset($_GET['did'])) {
        $id = $_GET['did'];
        mysqli_query($link, "delete from proj where id=$id") or die(mysqli_error($link));
        mysqli_query($link, "delete from bugs where projid=$id") or die(mysqli_error($link));
        header("Location:project.php");
    }
?>
    </body>
<script>
function getObj() {
if(window.ActiveXObject)
    return new ActiveXObject("Microsoft.XMLHTTP")
else
    return new XMLHttpRequest()
}

function call1(p) {
if(p!="") {
    ob = getObj()
    ob.onreadystatechange=doWork1
    ob.open("GET","getdomain.php?eid="+p,true);
    ob.send();
} else {
    document.getElementById("domain").value = ""
}
}

function doWork1() {
    if(ob.readyState==4&&ob.status==200) {
        document.getElementById("domain").value = ob.responseText
    }
}
</script>
</html>