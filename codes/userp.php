<?php
session_start();
if(isset($_SESSION['userid'])) {
?>
<script type="text/javascript" src="fsmenu.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">

 <!-- Demo CSS layouts for the list menu. Pick your favourite one and customise! -->
 <!-- Remove all but one and change "alternate stylesheet" to "stylesheet" to enable -->
 
 <link rel="alternate stylesheet" type="text/css" id="listmenu-o" href="listmenu_o.css" title="Vertical 'Office'" />
 <link rel="stylesheet" type="text/css" id="listmenu-h" href="listmenu_h.css" title="Horizontal 'Earth'" />
  <link rel="stylesheet" type="text/css" id="fsmenu-fallback"  href="listmenu_fallback.css" />
 <link rel="stylesheet" type="text/css" href="divmenu.css" />

<ul class="menulist" id="listMenuRoot" style="font-weight:bold;">
 <li><a href="#">&nbsp;&nbsp;&nbsp;Home&nbsp;&nbsp;&nbsp;</a></li>
 <li>
  <a href="#">&nbsp;&nbsp;&nbsp;Task&nbsp;&nbsp;&nbsp;</a>
  <ul>
<li><a href="showbugs.php">Show Bugs</a></li>
<li><a href="email.php">E-Mail</a></li>
<li><a href="receivedmail.php">Received Mails</a></li>
  </ul>
 </li>
 
<li><a href="logout.php">&nbsp;&nbsp;&nbsp;Log Out&nbsp;&nbsp;&nbsp;</a></li>
</ul>
<script type="text/javascript">
//<![CDATA[
var listMenu = new FSMenu('listMenu', true, 'display', 'block', 'none');

listMenu.animations[listMenu.animations.length] = FSMenu.animFade;
listMenu.animations[listMenu.animations.length] = FSMenu.animSwipeDown;
//listMenu.animations[listMenu.animations.length] = FSMenu.animClipDown;

var arrow = null;
if (document.createElement && document.documentElement)
{
 arrow = document.createElement('span');
 arrow.appendChild(document.createTextNode('>'));
 // Feel free to replace the above two lines with these for a small arrow image...
 //arrow = document.createElement('img');
 //arrow.src = 'arrow.gif';
 //arrow.style.borderWidth = '0';
 arrow.className = 'subind';
}
addReadyEvent(new Function('listMenu.activateMenu("listMenuRoot", arrow)'));

//]]>
</script>
<?php
}
else {
echo "<hr><h3 align='center'>You are not Authorized to view the page</h3><hr>";
}
?>