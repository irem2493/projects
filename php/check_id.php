<?include ("../connect_db.php");
	header("Content-type: text/html; charset=euc-kr");

	$id = $_POST['id'];
	$result = '';

	if($id != ''){
	#같은 id가 있는지 체크
		$user_sql = " select count(*) as cnt from info_user where id = '$id' ";
		$u_result = mysqli_query($conn,$user_sql);
		$C_ROW = mysqli_fetch_assoc($u_result); 
		
		if ( $C_ROW['cnt'] >= 1 ) {
			$result =  $C_ROW['cnt'];
			
		}

		else  $result = 0;

	#같은 이름을 가진 기업이 있는지 체크
	
	echo $result;}
	?>