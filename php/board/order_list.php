<?
	include("head.php");

	$stx		= $_POST['stx'];
	$sfl		= $_POST['sfl'];

	if($sfl == 'product_name') $Search_sql = "and product_name like '%".$stx."%' ";
	else if($sfl == 'id') $Search_sql = "and id like '%".$stx."%' ";

	$show_count = 5;
	$sql= "select count(*) as cnt  from product where 1 {$Search_sql}";
	$result_cnt = mysqli_query($conn,$sql);
	$board_cnt = mysqli_fetch_array($result_cnt);
	$total_count= $board_cnt['cnt'];

	if(isset($_GET['page'])) $page = $_GET['page'];
	 else $page = 1;

	 $list = $show_count; 
	 $block_ct = $show_count; 

	 $block_num = ceil($page/$block_ct); 
	$block_start = (($block_num - 1) * $block_ct) + 1; 
	$block_end = $block_start + $block_ct - 1; 
			
	$total_page = ceil($total_count / $list);
	 if($block_end > $total_page) $block_end = $total_page;
	$total_block = ceil($total_page/$block_ct);
	$start_num = ($page-1) * $list;
	$cou = $total_count-($page-1)*$list;

	$sql	= "select * from product where 1 {$Search_sql}";
	$sql .= "order by idx desc";
	$sql .= " limit $start_num, $list";

	$result= mysqli_query($conn,$sql);

