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
			</ul>
		</div>
		<div class="latest_wr">
			<div style="float:left;" class="lt_wr">
				<div class="lat">
				<h2 class="lat_title"><a href="/php/board/board_list.php">공지사항</a></h2>
					<ul>
							
							<?
								
								$sql= "select count(*) as cnt  from board where 1 {$Search_sql}";
								$result_cnt = mysqli_query($conn,$sql);
								$board_cnt = mysqli_fetch_array($result_cnt);
								$total_count= $board_cnt['cnt'];

								//나중에 쿼리의 limit 부분 수정할 것, 게시판의 최신글 6개 보이도록!
								$sql	= "select * from board where 1 ";
								$sql .= "order by idx desc";
								$sql .= " limit 0, 6";
								$result= mysqli_query($conn,$sql);

								if($total_count > 0){
										
										while($row=mysqli_fetch_array($result)){
							?>
							<li class="basic_li">
							<a href="/php/board/read.php?idx= <?=$row['idx'] ?>"> <?= $row['title']?></a>  <div class="lt_info">
								<span class="lt_nick"><span class="sv_member"><?= $row['id']?></span></span>
								<span class="lt_date"><? date("Y-m-d", strtotime($row['create_date'])) ?></span>              
							</div>
						<? } } ?>
					</ul>
				<a href="/php/board/board_list.php" class="lt_more"><span class="sound_only">공지사항</span>더보기</a>

			</div>
			</div>
			<!-- 각종 버튼 -->
			<div style="float:left;" class="links">
				<ul>
					<li>
						<a href="">PC로 주문하기</a>
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