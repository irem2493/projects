<?
	include  $_SERVER['DOCUMENT_ROOT']."/connect_db.php";

	$idx = $_GET['idx'];
	$sql = "select * from product where idx = '$idx'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="/js/jquery-ui.css" />
	<script type="text/javascript" src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui.js"></script>
<title>��й�ȣ Ȯ��</title>
</head>
<script type="text/javascript">
	$(function(){
		$("#writepass").dialog({
		 	modal:true,
		 	title:'��б��Դϴ�.',
		 	width:400,
			
	 	});
	});

	
    
    
</script>
<body>
<div id='writepass'>
	<form action="" method="post">
 		<p>��й�ȣ <input type="password" name="pw_chk" /> <input type="submit" value="Ȯ��" /></p>
 	</form>
</div>
</body>

</html>
<?
	$pw = md5($_POST['pw_chk']);
	if(isset($_POST['pw_chk'])){
		if($pw == $row['pw']){ ?>
		<script>
			var idx = "<?= $row['idx']?>";
			window.location.href='read2.php?idx='+idx;
			</script>
		<?} else ?> <script>alert('��й�ȣ�� �ٽ� �Է����ּ���.');</script>
	<? } 
?>