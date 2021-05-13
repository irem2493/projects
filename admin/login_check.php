<?
	include ("../connect_db.php");
	header("Content-type: text/html; charset=euc-kr");
	
	
	$id = $_POST['id'];
	$pw = md5($_POST['pw']);

	$user_sql = " select * from admin_user where id = '$id' ";
	$u_result = mysqli_query($conn,$user_sql);
	$C_ROW = mysqli_fetch_assoc($u_result); 


	if($pw ==  $C_ROW['pw']){
		//세션에 아이디 값 저장
		session_start();
		 $_SESSION['adminId'] = $C_ROW['id'];
		 //print_r($_SESSION);
		 //echo $_SESSION['userId'];

		 if(isset( $_SESSION['adminId']) ){
			echo "<script> alert('로그인 성공!'); location.href='home.php';</script>";
		 }
	}else echo "<script>alert('id 또는 pw를 다시 입력해주세요.'); history.go(-1); </script>";
	
		
?>