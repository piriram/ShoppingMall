<?
	include "../common.php";
	
	$no = $_REQUEST[no];

	$query = "delete from jumun where no76 = '$no';";
	$result = mysqli_query($db, $query);
	if(!$result) exit("에러 : $query");

	$query = "delete from jumuns where jumun_no76 = '$no';";
	$result = mysqli_query($db, $query);
	if(!$result) exit("에러 : $query");

	echo("<script>location.href = 'jumun.php'</script>");
?>