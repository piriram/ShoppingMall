 <?
	include "../common.php";

	$no1=$_REQUEST[no1];
	$no2=$_REQUEST[no2];
	$name=$_REQUEST[name]; //νΉμ $name=$_POST[name];
	$query="update opts set name76='$name' where no76=$no2;";
	$result=mysqli_query($db,$query);
	if (!$result) exit("μλ¬: $query");

	echo("<script>location.href='opts.php?no1=$no1'</script>");
	?>