<?
	
	include  $_SERVER['DOCUMENT_ROOT']."/connect_db.php";
	header("Content-type: text/html; charset=euc-kr");
	
	$count = 0;
	$check_len = count($_POST['chk']);

	function get_boardIdx($conn,$idx)
	{
		$sql = " select * from product where idx = '$idx' ";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}
		for ($i=0; $i<$check_len; $i++)
			{
				// ���� ��ȣ�� �ѱ�
				$k = $_POST['chk'][$i];
				$mb = get_boardIdx($conn,$_POST['idx'][$k]);
				
				if ($mb['idx']) {
					// �Խù� ����
					$idx=$mb['idx'];
					$sql = "delete from product where idx='$idx'";
					mysqli_query($conn,$sql);
					$count++;
				}
			}
			
	if($count> 0) echo "<script>alert('�����Ǿ����ϴ�.'); window.location.href='order_list.php';</script>";
	else  echo "<script>alert('���� ����.'); window.location.href='order_list.php';</script>";
	
?>