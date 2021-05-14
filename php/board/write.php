<?
	include("head.php");

	$idx = $_GET['idx'];
	$mode = $_GET['mode'];
	$sql = "select * from board where idx = '$idx'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);

?>
	<section id="bo_w">
		<h2 class = "sound_only">게시판 이름 글쓰기</h2>
		 <form name="fwrite" id="fwrite" action="write_update.php" onsubmit="return fwrite_submit(this);" method="post"  autocomplete="off" style="width:100%">
		 	 <input type="hidden" name="mode" value="<?php echo $mode ?>">
			 <input type="hidden" name="idx" value="<?php echo $idx ?>">
			  <div class="bo_w_info write_div">
			  
			  	<label for="wr_id" class="sound_only">ID<strong>필수</strong></label>
				<input type="text" name="id" value="<?php if ($mode == ""){if($is_member){ echo $member_id;}  else if($is_admin){ echo $admin_id ;}} else{ echo  $row['id']; }?>" id="id" required class="frm_input half_input required" placeholder="ID" readonly> 
			
				
				<label for="wr_password" class="sound_only">비밀번호<strong>필수</strong></label>
				<input type="password" name="password" id="wr_password"  class="frm_input half_input " placeholder="비밀번호">
			  </div>

			  <div class="bo_w_tit write_div">
			  	<label for="wr_subject" class="sound_only">제목<strong>필수</strong></label>
					<div id="autosave_wrapper" class="write_div">
					<input type="text" name="title" value="<?= $row['title']?>" id="title" required class="frm_input full_input required" size="50" maxlength="255" placeholder="제목">
					 <div class="write_div">
					 	<label for="wr_content" class="sound_only">내용<strong>필수</strong></label>
						<div class="wr_content">
							<textarea name="content" id="content" placeholder="내용" required style="height: 270px;" ><?= $row['content']?></textarea>
						</div>
					 </div>
					</div>
			  </div>

			  <div class="btn_confirm write_div">
				<a href='javascript:history.back(-1);' class="btn_cancel btn">취소</a>
				<button type="submit" id="btn_submit" accesskey="s" class="btn_submit btn">작성완료</button>
			</div>
		 </form>
	</section>

		</div>
	</div>
</div>
</body>
</html>

<script>
function fwrite_submit(f){
	if (f.id.value.length < 1) {
		alert("아이디를 입력하세요.");
		f.id.focus();
		return false;
	}
	if (f.wr_subject.value.length < 1) {
		alert("제목을 입력하세요.");
		f.wr_subject.focus();
		return false;
	}
	if (f.content.value.length < 1) {
		alert("내용을 입력하세요.");
		f.content.focus();
		return false;
	}
}
</script>