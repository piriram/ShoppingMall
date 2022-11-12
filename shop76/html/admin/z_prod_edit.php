<?
	include "../common.php";
	$no=$_REQUEST[no];
	$query="select * from product where no76=$no;";
	$result=mysqli_query($db,$query);
	if(!$result) exit("에러:$query");
	$row=mysqli_fetch_array($result); //1레코드 읽기
	
	
?>
<html>
<head>
<title>쇼핑몰 관리자 홈페이지</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">
<script language="JavaScript" src="include/common.js"></script>
</head>

<body style="margin:0">

<form name="form1" method="post" action="product_insert.php" enctype="multipart/form-data">

<center>

<br>
<script> document.write(menu());</script>
<br>
<br>

<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr height="23"> 
		<td width="100" bgcolor="#CCCCCC" align="center">상품분류</td>
		<td width="700" bgcolor="#F2F2F2">
<select name="menu">
<?
	$k=$row[menu76];
	echo("<option value='0' selected>$a_menu[$k]</option>");

	for($i=1;$i<$n_menu;$i++)
	{
		echo("<option value='$i'>$a_menu[$i]</$option>");
	}
	echo("</select>");
?>
	</tr>
	<tr height="23"> 
		<td width="100" bgcolor="#CCCCCC" align="center">상품코드</td>
		<td width="700" bgcolor="#F2F2F2">
			<input type="text" name="code" value="<?=$row[code76]?>" size="20" maxlength="20">
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">상품명</td>
		<td width="700" bgcolor="#F2F2F2">
			<input type="text" name="name" value="<?=$row[name76]?>" size="60" maxlength="60">
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">제조사</td>
		<td width="700" bgcolor="#F2F2F2">
			<input type="text" name="coname" value="<?=$row[coname76]?>" size="30" maxlength="30">
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">판매가</td>
		<td width="700" bgcolor="#F2F2F2">
			<input type="text" name="price" value="<?=$row[price76]?>" size="12" maxlength="12"> 원
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">옵션</td>
    <td width="700" bgcolor="#F2F2F2">

	<select name="opt1">
	<option value="0" selected>옵션선택</option>
<?	
	for($i=0;$i<$count;$i++)
	{
		echo("<option value='$row1[no76]'>$row1[name76]</$option>");
	}
	echo("</select>");

?> &nbsp; &nbsp; 

	<select name="opt2">
	<option value="0" selected>옵션선택</option>
<?	
	
	for($i=0;$i<$count;$i++)
	{
		echo("<option value='$row[no76]'>$row[name76]</$option>");
	}
	echo("</select>");

?> &nbsp; &nbsp; 
			 
		</td>
	</tr>
	<?
	$content=stripslashes($row[content76]);
	
	?>
	
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">제품설명</td>
		<td width="700" bgcolor="#F2F2F2">
			<textarea name="contents" rows="10" cols="80"><?$content?></textarea>
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">상품상태</td>
    <td width="700" bgcolor="#F2F2F2">
<?	

	for($i;$i<$n_status;$i++){
			<input type="radio" name="status" value="1" checked> 판매중
			<input type="radio" name="status" value="2"> 판매중지
			<input type="radio" name="status" value="3"> 품절
	}
			?>
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">아이콘</td>
		<td width="700" bgcolor="#F2F2F2">
			<input type="checkbox" name="icon_new" value="<?=$row[icon_new76]?>"> New &nbsp;&nbsp

			<input type="checkbox" name="icon_hit" value="<?=$row[icon_hit76]?>"> Hit &nbsp;&nbsp	
			<input type="checkbox" name="icon_sale" value="<?=$row[icon_sale76]?>"> Sale &nbsp;&nbsp
			할인율 : <input type="text" name="discount" value="<?=$row[discount76]?>" size="3" maxlength="3"> %
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">등록일</td>
		<td width="700" bgcolor="#F2F2F2">
			<input type="text" name="regday1" value="<?=date("Y");?>" size="4" maxlength="4"> 년 &nbsp
			<input type="text" name="regday2" value="<?=date("m");?>" size="2" maxlength="2"> 월 &nbsp
			<input type="text" name="regday3" value="<?=date("d");?>" size="2" maxlength="2"> 일

		</td>
	</tr>
	<tr> 

		<td width="100" bgcolor="#CCCCCC" align="center">이미지</td>
		<td width="700" bgcolor="#F2F2F2">
			
			<b>이미지1</b>: <input type="file" name="image1" size="30" value="찾아보기"><br>

			<b>이미지2</b>: <input type="file" name="image2" size="30" value="찾아보기"><br>
			<b>이미지3</b>: <input type="file" name="image3" size="30" value="찾아보기"><br>
		</td>
	</tr>

<table width="800" border="0" cellspacing="0" cellpadding="7">
	<tr> 
		<td align="center">
			<input type="submit" value="등록하기"> &nbsp;&nbsp
			<input type="button" value="이전화면" onClick="javascript:history.back();">
		</td>
	</tr>
</table>

</form>

</center>

</body>
</html>
