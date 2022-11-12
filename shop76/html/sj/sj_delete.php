 <?
	include "common.php";

	$no=$_REQUEST[no]; //혹은 $name=$_POST[name];
	

	$query="delete from sj where no76=$no";
	$result=mysqli_query($db,$query);
	if (!$result) exit("에러: $query");

	echo("<script>location.href='sj_list.php'</script>");
?>