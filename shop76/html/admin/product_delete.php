 <?
	include "../common.php";
	$no=$_REQUEST[no];

	$query="delete from product where no76=$no;";

	$result=mysqli_query($db,$query);
	if (!$result) exit("에러: $query");

	echo("<script>location.href='product.php'</script>");
?>