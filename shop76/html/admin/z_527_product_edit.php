<?
	include "../common.php";
	
	$no=$_REQUEST[no];
	$regday2=$_REQUEST[regday2];
	$query="select * from product where no76=$no;";
	$result=mysqli_query($db,$query);
	if(!$result) exit("에러:$query");
	$row=mysqli_fetch_array($result); //1레코드 읽기
	$regday1=substr($row[regday76],0,4);
   $regday2=substr($row[regday76],5,2);
   $regday3=substr($row[regday76],8,2);
?>
<html>
<head>
<title>쇼핑몰 관리자 홈페이지</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">
<script language="JavaScript" src="include/common.js"></script>

<script language="JavaScript">
	function imageView(strImage)
	{
		this.document.images["big"].src = strImage;
	}
</script>

</head>

<body style="margin:0">

<form name="form1" method="post" action="product_update.php" enctype="multipart/form-data">

<input type="hidden" name="sel1" value="">
<input type="hidden" name="sel2" value="">
<input type="hidden" name="sel3" value="">
<input type="hidden" name="sel4" value="">
<input type="hidden" name="text1" value="">
<input type="hidden" name="page" value="1">
<input type="hidden" name="no" value="1">

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
	<option value="0" selected><?=$a_menu[$row[menu76]]?></option>
<?	
	for($i=1;$i<$n_menu;$i++)
	{
		echo("<option value='$i'>$a_menu[$i]</$option>");
	}
	echo("</select>");
?>
		</td>
	</tr>
	<tr height="23"> 
		<td width="100" bgcolor="#CCCCCC" align="center">상품코드</td>
		<td width="700"  bgcolor="#F2F2F2">
			<input type="text" name="code" value="<?=$row[code76]?>" size="20" maxlength="20">
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">상품명</td>
		<td width="700"  bgcolor="#F2F2F2">
			<input type="text" name="name" value="<?=$row[name76]?>" size="60" maxlength="60">
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">제조사</td>
		<td width="700"  bgcolor="#F2F2F2">
			<input type="text" name="coname" value="<?=$row[coname76]?>" size="30" maxlength="30">
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">판매가</td>
		<td width="700"  bgcolor="#F2F2F2">
			<input type="text" name="price" value="<?=$row[price76]?>" size="12" maxlength="12"> 원
		</td>
	</tr>
	<tr> 
	<td width="100" bgcolor="#CCCCCC" align="center">옵션</td>
    <td width="700" bgcolor="#F2F2F2">
<?
	$query="select * from opt order by name76";
	$result=mysqli_query($db,$query); //sql실행
	if (!$result) exit("에러:$query");       //에러조사
	$count=mysqli_num_rows($result);  //전체 레코드개수
	
	
?>
	
	<select name="opt1">
	<option value="0" selected></option>
<?	
	for($i=1;$i<=$count;$i++)
	{$row1=mysqli_fetch_array($result);
		if($row[opt1]==$row1[no76])
			echo("<option value='$row1[no76]' selected>$row1[name76]</$option>");
		else
			echo("<option value='$row1[no76]'>$row1[name76]</option>");
	}
	echo("</select>");

?> &nbsp; &nbsp; 


	<select name="opt2">
	<option value="0" selected>옵션선택</option>
<?	
	mysqli_data_seek($result,0); //0은 첫 번째 레코드
	for($i=0;$i<$count;$i++)
	{
		$row=mysqli_fetch_array($result);
		echo("<option value='$row[no76]'>$row[name76]</$option>");
	}
	echo("</select>");

?> &nbsp; &nbsp; 
			 
		</td>
	</tr>
	<tr>
		<td width="100" bgcolor="#CCCCCC" align="center">제품설명</td>
		<td width="700"  bgcolor="#F2F2F2">
			<textarea name="contents" rows="4" cols="70"><?=$row[content76]?></textarea>
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">상품상태</td>
    <td width="700"  bgcolor="#F2F2F2">
			<input type="radio" name="status" value="1" checked> 판매중
			<input type="radio" name="status" value="2"> 판매중지
			<input type="radio" name="status" value="3"> 품절
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">아이콘</td>
		<td width="700"  bgcolor="#F2F2F2">
			<input type="checkbox" name="icon_new" value="1"> New &nbsp;&nbsp	
			<input type="checkbox" name="icon_hit" value="1" checked> Hit &nbsp;&nbsp	
			<input type="checkbox" name="icon_sale" value="1"> Sale &nbsp;&nbsp
			할인율 : <input type="text" name="discount" value="10" size="3" maxlength="3"> %
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">등록일</td>
		<td width="700"  bgcolor="#F2F2F2">
			<input type="text" name="regday1" value="<?=$regday1?>" size="4" maxlength="4"> 년 &nbsp
			<input type="text" name="regday2" value="<?=$regday2?>" size="2" maxlength="2"> 월 &nbsp
			<input type="text" name="regday3" value="<?=$regday3?>" size="2" maxlength="2"> 일 &nbsp
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">이미지</td>
		<td width="700"  bgcolor="#F2F2F2">

			<table border="0" cellspacing="0" cellpadding="0" align="left">
				<tr>
					<td>
						<table width="390" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td>
									<input type='hidden' name='imagename1' value='s001_1.jpg'>
									&nbsp;<input type="checkbox" name="checkno1" value="1"> <b>이미지1</b>: s001_1.jpg
									<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="file" name="image1" size="20" value="찾아보기">
								</td>
							</tr> 
							<tr>
								<td>
									<input type='hidden' name='imagename2' value='s001_2.jpg'>
									&nbsp;<input type="checkbox" name="checkno2" value="1"checked> <b>이미지2</b>: s001_2.jpg
									<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="file" name="image2" size="20" value="찾아보기">
								</td>
							</tr> 
							<tr>
								<td>
									<input type='hidden' name='imagename3' value=''>
									&nbsp;<input type="checkbox" name="checkno3" value="1"> <b>이미지3</b>:
									<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="file" name="image3" size="20" value="찾아보기">
								</td>
							</tr> 
							<tr>
								<td><br>&nbsp;&nbsp;&nbsp;※ 삭제할 그림은 체크를 하세요.</td>
							</tr> 
				  	</table>
						<br><br><br><br><br>
						<table width="390" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td  valign="middle">&nbsp;
									<img src="../product/<?=$image1;?>" width="50" height="50" border="1" style='cursor:hand' onclick="imageView('../product/<?=$image1;?>')">&nbsp;
									<img src="../product/<?$image2?>" width="50" height="50" border="1" style='cursor:hand' onclick="imageView('../product/<?$image2?>')">&nbsp;
									<img src="../product/nopic.jpg"  width="50" height="50" border="1" style='cursor:hand' onclick="imageView('../product/nopic.jpg')">&nbsp;
								</td>
							</tr>				 
						</table>
					</td>
					<td>
						<td align="right" width="310"><img name="big" src="../product/s001_1.jpg" width="300" height="300" border="1"></td>
					</td>
				</tr>
			</table>

		</td>
	</tr>
</table>

<table width="800" border="0" cellspacing="0" cellpadding="5">
	<tr> 
		<td align="center">
			<input type="submit" value="수정하기"> &nbsp;&nbsp
			<input type="button" value="이전화면" onClick="javascript:history.back();">
		</td>
	</tr>
</table>

</form>

</center>

</body>
</html>
