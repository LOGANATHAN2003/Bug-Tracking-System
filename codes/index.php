<!DOCTYPE html>
<html>
<head>    
    <script type="text/javascript" src="script.js"></script>

    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
    
</head>
<body style="background-image:url('Page-BgSimpleGradient.jpg')">
<?php
include("db.php");
$dt=date('M',time());
$rs=mysqli_query($link,"select * from empdetails where dob like '%$dt%'") or die(mysql_error());
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
                		<li><a href="#" class=" active"><span class="l"></span><span class="r"></span><span class="t">Home</span></a></li>
                		<li><a href="contact.php"><span class="l"></span><span class="r"></span><span class="t">Contact</span></a></li>
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
                                	<!--span class="art-button-wrapper">
                                		<span class="l"> </span>
                                		<span class="r"> </span>
                                		
                                	</span-->
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
                                            "This system is going to help so freaking much"
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
                                        <div style="text-align: center;"><form method="get" id="newsletterform" action="javascript:void(0)">
                                        <!--input type="text" value="" name="email" id="s" style="width: 95%;" /-->
			<a href="login.php?admin" class="art-button">Admin Login</a>
                        <a href="login.php?user" class="art-button">User Login</a><!--a href="userlogin.php" class="art-button">Employee Login</a-->
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
                                <div class="art-BlockHeader">
                                    <div class="l"></div>
                                    <div class="r"></div>
                                    <div class="art-header-tag-icon">
                                        <div class="t">Highlights</div>
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
                                        <div>
                                                          <p><b>Aug 14, 2015</b><br/>
                                                          Aliquam sit amet felis. Mauris semper, 
                                                          velit semper laoreet dictum, quam 
                                                          diam dictum urna, nec placerat elit 
                                                          nisl in quam. Etiam augue pede, 
                                                          molestie eget, rhoncus at, convallis 
                                                          ut, eros. Aliquam pharetra.<br/>
                                                          <a href="javascript:void(0)">Read more...</a></p>
                                                                                                                    
                                                          </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                </div>
                <div class="cleared"></div><div class="art-Footer">
                    <div class="art-Footer-inner">
                        <a href="#" class="art-rss-tag-icon" title="RSS"></a>
                       
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