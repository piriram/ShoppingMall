<!-------------------------------------------------------------------------------------------->   
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->   
<?
include "main_top.php";
include "common.php";
?>
<!-------------------------------------------------------------------------------------------->   
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->   

         <!--  현재 페이지 자바스크립  -------------------------------------------->
         <script language="javascript">

         function order_edit(kind,pos) {
            if (kind=="deleteall") 
            {
               location.href = "order_edit.php?kind=deleteall";
            } 
            else if (kind=="delete")   {
               location.href = "order_edit.php?kind=delete&pos="+pos;
            } 
            else if (kind=="insert")   {
               var num=eval("form2.num"+pos).value;
               location.href = "order_edit.php?kind=insert&pos="+pos+"&num="+num;
            }
            else if (kind=="update")   {
               var num=eval("form2.num"+pos).value;
               location.href = "order_edit.php?kind=update&pos="+pos+"&num="+num;
            }
         }

         function Check_Value() {
            if (!form2.o_name.value) {
               alert("주문자 이름이 잘 못 되었습니다.");   form2.o_name.focus();   return;
            }
            if (!form2.o_tel1.value || !form2.o_tel2.value || !form2.o_tel3.value) {
               alert("전화번호가 잘 못 되었습니다.");   form2.o_tel1.focus();   return;
            }
            if (!form2.o_phone1.value || !form2.o_phone2.value || !form2.o_phone3.value) {
               alert("핸드폰이 잘 못 되었습니다.");   form2.o_phone1.focus();   return;
            }
            if (!form2.o_email.value) {
               alert("이메일이 잘 못 되었습니다.");   form2.o_email.focus();   return;
            }
            if (!form2.o_zip.value) {
               alert("우편번호가 잘 못 되었습니다.");   form2.o_zip.focus();   return;
            }
            if (!form2.o_juso.value) {
               alert("주소가 잘 못 되었습니다.");   form2.o_juso.focus();   return;
            }

            if (!form2.r_name.value) {
               alert("받으실 분의 이름이 잘 못 되었습니다.");   form2.r_name.focus();   return;
            }
            if (!form2.r_tel1.value || !form2.r_tel2.value || !form2.r_tel3.value) {
               alert("전화번호가 잘 못 되었습니다.");   form2.r_tel1.focus();   return;
            }
            if (!form2.r_phone1.value || !form2.r_phone2.value || !form2.r_phone3.value) {
               alert("핸드폰이 잘 못 되었습니다.");   form2.r_phone1.focus();   return;
            }
            if (!form2.r_email.value) {
               alert("이메일이 잘 못 되었습니다.");   form2.r_email.focus();   return;
            }
            if (!form2.r_zip.value) {
               alert("우편번호가 잘 못 되었습니다.");   form2.r_zip.focus();   return;
            }
            if (!form2.r_juso.value) {
               alert("주소가 잘 못 되었습니다.");   form2.r_juso.focus();   return;
            }

            form2.submit();
         }

         function FindZip(zip_kind) 
         {
            window.open("zipcode.php?zip_kind="+zip_kind, "", "scrollbars=no,width=500,height=250");
         }

         function SameCopy(str) {
            if (str == "Y") {
               form2.r_name.value = form2.o_name.value;
               form2.r_zip.value = form2.o_zip.value;
               form2.r_juso.value = form2.o_juso.value;
               form2.r_tel1.value = form2.o_tel1.value;
               form2.r_tel2.value = form2.o_tel2.value;
               form2.r_tel3.value = form2.o_tel3.value;
               form2.r_phone1.value = form2.o_phone1.value;
               form2.r_phone2.value = form2.o_phone2.value;
               form2.r_phone3.value = form2.o_phone3.value;
               form2.r_email.value = form2.o_email.value;
            }
            else {
               form2.r_name.value = "";
               form2.r_zip.value = "";
               form2.r_juso.value = "";
               form2.r_tel1.value = "";
               form2.r_tel2.value = "";
               form2.r_tel3.value = "";
               form2.r_phone1.value = "";
               form2.r_phone2.value = "";
               form2.r_phone3.value = "";
               form2.r_email.value = "";
            }
         }

         </script>

      <table border="0" cellpadding="0" cellspacing="0" width="747">
            <tr><td height="13"></td></tr>
         </table>
         

         <table border="0" cellpadding="0" cellspacing="0" width="959" class="cmfont">
            <tr>
                  <td><font color="#111111" size="4px"><b>ORDER</b></font></td>
            </tr>
         </table>

