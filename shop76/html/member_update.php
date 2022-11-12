<?//no,uid,pwd,name,birthdat,sm,tel,phone,email,zip,juso
	include "common.php";
	
	$cookie_no=$_COOKIE[cookie_no];
	$pwd1=$_REQUEST[pwd1];
	$name=$_REQUEST[name]; 
	$birthday1=$_REQUEST[birthday1];
	$birthday2=$_REQUEST[birthday2];
	$birthday3=$_REQUEST[birthday3];
	$sm=$_REQUEST[sm];
	$tel1=$_REQUEST[tel1];
	$tel2=$_REQUEST[tel2];
	$tel3=$_REQUEST[tel3];
	$phone1=$_REQUEST[phone1];
	$phone2=$_REQUEST[phone2];
	$phone3=$_REQUEST[phone3];
	$email=$_REQUEST[email];
	$zip=$_REQUEST[zip];
	$juso=$_REQUEST[juso];
	
	$phone=sprintf("%-3s%-4s%-4s",$phone1,$phone2,$phone3);
	$tel=sprintf("%-3s%-4s%-4s",$tel1,$tel2,$tel3);
	$birthday=sprintf("%04d-%02d-%02d",$birthday1,$birthday2,$birthday3);
	
	
	if(!$pwd1)
		$query="update member set name76='$name',birthday76='$birthday',sm76=$sm,tel76='$tel',
		phone76='$phone',email76='$email',zip76='$zip',juso76='$juso' where no76=$cookie_no;";
		
	else 
		$query="update member set name76='$name',pwd76='$pwd1',birthday76='$birthday',sm76=$sm,
		tel76='$tel',phone76='$phone',email76='$email',zip76='$zip',juso76='$juso' 
		where no76=$cookie_no;";
		
		$result=mysqli_query($db,$query);
		if(!$result) exit("에러:$query");

	echo("<script>location.href='index.html'</script>");
	

?>