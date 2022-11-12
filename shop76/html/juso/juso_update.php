 <?
	include "common.php";
	
	$no=$_REQUEST[no];
	$name=$_REQUEST[name]; //혹은 $name=$_POST[name];
	$tel1=$_REQUEST[tel1];
	$tel2=$_REQUEST[tel2];
	$tel3=$_REQUEST[tel3];
	$sm=$_REQUEST[sm];
	$birthday1=$_REQUEST[birthday1];
	$birthday2=$_REQUEST[birthday2];
	$birthday3=$_REQUEST[birthday3];
	$juso=$_REQUEST[juso];

	$tel=sprintf("%-3s%-4s%-4s",$tel1,$tel2,$tel3);
	$birthday=sprintf("%04d-%02d-%02d",$birthday1,$birthday2,$birthday3);
	/*$query="update sj set name76='$name',kor76=$kor,eng76=$eng,mat76=$mat,hap76=$hap,avg76=$avg where no76=$no;";*/
	
	$query="update juso set name76='$name',tel76='$tel',sm76=$sm,birthday76='$birthday',juso76='$juso' where no76=$no;";
	
	$result=mysqli_query($db,$query);
	if (!$result) exit("에러: $query");

	//echo("<script>location.href='juso_list.php'</script>");
?>
<?php
	ini_set('display_errors',1);
	phpinf();
?>