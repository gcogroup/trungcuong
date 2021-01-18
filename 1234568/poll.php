<?php
$textcolor='#000000';
$linkcolor='#FFFFFF';
$bgcolor='#ffffff';
$tableborder='#ffcc00';
$timeout='24';
$ip_file=$CONFIG['root_path'].'poll/ip.txt';
$font='arial';
$fontsize='2';
$datafile=$CONFIG['root_path'].'poll/data.txt';
$option='10';
$use_image='0';
$image_for_vote='';

$config['root']=$CONFIG['root_path'];
$path=$config['root']."poll/";
if ($_POST['gone'])
{
	/*
	$fp=fopen($datafile, "w");
	$question=$_POST['question'];
	fputs($fp, $question."\n");
	for($i=1; $i <=5000; $i++)
	{
		if($_POST['answer'][$i]==""){ break;}
		$input=$_POST['answer'][$i]."][".$_POST['image'][$i]."][".$_POST['votes'][$i]."\n";
		fputs($fp, $input);
	}
	*/
	
	$question=compile_post('question');
	$sql="update poll_question set question='$question'";
	$DB->query($sql);
	$sql="delete from poll_answer where id>0";
	$DB->query($sql);
	
	for($i=1; $i <=5000; $i++)
	{
		if($_POST['answer'][$i]==""){ break;}
		$answer=clean_value($_POST['answer'][$i]);
		$image=clean_value($_POST['image'][$i]);
		$votes=clean_value($_POST['votes'][$i]);
		$sql="insert into poll_answer (answer,image,votes) values ('$answer','$image','$votes')";
		$DB->query($sql);
	}	
	
}
//fclose($fp);
/*
$config="<?php\n";
$config.="\$textcolor='$textcolor';\n";
$config.="\$linkcolor='#FFFFFF';\n";
$config.="\$bgcolor='$bgcolor';\n";
$config.="\$tableborder='$tableborder';\n";
$config.="\$timeout='$timeout';\n";
$config.="\$ip_file='$ip_file';\n";
$config.="\$font='$font';\n";
$config.="\$fontsize='$fontsize';\n";
$config.="\$datafile='$datafile';\n";
$config.="\$option='$option';\n";
$config.="\$use_image='$use_image';\n";
$config.="\$image_for_vote='$image_for_vote';\n";
$config.="?>";
$fp=fopen($ip_file, "w");
fclose($fp);
$fp=fopen("pollconfig.php", "w");
fputs($fp, $config);
fclose($fp);
echo "<div align=\"center\"><b><font face=\"Verdana, Arial, Helvetica, sans-serif\" color=\"#00CC00\">Your 
  settings have been updated!</font></b></div>";
}
*/
//include('pollconfig.php');
//$data=file($datafile);
//$nb=count($data);

$data=array();
$sql="select question from poll_question";
$x=$DB->query($sql);
if ($y=mysql_fetch_array($x))
{
	$data[0]=$y['question'];
}
$sql="select * from poll_answer where id>0 order by id asc";
$x=$DB->query($sql);
$i=0;
while ($y=mysql_fetch_array($x))
{
	$i++;
	$data[$i]=$y['answer']."][".$y['image']."][".$y['votes'];
}

?>
<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' width='100%'>
	<tr>
		<td>
			<table cellpadding='0' cellspacing='0' border='0' width='100%'>
				<tr>
					<td width='30'><img src='images/lefttitle.gif'></td>
					<td background='images/bgtitle.gif' align="center"><font class="adminTitle2">Qu&#7843;n l&#253; b&#236;nh ch&#7885;n</font></td>
					<td width='30'><img src='images/righttitle.gif'></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td align="center">
			<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#9999FF' width='100%'>
				<tr>
					<td align="center">
						<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#9999FF' width='90%'>
							<tr>
								<td>					

<div style="top: 861px; visibility: hidden; left: -1000px;" id="dhtmltooltip"></div>
<script type="text/javascript">

var offsetxpoint=-60 //Customize x offset of tooltip
var offsetypoint=20 //Customize y offset of tooltip
var ie=document.all
var ns6=document.getElementById && !document.all
var enabletip=false
if (ie||ns6)
var tipobj=document.all? document.all["dhtmltooltip"] : document.getElementById? document.getElementById("dhtmltooltip") : ""

function ietruebody(){
return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
}

function ddrivetip(thetext, thecolor, thewidth){
if (ns6||ie){
if (typeof thewidth!="undefined") tipobj.style.width=thewidth+"px"
if (typeof thecolor!="undefined" && thecolor!="") tipobj.style.backgroundColor=thecolor
tipobj.innerHTML=thetext
enabletip=true
return false
}
}

