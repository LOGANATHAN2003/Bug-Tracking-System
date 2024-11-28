<!doctype html>
<html>
    <body>
<?php
include("adminp.php");
include("db.php");
    $id = $_GET['id'];
    $res1 = mysqli_query($link, "select s.id,bugid,bugdesc,s.projid,pname,domain,solution from solutions s,proj p,bugs b where s.projid=p.id and s.bugid=b.id and s.bugid=$id") or die(mysqli_error($link));
    echo "<br><br><br><br><br><br>";
    echo "<table border='1' style='margin:auto;margin-top: 50px;'><tr><th colspan='7'>SOLUTION";
    echo "<tr><th>Id<th>Bug Id<th>Descr<th>ProjId<th>Name<th>Domain<th>Solution";
        while($r1 = mysqli_fetch_row($res1)) {
            echo "<tr>";
            foreach($r1 as $rr)
                echo "<td>$rr";
        }
    echo "</table>";
?>
    </body>
</html>