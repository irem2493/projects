<?
	include("head.php");

	$idx	= $_GET["idx"];
	
	$Sql	 = "	select count(*) as cnt from board where idx = '$idx' ";
	$result = mysqli_query($conn,$Sql);
	$row = mysqli_fetch_assoc($result);
	if($row['cnt'] > 0) {

		$hit = "update board set hit=hit+1 where idx=$idx";
		 mysqli_query($conn,$hit);

		$Sql	 = "	select * from board where idx = '$idx' ";
		$result = mysqli_query($conn,$Sql);
		$row = mysqli_fetch_assoc($result);
	}else{
		echo "<script>alert('등록된 게시글이 삭제되었습니다.');</script>";
	}
	
?>
	<article id="bo_v" style="width:100%">
		<header>
			<h2 id="bo_v_title">
                       <span class="bo_v_tit"><?=$row['title']?></span>
			</h2>

		</header>
		<section id="bo_v_info">
			<h2>페이지 정보</h2>
			<div class="profile_info">
				<div class="pf_img">
					<img src="<?$_SERVER['DOCUMENT_ROOT']?>/img/no_profile.gif" alt="profile_image">
				</div>
				<div class="profile_info_ct">
					<span class="sound_only">작성자</span> <strong><span class="sv_member"><?=$row['id']?></span></strong><br>
					<span class="sound_only">조회</span><strong><i class="fa fa-eye" aria-hidden="true"></i> <?=$row['hit']?>회</strong>
					<strong class="if_date"><span class="sound_only">작성일</span><i class="fa fa-clock-o" aria-hidden="true"></i> <?= date("Y-m-d", strtotime($row['create_date'])) ?></strong>
				</div>
			</div>
			<div id="bo_v_top">
				<ul class="btn_bo_user bo_v_com">
					<li><a href="board_list.php" class="btn_b01 btn" title="목록"><i class="fa fa-list" aria-hidden="true"></i><span class="sound_only">목록</span></a></li>
					<li><a href= 'javascript:void(0);' onclick="is_member()" class="btn_b01 btn" title="글쓰기"><i class="fa fa-pencil" aria-hidden="true"></i><span class="sound_only">글쓰기</span></a></li>
					<li>
						<button type="button" class="btn_more_opt is_view_btn btn_b01 btn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i>
							<span class="sound_only">게시판 리스트 옵션</span>
						</button>
						<ul class="more_opt is_view_btn" style="display: none;"> 
							<li>
								<a href='javascript:void(0);' onclick="is_update()" >수정<i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
							</li>			            
							<li>
								<a href='javascript:void(0);' onclick="is_delete()" >삭제<i class="fa fa-trash-o" aria-hidden="true"></i></a>
							</li>			            			            			            			        
						</ul> 
					</li>
				</ul>
				
			</div>
		</section>
		<section id="bo_v_atc">
			<h2 id="bo_v_atc_title">본문</h2>
			<div id="bo_v_con">
				<?= $row['content'] ?>
			</div>
		</section>
		<ul class="bo_v_nb">
			<?
				$befor = $idx-1;
				$after = $idx+1;
				
				$befor_sql = "select * from board where idx = '$befor'";
				$befor_result = mysqli_query($conn,$befor_sql);
				$befor_row = mysqli_fetch_assoc($befor_result);
				
				$after_sql = "select * from board where idx = '$after'";
				$after_result = mysqli_query($conn,$after_sql);
				$after_row = mysqli_fetch_assoc($after_result);
				
				
			if($befor_row['title'] != '' && $befor_row['date'] != ''){ ?>
				<li class="btn_prv"><span class="nb_tit"><i class="fa fa-chevron-up" aria-hidden="true"></i> 이전글</span>
					<a href="read.php?idx=<?= $befor ?>"><?= $befor_row['title']?></a> <span class="nb_date"><?= $befor_row['date'] ?></span>
				</li>       
		<? } if($after_row['title'] != '' && $after_row['date'] != ''){ ?>
				<li class="btn_next"><span class="nb_tit"><i class="fa fa-chevron-down" aria-hidden="true"></i> 다음글</span>
					<a href="read.php?idx=<?= $after ?>"><?= $after_row['title']?></a>  <span class="nb_date"><?= $after_row['date'] ?></span>
				</li>    
			<? } ?>
		</ul>
	</article>


		</div>
	</div>
</div>
</body>
</html>

<script>
		jQuery(function($){
			// 게시판 보기 버튼 옵션
			$(".btn_more_opt.is_view_btn").on("click", function(e) {
				e.stopPropagation();
				$(".more_opt.is_view_btn").toggle();
			})
;
			$(document).on("click", function (e) {
				if(!$(e.target).closest('.is_view_btn').length) {
					$(".more_opt.is_view_btn").hide();
				}
			});
		});

function is_update(){
	var writer = "<?= $row['id'] ?>";
	var admin = "<?= $admin_id ?>";
	var now_user = "<?= $_SESSION[ 'userId' ]?>";
	
	
	if(now_user == writer || "<?= $is_admin ?>"){
		location.href = "write.php?idx=<?= $idx ?>&mode=edit";
	}
	else{
		alert("작성자 혹은 관리자만이 수정할 수 있습니다!");
		location.href = "";
	}
}

function is_delete(){
	var writer = "<?= $row['id'] ?>";
	var admin = "<?= $admin_id ?>";
	var now_user = "<?= $_SESSION[ 'userId' ]?>";
	
	
	if(now_user == writer ||  "<?= $is_admin ?>"){
		if(confirm("선택한 자료를 정말 삭제하시겠습니까?")) {
			location.href = "write_update.php?idx=<?= $idx ?>&mode=delete";
		}
		else location.href = "";
		
	}
	else{
		alert("작성자 혹은 관리자만이 삭제할 수 있습니다!");
		location.href = "";
	}
}
</script>