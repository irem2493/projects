<?
include ("connect_db.php");

	session_start();
	  if( isset( $_SESSION[ 'userId' ] ) ) {
		$is_member = TRUE;
		$member_id = $_SESSION[ 'userId' ];
	  }

	   if( isset( $_SESSION[ 'adminId' ] ) ) {
		$is_admin = TRUE;
		$admin_id = $_SESSION[ 'adminId' ];
	  }
include ("lib/function.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/default.css">
<link rel="stylesheet" href="<?$_SERVER['DOCUMENT_ROOT']?>/simpleBanner/simpleBanner.css">
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="<?$_SERVER['DOCUMENT_ROOT']?>/simpleBanner/simpleBanner.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
<title>jeyeon_lib</title>
</head>
<body>

<div id="hd">
<div id="hd_wrapper">
	<div id="logo">
            <span class="wsite-logo">
					<a href="/">
					<span id="wsite-title">���ֻ����Ѷ������</span>
					</a>
			</span>
        </div>
	<div class="hd_sch_wr">
				
				<fieldset id="hd_sch">
					<legend>����Ʈ �� ��ü�˻�</legend>
					<form name="fsearchbox" method="get" action="search.php" onsubmit="return fsearchbox_submit(this);">
					<label for="sch_stx" class="sound_only">�˻��� �ʼ�</label>
					<input type="text" name="stx" id="sch_stx" maxlength="20" placeholder="�˻�� �Է����ּ���">
					<button type="submit" id="sch_submit" value="�˻�"><i class="fa fa-search" aria-hidden="true"></i><span class="sound_only">�˻�</span></button>
					</form>

					<script>
					function fsearchbox_submit(f)
					{
						if (f.stx.value.length < 2) {
							alert("�˻���� �α��� �̻� �Է��Ͻʽÿ�.");
							f.stx.select();
							f.stx.focus();
							return false;
						}

						// �˻��� ���� ���ϰ� �ɸ��� ��� �� �ּ��� �����ϼ���.
						var cnt = 0;
						for (var i=0; i<f.stx.value.length; i++) {
							if (f.stx.value.charAt(i) == ' ')
								cnt++;
						}

						if (cnt > 1) {
							alert("���� �˻��� ���Ͽ� �˻�� ������ �Ѱ��� �Է��� �� �ֽ��ϴ�.");
							f.stx.select();
							f.stx.focus();
							return false;
						}

						return true;
					}
					</script>

				</fieldset>
		</div>
	<ul class="hd_login">        
				<?php if ($is_member) {  ?>
				<li><a href="/php/md_info.php"><?= $member_id ?>��</a></li>
				<li><a href="/php/logout.php">�α׾ƿ�</a></li>
				<?php if ($is_admin) {  ?>
				<li class="tnb_admin"><a href="/admin/home.php">������</a></li>
				<?php }  ?>
				<?php } else {  ?>
				<li><a href="/php/sign_up.php">ȸ������</a></li>
				<li><a href="/php/login.php">�α���</a></li>
				<?php if ($is_admin) {  ?>
				<li class="tnb_admin"><a href="/admin/home.php">������</a></li>
				<?php } } ?>
				

	</ul>
</div>
</div>
	<nav id="gnb">
        <h2>���θ޴�</h2>
        <div class="gnb_wrap">
            <ul id="gnb_1dul">
				<li class="gnb_1dli" style="z-index:999">
                    <a href="/php/company_info.php" target="_self" class="gnb_1da">ȸ��Ұ�</a>
                 </li>
                <li class="gnb_1dli" style="z-index:999">
                    <a href="" target="_self" class="gnb_1da">��ǰ�Ұ�</a>
                 </li>
				 <li class="gnb_1dli" style="z-index:999">
                    <a href="" target="_self" class="gnb_1da">�ֹ���Ȳ</a>
                 </li>
				  <li class="gnb_1dli" style="z-index:999">
                    <a href="/php/board/board_list.php" target="_self" class="gnb_1da">��������</a>
                 </li>
             </ul>
            <div id="gnb_all">
                <h2>��ü�޴�</h2>
                <ul class="gnb_al_ul">
                                            <li class="gnb_empty">�޴� �غ� ���Դϴ�.</li>
                                    </ul>
                <button type="button" class="gnb_close_btn"><i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div id="gnb_all_bg"></div>
        </div>
    </nav>
	<script>
    
    $(function(){
        $(".gnb_menu_btn").click(function(){
            $("#gnb_all, #gnb_all_bg").show();
        });
        $(".gnb_close_btn, #gnb_all_bg").click(function(){
            $("#gnb_all, #gnb_all_bg").hide();
        });
    });

    </script>
	