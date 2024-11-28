<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="script.js"></script>
    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->
</head>
<script type="text/javascript">
function check() {
if(f.t1.value==""||f.t2.value=="") {
alert("Field should not be empty")
return false
}
return true
}
</script>
<body style="background-image:url('Page-BgSimpleGradient.jpg')">
<?php
include("db.php");
$dt=date('M',time());
$rs=mysqli_query($link,"select * from empdetails where dob like '%$dt%'") or die(mysqli_error($link));
?>
<div id="art-page-background-simple-gradient">
    </div>
    <div id="art-main">
        <div class="art-Sheet">
            <div class="art-Sheet-tl"></div>
            <div class="art-Sheet-tr"></div>
            <div class="art-Sheet-bl"></div>
            <div class="art-Sheet-br"></div>
            <div class="art-Sheet-tc"></div>
            <div class="art-Sheet-bc"></div>
            <div class="art-Sheet-cl"></div>
            <div class="art-Sheet-cr"></div>
            <div class="art-Sheet-cc"></div>
            <div class="art-Sheet-body">
                <div class="art-nav">
                	<div class="l"></div>
                	<div class="r"></div>
                	<ul class="art-menu">
                		<li><a href="index.php" class=" active"><span class="l"></span><span class="r"></span><span class="t">Home</span></a></li>
                		
                	</ul>
                </div>
                <div class="art-Header">
                    <div class="art-Header-jpeg"></div>
                    <div class="art-Logo">
                        <h1 id="name-text" class="art-Logo-name"><a href="#">Flaw Tracking System</a></h1>
                        <div id="slogan-text" class="art-Logo-text"></div>
                    </div>
                </div>
                <div class="art-contentLayout">
                    <div class="art-content">
                        <div class="art-Post">
                            <div class="art-Post-body">
                        <div class="art-Post-inner">
                            <h2 class="art-PostHeaderIcon-wrapper">
                                <img src="images/PostHeaderIcon.png" width="22" height="22" alt="PostHeaderIcon" />
                                <span class="art-PostHeader">Welcome</span>
                            </h2>
                            <div class="art-PostContent">
                                
                                <img class="art-article" src="images/spectacles.gif" alt="an image" style="float: left" />
                                <h1>India</h1>
                                <h4>Kuala Lumpur</h4>
                                <h4>Singapore</h4>
                                <h4>Hong Kong</h4>
                                <h5>Melbourne</h5>
                                <h6>Tokyo</h6>
                                <p>Lorem ipsum dolor sit amet,
                                <a href="#" title="link">link</a>, <a class="visited" href="#" title="visited link">visited link</a>, 
                                 <a class="hover" href="#" title="hovered link">hovered link</a> consectetuer 
                                adipiscing elit. Quisque sed felis. Aliquam sit amet felis. Mauris semper, 
                                velit semper laoreet dictum, quam diam dictum urna, nec placerat elit nisl 
                                in quam. Etiam augue pede, molestie eget, rhoncus at, convallis ut, eros.</p>
                                <p>
                                	<span class="art-button-wrapper">
                                		<span class="l"> </span>
                                		<span class="r"> </span>                                		
                                	</span>
                                </p>
                                
                                                                  
                            </div>
                            <div class="cleared"></div>
                        </div>
                        
                            </div>
                        </div>
                        <div class="art-Post">
                            <div class="art-Post-body">
                        <div class="art-Post-inner">
                            <h2 class="art-PostHeaderIcon-wrapper">
                                <img src="images/PostHeaderIcon.png" width="22" height="22" alt="PostHeaderIcon" />
                                <span class="art-PostHeader"></span>
                            </h2>
                            <div class="art-PostContent">
                                                         
                                    <blockquote>
                                        <p>
                                            "This system is going to help so freaking much."
                                            <br />
                                            -Blockquote
                                        </p>
                                    </blockquote>
                                  <br />
                                  
                                    
                            </div>
                            <div class="cleared"></div>
                        </div>
                        
                            </div>
                        </div>
                    </div>
                    <div class="art-sidebar1">
                        <div class="art-Block">
                            <div class="art-Block-body">
                                <div class="art-BlockHeader">
                                    <div class="l"></div>
                                    <div class="r"></div>
                                    <div class="art-header-tag-icon">
                                        <div class="t">WorkCenter</div>
                                    </div>
                                </div><div class="art-BlockContent">
                                    <div class="art-BlockContent-tl"></div>
                                    <div class="art-BlockContent-tr"></div>
                                    <div class="art-BlockContent-bl"></div>
                                    <div class="art-BlockContent-br"></div>
                                    <div class="art-BlockContent-tc"></div>
                                    <div class="art-BlockContent-bc"></div>
                                    <div class="art-BlockContent-cl"></div>
                                    <div class="art-BlockContent-cr"></div>
                                    <div class="art-BlockContent-cc"></div>
                                    <div class="art-BlockContent-body">
                                        <div><!--form method="get" id="newsletterform" action="javascript:void(0)"-->
                                        <!--input type="text" value="" name="email" id="s" style="width: 95%;" /-->
			<?php
			if(!isset($_POST['submit'])) {
if(isset($_SESSION['flg']) && $_SESSION['flg']==true) {
echo "<script type='text/javascript'>alert('Invalid Username/Password')</script>";
$_SESSION['flg']="";
}
			?>
<form name="f" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" onsubmit="return check()">
<?php
if(isset($_GET['admin'])) {
?>
<h2 align="center">Admin Login</h2>
<?php
} else {
?>
<h2 align="center">User Login</h2>
<?php
}
?>
<table align="center">
<tr><td>UserName</td><td><input type="text" name="t1" size="17" style="font-size: 12px;"></td></tr>
<tr><td>Password</td><td><input type="password" name="t2" size="17" style="font-size: 12px;"></td></tr>
<tr><td colspan="2" align="center"><input type="submit" name="submit" value="Log in"></td></tr>
</table>
</form>
<?php
}
else {
if(!empty($_POST['t1']) && !empty($_POST['t2'])) {
	$un=$_POST['t1'];
	$pw=$_POST['t2'];
//	echo "$un - $pw";
	$rs=mysqli_query($link,"select * from admin  where username='$un' and pass='$pw'") or die(mysql_error());

	if(mysqli_num_rows($rs) >0) {
	$_SESSION['user']="admin";
	header('Location:adminh.php');
	} else {
            $rs1 = mysqli_query($link, "select * from empdetails where empid='$un' and persemailid='$pw'") or die(mysqli_error($link));
            if(mysqli_num_rows($rs1)>0) {
                $r1 = mysqli_fetch_array($rs1);
                $_SESSION['userid']=$un;
                $_SESSION['lang']=$r1['domain'];
                header("Location:userh.php");
            } else {
                $_SESSION['flg']=true;
                header('Location:login.php');
            }
	}
}
else {
header('Location:login.php');
}
}
?>
			<span class="art-button-wrapper">
                                        	<span class="l"> </span>
                                        	<span class="r"> </span>
                                        	<!--input class="art-button" type="submit" name="search" value="Subscribe"/-->
                                        </span>
                                        </form></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="art-Block">
                            <div class="art-Block-body">
                                
                            </div>
                        </div>
                        
                    <div class="art-Footer-background"></div>
                </div>
            </div>
        </div>
        <div class="cleared"></div>

    </div>

</body>
<!--</div> </body> -->
</html>