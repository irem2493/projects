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


.sign {
  width: 30%;
  height: 720px;
  background: white;
  border-radius: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}

.check{}
</style>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />

<link rel="stylesheet" href="/css/login.css">
<title>book_signUp</title>
</head>
<body class = "body_background">
<form name = "signup" action = "sign_up_update.php" onSubmit="return fsignform_submit(this);" method = "post">
	<div class="wrap">
        <div class="sign">
            <h2>Sign-up</h2>
			 <div class="login_id">
                <h4>NAME<span style="color:red">*</span></h4>
                <input type="text" name="name" id="name" placeholder="Name">
            </div>
            <div class="login_id">
                <h4>ID<span style="color:red">*</span></h4>
                <input type="text" name="id" id="id" placeholder="ID" oninput = "checkId()">
				
            </div><span id="check_id"></span>
            <div class="login_pw">
                <h4>Password<span style="color:red">*</span></h4>
                <input type="password" name="pw" id="pw" placeholder="Password" class="check">
            </div>
			<div class="login_pw">
                <h4>Check Password<span style="color:red">*</span></h4> 
                <input type="password" name="pw2" id="pw2" placeholder="Password" onchange="check_pw();">
            </div><span id="check"></span>
			<div class = "login_id">
				 <h4>HandPhone<span style="color:red">*</span></h4>
                <input type="text" name="hp" id="hp" placeholder="HP">
		   </div>
          
			
            <div class="submit">
                <input type="submit" value="SignUp" >
            </div>
			<div style="padding:3px"></div>
			 <div class="forgot_pw">
                <a href="login.php">Go login</a>
				|
				 <a href="../index.php">Go Home</a>
			</div>
        </div>
    </div>
</form>
</body>
</html>

<script   src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>

function checkId(){
	  var id = document.getElementById('id').value;
	$.ajax({
		type : 'POST', 
		url : 'check_id.php', 
			data : {id : id}, 
			datatype: 'text',
			error:function(){alert('통신실패!');},
			success : function(result){ 

				if(result == 0){ 
					document.getElementById('check_id').innerHTML='사용가능한 id입니다.'
					document.getElementById('check_id').style.color='blue';
				} 
				else { 
					document.getElementById('check_id').innerHTML='사용 중인 id입니다.';
					document.getElementById('check_id').style.color='red'; 
				} 
			} 
	});

}

function check_pw(){
	 if(document.getElementById('pw').value !='' && document.getElementById('pw2').value!=''){
		if(document.getElementById('pw').value==document.getElementById('pw2').value){
			document.getElementById('check').innerHTML='비밀번호가 일치합니다.'
			document.getElementById('check').style.color='blue';
		}
		else{
			document.getElementById('check').innerHTML='비밀번호가 일치하지 않습니다.';
			document.getElementById('check').style.color='red';
		}
	}
}
function fsignform_submit(f)
{

  if (f.name.value.length < 1) { 
		alert("이름을 입력하세요.");
		f.name.focus();
		return false;
	}

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
	if (f.email.value.length < 1) {
		alert("이메일을 입력하세요.");
		f.email.focus();
		return false;
	}

}

</script>