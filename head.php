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
<title>제주샛별한라봉농장</title>
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

	<ul class="hd_login">        
				<?php if ($is_member) {  ?>
				<li><a href=""><?= $member_id ?>님</a></li>
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
                    <a href="/php/product_info.php" target="_self" class="gnb_1da">상품소개</a>
                 </li>
				 <li class="gnb_1dli" style="z-index:999">
                    <a href="/php/board/order_list.php" target="_self" class="gnb_1da">주문현황</a>
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
	