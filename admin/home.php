<?
	include ("connect_db.php");
	header("Content-type: text/html; charset=euc-kr");
?>
<html>
<head>
<link rel="stylesheet" href="<?$_SERVER['DOCUMENT_ROOT']?>/admin/css/admin.css">
<title>관리자</title>
</head>
<body>
<div id="hd_top">
       <div id="logo"><a href="/admin/home.php"><img src="/admin/img/logo.png" alt="관리자"></a></div>
        <div id="tnb">
            <ul>
                <li class="tnb_li"><a href="../" class="tnb_community" target="_blank" title="커뮤니티 바로가기">사이트 홈</a></li>
                 <li id="tnb_logout"><a href="logout.php">로그아웃</a></li>
            </ul>
        </div>
		<div id="wrapper">
			
		</div>
</div>
<div id="ft">
	<div id="ft_wr">
		<div id="ft_copy">Copyright &copy; <b>소유하신 도메인.</b> All rights reserved.</div>
	</div>
</div>
</body>
</html>