<!DOCTYPE html>
<html>
<head>
    
    <script type="text/javascript" src="script.js"></script>
    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->
</head>
<body>
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
                        <h1 id="name-text" class="art-Logo-name"><a href="#">Zenith Systems</a></h1>
                        <div id="slogan-text" class="art-Logo-text">Expanding Frontiers</div>
                    </div>
                </div>
				<div class="art-contentLayout">
	
<ul style="list-style:square;font-size:20px;">
<li>#222,Andheri East, Navi Mumbai</li>
<li>555,North Usman Road, Chennai</li>
<li>55/333, KK Nagar, Madurai</li>
</ul>
				</div>
				<div class="cleared"></div>
				<div class="art-Footer">
					<div class="art-Footer-inner">
						<a href="#" class="art-rss-tag-icon" title="RSS"></a>
						<div class="art-Footer-text">
							<p>
								<br />
                                                                Copyright&copy;2015 --- All Rights Reserved.
							</p>
						</div>
					</div>
					<div class="art-Footer-background"></div>
				</div>
			</div>
        </div>
        <div class="cleared"></div>
<p class="art-page-footer"><a href="http://webtemplatebiz.com/">Website Templates</a> created by <a href="http://webtemplatebiz.com/show-category-music.html">WebTemplateBiz</a>.</p>
    </div>
</body>
<!--</div> </body> -->
</html>