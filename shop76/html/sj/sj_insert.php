 <?
	include "common.php";

	$name=$_REQUEST[name]; //혹은 $name=$_POST[name];
	$kor=$_REQUEST[kor];
	$eng=$_REQUEST[eng];
	$mat=$_REQUEST[mat];
	$hap=$_REQUEST[hap];
	$avg=$_REQUEST[avg];

	$query="insert into sj (name76,kor76,eng76,mat76,hap76,avg76)
					 values ('$name',$kor,$eng,$mat,$hap,$avg);";
	$result=mysqli_query($db,$query);
	if (!$result) exit("에러: $query");

	echo("<script>location.href='sj_list.php'</script>");
	?>