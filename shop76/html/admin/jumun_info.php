<!-------------------------------------------------------------------------------------------->   
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->   
<?
include "../common.php";
$no=$_REQUEST[no];
?>
<html>
<head>
<title>쇼핑몰 홈페이지</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">
<script language="JavaScript" src="include/common.js"></script>
</head>

<body style="margin:0">

<center>

<br>
<script> document.write(menu());</script>
<br>
<br>
<?
$query="select * from jumun where no76=$no;"; 
$result=mysqli_query($db,$query); 
 if (!$result) exit("에러:$query");
$row=mysqli_fetch_array($result);
if($row[member_no76]==0) $name="비회원";
else $name=$row[o_name76];
$o_tel1=trim(substr($row[o_tel76],0,3));
$o_tel2=trim(substr($row[o_tel76],3,4));
$o_tel3=trim(substr($row[o_tel76],7,4));
$o_tel = $o_tel1 . "-" .$o_tel2 . "-" . $o_tel3;
$o_phone1=trim(substr($row[o_phone76],0,3));
$o_phone2=trim(substr($row[o_phone76],3,4));
$o_phone3=trim(substr($row[o_phone76],7,4));
$o_phone = $o_phone1 . "-" .$o_phone2 . "-" . $o_phone3;
$r_tel1=trim(substr($row[r_tel76],0,3));
$r_tel2=trim(substr($row[r_tel76],3,4));
$r_tel3=trim(substr($row[r_tel76],7,4));
$r_tel = $r_tel1 . "-" .$r_tel2 . "-" . $r_tel3;
$r_phone1=trim(substr($row[r_phone76],0,3));
$r_phone2=trim(substr($row[r_phone76],3,4));
$r_phone3=trim(substr($row[r_phone76],7,4));
$r_phone = $r_phone1 . "-" .$r_phone2 . "-" . $r_phone3;
if($row[pay_method76]==0) $pay_method="카드";
else $pay_method="무통장";
if($row[card_kind76]==0) $card_kind="";
elseif($row[card_kind76]==1) $card_kind="국민카드";
elseif($row[card_kind76]==2) $card_kind="신한카드";
elseif($row[card_kind76]==3) $card_kind="우리카드";
else $card_kind="하나카드";
if($row[bank_kind76]==0) $bank_kind="";
elseif($row[bank_kind76]==1) $bank_kind="국민은행 000-00000-0000";
else $bank_kind="신한은행 000-00000-0000";
$total_cash=number_format($row[total_cash76]);
?>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
   <tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문번호</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE">&nbsp;<font size="3"><b><?=$row[no76]?>(<font color="blue"><?=$a_state[$row[state76]]?></font>)</b></font></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문일</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row[jumunday76]?></td>
   </tr>
</table>
<br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
   <tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$name?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자전화</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$o_tel?></td>
   </tr>
   <tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자 E-Mail</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row[o_email76]?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자핸드폰</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$o_phone?></td>
   </tr>
   <tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자주소</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE" colspan="3">(<?=$row[o_zip76]?>) <?=$row[o_juso76]?></td>
   </tr>
   </tr>
</table>
<img src="blank.gif" width="10" height="5"><br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
   <tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row[r_name76]?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자전화</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$r_tel?></td>
   </tr>
   <tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자 E-Mail</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row[r_email76]?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자핸드폰</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$r_phone?></td>
   </tr>
   <tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자주소</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE" colspan="3">(<?=$row[r_zip76]?>) <?=$row[r_juso76]?></td>
   </tr>
   <tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">메모</font></td>
        <td width="300" height="50" bgcolor="#EEEEEE" colspan="3"><?=$row[memo76]?></td>
   </tr>
</table>
<br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
   <tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">지불종류</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$pay_method?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">카드승인번호 </font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row[card_okno76]?>&nbsp</td>
   </tr>
   <tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">카드 할부</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row[card_halbu76]?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">카드종류</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$card_kind?></td>
   </tr>
   <tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">무통장</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$bank_kind?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">입금자이름</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row[bank_sender76]?></td>
   </tr>
</table>
<br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
   <tr bgcolor="#CCCCCC"> 
    <td width="340" height="20" align="center"><font color="#142712">상품명</font></td>
      <td width="50"  height="20" align="center"><font color="#142712">수량</font></td>
      <td width="70"  height="20" align="center"><font color="#142712">단가</font></td>
      <td width="70"  height="20" align="center"><font color="#142712">금액</font></td>
      <td width="50"  height="20" align="center"><font color="#142712">할인</font></td>
      <td width="60"  height="20" align="center"><font color="#142712">옵션1</font></td>
      <td width="60"  height="20" align="center"><font color="#142712">옵션2</font></td>
   </tr>
   <?
   $query="select * from jumuns where jumun_no76=$no";
$result=mysqli_query($db,$query); 
 if (!$result) exit("에러:$query");
$count=mysqli_num_rows($result);
   for($i=0;$i<$count;$i++){
      $row1=mysqli_fetch_array($result);
      $query="select * from product where no76='$row1[product_no76]'";
$result1=mysqli_query($db,$query); 
 if (!$result1) exit("에러:$query");
$productrow=mysqli_fetch_array($result1);
$query="select * from opts where no76='$row1[opts_no1]'";
$result2=mysqli_query($db,$query); 
 if (!$result2) exit("에러:$query");
$opts1row=mysqli_fetch_array($result2);
$query="select * from opts where no76='$row1[opts_no2]'";
$result3=mysqli_query($db,$query); 
 if (!$result) exit("에러:$query");
$opts2row=mysqli_fetch_array($result3);
if ($row1[product_no76]==0)
   $productrow[name76]="택배비";
   echo("<tr bgcolor='#EEEEEE' height='20'>   
      <td width='340' height='20' align='left'>$productrow[name76]</td>   
      <td width='50'  height='20' align='center'>$row1[num76]</td>   
      <td width='70'  height='20' align='right'>$row1[price76]</td>   
      <td width='70'  height='20' align='right'>$row1[cash76]</td>   
      <td width='50'  height='20' align='center'>$row1[discount76]%</td>   
      <td width='60'  height='20' align='center'>$opts1row[name76]</td>   
      <td width='60'  height='20' align='center'>$opts2row[name76]</td>   
   </tr>");
   }
   ?>
</table>
<img src="blank.gif" width="10" height="5"><br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
   <tr> 
     <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">총금액</font></td>
      <td width="700" height="20" bgcolor="#EEEEEE" align="right"><font color="#142712" size="3"><b><?=$total_cash?></b></font> 원&nbsp;&nbsp</td>
   </tr>
</table>

<table width="800" border="0" cellspacing="0" cellpadding="7">
   <tr> 
      <td align="center">
         <input type="button" value="이 전 화 면" onClick="javascript:history.back();">&nbsp
         <input type="button" value="프린트" onClick="javascript:print();">
      </td>
   </tr>
</table>

</center>

<br>
</body>
</html>