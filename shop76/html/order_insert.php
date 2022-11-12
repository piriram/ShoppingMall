<?
   include "common.php";
   date_default_timezone_set('Asia/Seoul');
   
   $total=0;
   $product_nums=0;
   
   $cookie_no=$_COOKIE[cookie_no];
   $cart=$_COOKIE[cart];   //배열
   $n_cart = $_COOKIE[n_cart];
   $no= $_REQUEST[no];
   $num=$_REQUEST[num];
   $opts1=$_REQUEST[opts1];
   $opts2=$_REQUEST[opts2];
   //$pos=$_REQUEST[$pos];
   
   //jumun
   $jumunday=date("Y-m-d");
   $o_name=$_REQUEST[o_name];
   $o_tel=$_REQUEST[o_tel];
   $o_phone=$_REQUEST[o_phone];
   $o_email=$_REQUEST[o_email];
   $o_zip=$_REQUEST[o_zip];
   $o_juso=$_REQUEST[o_juso];
   
   $r_name=$_REQUEST[r_name];
   $r_tel=$_REQUEST[r_tel];
   $r_phone=$_REQUEST[r_phone];
   $r_email=$_REQUEST[r_email];
   $r_zip=$_REQUEST[r_zip];
   $r_juso=$_REQUEST[r_juso];
   $memo=$_REQUEST[memo];
   $pay_method=$_REQUEST[pay_method];
   $card_halbu=$_REQUEST[card_halbu];
   $card_kind=$_REQUEST[card_kind];
   $bank_kind=$_REQUEST[bank_kind];
   $bank_sender=$_REQUEST[bank_sender];
   $total_cash=$_REQUEST[total_cash];
   
   
   //주문번호 알아내기
   $query="select no76 from jumun where jumunday76=curdate() order by no76 desc limit 1;";
   $result=mysqli_query($db,$query);
   if(!$result) exit("에러:$query");            //에러 조사
   $count=mysqli_num_rows($result);   //레코드개수
   $row=mysqli_fetch_array($result);
   if($count>0)
      $new_jumunnum=$row[no76]+1;
   else
      $new_jumunnum=date("ymd")."0001";
   
   for($i=1;$i<=$n_cart;$i++){
      if($cart[$i]){   //제품정보가 있는 경우만
         //장바구니 cookie에서 제품번호,수량,소옵션번호1,2알아내기
         list($no,$num,$opts1,$opts2)=explode("^",$cart[$i]);
         $query1="select * from opts where no76=$opts1";
         $result1=mysqli_query($db,$query1);
         if(!$result1) exit("에러:$query1");            //에러 조사
         $count1=mysqli_num_rows($result1);   //레코드개수
         $row1=mysqli_fetch_array($result1);
         $opts1_name=$row1[name76];
         
         $query2="select * from opts where no76=$opts2";
         $result2=mysqli_query($db,$query2);
         if(!$result2) exit("에러:$query2");            //에러 조사
         $count2=mysqli_num_rows($result2);   //레코드개수
         $row2=mysqli_fetch_array($result2);
         $opts2_name=$row2[name76];
         
         //제품정보(제품번호,단가,할인여부,할인율)알아내기
         $query3="select * from product where no76=$no;";
         $result3=mysqli_query($db,$query3);
         if(!$result3) exit("에러:$query3");            //에러 조사
         $count3=mysqli_num_rows($result3);   //레코드개수
         $row3=mysqli_fetch_array($result3);
         $discount=$row3[discount76];
         if(!$row3[icon_sale76])
            $price=$row3[price76];
         else
            $price=round($row3[price76]*(100-$discount)/100,-3);
         
         $cash=$price*$num;
         //insert SQL문을 이용하여 jumuns테이블에 저장.
         //주문번호,제품번호,수량,단가,금액,할인율,소옵션번호1,2
         if($row3[icon_sale76])
            $query4="insert into jumuns (jumun_no76, product_no76, num76, price76, cash76, discount76, opts_no1, opts_no2)
                  values('$new_jumunnum', $no, $num, $price, $cash, $discount, $opts1, $opts2);";
         else
            $query4="insert into jumuns (jumun_no76, product_no76, num76, price76, cash76, opts_no1, opts_no2)
                  values('$new_jumunnum', $no, $num, $price, $cash, $opts1, $opts2);";
                  
         $result4=mysqli_query($db,$query4);
         if(!$result4) exit("에러:$query4");
         
         setcookie("cart[$i]","");
         
         $total=$total+$cash;
         $product_nums=$product_nums+1;
         if($product_nums==1) $product_names=$row3[name76];
      }
      
   }
   if($product_nums>1)
   {
      $tmp=$product_nums;
      $product_names=$product_names." 외 ".$tmp;
   }
   if($total<$max_baesongbi){
      $query4="insert into jumuns (jumun_no76, product_no76, num76, price76, cash76, discount76, opts_no1, opts_no2)
   values('$new_jumunnum', 0, 1, $baesongbi, $baesongbi,0,0,0);";
   $result4=mysqli_query($db,$query4);
   if(!$result4) exit("에러:$query4");
   }
   
   
   
   if($cookie_no)
      $member_no=$cookie_no;
   else
      $member_no=0;
   
   if($total<$max_baesongbi)
      $total=$total+$baesongbi;
   else
      $total=$total;
   
   if($pay_method==1)
      $query5="insert into jumun (no76, member_no76, jumunday76, product_names76, product_nums76, o_name76, o_tel76, o_phone76,
            o_email76, o_zip76, o_juso76, r_name76, r_tel76, r_phone76, r_email76, r_zip76, r_juso76, memo76, pay_method76,
            bank_kind76, bank_sender76, total_cash76, state76) 
            values('$new_jumunnum', $member_no, '$jumunday', '$product_names', $product_nums,'$o_name', '$o_tel','$o_phone','$o_email','$o_zip','$o_juso',
            '$r_name','$r_tel','$r_phone','$r_email','$r_zip','$r_juso','$memo',$pay_method, $bank_kind,'$bank_sender',$total,1);";
   else
      $query5="insert into jumun (no76, member_no76, jumunday76, product_names76, product_nums76, o_name76, o_tel76, o_phone76,
         o_email76, o_zip76, o_juso76, r_name76, r_tel76, r_phone76, r_email76, r_zip76, r_juso76, memo76, pay_method76, card_okno76,
         card_halbu76, card_kind76, total_cash76, state76) 
         values('$new_jumunnum', $member_no, '$jumunday', '$product_names', $product_nums,'$o_name', '$o_tel','$o_phone','$o_email','$o_zip','$o_juso',
         '$r_name','$r_tel','$r_phone','$r_email','$r_zip','$r_juso','$memo','$pay_method','$new_jumunnum',$card_halbu,$card_kind,$total,1);";
   
   $result5=mysqli_query($db,$query5);
   if(!$result5) exit("에러:$query5");      
   setcookie("n_cart","");
   
   echo("<script>location.href='order_ok.php'</script>");   
?>