<?	
	$cookie_no=$_COOKIE[cookie_no];
	$cookie_name=$_COOKIE[cookie_name];
	//저장된 쿠기값을 표기하는 소스
?>
<html>
<head>
<title>인덕닷컴 쇼핑몰</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link href="include/font.css" rel="stylesheet" type="text/css">
<script language="Javascript" src="include/common.js"></script>
</head>

<body style="margin:0">
<center>

<table width="1180" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr> 
		<td>
			<!--  상단 왼쪽 로고  -------------------------------------------->
			<table border="0" cellspacing="0" cellpadding="0" width="182">
				<tr>
					<td><a href="index.html"><img src="images/top_logo.gif" width="182" height="30" border="0"></a></td>
				</tr>
			</table>
		</td>
		<td align="right" valign="bottom">
			<!--  상단메뉴 Home/로그인/회원가입/장바구니/주문배송조회/즐겨찾기추가  ---->	
			<table border="0" cellspacing="0" cellpadding="0">
				<tr><td><a href="index.html"><img src="images/top_menu01.gif" border="0"></a></td>
					<td><img src="images/top_menu_line.gif" width="11"></td>
					<?
					if(!$cookie_no)
						echo("<td><a href='member_login.php'><img src='images/top_menu02.gif' border='0'></a></td>
						<td><img src='images/top_menu_line.gif' width='11'></td>
						<td><a href='member_agree.php'><img src='images/top_menu03.gif' border='0'></a></td>");
					else echo("<td><a href='member_logout.php'><img src='images/top_menu02_1.gif' border='0'></a></td>
						<td><img src='images/top_menu_line.gif' width='11'></td>
						<td><a href='member_edit.php'><img src='images/top_menu03_1.gif' border='0'></a></td>
						");
					?>
					<td><img src="images/top_menu_line.gif" width="11"></td>
					<td><a href="cart.php"><img src="images/top_menu05.gif" border="0"></a></td>
					<td><img src="images/top_menu_line.gif" width="11"></td>
					<td><a href="jumun_login.html"><img src="images/top_menu06.gif" border="0"></a></td>
					<td><img src="images/top_menu_line.gif"width="11"></td>
					<td><img src="images/top_menu08.gif" onclick="javascript:Add_Site();" style="cursor:hand"></td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<!--  메인 이미지 --------------------------------------------------->
<table width="1180" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
		<td><a href="index.html"><img src="product/banner_pink.png" width="1180" height="200" border="0"></a></td>
	</tr>
</table>

<!-- 상품 검색 ------------------------------------->
<table width="1180" height="35" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr><td height="5" colspan="5" ></td></tr>
	<tr>
		<td width="700" align="left"><font color="#666666"><b>&nbsp Welcome ! &nbsp;&nbsp 
		<? 
			if(!$cookie_no)
				echo("고객");
			else
				echo($cookie_name);
				echo("     님");
		?>
		&nbsp;&nbsp;</b></font></td>
		<td style="font-size:12pt;;font-family:굴림;padding-left:5px;"></td>
		<td align="right" style="font-size:9pt;color:#666666;font-family:굴림;"><b>상품검색 ▶&nbsp</b></td>
		<!-- form1 시작 -->
		<form name="form1" method="post" action="product_search.php">
		<td width="135">
			<input type="text" name="findtext" maxlength="40" size="17" class="cmfont1">
		</td>
		</form>
		<!-- form1 끝 -->
		<td width="65" align="center"><a href="javascript:Search()"><img src="product/search_icon.png" border="0"></a></td>
	</tr>
	<tr><td></td></tr>
</table>

<table width="959" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr><td height="10" colspan="2"></td></tr>
	<tr>
		<td height="100%" valign="top">
			<!--  화면 좌측메뉴 시작 (main_left) ------------------------------->
			<table width="181" border="0" cellspacing="0" cellpadding="0">
				<tr> 
					<td valign="top"> 
						<!--  Category 메뉴 : 세로인 경우 -------------------------------->
						<table width="177"  border="0" >
							<tr><td height="30" bgcolor="#f0f0f0" align="center" style="font-size:12pt;color:#333333"><b>Category</b></td></tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=1"><img src="product/neck.png" onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=2"><img src="product/ear.png" onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=3"><img src="product/pier.png" onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=4"><img src="product/ring.png"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=5"><img src="product/menu1.png"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=6"><img src="product/clip.png"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="qa.html"><img src="product/a.png"   onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="faq.html"><img src="product/b.png"   onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr><td></td></tr>
				<tr> 
					<td> <!--
						<table width="177"  border="0" >
							<tr><td height="3"  bgcolor="#a0a0a0"></td></tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><img src="product/a.png" border="0" width="176"></td></tr>
									</table>
								</td>
							</tr>
							
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><img src="product/b.png" border="0" width="176"></td></tr>
									</table>
								
								</td>
							</tr>
						</table>
				
			--!>
			<!--  화면 좌측메뉴 끝 (main_left) --------------------------------->
			</td>
				</tr>
			</table></td>
		<td width="10"></td>
		<td valign="top">