<table border="0" cellpadding="0" cellspacing="0" width="600">
            <tr><td height="10"></td></tr>
         </table>

         <table border="0" cellpadding="1" cellspacing="1" width="959" class="cmfont" bgcolor="#FFFFFF">
            <tr><td height="1" colspan="5" bgcolor="#E5E5E5"></td></tr>
            <tr bgcolor="F0F0F0" height="23" class="cmfont">
               <td width="240" align="center">상품</td>
               <td width="70"  align="center">수량</td>
               <td width="100" align="center">가격</td>
               <td width="100" align="center">배송비</td>
               <td width="100" align="center">합계</td>
                  <tr><td height="1" colspan="5" bgcolor="#E5E5E5"></td></tr>
            </tr>
            <?
$no=$_REQUEST[no];
$num=$_REQUEST[num];
$opts1=$_REQUEST[opts1];
$opts2=$_REQUEST[opts2];
$n_cart=$_COOKIE[n_cart];
$total=0;
$count=0;
if(!$n_cart)$n_cart=0;
for($i=1;$i<=$n_cart;$i++)
{
   $cart=$_COOKIE[cart];
   if($cart[$i])
   {
      list($no,$num,$opts1,$opts2)=explode("^",$cart[$i]);
   $query="select * from product where no76=$no;";
   $result=mysqli_query($db,$query);
   if(!$result) exit("에러: $query");
   $row=mysqli_fetch_array($result);
   $price=$row[price76]*(100-$row[discount76])/100;
   $query="select * from opts where no76=$opts1";
   $result=mysqli_query($db,$query);
   if(!$result) exit("에러: $query");
   $row1=mysqli_fetch_array($result);
   $query="select * from opts where no76=$opts2";
   $result=mysqli_query($db,$query);
   if(!$result) exit("에러: $query");
   $row2=mysqli_fetch_array($result);
    $total=$total+$price*$num;
   $total1=$total1+$price*$num;

   
            echo("<tr bgcolor='#FFFFFF'>
               <td height='60' align='center'>
                  <table cellpadding='0' cellspacing='0' width='100%'>
                     <tr>
                        <td width='60'>
                           <a href='product_detail.php?no=$row[no76]'><img src='product/$row[image1]' width='50' height='50' border='0'></a>
                        </td>
                        <td class='cmfont'>
                           <a href='product_detail.php?no=$row[no76]'>$row[name76]</a><br>
                           <font color='#0066CC'>[옵션]</font> $row1[name76] $row2[name76]
                        </td>
                     </tr>
                  </table>
               </td>
               <td align='center'><font color='#464646'>$num&nbsp개</font></td>
               <td align='center'><font color='#464646'>".number_format(round($price))."</font> 원</td>
                        <td align='center'><font color='#464646'></font> 2500원 <br>조건</td>

               <td align='center'><font color='#464646'>".number_format(round($price*$num))."</font> 원</td>
               <tr><td height='1' colspan='5' bgcolor='#E5E5E5'></td></tr>
            </tr>
               ");
            }
            }
            if($total<$max_baesongbi) {
         $total1=$total+$baesongbi;
            $localbeasong=2500;
            }
            else $localbaesong=0;
            
            ?>
            <tr>
               
               <table border="0" cellpadding="1" cellspacing="2" width="959" height="10" class="cmfont" bgcolor="#ffffff">
                            <font size="2px"  ><td align="right"> 총 상품금액 : (<?=number_format(round($total))?>원)&nbsp;&nbsp;<img src=images/plus.png border=0 height=12 >&nbsp;&nbsp;배송료(<?=number_format($localbeasong,-3)?>원) <font color="#000000"><b><img src=images/total.png  border=0 height=12>&nbsp;&nbsp;<?=number_format($total1)?>원</b>&nbsp;&nbsp</font>
                        </td>
                        <tr><td height="1.5" ></td></tr>   
                                 <tr><td height="2" bgcolor="#e5e5e5"></td></tr>
                     </tr>
                  </table>
    
<?
if($cookie_no)
{
$query="select * from member where no76=$cookie_no;";
   $result=mysqli_query($db,$query);
   if(!$result) exit("에러: $query");
   $row=mysqli_fetch_array($result);
   $tel1=trim(substr($row[tel76],0,3));
$tel2=trim(substr($row[tel76],3,4));
$tel3=trim(substr($row[tel76],7,4));
$tel = $tel1 . "-" .$tel2 . "-" . $tel3;
$phone1=trim(substr($row[phone76],0,3));
$phone2=trim(substr($row[phone76],3,4));
$phone3=trim(substr($row[phone76],7,4));
$phone = $phone1 . "-" .$phone2 . "-" . $phone3;
$o_no=$row[no76];
$o_name=$row[name76];
$o_tel1=$tel1;
$o_tel2=$tel2;
$o_tel3=$tel3;
$o_phone1=$phone1;
$o_phone2=$phone2;
$o_phone3=$phone3;
$o_email=$row[email76];
$o_zip=$row[zip76];
$o_juso=$row[juso76];
}
?>
         <!-- 주문자 정보 -->
         

         <!-- form2 시작  -->
         <form name="form2" method="post" action="order_pay.php">
         <table width="959" border="0" cellpadding="0" cellspacing="0" class="cmfont">
            <tr>
               <td align="left" valign="top" width="150" STYLE="padding-left:45;padding-top:5">
                  <font size="4" color="#6786C2"><b>Orderer Information</b></font>
                     <tr><td height="10"></td></tr>
               </td>
               <td align="center" width="760">
               </table>

<table width="859" border="0" cellpadding="0" cellspacing="0" class="cmfont">
   <tr><td height="10"></td></tr>
            <tr height="1" bgcolor="#000000"><td></td></tr>
   <tr><td height="5"></td></tr>
         </table>

                  <table width="800" border="0" cellpadding="0" cellspacing="0" class="cmfont">
                     <tr><td height="1"></td></tr>
                        <td width="150"><b>주문자성명</b>&emsp;&emsp;<input type="hidden" name="o_no" value="<?=$o_no?>">
                           <input type="text"   name="o_name" size="20" maxlength="10" value="<?=$o_name?>" class="cmfont1"></td>
                        
                     </tr>            
                     </table>

            <table width="640" border="0" cellpadding="0" cellspacing="0" class="cmfont" align="middle"
            >
   <tr><td height="5"></td></tr>
            <tr height="1" bgcolor="#cccccc" ><td></td></tr>
   <tr><td height="5"></td></tr>
         </table>

                  <table width="800" border="0" cellpadding="0" cellspacing="0" class="cmfont">
               <tr><td height="1"></td></tr>
                     <td width="150"><b>전화번호
                     </b><font color="ffffff" >안녕</font>&nbsp;&nbsp;&nbsp;
                     <input type="text" name="o_tel1" size="4" maxlength="4" value="<?=$o_tel1?>" class="cmfont1"> -
                           <input type="text" name="o_tel2" size="4" maxlength="4" value="<?=$o_tel2?>" class="cmfont1"> -
                           <input type="text" name="o_tel3" size="4" maxlength="4" value="<?=$o_tel3?>" class="cmfont1"></td>
                        
                        
                     </tr>               
                     </table>

                  <table width="640" border="0" cellpadding="0" cellspacing="0" class="cmfont">
   <tr><td height="5"></td></tr>
            <tr height="1" bgcolor="#cccccc"><td></td></tr>
   <tr><td height="5"></td></tr>
         </table>

                     <table width="800" border="0" cellpadding="0" cellspacing="0" class="cmfont">
               <tr><td height="1"></td></tr>
                        <td width="150"><b>휴대폰번호</b>&emsp;&emsp;
                        <input type="text" name="o_phone1" size="4" maxlength="4" value="<?=$o_phone1?>" class="cmfont1"> -
                           <input type="text" name="o_phone2" size="4" maxlength="4" value="<?=$o_phone2?>" class="cmfont1"> -
                           <input type="text" name="o_phone3" size="4" maxlength="4" value="<?=$o_phone3?>" class="cmfont1"></td>
                     </tr>               
                     </table>
                     
                  <table width="640" border="0" cellpadding="0" cellspacing="0" class="cmfont">
   <tr><td height="5"></td></tr>
            <tr height="1" bgcolor="#cccccc"><td></td></tr>
   <tr><td height="5"></td></tr>
         </table>

                     
                     <table width="800" border="0" cellpadding="0" cellspacing="0" class="cmfont">
               <tr><td height="1"></td></tr>
                        <td width="150"><b>이메일주소</b>&emsp;&emsp;
                        <input type="text" name="o_email" size="50" maxlength="50" value="<?=$o_email?>" class="cmfont1"></td>
                     </tr>               
                     </table>

<table width="640" border="0" cellpadding="0" cellspacing="0" class="cmfont">
   <tr><td height="5"></td></tr>
            <tr height="1" bgcolor="#cccccc"><td></td></tr>
   <tr><td height="5"></td></tr>
         </table>


                     
                           <table width="800" border="0" cellpadding="0" cellspacing="0" class="cmfont">
               <tr><td height="1"></td></tr>
                        <td width="150"><b>주소</b>&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" name="o_zip" size="6" maxlength="6" value="<?=$o_zip?>" class="cmfont1"> 
                           <a href="javascript:FindZip(1)"><img align="absmiddle" src="http://img.echosting.cafe24.com/skin/base_ko_KR/order/btn_zipcode.gif" border="0"></a> <br>
                           &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
                           <input type="text" name="o_juso" size="55" maxlength="200" value="<?=$o_juso?>" class="cmfont1"><br></td>
                           
                        
                     </tr>               
                     </table>

<table width="859" border="0" cellpadding="0" cellspacing="0" class="cmfont">
   <tr><td height="5"></td></tr>
            <tr height="1" bgcolor="#000000"><td></td></tr>
   <tr><td height="80"></td></tr>
         </table>

         

         <!-- 배송지 정보 -->
         

         <form name="form2" method="post" action="order_pay.php">
         <table width="959" border="0" cellpadding="0" cellspacing="0" class="cmfont">
            <tr>
               <td align="left" valign="top" width="150" STYLE="padding-left:45;padding-top:5">
                  <font size="4" color="#6786C2"><b>Shipping location Information</b></font>
                     <tr><td height="10"></td></tr>
               </td>
               <td align="center" width="760">
               </table>

               <table width="859" border="0" cellpadding="0" cellspacing="0" class="cmfont">
   <tr><td height="10"></td></tr>
            <tr height="1" bgcolor="#000000"><td></td></tr>
   <tr><td height="5"></td></tr>
         </table>


                  <table width="800" border="0" cellpadding="0" cellspacing="0" class="cmfont">
                     <tr><td height="1"></td></tr>
                        <td width="150"><b>배송지확인</b>&emsp;&emsp;
                        <input type="radio" name="same" onclick="SameCopy('Y')">&nbsp;주문자 정보와 동일 &nbsp;&nbsp;&nbsp;
                        <input type="radio" name="same" onclick="SameCopy('N')">&nbsp;신규배송지</b></td>
                     </tr>
                     </table>

                     <table width="600" border="0" cellpadding="0" cellspacing="0" class="cmfont">
   <tr><td height="5"></td></tr>
            <tr height="1" bgcolor="#cccccc"><td></td></tr>
   <tr><td height="5"></td></tr>
         </table>



                  <table width="800" border="0" cellpadding="0" cellspacing="0" class="cmfont">
                     <tr><td height="1"></td></tr>
                        <td width="150"><b>받으실 분</b><font color="ffffff" ></font>&emsp;&nbsp;&nbsp;&emsp;
                        <input type="text" name="r_name" size="20" maxlength="10" value="" class="cmfont1"></td>
                     </tr>
                     </table>

   <table width="600" border="0" cellpadding="0" cellspacing="0" class="cmfont">
   <tr><td height="5"></td></tr>
            <tr height="1" bgcolor="#cccccc"><td></td></tr>
   <tr><td height="5"></td></tr>
         </table>

                     
                  <table width="800" border="0" cellpadding="0" cellspacing="0" class="cmfont">
                     <tr><td height="1"></td></tr>
                        <td width="150"><b>전화번호</b></b><font color="ffffff" >안녕</font>&emsp;
                        <input type="text" name="r_tel1" size="4" maxlength="4" value="" class="cmfont1"> -
                           <input type="text" name="r_tel2" size="4" maxlength="4" value="" class="cmfont1"> -
                           <input type="text" name="r_tel3" size="4" maxlength="4" value="" class="cmfont1"></td>   
                     </tr>
                     </table>

<table width="600" border="0" cellpadding="0" cellspacing="0" class="cmfont">
   <tr><td height="5"></td></tr>
            <tr height="1" bgcolor="#cccccc"><td></td></tr>
   <tr><td height="5"></td></tr>
         </table>

                  <table width="800" border="0" cellpadding="0" cellspacing="0" class="cmfont">
                     <tr><td height="1"></td></tr>
                        <td width="150"><b>휴대폰번호
                        &emsp;&emsp;</b><input type="text" name="r_phone1" size="4" maxlength="4" value="" class="cmfont1"> -
                           <input type="text" name="r_phone2" size="4" maxlength="4" value="" class="cmfont1"> -
                           <input type="text" name="r_phone3" size="4" maxlength="4" value="" class="cmfont1"></td>
                     </tr>
                     </table>
               
<table width="600" border="0" cellpadding="0" cellspacing="0" class="cmfont">
   <tr><td height="5"></td></tr>
            <tr height="1" bgcolor="#cccccc"><td></td></tr>
   <tr><td height="5"></td></tr>
         </table>


               <table width="800" border="0" cellpadding="0" cellspacing="0" class="cmfont">
                     <tr><td height="1"></td></tr>
                        <td width="150"><b>이메일주소</b>&emsp;&emsp;
                        <input type="text" name="r_email" size="50" maxlength="50" value="" class="cmfont1"></td>
                        </tr>
                     </table>
                     
   <table width="600" border="0" cellpadding="0" cellspacing="0" class="cmfont">
   <tr><td height="5"></td></tr>
            <tr height="1" bgcolor="#cccccc"><td></td></tr>
   <tr><td height="5"></td></tr>
         </table>


                     
                           <table width="800" border="0" cellpadding="0" cellspacing="0" class="cmfont">
               <tr><td height="1"></td></tr>
                        <td width="150"><b>주소</b>&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
                        <input type="text" name="r_zip" size="5" maxlength="5" value="" class="cmfont1"> 
                           <a href="javascript:FindZip(2)"><img align="absmiddle" src="http://img.echosting.cafe24.com/skin/base_ko_KR/order/btn_zipcode.gif" border="0"></a> <br>
                           &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
                           <input type="text" name="r_juso" size="55" maxlength="200" value="" class="cmfont1"><br></td>
                        </tr>
                     </table>

                            <table width="600" border="0" cellpadding="0" cellspacing="0" class="cmfont">
   <tr><td height="5"></td></tr>
            <tr height="1" bgcolor="#cccccc"><td></td></tr>
   <tr><td height="5"></td></tr>
         </table>

                     <table width="800" border="0" cellpadding="0" cellspacing="0" class="cmfont">
               <tr><td height="1"></td></tr>
                        <td width="150"><b>남기실말씀</b>&emsp;&emsp;
                  <input type="text" name="memo" size="55" maxlength="200" value="" class="cmfont1"><br></td></td>
                     
                           
                     
                     </tr>
                  </table>

               <table width="859" border="0" cellpadding="0" cellspacing="0" class="cmfont">
   <tr><td height="5"></td></tr>
            <tr height="1" bgcolor="#000000"><td></td></tr>
   <tr><td height="80"></td></tr>
         </table>


<table width="400" border="0" cellpadding="0" cellspacing="0" class="cmfont">
<tr><td height="40" ></td></tr>   
            <tr height="44">
               <td width="400" align="center" valign="middle">
                  <input type=button onclick="Check_Value()"  style="width:100pt;height:30pt; color: #fff;background:#000000; cursor:pointer; " value="NEXT"onMouseover="this.style.background='white';this.style.color='black'; " onmouseout="this.style.background='#000000';this.style.color='fff'; ">      
               </td>
            </tr>
         
         </table>


<!-------------------------------------------------------------------------------------------->   
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->   
<?
include "main_bottom.php"
?>