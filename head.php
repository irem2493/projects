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
					<span id="wsite-title">제주샛별한라봉농장</span>
					</a>
			</span>
        </div>
	<div class="hd_sch_wr">
				
				<fieldset id="hd_sch">
					<legend>사이트 내 전체검색</legend>
					<form name="fsearchbox" method="get" action="search.php" onsubmit="return fsearchbox_submit(this);">
					<label for="sch_stx" class="sound_only">검색어 필수</label>
					<input type="text" name="stx" id="sch_stx" maxlength="20" placeholder="검색어를 입력해주세요">
					<button type="submit" id="sch_submit" value="검색"><i class="fa fa-search" aria-hidden="true"></i><span class="sound_only">검색</span></button>
					</form>

					<script>
					function fsearchbox_submit(f)
					{
						if (f.stx.value.length < 2) {
							alert("검색어는 두글자 이상 입력하십시오.");
							f.stx.select();
							f.stx.focus();
							return false;
						}

						// 검색에 많은 부하가 걸리는 경우 이 주석을 제거하세요.
						var cnt = 0;
						for (var i=0; i<f.stx.value.length; i++) {
							if (f.stx.value.charAt(i) == ' ')
								cnt++;
						}

						if (cnt > 1) {
							alert("빠른 검색을 위하여 검색어에 공백은 한개만 입력할 수 있습니다.");
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
				<li><a href="/php/md_info.php"><?= $member_id ?>님</a></li>
				<li><a href="/php/logout.php">로그아웃</a></li>
				<?php if ($is_admin) {  ?>
				<li class="tnb_admin"><a href="/admin/home.php">관리자</a></li>
				<?php }  ?>
				<?php } else {  ?>
				<li><a href="/php/sign_up.php">회원가입</a></li>
				<li><a href="/php/login.php">로그인</a></li>
				<?php if ($is_admin) {  ?>
				<li class="tnb_admin"><a href="/admin/home.php">관리자</a></li>
				<?php } } ?>
				

	</ul>
</div>
</div>
	<nav id="gnb">
        <h2>메인메뉴</h2>
        <div class="gnb_wrap">
            <ul id="gnb_1dul">
				<li class="gnb_1dli" style="z-index:999">
                    <a href="/php/company_info.php" target="_self" class="gnb_1da">회사소개</a>
                 </li>
                <li class="gnb_1dli" style="z-index:999">
                    <a href="" target="_self" class="gnb_1da">상품소개</a>
                 </li>
				 <li class="gnb_1dli" style="z-index:999">
                    <a href="" target="_self" class="gnb_1da">주문현황</a>
                 </li>
				  <li class="gnb_1dli" style="z-index:999">
                    <a href="/php/board/board_list.php" target="_self" class="gnb_1da">공지사항</a>
                 </li>
             </ul>
            <div id="gnb_all">
                <h2>전체메뉴</h2>
                <ul class="gnb_al_ul">
                                            <li class="gnb_empty">메뉴 준비 중입니다.</li>
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
	