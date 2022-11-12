
<?
include "main_top.php";
include "common.php";
?>
<!-------------------------------------------------------------------------------------------->   
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->   

         <!--  현재 페이지 자바스크립  -------------------------------------------->
         <script language="javascript">

         function Check_Value() 
         {
            if (form2.pay_method[0].checked)
            {
               if (!form2.card_kind.value) {
                  alert("카드종류를 선택하세요.");   form2.card_kind.focus();   return;
               }
               if (!form2.card_no1.value || form2.card_no1.value.length!=4) {
                  alert("카드번호를 입력하세요.");   form2.card_no1.focus();   return;
               }
               if (!form2.card_no2.value || form2.card_no2.value.length!=4) {
                  alert("카드번호를 입력하세요.");   form2.card_no2.focus();   return;
               }
               if (!form2.card_no3.value || form2.card_no3.value.length!=4) {
                  alert("카드번호를 입력하세요.");   form2.card_no3.focus();   return;
               }
               if (!form2.card_no4.value || form2.card_no4.value.length!=4) {
                  alert("카드번호를 입력하세요.");   form2.card_no4.focus();   return;
               }
               if (!form2.card_year.value) {
                  alert("카드기간 년도를 선택하세요.");   form2.card_year.focus();   return;
               }
               if (!form2.card_month.value) {
                  alert("카드기간 월을 선택하세요.");   form2.card_month.focus();   return;
               }
               if (!form2.card_pw.value) {
                  alert("카드 암호 뒷의 2자리를 선택하세요.");   form2.card_pw.focus();   return;
               }
            }
            else
            {
               if (!form2.bank_kind.value) {
                  alert("입금할 은행을 선택하세요.");   form2.bank_kind.focus();   return;
               }
               if (!form2.bank_sender.value) {
                  alert("입금자 이름을 입력하세요.");   form2.bank_sender.focus();   return;
               }
            }
            form2.card_kind.disabled = false;
            form2.card_no1.disabled = false;
            form2.card_no2.disabled = false;
            form2.card_no3.disabled = false;
            form2.card_no4.disabled = false;
            form2.card_year.disabled = false;
            form2.card_month.disabled = false;
            form2.card_pw.disabled = false;
            form2.bank_kind.disabled = false;
            form2.bank_sender.disabled = false;
            
            form2.submit();
         }

         function PaySel(n) 
         {
            if (n == 0) {
               form2.card_kind.disabled = false;
               form2.card_no1.disabled = false;
               form2.card_no2.disabled = false;
               form2.card_no3.disabled = false;
               form2.card_no4.disabled = false;
               form2.card_year.disabled = false;
               form2.card_month.disabled = false;
               form2.card_pw.disabled = false;
               form2.bank_kind.disabled = true;
               form2.bank_sender.disabled = true;
            }
            else {
               form2.card_kind.disabled = true;
               form2.card_no1.disabled = true;
               form2.card_no2.disabled = true;
               form2.card_no3.disabled = true;
               form2.card_no4.disabled = true;
               form2.card_year.disabled = true;
               form2.card_month.disabled = true;
               form2.card_pw.disabled = true;
               form2.bank_kind.disabled = false;
               form2.bank_sender.disabled = false;
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
               <td width="440" align="center">상품</td>
               <td width="70"  align="center">수량</td>
               <td width="100" align="center">가격</td>
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
   $price2=$row[price76]*(100-$row[discount76])/100*$num;
         $total=$total+$price*$num;
   $total2=$total1+$row[price76]*(100-$row[discount76])/100*$num;
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
               <td align='center'><font color='#464646'>".number_format(round($price2))."</font> 원</td>
               <tr><td height='1' colspan='5' bgcolor='#E5E5E5'></td></tr>
            </tr>
               ");
            }
            }
            if($total<$max_baesongbi) {$total=$total+$beasongbi;
            $localbeasong=2500;
            }
            else $localbeasong=0;
               ?>
            <tr>
               <table border="0" cellpadding="1" cellspacing="2" width="959" height="10" class="cmfont" bgcolor="#ffffff">
                        
                           <font size="2px"  ><td align="right"><b>총 상품금액 : </b>(<?=number_format(round($total))?>원)&nbsp;&nbsp;<img src=images/plus.png border=0 height=12>&nbsp;&nbsp;배송료(<?=number_format($localbeasong,-3)?>원) <font color="#000000"><b><img src=images/total.png  border=0 height=12> &nbsp;&nbsp;<b><?=number_format(round($total+$localbeasong))?>원</b>&nbsp;&nbsp</font>
                        </td>
                        <tr><td height="1.5" ></td></tr>   
                                 <tr><td height="2" bgcolor="#e5e5e5"></td></tr>
                     </tr>
                  </table>

         <!-- form2 시작  -->
         <?
