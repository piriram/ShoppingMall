 <?
	include "../common.php";

	$no1=$_REQUEST[no1]; //νΉμ $name=$_POST[name];
	

	$query="delete from opt where no76=$no1";
	$result=mysqli_query($db,$query);
	if (!$result) exit("μλ¬: $query");

	echo("<script>location.href='opt.php'</script>");
?>