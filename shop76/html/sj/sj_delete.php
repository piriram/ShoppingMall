 <?
	include "common.php";

	$no=$_REQUEST[no]; //νΉμ $name=$_POST[name];
	

	$query="delete from sj where no76=$no";
	$result=mysqli_query($db,$query);
	if (!$result) exit("μλ¬: $query");

	echo("<script>location.href='sj_list.php'</script>");
?>