$o_no=$_REQUEST[o_no];
$o_name=$_REQUEST[o_name];
$o_tel1=$_REQUEST[o_tel1];
$o_tel2=$_REQUEST[o_tel2];
$o_tel3=$_REQUEST[o_tel3];
$o_phone1=$_REQUEST[o_phone1];
$o_phone2=$_REQUEST[o_phone2];
$o_phone3=$_REQUEST[o_phone3];
$o_email=$_REQUEST[o_email];
$o_zip=$_REQUEST[o_zip];
$o_juso=$_REQUEST[o_juso];
$o_tel=sprintf("%-3s%-4s%-4s", $o_tel1, $o_tel2, $o_tel3);  
$o_phone=sprintf("%-3s%-4s%-4s", $o_phone1, $o_phone2, $o_phone3);  
$r_no=$_REQUEST[r_no];
$r_name=$_REQUEST[r_name];
$r_tel1=$_REQUEST[r_tel1];
$r_tel2=$_REQUEST[r_tel2];
$r_tel3=$_REQUEST[r_tel3];
$r_phone1=$_REQUEST[r_phone1];
$r_phone2=$_REQUEST[r_phone2];
$r_phone3=$_REQUEST[r_phone3];
$r_email=$_REQUEST[r_email];
$r_zip=$_REQUEST[r_zip];
$r_juso=$_REQUEST[r_juso];
$memo=$_REQUEST[memo];
$r_tel=sprintf("%-3s%-4s%-4s", $r_tel1, $r_tel2, $r_tel3);  
$r_phone=sprintf("%-3s%-4s%-4s", $r_phone1, $r_phone2, $r_phone3);
         ?>
         <form name="form2" method="post"action="order_insert.php">

         <input type="hidden" name="o_name"   value="<?=$o_name?>">
         <input type="hidden" name="o_tel"    value="<?=$o_tel?>">
         <input type="hidden" name="o_phone"  value="<?=$o_phone?>">
         <input type="hidden" name="o_email"  value="<?=$o_email?>">
         <input type="hidden" name="o_zip"    value="<?=$o_zip?>">
         <input type="hidden" name="o_juso"   value="<?=$o_juso?>">

         <input type="hidden" name="r_name"   value="<?=$r_name?>">
         <input type="hidden" name="r_tel"    value="<?=$r_tel?>">
         <input type="hidden" name="r_phone"  value="<?=$r_phone?>">
         <input type="hidden" name="r_email"  value="<?=$r_email?>">
         <input type="hidden" name="r_zip"    value="<?=$r_zip?>">
         <input type="hidden" name="r_juso"   value="<?=$r_juso?>">
         <input type="hidden" name="memo"    value="<?=$memo?>">

         <!-- 결재방법 선택 및 입력 -->
         
         <table width="959" border="0" cellpadding="0" cellspacing="0" class="cmfont">
            <tr>
               <td align="left" valign="top" width="150" STYLE="padding-left:45;padding-top:5">
                  <font size="4" color="#6786C2"><b>CARD</b></font>
                     <tr><td height="10"></td></tr>
               </td>
               <td align="center" width="560">
               </table>

               <table width="859" border="0" cellpadding="0" cellspacing="0" class="cmfont">
   <tr><td height="10"></td></tr>
            <tr height="1" bgcolor="#000000"><td></td></tr>
   <tr><td height="5"></td></tr>
         </table>

                     <table width="800" border="0" cellpadding="0" cellspacing="0" class="cmfont">
                     <tr><td height="1"></td></tr>
                        <td width="150"><b>결재방법 선택</b>&emsp;&emsp;
                        <input type="radio" name="pay_method" value="0" onclick="javascript:PaySel(0);" checked>카드 &nbsp;
                           <input type="radio" name="pay_method" value="1" onclick="javascript:PaySel(1);">무통장</td>
                     </tr>
                  </table>

