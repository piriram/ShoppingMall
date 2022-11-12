<?
	$fname1=$name1=" "j;
	if($_FILES["image1"]["error"]==0) //선택한 파일이 있는지 조사
{
	$fname1=$_FILES["image1"]["name"];
	$fsize=$_FILES["image1"]["size"];

	if(!move_uploaded_file($_FILES["image1"]["tmp_name"].
		"../product/".$fname1)) exit("업로드 실패");
}
if($_FILES["image2"]["error"]==0) //선택한 파일이 있는지 조사
{
	$fname=$_FILES["image2"]["name"];
	$fsize=$_FILES["image2"]["size"];

	if(!move_uploaded_file($_FILES["image2"]["tmp_name"].
		"../product/".$fname)) exit("업로드 실패");
}
if($_FILES["image3"]["error"]==0) //선택한 파일이 있는지 조사
{
	$fname=$_FILES["image3"]["name"];
	$fsize=$_FILES["image3"]["size"];

	if(!move_uploaded_file($_FILES["image3"]["tmp_name"].
		"../product/".$fname)) exit("업로드 실패");
		}

	$query="insert into product (menu76,code76,name76,coname76,price76,opt1,opt2,content76,status76,regday76,icon_new76,
	icon_hit76,icon_sale76,discount76,image1,image2,image3) values ('$menu','$code','$name','$coname','$price','$opt1','$opt2','$content','$status',
	'$regday','$icon_new','$icon_hit','$icon_sale','$discount','$image1','$image2','$image3');";
		?>
		