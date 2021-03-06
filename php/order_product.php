<?
	include  $_SERVER['DOCUMENT_ROOT']."/head.php";
	$idx = $_GET['idx'];
	$mode = $_GET['mode'];
	$sql = "select * from product where idx = '$idx'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);

	$sql2 = "select * from info_user where id = '$member_id'";
	$result2 = mysqli_query($conn,$sql2);
	$row2 = mysqli_fetch_assoc($result2);

?>
<div id="wrapper" style="height: 1100px">
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
						<input type="text" name="id" value="<?php if ($mode == ""){if($is_member){ echo $member_id;}}  else{ echo  $row['id']; }?>" id="id" required class="frm_input half_input required" placeholder="ID" readonly> 
						
						<?php if ($mode == ""){ ?>
							<label for="wr_password" class="sound_only">비밀번호<strong>필수</strong></label>
							<input type="password" name="password" id="wr_password"  required class="frm_input half_input required" placeholder="비밀번호">
						<? } ?>
						
					</div>
					<div class="bo_w_info write_div bo_w_select2">
						<label for="wr_hp" class="sound_only">연락처<strong>필수</strong></label>
						<input type="text" name="hp" value="<?if ($mode == ""){if($is_member){ echo $row2['hp'];}}  else{ echo  $row['hp']; }  ?>" id="hp" required class="frm_input half_input required" placeholder="연락처" > 

						<label for="wr_product" class="sound_only">상품명<strong>필수</strong></label>
						<select name="p_name" id="p_name" >
							<option value="3K(9~10과)" <? if($row['product_name']=='3K(9~10과)'){ ?> selected <? } ?>>3K(9~10과)</option>
							<option value="3K(11~12과)" <? if($row['product_name']=='3K(11~12과)'){ ?> selected <? } ?>>3K(11~12과)</option>
							<option value="3K(15~18과)" <? if($row['product_name']=='3K(15~18과)'){ ?> selected <? } ?>>3K(15~18과)</option>
						</select>

						<label for="wr_cnt" class="sound_only">수량<strong>필수</strong></label>
						<input type="number" min='0' name="wr_cnt" value="<?= $row['product_cnt'] ?>" id="wr_cnt" required class="frm_input quarter_input required" placeholder="수량" >
					</div>
					<div class="bo_w_info write_div">
							
								<input type="text" id="postcode" name= "postcode" value = "<?= $row['postcode'] ?>" class="d_form mini" placeholder="우편번호" required>
								<input type="button" onclick="execDaumPostcode()" class="d_btn" value="우편번호 찾기"><br>
								
								<input type="text" id="address" name="address" value="<?= $row['address'] ?>" class="d_form large" placeholder="주소"><br>
								<input type="text" id="detailAddress" name="detailAddress" value="<?= $row['detailAddress'] ?>" class="d_form" placeholder="상세주소">
								<input type="text" id="extraAddress" name="extraAddress"value="<?= $row['extraAddress'] ?>" class="d_form" placeholder="참고항목">

								<div id="wrap" style="display:none;border:1px solid;width:500px;height:300px;margin:5px 0;position:relative">
								<img src="//t1.daumcdn.net/postcode/resource/images/close.png" id="btnFoldWrap" style="cursor:pointer;position:absolute;right:0px;top:-1px;z-index:1" onclick="foldDaumPostcode()" alt="접기 버튼">
								</div>
							
					</div>
					<div class="write_div">
					 	<label for="wr_content" class="sound_only">메모</label>
						<div class="wr_content">
							<textarea name="memo" id="memo" placeholder="메모" style="height: 270px;" ><?= $row['memo']?></textarea>
						</div>
					 </div>
					<div class="btn_confirm write_div">
						<a href='javascript:history.back(-1);' class="btn_cancel btn">취소</a>
						<button type="submit" id="btn_submit" accesskey="s" class="btn_submit btn">주문완료</button>
					</div>
				 </form>
			</section>
		</div>
	</div>
</div>
<?
	include  $_SERVER['DOCUMENT_ROOT']."/tail.php";
?>
<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<script>
    // 우편번호 찾기 찾기 화면을 넣을 element
    var element_wrap = document.getElementById('wrap');

    function foldDaumPostcode() {
        // iframe을 넣은 element를 안보이게 한다.
        element_wrap.style.display = 'none';
    }

    function execDaumPostcode() {
        // 현재 scroll 위치를 저장해놓는다.
        var currentScroll = Math.max(document.body.scrollTop, document.documentElement.scrollTop);
        new daum.Postcode({
            oncomplete: function(data) {
                // 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                var addr = ''; // 주소 변수
                var extraAddr = ''; // 참고항목 변수

                //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                    addr = data.roadAddress;
                } else { // 사용자가 지번 주소를 선택했을 경우(J)
                    addr = data.jibunAddress;
                }

                // 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
                if(data.userSelectedType === 'R'){
                    // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                    // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                    if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                        extraAddr += data.bname;
                    }
                    // 건물명이 있고, 공동주택일 경우 추가한다.
                    if(data.buildingName !== '' && data.apartment === 'Y'){
                        extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                    }
                    // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                    if(extraAddr !== ''){
                        extraAddr = ' (' + extraAddr + ')';
                    }
                    // 조합된 참고항목을 해당 필드에 넣는다.
                    document.getElementById("extraAddress").value = extraAddr;
                
                } else {
                    document.getElementById("extraAddress").value = '';
                }

                // 우편번호와 주소 정보를 해당 필드에 넣는다.
                document.getElementById('postcode').value = data.zonecode;
                document.getElementById("address").value = addr;
                // 커서를 상세주소 필드로 이동한다.
                document.getElementById("detailAddress").focus();

                // iframe을 넣은 element를 안보이게 한다.
                // (autoClose:false 기능을 이용한다면, 아래 코드를 제거해야 화면에서 사라지지 않는다.)
                element_wrap.style.display = 'none';

                // 우편번호 찾기 화면이 보이기 이전으로 scroll 위치를 되돌린다.
                document.body.scrollTop = currentScroll;
            },
            // 우편번호 찾기 화면 크기가 조정되었을때 실행할 코드를 작성하는 부분. iframe을 넣은 element의 높이값을 조정한다.
            onresize : function(size) {
                element_wrap.style.height = size.height+'px';
            },
            width : '100%',
            height : '100%'
        }).embed(element_wrap);

        // iframe을 넣은 element를 보이게 한다.
        element_wrap.style.display = 'block';
    }

function forder_submit(f){
	if (f.id.value.length < 1) {
		alert("아이디를 입력하세요.");
		f.id.focus();
		return false;
	}
	if (f.password.value.length < 1) {
		alert("비밀번호를 입력하세요.");
		f.password.focus();
		return false;
	}
	if (f.hp.value.length < 1) {
		alert("연락처를 입력하세요.");
		f.hp.focus();
		return false;
	}
	if (f.postcode.value.length < 1) {
		alert("우편번호를 입력하세요.");
		f.postcode.focus();
		return false;
	}
}
</script>