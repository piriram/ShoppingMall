<?
	include "../common.php";
	$adminid=$_REQUEST[adminid];
	$adminpw=$_REQUEST[adminpw];
	//$admin_id=$REQUEST[admin_id];
	//$admin_pw=$REQUEST[admin_pw];
	
	if($adminid==$admin_id && $adminpw==$admin_pw)
	{
		setcookie("cookie_admin","yes");
		//$cookie_admin변수에 yes로 쿠키저장
		echo("<script>location.href='member.php'</script>");
	}
	Else
	{
		setcookie("cookie_admin","");
		echo("<script>location.href='../index.html'</script>");
	}


?>