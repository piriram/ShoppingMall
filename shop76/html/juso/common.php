<?
	error_reporting(E_ALL & ~E_NOTICE &~E_WARNING); //에러메세지 on
	ini_set("display_errors",1);

	$page_line=5;
	$page_block=5;

	$db=mysqli_connect("localhost","shop76","1234","shop76");
	if (!$db) exit("DB연결에러");
	$a_idname=array("전체","이름","ID");
	
?>
