<?
include "common.php";
date_default_timezone_set('Asia/Seoul');
$total=0;
$product_nums=0;
 $cookie_no=$_COOKIE[cookie_no];
$n_cart=$_COOKIE[n_cart];
  $cart=$_COOKIE[cart];   //배열
   $no= $_REQUEST[no];
   $num=$_REQUEST[num];
   $opts1=$_REQUEST[opts1];
   $opts2=$_REQUEST[opts2];
   //$pos=$_REQUEST[$pos];
$jumunday=date("Y-m-d");
$o_no=$_REQUEST[o_no];
$o_name=$_REQUEST[o_name];
$o_tel=$_REQUEST[o_tel];
$o_phone=$_REQUEST[o_phone];
$o_email=$_REQUEST[o_email];
$o_zip=$_REQUEST[o_zip];
$o_juso=$_REQUEST[o_juso];
$r_no=$_REQUEST[r_no];
$r_name=$_REQUEST[r_name];
$r_tel=$_REQUEST[r_tel];
$r_phone=$_REQUEST[r_phone];
$r_email=$_REQUEST[r_email];
$r_zip=$_REQUEST[r_zip];
$r_juso=$_REQUEST[r_juso];
$memo=$_REQUEST[memo];
$pay_method=$_REQUEST[pay_method];
$card_kind=$_REQUEST[card_kind];
$card_halbu=$_REQUEST[card_halbu];
$bank_kind=$_REQUEST[bank_kind];
$bank_sender=$_REQUEST[bank_sender];
$total_cash=$_REQUEST[total_cash];

$today=date("Y-m-d");
//주문번호 알아내기
$query="select no76 from jumun where jumunday76=curdate() order by no76 desc";
$result=mysqli_query($db,$query);
if(!$result) exit("에러: $query");
$count=mysqli_num_rows($result);
if($count>0)
{
 $new_jumunnum=$row[no76]+1;

//$row=mysqli_fetch_array($result);
//$no=(date("ymd").sprintf("%04d",(substr($row[no76],-4)))+1);
}
else $no=date("ymd")."0001";


$product_names="";

for($i=1;$i<=$n_cart;$i++)
{
   
   if($cart[$i]) //제품정보가 있는 경우만
   { 
   list($product_no,$num,$opts1,$opts2)=explode("^",$cart[$i]);
   $query="select * from product where no76=$product_no;";
   $result=mysqli_query($db,$query);
   if(!$result) exit("에러: $query");
   $row=mysqli_fetch_array($result);
   $cash=$row[price76]*(100-$row[discount76])/100*$num;
   $total=$total+$cash;
$query="insert into jumuns (jumun_no76,product_no76,num76,price76,cash76,discount76,opts_no1,opts_no2)
      values('$no','$product_no','$num','$row[price76]','$cash','$row[discount76]','$opts1','$opts2')";
$result=mysqli_query($db,$query);
if(!$result) exit("에러: $query");
setcookie("cart[$i]","");
setcookie("n_cart","");
$product_nums=$product_nums+1;
if($product_nums==1)$product_names=$row[name76];
   }
}
if($product_nums>1)
{
   $tmp=$product_nums-1;
   $product_names=$product_names."외".$tmp;
}
   if($total<$max_baesongbi){
$query="insert into jumuns (jumun_no76,product_no76,num76,price76,cash76,discount76,opts_no1,opts_no2)
      values('$no','0','1','2500','2500','0','0','0')";
      $result=mysqli_query($db,$query);
   if(!$result) exit("에러: $query");
   $total=$total+$baesongbi;
   }
if($cookie_no) $member_no=$cookie_no;
else $member_no=0;
$query="insert into jumun ( no76, member_no76, jumunday76, product_names76, product_nums76, 
  o_name76, o_tel76, o_phone76, o_email76, o_zip76, o_juso76, 
  r_name76, r_tel76, r_phone76, r_email76, r_zip76, r_juso76, memo76,
  pay_method76, card_okno76, card_halbu76, card_kind76, 
  bank_kind76, bank_sender76,
  total_cash76, state76)
      values( '$no', $member_no, '$today', '$product_names', $num, 
  '$o_name', '$o_tel', '$o_phone', '$o_email', '$o_zip', '$o_juso', 
  '$r_name', '$r_tel', '$r_phone', '$r_email', '$r_zip', '$r_juso', '$memo',
  $pay_method, 1, $card_halbu, $card_kind, 
  $bank_kind, $bank_sender,
  $total, 1)";
$result=mysqli_query($db,$query);
if(!$result) exit("에러: $query");

echo("<script>location.href='order_ok.php'</script>");
?>