<!doctype html>
<html>
    <body>
<?php
include("adminp.php");
include("db.php");
if(!isset($_POST['submit'])) {
        $res1 = mysqli_query($link, "select id from proj order by id") or die(mysqli_error($link));
?>
<br><br><br><br><br><br><br>
<style>
    table tbody tr th {
        text-align: left;
    }
</style>
    <form name="f" action="" method="post" enctype="multipart/form-data">
            <table style="margin:auto;">
                <thead>
                    <tr>
                        <th colspan="2">
                            Reporting a Bug
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th style="padding-right:100px;">Select Project</th>
                        <td>
                            <select name="projid" onchange="call1(this.value)" required>
                                <option value="">--Select--</option>
                                <?php
                                    while($r1 = mysqli_fetch_row($res1))
                                        echo "<option value='$r1[0]'>$r1[0]</option>";
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Project Name</th>
                        <td><input type="text" id="pname" name="pname" readonly required></td>
                    </tr>
                    <tr>
                        <th>Bug Description</th>
                        <td><textarea name="bugdesc" required></textarea></td>
                    </tr>
                    <tr>
                        <th>SnapShot</th>
                        <td><input type="file" name="sshot" required style="width:300px;"></td>
                    </tr>                    
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" name="submit" value="Report">
                        </td>
                    </tr>
                </tfoot>
            </table>
        </form>
<?php
} else {
    if(is_uploaded_file($_FILES['sshot']['tmp_name'])) {
    $projid = $_POST['projid'];
    $bugdesc = $_POST['bugdesc'];
    $sshot = "uploads/".time().$_FILES['sshot']['name'];
    $dt = date('Y-m-d',time());
    move_uploaded_file($_FILES['sshot']['tmp_name'], $sshot) or die("Cannot Write File...");
    mysqli_query($link, "insert into bugs (projid,bugdesc,sshot,dt) values ($projid,'$bugdesc','$sshot','$dt')") or die(mysqli_error($link));
    $_SESSION['flag']=true;
    header("Location:newbug.php");
    } else {
        echo "<div style='margin-top:100px;text-align:center;'>";
        echo "SnapShot Not Uploaded<br><a href='newbug.php'>Back</a>";
        echo "</div>";
    }
}
    $res1 = mysqli_query($link, "select * from bugs order by id") or die(mysqli_error($link));
    echo "<table border='1' style='margin:auto;margin-top: 50px;'>";
    echo '<tr><th>Id<th>Proj Id<th>Bug Descr<th>Screen<th>Date<th>Status<th>Task';
        while($r1 = mysqli_fetch_row($res1)) {
            echo "<tr>";
            foreach($r1 as $k=>$rr) {
                if($k==3)
                    echo "<td><img src='$rr' width='75px' onclick=\"javascript:window.open('$rr')\">";
                else
                    echo "<td>$rr";                
            }
            echo "<th><a href='showreply.php?id=$r1[0]'>Show Reply</a><hr>";
            echo "<a href='newbug.php?delete&id=$r1[0]' onclick=\"javascript:return confirm('Are You Sure to Delete ?')\">Delete</a>";
        }
    echo "</table>";
    if(isset($_GET['delete'])) {
        $id = $_GET['id'];
        mysqli_query($link, "delete from bugs where id=$id") or die(mysqli_error($link));
        header("Location:newbug.php");
    }
?>
    </body>
    <script>
        function call1(p1) {
            if(p1!="") {
                ob1 = getObject()
                ob1.onreadystatechange = doWork1
                ob1.open("GET","getpname.php?id="+p1,true)
                ob1.send()
            } else {
                document.getElementById("pname").value = ""
            }
        }
        function doWork1() {
            if(ob1.readyState==4 && ob1.status==200) {
                document.getElementById("pname").value = ob1.responseText
            }
        }
        function getObject() {
            if(window.ActiveXObject)
                return new ActiveXObject("Microsoft.XMLHTTP")
            else
                return new XMLHttpRequest()
        }
    </script>
</html>