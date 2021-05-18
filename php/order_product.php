<?
	include  $_SERVER['DOCUMENT_ROOT']."/head.php";
	$idx = $_GET['idx'];
	$mode = $_GET['mode'];
	$sql = "select * from product where idx = '$idx'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
?>
<div id="wrapper" >
    <div id="container_wr">
		<div id="container">
			<h2 id="container_title"><span title="상품주문">상품주문</span></h2>
			<section id="bo_w">
				<h2 class = "sound_only">상품주문 </h2>
				 <form name="forder" id="forder" action="order_update.php" onsubmit="return forder_submit(this);" method="post"  autocomplete="off" style="width:100%">
					<input type="hidden" name="mode" value="<?php echo $mode ?>">
					<input type="hidden" name="idx" value="<?php echo $idx ?>">
					<div class="bo_w_info write_div">
						<label for="wr_id" class="sound_only">ID<strong>필수</strong></label>
						<input type="text" name="id" value="<?php if ($mode == ""){if($is_member){ echo $member_id;}  else if($is_admin){ echo $admin_id ;}} else{ echo  $row['id']; }?>" id="id" required class="frm_input half_input required" placeholder="ID" readonly> 

						<label for="wr_id" class="sound_only">상품명<strong>필수</strong></label>
						<select name="sfl" id="sfl">
							<option value="product1" >3K(9~10과)</option>
							<option value="product2" >3K(11~12과)</option>
							<option value="product3" >3K(15~18과)</option>
						</select>
					</div>
				 </form>
			</section>
		</div>
	</div>
</div>
<?
	include  $_SERVER['DOCUMENT_ROOT']."/tail.php";
?>