<table width="800" border="0" cellpadding="0" cellspacing="0" class="cmfont" align="middle"
            >
   <tr><td height="5"></td></tr>
            <tr height="1" bgcolor="#cccccc" ><td></td></tr>
   <tr><td height="5"></td></tr>
         </table>
      
         <!-- 카드 -->
         
                     <table width="800" border="0" cellpadding="0" cellspacing="0" class="cmfont">
                     <tr><td height="1"></td></tr>
                        <td width="150"><b>카드종류</b>&emsp;&emsp;
                           <select name="card_kind" class="cmfont1">
                              <option value="0">카드종류를 선택하세요.</option>
                              <option value="1">국민카드</option>
                              <option value="2">신한카드</option>
                              <option value="3">우리카드</option>
                              <option value="4">하나카드</option>
                           </select></td>
                     </tr>
                     </table>

<table width="800" border="0" cellpadding="0" cellspacing="0" class="cmfont" align="middle"
            >
   <tr><td height="5"></td></tr>
            <tr height="1" bgcolor="#cccccc" ><td></td></tr>
   <tr><td height="5"></td></tr>
         </table>

                     <table width="800" border="0" cellpadding="0" cellspacing="0" class="cmfont">
                     <tr><td height="1"></td></tr>
                        <td width="150"><b>카드번호</b>&emsp;&emsp;               
                           <input type="text" name="card_no1" size="4" maxlength="4" value="" class="cmfont1"> -
                           <input type="text" name="card_no2" size="4" maxlength="4" value="" class="cmfont1"> -
                           <input type="text" name="card_no3" size="4" maxlength="4" value="" class="cmfont1"> -
                           <input type="text" name="card_no4" size="4" maxlength="4" value="" class="cmfont1">
                        </td>
                     </tr>
                     </table>

                     <table width="800" border="0" cellpadding="0" cellspacing="0" class="cmfont" align="middle">
   <tr><td height="5"></td></tr>
            <tr height="1" bgcolor="#cccccc" ><td></td></tr>
   <tr><td height="5"></td></tr>
         </table>

                     <table width="800" border="0" cellpadding="0" cellspacing="0" class="cmfont">
                     <tr><td height="1"></td></tr>
                        <td width="150"><b>카드기간</b>&emsp;&emsp;                        
                           <input type="text" name="card_month" size="2" maxlength="2" value="" class="cmfont1"> 월 / 
                           <input type="text" name="card_year"  size="2" maxlength="2" value="" class="cmfont1"> 년
                        </td>
                     </tr>
                     </table>

                     <table width="800" border="0" cellpadding="0" cellspacing="0" class="cmfont" align="middle">
   <tr><td height="5"></td></tr>
            <tr height="1" bgcolor="#cccccc" ><td></td></tr>
   <tr><td height="5"></td></tr>
         </table>

                     <table width="800" border="0" cellpadding="0" cellspacing="0" class="cmfont">
                     <tr><td height="1"></td></tr>
                        <td width="150"><b>카드비밀번호(뒷2자리)</b>&emsp;&emsp;                     
                           **<input type="password" name="card_pw" size="2" maxlength="2" value="" class="cmfont1">
                        </td>
                     </tr>
                     </table>


                     <table width="800" border="0" cellpadding="0" cellspacing="0" class="cmfont" align="middle">
   <tr><td height="5"></td></tr>
            <tr height="1" bgcolor="#cccccc" ><td></td></tr>
   <tr><td height="5"></td></tr>
         </table>

                     <table width="800" border="0" cellpadding="0" cellspacing="0" class="cmfont">
                     <tr><td height="1"></td></tr>
                        <td width="150"><b>할부</b>&emsp;&emsp;&emsp;&emsp;                        
                           <select name="card_halbu" class="cmfont1">
                              <option value="0">일시불</option>
                              <option value="3">3 개월</option>
                              <option value="6">6 개월</option>
                              <option value="9">9 개월</option>
                              <option value="12">12 개월</option>
                           </select>
                        </td>
                     </tr>
                  </table>

      <table width="859" border="0" cellpadding="0" cellspacing="0" class="cmfont">
   <tr><td height="10"></td></tr>
            <tr height="1" bgcolor="#000000"><td></td></tr>
   <tr><td height="80"></td></tr>
         </table>

