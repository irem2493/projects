<?
	include("head.php");
?>

<div id="wrapper">
    <div id="container_wr">
   
    <div id="container">
		<div class="simple_banner_wrap" data-type="hslide" data-interval="3000">
			<ul>
				<li><img src ="/img/hanrabong.jpg" width="100%" height="95%"></li>
				<li><img src ="/img/orig.jpg" width="100%" height="95%"></li>
				<li><img src ="/img/orig2.jpg" width="100%" height="95%"></li>
			</ul>
		</div>
		<div class="latest_wr">
			<div style="float:left;" class="lt_wr">
				<div class="lat">
				<h2 class="lat_title"><a href="/php/board/board_list.php">공지사항</a></h2>
					<ul>
							
							<?
								
								$sql= "select count(*) as cnt  from board where 1 ";
								$result_cnt = mysqli_query($conn,$sql);
								$board_cnt = mysqli_fetch_array($result_cnt);
								$total_count= $board_cnt['cnt'];

								$sql	= "select * from board where 1 ";
								$sql .= "order by idx desc";
								$sql .= " limit 0, 3";
								$result= mysqli_query($conn,$sql);

								if($total_count > 0){
										
										while($row=mysqli_fetch_array($result)){
							?>
							<li class="basic_li">
							<a href="/php/board/read.php?idx= <?=$row['idx'] ?>"> <?= $row['title']?></a>  <div class="lt_info">
								<span class="lt_nick"><span class="sv_member"><?= $row['id']?></span></span>
								<span class="lt_date"><?= date("Y-m-d", strtotime($row['create_date'])) ?></span>              
							</div>
						<? } } else { ?> <td colspan="5" >등록된 게시물이 없습니다.</td> <? }
						?>
					</ul>
				<a href="/php/board/board_list.php" class="lt_more"><span class="sound_only">공지사항</span>더보기</a>

			</div>
			</div>

			<div style="float:left;" class="lt_wr">
				<div class="lat">
				<h2 class="lat_title"><a href="/php/board/order_list.php">주문현황</a></h2>
					<ul>
							
							<?
								
								$sql= "select count(*) as cnt  from product where 1 ";
								$result_cnt = mysqli_query($conn,$sql);
								$board_cnt = mysqli_fetch_array($result_cnt);
								$total_count= $board_cnt['cnt'];
								
								$sql	= "select * from product where 1 ";
								$sql .= "order by idx desc";
								$sql .= " limit 0, 3";
								$result= mysqli_query($conn,$sql);

								if($total_count > 0){
										
									while($row=mysqli_fetch_array($result)){
										if($row['pw'] != ''){
											$lock_img = "<img src='../../img/lock.png' alt='lock' title='lock' width='20' height='20'/>";
											$is_lock = 1;
										  }else{
											$lock_img ="";
											$is_lock = 0;
										  }
							?>
							<li class="basic_li">
							<? if($is_lock && !$is_admin){ ?>
								<a href="/php/board/ck_read2.php?idx= <?=$row['idx'] ?>"> <?= $row['product_name']?></a>  <div class="lt_info">
								<span class="lt_nick"><span class="sv_member"><?= $row['id']?></span></span>
								<span class="lt_date"><?= date("Y-m-d", strtotime($row['create_date'])) ?></span>              
							</div>
						<?} } } else { ?> <td colspan="5" >등록된 게시물이 없습니다.</td> <? }
						?>
					</ul>
				<a href="/php/board/board_list.php" class="lt_more"><span class="sound_only">공지사항</span>더보기</a>

			</div>
			</div>

			<!-- 각종 버튼 -->
			<div style="float:left;" class="links">
				<ul>
					<li>
						<a href="/php/order_product.php">PC로 주문하기</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	</div>
	</div>
<?
include "tail.php";
?>