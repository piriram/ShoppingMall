<!-------------------------------------  ------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
	include "../common.php";
	$text1=$_REQUEST[text1];
	$page=$_REQUEST[page];
	$no=$_REQUEST[no];
	if (!$text1)
 		$query="select * from member order by name76;"; //sql정의
	else
		$query="select * from member where name76 like '%$text1%' order by name76;";

	$result=mysqli_query($db,$query); //sql실행
	if (!$result) exit("에러:$query");       //에러조사
	$count=mysqli_num_rows($result);  //전체 레코드개수
	
?>
<html>
<head>
<title>쇼핑몰 관리자 홈페이지</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">
<script language="JavaScript" src="include/common.js"></script>
</head>

<body style="margin:0">

<center>

<br>
<script> document.write(menu());</script>
<?	//sql문
	//$sql


?>
<table width="800" border="0">
	<form name="form1" method="post" action="member.php">
	<tr height="40">
		<td width="200" valign="bottom">&nbsp 회원수 : <font color="#FF0000"><?=$count ?></font></td>

		<td width="540" align="right" valign="bottom">

			<!--배열초기화,commonphp에다가해도됨-->
			<!--<select name="sel1" class="font9">
			
				<option value="1" >이름</option>
				<option value="2" >아이디</option>
			</select> -->
			<input type="text" name="text1" size="15" value="" class="font9">&nbsp
		</td>
		<td width="60" valign="bottom">
			<input type="button" value="검색" onclick="javascript:form1.submit();">&nbsp
		</td>
	</tr>
	</form>
</table>

<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr bgcolor="#CCCCCC" height="23"> 
		<td width="100" align="center">ID</td>
		<td width="100" align="center">이름</td>
		<td width="100" align="center">전화</td>
		<td width="100" align="center">핸드폰</td>
		<td width="200" align="center">E-Mail</td>
		<td width="100" align="center">회원구분</td>
		<td width="100" align="center">수정/삭제</td>
	</tr>
	
		
	
	<?	if (!$page) $page=1;
		$pages=ceil($count/$page_line); //전체 페이지 수
		$first=1;
		if ($count>0) $first=$page_line*($page-1); //현재 페이지 row위치
		$page_last=$count - $first;
		if ($page_last>$page_line) $page_last=$page_line; //현재 페이지 line 수

	if ($count>0) mysqli_data_seek($result,$first); //현재 페이지 첫줄로 이동
		for($i=0;$i<$page_last;$i++)
		{
		$row=mysqli_fetch_array($result); //1레코드 읽기
		if ($row[sm76]==0) $sm='양력'; else $sm='음력';
			$tel1=trim(substr($row[tel76],0,3));
			$tel2=trim(substr($row[tel76],3,4));
			$tel3=trim(substr($row[tel76],7,4));
			$tel=$tel1.'-'.$tel2.'-'.$tel3;
			$phone1=trim(substr($row[phone76],0,3));
			$phone2=trim(substr($row[phone76],3,4));
			$phone3=trim(substr($row[phone76],7,4));
			$phone=$phone1.'-'.$phone2.'-'.$phone3;
		echo("

		<tr bgcolor='#F2F2F2' height='23'>
		<td width='100'>&nbsp $row[uid76]</td>	
		<td width'100'>&nbsp $row[name76]</td>	
		<td width'100'>&nbsp $tel </td>	
		<td width'100'>&nbsp $phone </td>	
		<td width'200'>&nbsp $row[email76]</td>	
		<td width='100' align='center'>회원</td>	
		<td width='100' align='center'>
			<a href='member_edit.html?no=1&page=&sel1=&text1='>수정</a>/
			<a href='member_delete.html?no=1&page=&sel1=&text1=' onclick='javascript:return confirm(\"삭제할까요 ?\");'>삭제</a>
		</td>
	</tr> ");
		}
	?>
	
</table>

<!--<table width="800" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td height="30" class="cmfont" align="center">
			<img src="images/i_prev.gif" align="absmiddle" border="0"> 
			<font color="#FC0504"><b>1</b></font>&nbsp;
			<<a href="member.php?page=2&sel1=$sel1&text1=$text1"><font color="#7C7A77">[2]</font></a>&nbsp;
			<a href="member.php?page=3&sel1=$sel&text1=$text1"><font color="#7C7A77">[3]</font></a>&nbsp;
			<img src="images/i_next.gif" align="absmiddle" border="0"></td>


-->

			
<?
	echo("<table width='800' border='0' cellspacing='0' cellpadding='0'>
	<tr>
	<td height='30' align='center'>");


	$blocks = ceil($pages/$page_block); //전체 블록수
	$block = ceil($page/$page_block); //현재 블록
    $page_s = $page_block * ($block-1); //현재 페이지
	$page_e = $page_block * $block; //마지막 페이지
	if($blocks <=$block) $page_e = $pages;

	
	if($block > 1) //이전 블록으로
	{
		
		$tmp=$page_e+1;
		echo("<a href='member.php?page=$tmp&text1=$text1'>
				<img src='images/i_next.gif' align='absmiddle' border='0'>
				</a>");
	}
	for($i=$page_s+1; $i<=$page_e; $i++) //현재 블록의 페이지
	{
		if($page == $i)
			echo("<font color='#FC0504'><b>[$i]</b></font>&nbsp");
		else
			echo("<a href='member.php?page=$i&text1=$text1'>[$i]</a>&nbsp");
	}

	if ($block < $blocks) //다음블록으로
	{
		$tmp = $page_e+1;
		echo("&nbsp<a href='member.php?page=$tmp&&text1=$text1'>
				<img src='images/i_next.gif' align='absmiddle' border='0'>
			</a>");
	}

	

	echo("</td>    </td>
		</tr>
		</table>
		");
	
?>

	</tr>
</table>

</center>

</body>
</html>