<style>
.body_background{
	background-image: url('/img/orange.jpg'); 
	height: 100vh;
	background-repeat: no-repeat;
	background-position: center;
	background-size: cover;
	overflow: scroll;
	background: url("/img/orange.jpg") no-repeat center/cover;
}

</style>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/53a8c415f1.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="/css/login.css">
	<title> book_login </title>
</head>
<body class = "body_background">
<form name = "login" action = "login_check.php" onSubmit="return flogin_submit(this);" method = "post">
	<div class="wrap">
        <div class="login">
            <h2>Log-in</h2>
            
            <div class="login_id">
                <h4>ID</h4>
                <input type="text" name="id" id="id" placeholder="ID">
            </div>
            <div class="login_pw">
                <h4>Password</h4>
                <input type="password" name="pw" id="pw" placeholder="Password">
            </div>
            <div class="login_etc">
                <div class="checkbox">
                <input type="checkbox" name="" id=""> 로그인 상태유지
                </div>
				<div style="padding:5px; " ></div>
                <div class="forgot_pw" style = "text-align: center">
					<a href="">아이디 찾기</a>
					|
					 <a href="">비밀번호 찾기</a>
					 |
					<a href="sign_up.php">회원가입</a>
					</div>
				
            </div>
			
            <div class="submit">
                <input type="submit" value="login" >
            </div>
			<div style ="padding:10px;">
			<a href="../index.php">go Home</a>
			</div>
        </div>
    </div>
	</form>
</body>
</html>

<script>
function flogin_submit(f)
{

	if (f.id.value.length < 1) {
		alert("아이디를 입력하세요.");
		f.id.focus();
		return false;
	}
	if (f.pw.value.length < 1) {
		alert("비밀번호를 입력하세요.");
		f.pw.focus();
		return false;
	}
	

}
</script>