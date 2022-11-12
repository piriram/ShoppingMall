<?
	include "common.php";
   include "main_top.php";
   $menu=$_REQUEST[menu];
   $num_col=4;   $num_row=4; // column수, row수
   $page_line=$num_col*$num_row;
   $icount=0;       // 출력한 제품개수 카운터
   //$query="select * from product where menu76 = $menu order by price76 desc";
   $sort=$_REQUEST[sort]; 
   $page=$_REQUEST[page];


   if ($sort=="up")            // 고가격순
   $query="select * from product where menu76=$menu order by price76 desc";
   elseif ($sort=="down")  // 저가격순
   $query="select * from product where menu76=$menu order by price76";
   elseif ($sort=="name")  // 이름순
   $query="select * from product where menu76=$menu order by name76";
   else                              // 신상품순
   $query="select * from product where menu76=$menu order by no76 desc";

   
   $result=mysqli_query($db, $query);
   if(!$result) exit("에러: $query");
   $count=mysqli_num_rows($result);           // 출력할 제품 개수

?>



         <!--  화면 좌측메뉴 끝 (main_left) --------------------------------->
      </td>
      <td width="10"></td>
      <td valign="top">
<!-------------------------------------------------------------------------------------------->   
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->   

      <!-- 하위 상품목록 -->

         <!-- form2 시작 -->
         <form name="form2" method="post" action="product.php">
         <input type="hidden" name="menu" value="1">

         <table border="0" cellpadding="0" cellspacing="5" width="1000" class="cmfont" bgcolor="#efefef">
            <tr>
               <td bgcolor="white">
                  <table border="0" cellpadding="0" cellspacing="0" class="cmfont">
                     <tr>
                        <td >
                           <table border="0" cellpadding="0" cellspacing="0" width="700" height="40" class="cmfont">
                              <tr>
                                 <td width="500" class="cmfont" align="left">
                                    <font color="#C83762"  class="cmfont" align="left" ><b>&nbsp&nbsp&nbsp&nbsp<?=$a_menu[$menu]?> &nbsp</b></font>&nbsp
                                 </td>
                                 <td align="right" width="700">
                                    <table width="140%" border="0" cellpadding="0" cellspacing="0" class="cmfont">
                                       <tr>
                                          <td align="right"><font color="EF3F25">&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp<b><?=$count?></b></font> 개의 상품.&nbsp;&nbsp;&nbsp</td>
                                          <td width="100">
                                             <select name="sort" size="1" class="cmfont" onChange="form2.submit()">
                                             <?
                                             if($sort=="new")
                                                echo("<option value='new' selected>신상품순 정렬</option>");
                                             else
                                                echo("<option value='new'>신상품순 정렬</option>");
                                             if($sort=="up")
                                                echo("<option value='up' selected>고가격순 정렬</option>");
                                             else
                                                echo("<option value='up'>고가격순 정렬</option>");
                                             if($sort=="down")
                                                echo("<option value='down' selected>저가격순 정렬</option>");
                                             else
                                                echo("<option value='down'>저가격순 정렬</option>");
                                             if($sort=="name")
                                                echo("<option value='name' selected>상품명순 정렬</option>");
                                             else
                                                echo("<option value='name'>상품명순 정렬</option>");
                                             
                                             ?>
                                             </select>
                                          </td>
                                       </tr>
                                    </table>
                                 </td>
                              </tr>
                           </table>
                        </td>
                     </tr>
                  </table>
               </td>
            </tr>
         </table>
         </form>
         <!-- form2 -->

   <?
      if(!$page) 
         $page=1;
      $pages = ceil($count/$page_line);
      $first=1;
      if($count>0)$first=$page_line*($page-1);
      $page_last=$count-$first;
      if($page_last>$page_line)$page_last=$page_line;
      if($count>0)mysqli_data_seek($result,$first);
         echo("<table border='0' cellpadding='0' cellspacing='0'>");
         for ($ir=0; $ir<$num_row; $ir++)
               {

            
            echo("<tr>");
                    for ($ic=0;  $ic<$num_col;  $ic++)
                        {
                           if ($icount <= $page_last-1)
                              {
                                 $row=mysqli_fetch_array($result);

               echo("<td width='500' height='225' align='center' valign='top'>
                  <table border='0' cellpadding='0' cellspacing='0' width='100' class='cmfont'>
                     <tr> 
                        <td align='center'> 
                           <a href='product_detail.php?no=$row[no76]'><img src='product/$row[image1]' width='220' height='270' border='0'></a>
                        </td>
                     </tr>
                     <tr><td height='5'></td></tr>
                     <tr> 
                        <td height='20' align='center'>
                           <a href='product_detail.php?no=$row[no76]'><font color='444444'>$row[name76]</font></a>&nbsp;<br>");
                           $price=number_format(round($row[price76]*(100-$row[discount76])/100,-3));
                           $row[price76]=number_format($row[price76]);
						   
                           if($row[icon_hit76] == 1)
                              {
                                 echo("<img src='images/i_hit.gif' align='absmiddle' vspace='1'>");
                              }
                          if(!$row[icon_new76]) echo("");
			else echo("<img src='images/i_new.gif' align='absmiddle' vspace='1'>"); 
						   if($row[icon_sale76] == 1)
                                 {
                              
                                  echo("<img src='images/i_sale.gif' align='absmiddle' vspace='1'>($row[discount76]%)"); 
                                 }
                           
                        echo("</td>
                     </tr>");
                     if($row[icon_sale76] == 1)
                        {
            
                        echo("<tr><td height='20' align='center'><b><strike>$row[price76] 원</strike></b></td></tr>
                           <tr><td height='20' align='center'><b>$price 원</b></td></tr>");
                        }
                     else{
                     echo("<tr><td height='20' align='center'><b>$price 원</b></td></tr>");
                     }
                  echo("</table>
               </td>");
                              }
               else{
                  echo("<td></td>");
               }
               $icount++;
                              }
                              echo("<tr>");
                        }
                        echo("</talble>");
               ?>
               
               </td>
            </tr>
            <tr><td height="10"></td></tr>
         </table> 



<!-------------------------------------------------------------------------------------------->   
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->   
<?
   include "main_bottom.php";
?>