<?
	include ("../connect_db.php");
	header("Content-type: text/html; charset=euc-kr");
	
	
	$id = $_POST['id'];
	$pw = md5($_POST['pw']);

	$user_sql = " select * from admin_user where id = '$id' ";
	$u_result = mysqli_query($conn,$user_sql);
	$C_ROW = mysqli_fetch_assoc($u_result); 


	if($pw ==  $C_ROW['pw']){
		//���ǿ� ���̵� �� ����
		session_start();
		 $_SESSION['adminId'] = $C_ROW['id'];
		 //print_r($_SESSION);
		 //echo $_SESSION['userId'];

		 if(isset( $_SESSION['adminId']) ){
			echo "<script> alert('�α��� ����!'); location.href='home.php';</script>";
		 }
	}else echo "<script>alert('id �Ǵ� pw�� �ٽ� �Է����ּ���.'); history.go(-1); </script>";
	
		
?>