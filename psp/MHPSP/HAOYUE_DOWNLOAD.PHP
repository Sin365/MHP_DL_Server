<?php
include '../../dataconn.php';
$page = 0;
if($_GET['p'])
{
	$page = $_GET['p'];
}

$showpage = $page+1;
$str ="SELECT * FROM mhpquest ORDER BY ID desc limit ".($page*20).",20;";
$con->query('set names utf8;'); 
$result = $con->query($str);  
	$data=array();

	while ($tmp=mysqli_fetch_assoc($result)) {
        $data[]=$tmp;
    }

$str2 ="SELECT count(id) as co FROM mhpquest;";
$con->query('set names utf8;'); 
$result2 = $con->query($str2);  
	$data2=array();

	while ($tmp=mysqli_fetch_assoc($result2)) {
        $data2[]=$tmp;
    }
	
	$count = 0;
	foreach($data2 as $one)
	{
		$count = $one["co"];
	}
	//向上取整
	$maxpage = ceil($count / 20);
	
	
$nextpage = $page+1;
$lastpage = $page-1;
if($lastpage < 0)
	$lastpage = 0;

if($nextpage > $maxpage-1)
	$nextpage = $maxpage-1;

?>
<html>
<!--
	<GAME-STYLE>
		"MOUSE=OFF",
		"SCROLL=OFF",
		"TITLE=OFF",
		"BACK=OFF",
		"FORWARD=OFF",
		"CANCEL=OFF",
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
<center>- 皓月雲 - 配信復活計劃 任務下載列表 -
<BR><B>
<font size=1> <font color=orange> 第<?php echo convertStrType($showpage,'TODBC'); ?>頁/共<?php echo convertStrType($maxpage,'TODBC'); ?>頁 </font>每頁１０个
<?php if($page != $lastpage) 
{
	if($_GET['lang']=="CN")
		echo '<a href="HAOYUE_DOWNLOAD.PHP?p='.$lastpage.'&lang=CN"><font color=orange> 上一頁</font></a>';
	else
		echo '<a href="HAOYUE_DOWNLOAD.PHP?p='.$lastpage.'"><font color=orange> 上一頁</font></a>';
}
?>
<?php 
if($page != $nextpage) 
{
	if($_GET['lang']=="CN")
		echo '<a href="HAOYUE_DOWNLOAD.PHP?p='.$nextpage.'&lang=CN"><font color=orange> 下一頁</font></a>';
	else
		echo '<a href="HAOYUE_DOWNLOAD.PHP?p='.$nextpage.'"><font color=orange> 下一頁</font></a>';
}
?>
&nbsp; 
<font color=orange></font><a href="HAOYUE_DOWNLOAD.PHP?lang=CN">中文</a>/<a href="HAOYUE_DOWNLOAD.PHP">日本語</a><font color=orange><a href="DL_TOP.PHP">&nbsp; 回首頁</a></font></font>
</B></center>
	<table width=480 cellspacing=2>
		<tr>
		
		<td>
		<?php 
	$index = 1;
	foreach($data as $one)
	{
		
		//echo '<form action="'.$one["FileUri"].'" DOWNLOAD method=post><input type=image alt="X" width=20 height=15 ><font color=orange size=2>■'.$one["Title"].'</font></form>';
		if($_GET['lang']=="CN")
			echo '<a href="HAOYUE_QUESTINFO.PHP?ID='.$one["ID"].'&lang=CN&repage='.$page.'"><font color=orange size=2>■'.$one["ID"].'.'.$one["TitleCN"].'</font></a><BR>';
		else
			echo '<a href="HAOYUE_QUESTINFO.PHP?ID='.$one["ID"].'&repage='.$page.'"><font color=orange size=2>■'.$one["ID"].'.'.$one["Title"].'</font></a><BR>';
		if($index == 10)
		{
			echo '</td><td>';
		}
		$index++;
	}
	?>
		</td>
		</tr>
	</table>
	
<?php 
/**
* 字符串半角和全角间相互转换
* @param string $str 待转换的字符串
* @param int  $type TODBC:转换为半角；TOSBC，转换为全角
* @return string 返回转换后的字符串
*/
function convertStrType($str, $type) {
 
    $dbc = array( 
      '０' , '１' , '２' , '３' , '４' , 
      '５' , '６' , '７' , '８' , '９' , 
      'Ａ' , 'Ｂ' , 'Ｃ' , 'Ｄ' , 'Ｅ' , 
      'Ｆ' , 'Ｇ' , 'Ｈ' , 'Ｉ' , 'Ｊ' , 
      'Ｋ' , 'Ｌ' , 'Ｍ' , 'Ｎ' , 'Ｏ' , 
      'Ｐ' , 'Ｑ' , 'Ｒ' , 'Ｓ' , 'Ｔ' , 
      'Ｕ' , 'Ｖ' , 'Ｗ' , 'Ｘ' , 'Ｙ' , 
      'Ｚ' , 'ａ' , 'ｂ' , 'ｃ' , 'ｄ' , 
      'ｅ' , 'ｆ' , 'ｇ' , 'ｈ' , 'ｉ' , 
      'ｊ' , 'ｋ' , 'ｌ' , 'ｍ' , 'ｎ' , 
      'ｏ' , 'ｐ' , 'ｑ' , 'ｒ' , 'ｓ' , 
      'ｔ' , 'ｕ' , 'ｖ' , 'ｗ' , 'ｘ' , 
      'ｙ' , 'ｚ' , '－' , '　' , '：' ,
      '．' , '，' , '／' , '％' , '＃' ,
      '！' , '＠' , '＆' , '（' , '）' ,
      '＜' , '＞' , '＂' , '＇' , '？' ,
      '［' , '］' , '｛' , '｝' , '＼' ,
      '｜' , '＋' , '＝' , '＿' , '＾' ,
      '￥' , '￣' , '｀'
 
);
 
    $sbc = array( //半角
      '0', '1', '2', '3', '4', 
      '5', '6', '7', '8', '9', 
      'A', 'B', 'C', 'D', 'E', 
      'F', 'G', 'H', 'I', 'J', 
      'K', 'L', 'M', 'N', 'O', 
      'P', 'Q', 'R', 'S', 'T', 
      'U', 'V', 'W', 'X', 'Y', 
      'Z', 'a', 'b', 'c', 'd', 
      'e', 'f', 'g', 'h', 'i', 
      'j', 'k', 'l', 'm', 'n', 
      'o', 'p', 'q', 'r', 's', 
      't', 'u', 'v', 'w', 'x', 
      'y', 'z', '-', ' ', ':',
      '.', ',', '/', '%', ' #',
      '!', '@', '&', '(', ')',
      '<', '>', '"', '\'','?',
      '[', ']', '{', '}', '\\',
      '|', '+', '=', '_', '^',
      '￥','~', '`'
 
);
if($type == 'TODBC'){
return str_replace( $sbc, $dbc, $str ); //半角到全角
}elseif($type == 'TOSBC'){
return str_replace( $dbc, $sbc, $str ); //全角到半角
}else{
return $str;
}
}
?>
	
<img src=PNG/B_START.PNG width=17 height=17>:退出皓月云配信服務
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