function positiontip(e){
if (enabletip){
var curX=(ns6)?e.pageX : event.x+ietruebody().scrollLeft;
var curY=(ns6)?e.pageY : event.y+ietruebody().scrollTop;
//Find out how close the mouse is to the corner of the window
var rightedge=ie&&!window.opera? ietruebody().clientWidth-event.clientX-offsetxpoint : window.innerWidth-e.clientX-offsetxpoint-20
var bottomedge=ie&&!window.opera? ietruebody().clientHeight-event.clientY-offsetypoint : window.innerHeight-e.clientY-offsetypoint-20

var leftedge=(offsetxpoint<0)? offsetxpoint*(-1) : -1000

//if the horizontal distance isn't enough to accomodate the width of the context menu
if (rightedge<tipobj.offsetWidth)
//move the horizontal position of the menu to the left by it's width
tipobj.style.left=ie? ietruebody().scrollLeft+event.clientX-tipobj.offsetWidth+"px" : window.pageXOffset+e.clientX-tipobj.offsetWidth+"px"
else if (curX<leftedge)
tipobj.style.left="5px"
else
//position the horizontal position of the menu where the mouse is positioned
tipobj.style.left=curX+offsetxpoint+"px"

//same concept with the vertical position
if (bottomedge<tipobj.offsetHeight)
tipobj.style.top=ie? ietruebody().scrollTop+event.clientY-tipobj.offsetHeight-offsetypoint+"px" : window.pageYOffset+e.clientY-tipobj.offsetHeight-offsetypoint+"px"
else
tipobj.style.top=curY+offsetypoint+"px"
tipobj.style.visibility="visible"
}
}

function hideddrivetip(){
if (ns6||ie){
enabletip=false
tipobj.style.visibility="hidden"
tipobj.style.left="-1000px"
tipobj.style.backgroundColor=''
tipobj.style.width=''
}
}

document.onmousemove=positiontip

</script>
            <form name="APP" method="post" action="">
              

              <table width="100%" border="0" cellspacing="1" cellpadding="3" align="center">
                <tr> 
                  <td width="116" height="15"><b>C&#226;u h&#7887;i</b> </td>
                  <td colspan="3" height="15"> 
                    <input type="text" name="question" size="50" maxlength="150" value="<?php echo $data[0]; ?>">
                  </td>
                </tr>
                <tr> 
                  <td width="116">&nbsp;</td>
                  <td width="246"> 
                    <div align="center"><b>Tr&#7843; l&#7901;i </b></div>
                  </td>
                  <td width="181"> 
                    <div align="center"><b>H&#236;nh &#7843;nh c&#7897;t </b></div>
                  </td>
				  <td> 
                    <div align="center"><b>&#272;&#227; ch&#7885;n </b></div>
                  </td>
<?
for($i=1; $i<=$option; $i++){
	$subdata=explode("][",$data[$i]);

echo "<tr><td width=\"116\">
<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\"><b>L&#7921;a ch&#7885;n $i</b></font></td>
<td width=\"246\"> 
<div align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\"> 
<input type=\"text\" name=\"answer[$i]\" size=\"40\" maxlength=\"40\" value=\"$subdata[0]\"></font></div>
</td><td width=\"181\"> 
<div align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\" > 
<select name=\"image[$i]\" size=\"1\">";
?>
<option value='gfx/aqua.gif' <? if ($subdata[1]=='gfx/aqua.gif') echo 'selected';?>>Aqua</option>
<option value='gfx/blue.gif' <? if ($subdata[1]=='gfx/blue.gif') echo 'selected';?>>Blue</option>
<option value='gfx/brown.gif' <? if ($subdata[1]=='gfx/brown.gif') echo 'selected';?>>Brown</option>
<option value='gfx/gold.gif' <? if ($subdata[1]=='gfx/gold.gif') echo 'selected';?>>Gold</option>
<option value='gfx/green.gif' <? if ($subdata[1]=='gfx/green.gif') echo 'selected';?>>Green</option>
<option value='gfx/grey.gif' <? if ($subdata[1]=='gfx/grey.gif') echo 'selected';?>>Grey</option>
<option value='gfx/orange.gif' <? if ($subdata[1]=='gfx/orange.gif') echo 'selected';?>>Orange</option>
<option value='gfx/pink.gif' <? if ($subdata[1]=='gfx/pink.gif') echo 'selected';?>>Pink</option>
<option value='gfx/purple.gif' <? if ($subdata[1]=='gfx/purple.gif') echo 'selected';?>>Purple</option>
<option value='gfx/red.gif' <? if ($subdata[1]=='gfx/red.gif') echo 'selected';?>>Red</option>
<option value='gfx/yellow.gif' <? if ($subdata[1]=='gfx/yellow.gif') echo 'selected';?>>Yellow</option>
<?
echo "
<select>
</font></div></td><td width=\"181\"> 
<div align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\">
<input type=\"text\" name=\"votes[$i]\" size=\"4\" maxlength=\"4\" value=\"$subdata[2]\">
</font></div></td></tr>";
}
?>

               </table>
              
              <div align="center">
				<input type="hidden" name="gone" value="1">
    <input type="submit" name="submit" value="Ch&#7845;p nh&#7853;n">
              </div>
            </form>
			
				<br><br>
								</td>
							</tr>
						</table>		
					</td>
				</tr>
			</table>		
		</td>
	</tr>
</table>
