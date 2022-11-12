 <?
	include "common.php";

	$no=$_REQUEST[no];
	$name=$_REQUEST[name]; //혹은 $name=$_POST[name];
	$kor=$_REQUEST[kor];
	$eng=$_REQUEST[eng];
	$mat=$_REQUEST[mat];
	$hap=$_REQUEST[hap];
	$avg=$_REQUEST[avg];

	$query="update sj set name76='$name',kor76=$kor,eng76=$eng,mat76=$mat,hap76=$hap,avg76=$avg where no76=$no;";
	
	$result=mysqli_query($db,$query);
	if (!$result) exit("에러: $query");

	echo("<script>location.href='sj_list.php'</script>");
	?>