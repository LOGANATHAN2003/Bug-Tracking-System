<?php
error_reporting(E_ERROR);
session_start();
?>
<html>
<body>
<?php
if(isset($_SESSION['userid'])) {
    include("userp.php");
}
else {
echo "<hr><h3 align='center'>You are not Authorized to view the page</h3><hr>";
}
?>
</body>
</html>