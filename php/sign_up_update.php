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
	
	#���� id�� �ִ��� üũ
		$user_sql = " select count(*) as cnt from info_user where id = '$id' ";
		$u_result = mysqli_query($conn,$user_sql);
		$C_ROW = mysqli_fetch_assoc($u_result); 
		
		if ( $C_ROW['cnt'] >= 1 ) {
			echo "<script>alert('id �ߺ�!!');history.go(-1);</script>";
			exit;
		}
	#���� �̸��� ���� ����� �ִ��� üũ

		$Sql	 = "	INSERT INTO	info_user SET ";
		$Sql	.= $SetSql;

		
		mysqli_query($conn,$Sql);
	
		echo "<script> alert('���������� ȸ������ �Ǿ����ϴ�. \\n �α������ֻ���!');  window.location.href='login.php'; </script>";
?>