<?
	include ("../connect_db.php");
	header("Content-type: text/html; charset=euc-kr");

	
	$name = $_POST['name'];
	$id = $_POST['id'];
	$pw = md5($_POST['pw']);
	$email = $_POST['email'];
	
	$SetSql	.= "				id			= '$id',";
	$SetSql	.= "				pw				= '$pw',";
	$SetSql	.= "				email			= '$email',";
	$SetSql	.= "				name			= '$name'";
	
	#같은 id가 있는지 체크
		$user_sql = " select count(*) as cnt from info_user where id = '$id' ";
		$u_result = mysqli_query($conn,$user_sql);
		$C_ROW = mysqli_fetch_assoc($u_result); 
		
		if ( $C_ROW['cnt'] >= 1 ) {
			echo "<script>alert('id 중복!!');history.go(-1);</script>";
			exit;
		}
	#같은 이름을 가진 기업이 있는지 체크

		$Sql	 = "	INSERT INTO	info_user SET ";
		$Sql	.= $SetSql;

		
		mysqli_query($conn,$Sql);
	
		echo "<script> alert('정상적으로 회원가입 되었습니다. \\n 로그인해주새요!');  window.location.href='login.php'; </script>";
?>