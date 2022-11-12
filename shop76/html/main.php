<?	
	include "common.php";
	include "main_top.php"
	
?><table border='0' cellpadding='0' cellspacing='0' class='cmfont' align='center'>
	<tr><td>
<img src='product/sale.gif'>
								</td>
<td >
<img src='product/c.gif' >
								</td>

							</tr></table>

<?


	$query="select * from product where icon_sale76=1 and status76=1 
	order by rand() limit 15;";
	$result=mysqli_query($db,$query);
	if (!$result) exit("에러:$query");       //에러조사
	$num_col=5; $num_row=3; //column수,row수
	
	$count=mysqli_num_rows($result); //출력할 제품 개수
	$icount=0;
	echo("<table border='0' cellpadding='0' cellspacing='0' class='cmfont'>
	");
	
for($ir=0;$ir<$num_row;$ir++)
	{
	echo("<tr>");
	for($ic=0;$ic<$num_col;$ic++){
		

	if($icount<$count){
		$row=mysqli_fetch_array($result);
		if($row[discount76] !==0) $price=number_format(round($row[price76]*(100-$row[discount76])/100,-3));
			else $price=$row[price76];
			echo("<td><table bordr='0' cellpadding='0' width='100' class=;cmfont'><tr><td>
			<a href='product_detail.php?no=$row[no76]'><img src='product/$row[image1]' width='190' height='220' border='0'></a>
								</td>
							</tr>
							<tr><td height='5'></td></tr>
							<tr> 
								<td height='20' align='center'>
									<a href='product_detail.php?no=$row[no76]'><font color='444444'><b>$row[name76]</b></font></a><br> ");
			if(!$row[icon_new76]) echo("");
			else echo("<img src='images/i_new.gif' align='absmiddle' vspace='1'>"); 
			if(!$row[icon_hit76]) echo("");
			else echo("<img src='images/i_hit.gif' align='absmiddle' vspace='1'>"); 
			if(!$row[icon_sale76]) echo("");
			else echo("<img src='images/i_sale.gif' align='absmiddle' vspace='1'>"); 

echo("($row[discount76]%)		</td>
	</tr>
	
<tr><td height='20' align='center'><strike>$row[price76] 원</strike><br><b>$price 원</b></td></tr></table></td>	");

	}
	else
		echo("<td></td>"); //제품 없는 경우
	$icount++;
	}
	echo("</tr>");
}
	echo("</table>");





	


















?>

<?
	include "main_bottom.php";
?>