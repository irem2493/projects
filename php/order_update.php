<?
	include  $_SERVER['DOCUMENT_ROOT']."/head.php";
	($_GET["mode"] == "") ? $mode = $_POST["mode"] : $mode = $_GET["mode"];
	($_GET["idx"] == "") ? $idx	= $_POST["idx"] : $idx =  $_GET["idx"];
	$id		= $_POST["id"];
	$pw = md5($_POST["password"]);
	$hp	= $_POST["hp"];
	$product_name= $_POST["p_name"];
	$product_cnt= $_POST["wr_cnt"];
	$postcode= $_POST["postcode"];
	$address= $_POST["address"];
	$detailAddress= $_POST["detailAddress"];
	$memo=$_POST['memo'];
	$extraAddress= $_POST["extraAddress"];
	$create_date	= date("Y-m-d H:i:s");
	$update_date	= date("Y-m-d H:i:s");
	
	$SetSql	.= "				id					= '$id',";
	$SetSql	.= "				hp					= '$hp',";
	$SetSql	.= "				product_name		= '$product_name',";
	$SetSql	.= "				product_cnt			= '$product_cnt',";
	$SetSql	.= "				postcode			= '$postcode',";
	$SetSql	.= "				address				= '$address',";
	$SetSql	.= "				detailAddress		= '$detailAddress',";
	$SetSql	.= "				extraAddress		= '$extraAddress',";
	$SetSql	.= "				memo				= '$memo',";
	
	if ( $mode == "" ){
		$SetSql	.= "				create_date				= '$create_date',";
		$SetSql	.= "				pw					= '$pw'";
		$Sql	 = "	INSERT INTO	product SET ";
		$Sql	.= $SetSql;
		mysqli_query($conn,$Sql);
		echo "<script>window.location.href='board/order_list.php';</script>";
	}
	else if($mode == "edit"){
		$SetSql	.= "				update_date				= '$update_date'";
		$sql = " select count(*) as cnt from product where idx = '$idx' ";
		$result = mysqli_query($conn,$sql);
		$ROW = mysqli_fetch_assoc($result);

		if ( $ROW['cnt'] ==0 ) {
			echo "<script>alert('없는 게시물입니다.');history.go(-1);</script>";
			exit;
		}
		$Sql	= "UPDATE product SET ";
		$Sql	.= $SetSql;
		$Sql	.= " WHERE idx='$idx'";
		mysqli_query($conn,$Sql);
	
		echo "<script>window.location.href='board/order_list.php';</script>";
	}
	else if($mode == "delete"){
		$sql = " select count(*) as cnt from product where idx = '$idx' ";
		$result = mysqli_query($conn,$sql);
		$ROW = mysqli_fetch_assoc($result);

		if ( $ROW['cnt'] ==0 ) {
			echo "<script>alert('없는 게시물입니다.');history.go(-1);</script>";
			exit;
		}
		$Sql	= "delete from product WHERE idx='$idx'";
		mysqli_query($conn,$Sql);
		
		echo "<script>window.location.href='board/order_list.php'; </script>";
	}
	

?>