?>
<h2 id="container_title"><span title="�ֹ���Ȳ">�ֹ���Ȳ</span></h2>
<form name="forderlist" id="forderlist" action="check_order_delete.php" onsubmit="return fboardlist_submit(this);" method="post">
	<div id="bo_btn_top">
		<div id="bo_list_total">
			<span>Total <? echo $total_count?> ��</span>
			<?= $page ?> ������
		</div>

		<ul class="btn_bo_user">
			
            	<li><a href="order_list.php" class="btn_b01 btn" title="���"><i class="fa fa-list" aria-hidden="true"></i><span class="sound_only">���</span></a></li>
          
			<li>
            	<button type="button" class="btn_bo_sch btn_b01 btn" title="�Խ��� �˻�"><i class="fa fa-search" aria-hidden="true"></i><span class="sound_only">�Խ��� �˻�</span></button>
            </li>
			<li> 
				<a href= 'javascript:void(0);' onclick="is_member2()"  class="btn_b01 btn" title="�۾���"><i class="fa fa-pencil" aria-hidden="true"></i><span class="sound_only">�۾���</span></a>
			</li>
			<? if($is_admin){ ?>
			<li> 
				<button type="submit"" class="btn_b01 btn" ><i class="fa fa-trash-o" aria-hidden="true"></i><span class="sound_only">���û���</span></a>
			</li>
			<? } ?>
		</ul>
	</div>
	<div class="tbl_head01 tbl_wrap">
		<table>
			<caption>�Խ��� ���</caption>
			<thead>
				<tr >
					<? if($is_admin) {?> <th scope="col"><input type="checkbox" name="all_check" onClick="check_list();" /></th> <? } ?>
					<th scope="col">��ȣ</th>
					<th scope="col">��ǰ��</th>
					<th scope="col">�۾���</th>
					<th scope="col">��ȸ</th>
					<th scope="col">��¥</th>
				</tr>
			</thead>
			<tbody>
				<?
					//��ȣ �ޱ�� ��ƾ 
					
					//$line_num = $total_count+1;  
					$i=0;

					if($total_count > 0){
						
						while($row=mysqli_fetch_array($result)){
							

							if($row['pw'] != ''){
								$lock_img = "<img src='../../img/lock.png' alt='lock' title='lock' width='20' height='20'/>";
								$is_lock = 1;
							  }else{
								$lock_img ="";
								$is_lock = 0;
							  }

							  $board_date = date("Y-m-d", strtotime($row['create_date']));
							  $today = date("Y-m-d");
							  if($board_date == $today){
									$img = "<img src='../../img/new.png' alt='new' title='new' />";
							  }else{
									$img = "";
							  }
				?>
					<tr >
						<? if($is_admin) {?> 
							<td>
								<input type="hidden" name="idx[<?php echo $i ?>]" value="<?php echo $row['idx'] ?>" id="idx_<?php echo $i ?>">
								<input type="checkbox" name="chk[]" value="<?php echo $i ?>" id="chk_<?php echo $i ?>">
							</td> 
						<? } ?>
						<td><? echo $cou ?></td>
						<? if($is_lock && !$is_admin){ ?>
							<td onclick="location.href='ck_read2.php?idx=<?= $row['idx'] ?>' ">
								<?= $row['product_name'],  $lock_img, $img;?>
							</td>
						<? } else { ?>
							<td onclick="location.href='read2.php?idx=<?= $row['idx'] ?>'">
								<?= $row['product_name'],  $lock_img, $img;?>
							</td>
						<? } ?>
						<td><?= $row[ 'id' ]?></td>
						<td><?= $row['hit']?></td>
						<td><?= $board_date ?></td>
					</tr>
						<?
							$cou --; 
							$i++;
						} 
					} else { ?> <td colspan="6" >��ϵ� �Խù��� �����ϴ�.</td> <? } ?>
			</tbody>
		</table>
	</div>
	<div class="bo_fx">
		<ul class="btn_bo_user">
			 <li><a href='javascript:void(0);' onclick="is_member2()" class="btn_b01 btn" title="�۾���"><i class="fa fa-pencil" aria-hidden="true"></i><span class="sound_only">�۾���</span></a></li>       
		</ul>	
    </div>
	</form>
	<div style="padding:10px"></div>
	<!-- ����¡ �ѹ� -->
	<div id="page_num" >
		<ul>
			<?
			if($page >= 2){  
				$pre = $page-1;
				echo "<li><a href='?page=1'><img src='../../img/btn_first.gif'></a></li>";
				echo "<li><a href='?page=$pre'><img src='../../img/btn_prev.gif'></a></li>";
			}
			for($i=$block_start; $i<=$block_end; $i++){ 
				
					if( $page == $i){ 
					  echo "<li style='font-weight:bold'> $i </li>"; 
					}else{
					  echo "<li><a href='?page=$i'>  $i </a></li>"; 
					}
				
			 }

			  if($block_num < $total_block){
				$next = $page + 1; 
				echo "<li><a href='?page=$next'><img src='../../img/btn_next.gif'></a></li>"; 
			  }

			  if($page < $total_page){ //���� page�� ������������ �۴ٸ�
				echo "<li><a href='?page=$total_page'><img src='../../img/btn_end.gif'></a></li>"; 
			  }
			?>
		</ul>
	</div>

	<!-- �Խ��� �˻� ���� { -->
    <div class="bo_sch_wrap">
        <fieldset class="bo_sch">
            <h3>�˻�</h3>
            <form name="fsearch" method="post">
			<select name="sfl" id="sfl">
				<option value="product_name" >��ǰ��</option>
				<option value="id" >ȸ�����̵�</option>
            </select>
            <label for="stx" class="sound_only">�˻���<strong class="sound_only"> �ʼ�</strong></label>
            <div class="sch_bar">
                <input type="text" name="stx" value="" required id="stx" class="sch_input" size="25" maxlength="20" placeholder=" �˻�� �Է����ּ���" >
                <button type="submit" value="�˻�" class="sch_btn" "><i class="fa fa-search" aria-hidden="true"></i><span class="sound_only">�˻�</span></button>
            </div>
            <button type="button" class="bo_sch_cls" title="�ݱ�"><i class="fa fa-times" aria-hidden="true"></i><span class="sound_only">�ݱ�</span></button>
            </form>
        </fieldset>
        <div class="bo_sch_bg"></div>
    </div>
    <script>
    jQuery(function($){
        // �Խ��� �˻�
        $(".btn_bo_sch").on("click", function() {
            $(".bo_sch_wrap").toggle();
        })
        $('.bo_sch_bg, .bo_sch_cls').click(function(){
            $('.bo_sch_wrap').hide();
        });
    });


    </script>
    <!-- } �Խ��� �˻� �� --> 
</div>
</div>
</div>
<?php
include $_SERVER['DOCUMENT_ROOT']."/tail.php";
?>


