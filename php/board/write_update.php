<?
	include("head.php");

	($_GET["mode"] == "") ? $mode = $_POST["mode"] : $mode = $_GET["mode"];
	($_GET["idx"] == "") ? $idx	= $_POST["idx"] : $idx =  $_GET["idx"];
	$id		= $_POST["id"];
	($_POST["password"] != "") ? $pw = md5($_POST["password"]) : $pw = '';
	$title	= $_POST["title"];
	$content= $_POST["content"];
	$create_date	= date("Y-m-d H:i:s");
	$update_date	= date("Y-m-d H:i:s");
	
	$SetSql	.= "				id					= '$id',";
	$SetSql	.= "				pw					= '$pw',";
	$SetSql	.= "				title				= '$title',";
	$SetSql	.= "				content				= '$content',";
	

	if ( $mode == "" ){
		$SetSql	.= "				create_date				= '$create_date'";
		$Sql	 = "	INSERT INTO	board SET ";
		$Sql	.= $SetSql;
		mysqli_query($conn,$Sql);
		echo "<script>window.location.href='board_list.php';</script>";
	}
	else if($mode == "edit"){
		$SetSql	.= "				update_date				= '$update_date'";
		$sql = " select count(*) as cnt from board where idx = '$idx' ";
		$result = mysqli_query($conn,$sql);
		$ROW = mysqli_fetch_assoc($result);

		if ( $ROW['cnt'] ==0 ) {
			echo "<script>alert('없는 게시물입니다.');history.go(-1);</script>";
			exit;
		}
		$Sql	= "UPDATE board SET ";
		$Sql	.= $SetSql;
		$Sql	.= " WHERE idx='$idx'";
		mysqli_query($conn,$Sql);
	
		echo "<script>window.location.href='board_list.php';</script>";
	}
	else if($mode == "delete"){
		$sql = " select count(*) as cnt from board where idx = '$idx' ";
		$result = mysqli_query($conn,$sql);
		$ROW = mysqli_fetch_assoc($result);

		if ( $ROW['cnt'] ==0 ) {
			echo "<script>alert('없는 게시물입니다.');history.go(-1);</script>";
			exit;
		}
		$Sql	= "delete from board WHERE idx='$idx'";
		mysqli_query($conn,$Sql);
		
		echo "<script>window.location.href='board_list.php'; </script>";
	}
	
?>