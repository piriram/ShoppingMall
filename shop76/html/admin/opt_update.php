 <?
	include "../common.php";

	$no1=$_REQUEST[no1];
	$name=$_REQUEST[name]; //νΉμ $name=$_POST[name];
	$query="update opt set name76='$name' where no76=$no1;";
	$result=mysqli_query($db,$query);
	if (!$result) exit("μλ¬: $query");

	echo("<script>location.href='opt.php'</script>");
	?>