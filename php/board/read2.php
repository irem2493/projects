<?
	include("head.php");

	$idx	= $_GET["idx"];
	
	$Sql	 = "	select count(*) as cnt from product where idx = '$idx' ";
	$result = mysqli_query($conn,$Sql);
	$row = mysqli_fetch_assoc($result);
	if($row['cnt'] > 0) {

		$hit = "update product set hit=hit+1 where idx=$idx";
		 mysqli_query($conn,$hit);

		$Sql	 = "	select * from product where idx = '$idx' ";
		$result = mysqli_query($conn,$Sql);
		$row = mysqli_fetch_assoc($result);
	}else{
		echo "<script>alert('��ϵ� �Խñ��� �����Ǿ����ϴ�.');</script>";
	}
	
?>
	<h2 id="container_title"><span title="�ֹ���Ȳ">�ֹ���Ȳ</span></h2>
	<article id="bo_v" style="width:100%">
		<header>
			<h2 id="bo_v_title">
                       <span class="bo_v_tit"><?=$row['product_name']?></span>
			</h2>

		</header>
		<section id="bo_v_info">
			<h2>������ ����</h2>
			<div class="profile_info">
				<div class="pf_img">
					<img src="<?$_SERVER['DOCUMENT_ROOT']?>/img/no_profile.gif" alt="profile_image">
				</div>
				<div class="profile_info_ct">
					<span class="sound_only">�ۼ���</span> <strong><span class="sv_member"><?=$row['id']?></span></strong><br>
					<span class="sound_only">��ȸ</span><strong><i class="fa fa-eye" aria-hidden="true"></i> <?=$row['hit']?>ȸ</strong>
					<strong class="if_date"><span class="sound_only">�ۼ���</span><i class="fa fa-clock-o" aria-hidden="true"></i> <?= date("Y-m-d", strtotime($row['create_date'])) ?></strong>
				</div>
			</div>
			<div id="bo_v_top">
				<ul class="btn_bo_user bo_v_com">
					<li><a href="order_list.php" class="btn_b01 btn" title="���"><i class="fa fa-list" aria-hidden="true"></i><span class="sound_only">���</span></a></li>
					<li><a href= 'javascript:void(0);' onclick="is_member()" class="btn_b01 btn" title="�۾���"><i class="fa fa-pencil" aria-hidden="true"></i><span class="sound_only">�۾���</span></a></li>
					<li>
						<button type="button" class="btn_more_opt is_view_btn btn_b01 btn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i>
							<span class="sound_only">�Խ��� ����Ʈ �ɼ�</span>
						</button>
						<ul class="more_opt is_view_btn" style="display: none;"> 
							<li>
								<a href='javascript:void(0);' onclick="is_update()" >����<i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
							</li>			            
							<li>
								<a href='javascript:void(0);' onclick="is_delete()" >����<i class="fa fa-trash-o" aria-hidden="true"></i></a>
							</li>			            			            			            			        
						</ul> 
					</li>
				</ul>
				
			</div>
		</section>
		<section id="bo_v_atc">
			<h2 id="bo_v_atc_title">�ֹ�����</h2>
			<div id="bo_v_con">
				<font size="3"><p style="line-height: 2.2;">
				����ó : <?= $row['hp']?> <br>
				�ֹ����� : <?= $row['product_name']?> x <?= $row['product_cnt']?> <br>
				������ȣ : <?= $row['postcode']?> <br>
				�ּ� : <?= $row['address']?>&nbsp;&nbsp;<?=$row['detailAddress'],$row['extraAddress']?>
				<? if($row['memo'] != '') { ?> �޸� : <?= $row['memo']; }?>
				</p></font>

				
			</div>
		</section>
		<ul class="bo_v_nb">
			<?
				$befor = $idx-1;
				$after = $idx+1;
				
				$befor_sql = "select * from product where idx = '$befor'";
				$befor_result = mysqli_query($conn,$befor_sql);
				$befor_row = mysqli_fetch_assoc($befor_result);
				
				
				$after_sql = "select * from product where idx = '$after'";
				$after_result = mysqli_query($conn,$after_sql);
				$after_row = mysqli_fetch_assoc($after_result);
				
				
			if($befor_row['title'] != '' && $befor_row['create_date'] != ''){ ?>
				<li class="btn_prv"><span class="nb_tit"><i class="fa fa-chevron-up" aria-hidden="true"></i> ������</span>
					<a href="read.php?idx=<?= $befor ?>"><?= $befor_row['title']?></a> <span class="nb_date"><?= $befor_row['create_date'] ?></span>
				</li>       
		<? } if($after_row['title'] != '' && $after_row['create_date'] != ''){ ?>
				<li class="btn_next"><span class="nb_tit"><i class="fa fa-chevron-down" aria-hidden="true"></i> ������</span>
					<a href="read.php?idx=<?= $after ?>"><?= $after_row['title']?></a>  <span class="nb_date"><?= $after_row['create_date'] ?></span>
				</li>    
			<? } ?>
		</ul>
	</article>
	
		<button type="button" class="cmt_btn">
			<span class="total"><b>���</b> 0</span><span class="cmt_more"></span>
		</button>
		<section id="bo_vc">
			<h2>��۸��</h2>
				<p id="bo_vc_empty">��ϵ� ����� �����ϴ�.</p>
		</section>
		<aside id="bo_vc_w" class="bo_vc_w">
			 <h2>��۾���</h2>
    
			<form name="fviewcomment" id="fviewcomment" action="write_comment_update.php" onsubmit="return fviewcomment_submit(this);" method="post" autocomplete="off">
				<input type="hidden" name="w" value="c" id="w">
				<input type="hidden" name="bo_table" value="study">
				<input type="hidden" name="wr_id" value="5">
				<input type="hidden" name="comment_id" value="" id="comment_id">
				<input type="hidden" name="sca" value="">
				<input type="hidden" name="sfl" value="">
				<input type="hidden" name="stx" value="">
				<input type="hidden" name="spt" value="">
				<input type="hidden" name="page" value="">
				<input type="hidden" name="is_good" value="">

				<span class="sound_only">����</span>
					<textarea id="wr_content" name="wr_content" maxlength="10000" required="" class="required" title="����" placeholder="��۳����� �Է����ּ���"></textarea>
					<script>
				$(document).on("keyup change", "textarea#wr_content[maxlength]", function() {
					var str = $(this).val()
					var mx = parseInt($(this).attr("maxlength"))
					if (str.length > mx) {
						$(this).val(str.substr(0, mx));
						return false;
					}
				});
				</script>
				<div class="bo_vc_w_wr">
					<div class="btn_confirm">
						<button type="submit" id="btn_submit" class="btn_submit">��۵��</button>
					</div>
				</div>
				</form>
			</aside>
		</div>
	</div>
</div>
<? include $_SERVER['DOCUMENT_ROOT']."/tail.php"; ?>

<script>
		jQuery(function($){
			// �Խ��� ���� ��ư �ɼ�
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
		location.href = "../order_product.php?idx=<?= $idx ?>&mode=edit";
	}
	else{
		alert("�ۼ��� Ȥ�� �����ڸ��� ������ �� �ֽ��ϴ�!");
		location.href = "";
	}
}

function is_delete(){
	var writer = "<?= $row['id'] ?>";
	var admin = "<?= $admin_id ?>";
	var now_user = "<?= $_SESSION[ 'userId' ]?>";
	
	
	if(now_user == writer ||  "<?= $is_admin ?>"){
		if(confirm("������ �ڷḦ ���� �����Ͻðڽ��ϱ�?")) {
			location.href = "write_update.php?idx=<?= $idx ?>&mode=delete";
		}
		else location.href = "";
		
	}
	else{
		alert("�ۼ��� Ȥ�� �����ڸ��� ������ �� �ֽ��ϴ�!");
		location.href = "";
	}
}
</script>