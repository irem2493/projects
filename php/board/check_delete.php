<?
	
	include  $_SERVER['DOCUMENT_ROOT']."/connect_db.php";
	header("Content-type: text/html; charset=euc-kr");
	
	$count = 0;
	$check_len = count($_POST['chk']);

	function get_boardIdx($conn,$idx)
	{
		$sql = " select * from board where idx = '$idx' ";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}
		for ($i=0; $i<$check_len; $i++)
			{
				// 실제 번호를 넘김
				$k = $_POST['chk'][$i];
				$mb = get_boardIdx($conn,$_POST['idx'][$k]);
				
				if ($mb['idx']) {
					// 게시물 삭제
					$idx=$mb['idx'];
					$sql = "delete from board where idx='$idx'";
					mysqli_query($conn,$sql);
					$count++;
				}
			}
			
	if($count> 0) echo "<script>alert('삭제되었습니다.'); window.location.href='board_list.php';</script>";
	else  echo "<script>alert('삭제 실패.'); window.location.href='board_list.php';</script>";
	
?>