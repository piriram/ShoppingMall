<?
	include "common.php";

	$uid=$_REQUEST[uid];
	$pwd=$_REQUEST[pwd];
	
	$query="select no76,name76 from member where uid76='$uid' and pwd76='$pwd'";
	$result=mysqli_query($db,$query);//쿼리실행
	if (!$result) exit("에러:$query");
	$count=mysqli_num_rows($result);
	$row=mysqli_fetch_array($result);
	
	
	
	if($count>0){
		setcookie("cookie_no",$row[no76]);
		setcookie("cookie_name",$row[name76]);
		echo("<script>location.href='index.html'</script>");
		//index.html로 이동.

	}
	else
		echo("<script>location.href='member_login.php'</script>");
		//member_login.php로 이동
	
?>