<?php
include '../../dataconn.php';
$page = 0;
if($_GET['ID'])
{
	$ID = $_GET['ID'];
}
$str ="SELECT * FROM mhpquest WHERE ID = '".$ID."'";
$con->query('set names utf8;'); 
$result = $con->query($str);  
	$data=array();

	while ($tmp=mysqli_fetch_assoc($result)) {
        $data[]=$tmp;
    }
?>
<html>
<!--
	<GAME-STYLE>
		"MOUSE=OFF",
		"SCROLL=OFF",
		"TITLE=OFF",
		"BACK=OFF",
		"FORWARD=OFF",
		"CANCEL=ON",
		"RELOAD=OFF",
		"CHOICE_MV=OFF",
		"LINK_U=OFF",
		"FRONT_LABEL=ON:1",
	</GAME-STYLE>
-->
<body background=PNG/BG.PNG text=white link=white vlink=white bgcolor=black>

<basefont size=2>
<B>


<img src=PNG/LOGO1.PNG width=240 height=50><img src=PNG/LOGO2.PNG width=240 height=50><br>

<table width=480 height=201 cellspacing=2 border=0>
<tr>

	<td width=15>
	</td>
<td width=244>
	<table width=244 bgcolor=black height=187 border=2 bordercolor=#1C64FE cellspacing=0>
		<tr>
			<td valign=top>
				
				<?php
				foreach($data as $one)
	{
		
		
		if($_GET['lang']=="CN")
		{
			
		echo "<center>
				<font color=orange>".$one["TitleCN"]."</font><br>
				
				<font size=1>";
		echo "".$one["Star"]."</center>";
		echo "報酬金：".$one["Reward"]." 契約金：".$one["Contract"]."<BR>";
		echo "限制時間：".$one["Time"]." 指定地：".$one["Map"]."<BR>";
		echo "特殊条件：".$one["ConditionsCN"]."<BR>";
		echo "勝利条件：".$one["WinCN"]."<BR>";
		echo "敗北条件：".$one["LoseCN"]."<BR>";
		echo "".$one["InfoCN"]."
		</font>";
		}
		else
		{
			
		echo "<center>
				<font color=orange>".$one["Title"]."</font><br>
				
				<font size=1>";
		echo "".$one["Star"]."</center>";
		echo "報酬金：".$one["Reward"]." 契約金：".$one["Contract"]."<BR>";
		echo "限制時間：".$one["Time"]." 指定地：".$one["Map"]."<BR>";
		echo "特殊条件：".$one["Conditions"]."<BR>";
		echo "勝利条件：".$one["Win"]."<BR>";
		echo "敗北条件：".$one["Lose"]."<BR>";
		echo "".$one["Info"]."
		</font>";
		}
		
		
		$miburi = $one["FileUri"];
	}
				?>
				
				

			</td>
		</tr>
	</table>
	</td>

	<td width=210>
	<table width=210 cellspacing=0>
		<tr>
		
		
		<td>
		
<form action="<?php	echo $miburi;?>" DOWNLOAD method=post>
		 <input type=image ANIME=20 background="PNG/y_down.png"  name=submit width=15 height=15 alt="" ><font color=orange>>下載該任務</font>
		</form>		
<a href="HAOYUE_QUESTINFO.PHP?ID=<?php echo $_GET['ID'];?>&lang=CN">
		 <font color=orange size=1>>切換中國語</font>
		</a><BR>
		<a href="HAOYUE_QUESTINFO.PHP?ID=<?php echo $_GET['ID'];?>">
		 <font color=orange  size=1>>切換日本語</font>
		</a>
		<BR>
		<a href="<?php if($_GET['lang']=="CN") echo "HAOYUE_DOWNLOAD.PHP?lang=CN&p=".$_GET['repage']; else echo "HAOYUE_DOWNLOAD.PHP";?>">
		 <font color=orange  size=1>>返回下載列表</font>
		</a>
<img src=PNG/y20070222.png width=200 height=96><BR>
		</td>
		</tr>
	</table>
	</td>

	
	<td width=3>
	</td>

</tr>
</table>


<img src=PNG/B_START.PNG width=17 height=17>:退出皓月云配信服務   <form action="LD_TOP.PHP?u=0" method=get><input type="button">刷新</input></from>


<!--adjust--><table cellspacing=0 height=4><tr><td></table>


<!--previously load other png-->
<br><br><br><br><br><br><br>
<img src=PNG/B_X.PNG>
<img src=PNG/B_REC.PNG>
<img src=PNG/B_TRI.PNG>
<img src=PNG/BOARD.PNG>
<img src=PNG/T_RED.PNG>
<img src=PNG/T_GRN.PNG>	
<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>

aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>

aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>

aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>

aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>

aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>

aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>
aaaaaaaaaa<B>bbbbbbbbbb</B>cccccccccc<B>dddddddddd</B>eeeeeeeeee<BR>ffffffffff<B>gggggggggg</B>hhhhhhhhhh<B>iiiiiiiiii</B>jjjjjjjjjj<BR>

</body>
</html>