<table width="959" border="0" cellpadding="0" cellspacing="0" class="cmfont">
            <tr>
               <td align="left" valign="top" width="150" STYLE="padding-left:45;padding-top:5">
                  <font size="4" color="#B90319">Depositless Payment</b></font>
                     <tr><td height="10"></td></tr>
               </td>
               <td align="center" width="560">
               </table>
         
            <table width="859" border="0" cellpadding="0" cellspacing="0" class="cmfont">
   <tr><td height="10"></td></tr>
            <tr height="1" bgcolor="#000000"><td></td></tr>
   <tr><td height="5"></td></tr>
         </table>

         <!-- 무통장 -->
         <table width="710" border="0" cellpadding="0" cellspacing="0" class="cmfont">
            <tr>
               
                  <table width="800" border="0" cellpadding="0" cellspacing="0" class="cmfont">
                     <tr><td height="1"></td></tr>
                        <td width="150"><b>은행선택 </b>&emsp;&emsp;&emsp;                     
                           <select name="bank_kind"  class="cmfont1" disabled>
                              <option value="0">입금할 은행을 선택하세요.</option>
                              <option value="1">국민은행 110-359-091635</option>
                              <option value="2">신한은행 110-359-091635</option>
                           </select>
                        </td>
                     </tr>
                     </table>

                     <table width="800" border="0" cellpadding="0" cellspacing="0" class="cmfont" align="middle">
   <tr><td height="5"></td></tr>
            <tr height="1" bgcolor="#cccccc" ><td></td></tr>
   <tr><td height="5"></td></tr>
         </table>
                     

                     
                  <table width="800" border="0" cellpadding="0" cellspacing="0" class="cmfont">
                     <tr><td height="1"></td></tr>
                        <td width="150"><b>입금자 이름</b>&emsp;&emsp;                     
                           <input type="text" name="bank_sender" size="15" maxlength="20" value="" class="cmfont1" disabled>
                        </td>
                     </tr>
                  </table>

            

            <table width="859" border="0" cellpadding="0" cellspacing="0" class="cmfont">
   <tr><td height="10"></td></tr>
            <tr height="1" bgcolor="#000000"><td></td></tr>
   <tr><td height="5"></td></tr>
         </table>
         </form>

         <table width="859" border="0" cellpadding="0" cellspacing="0" class="cmfont">
<tr><td height="30"></td></tr>
         </table>

         <table width="710" border="0" cellpadding="0" cellspacing="0" class="cmfont">
            <tr>
               <td align="center">
                  <input type=button onclick="Check_Value()"style="width:70pt;height:30pt; color: #fff;background:#000000; cursor:pointer; " value="결제하기"onMouseover="this.style.background='white';this.style.color='black'; " onmouseout="this.style.background='#000000';this.style.color='fff'; ">
               </td>
            </tr>
            <tr height="20"><td></td></tr>
         </table>
         

<!-------------------------------------------------------------------------------------------->   
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->   
<?
include "main_bottom.php"
?>