<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->
<?
include "common.php";
?>
<html>
<head>
<title>중복ID 조회</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">

<script language = "javascript">
	function Close_me(v)
	{
		opener.form2.check_id.value = v;
		self.close();
	}
</script>

<body bgcolor="#FFFFFF" text="#000000"  marginwidth="0" marginheight="0">
<table border="0" width="300" cellspacing="0" cellpadding="0">
	<tr>
		<td  height="30" bgcolor="blue"><font color="white" size="3"><b>&nbsp;중복 ID 조사</b></font></td>
	</tr>
	<tr><td  height="40"></td></tr>

<!-- 중복 아이디가 없는 경우 -->
	<tr>
		<td height="50" valign="middle" align="center">
<?
	$uid=$_REQUEST[uid];
	
	$query="select * from member where uid76='$uid';";
	$result=mysqli_query($db,$query);
	if(!$result) exit("에러:$query");
	

	$count=mysqli_num_rows($result); //레코드개수
	if($count==0)
		echo("<font color='#666666'><b>$uid</b>는 사용 가능한 아이디입니다.</font>");
		
	else
		echo("사용 못함 출력 html소스");
?>
		  
		</td>
	</tr>
	<tr>
		<td height="50" align="center">
			<a href="javascript:Close_me('yes')"><img src="images/b_ok1.gif" border="0"></a>
		</td>
	</tr>


</table>
	 
</body>
</html>
