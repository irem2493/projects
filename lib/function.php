
<SCRIPT LANGUAGE="JavaScript">
function is_member(){
	var is_member = "<?= $is_member ?>";
	var is_admin = "<?= $is_admin ?>";
	if( ! is_member && !is_admin){
		alert("로그인을 해야 글을 쓸 수 있습니다!");
		location.href = "";
	}else location.href = "write.php";
}



var ox_value = 0;

/* 관리자 - 게시판 선택 삭제 */
function check_list(){
	var name	= 'chk[]';
	var lng		= document.getElementsByName(name).length;
	var ox		= '';

	if(ox_value == 0)
	{
		ox			= true;
		ox_value	= 1;
	} else {
		ox			= false;
		ox_value	= 0;
	}

	for( var i = 0; i < lng; i++)
	{
		document.getElementsByName(name)[i].checked = ox;
	}
}

function is_checked(elements_name)
{
    var checked = false;
    var chk = document.getElementsByName(elements_name);
    for (var i=0; i<chk.length; i++) {
        if (chk[i].checked) {
            checked = true;
        }
    }
    return checked;
}

function fboardlist_submit(f){
	if (!is_checked("chk[]")) {
		alert("선택삭제 하실 항목을 하나 이상 선택하세요.");
		return false;
	}
	
	if(!confirm("선택한 자료를 정말 삭제하시겠습니까?")) {
		return false;
	}
}
function check_delete(){
	
	
	
	var chk = document.getElementsByName('chk[]');
	var idx = document.getElementsByName('idx[]');
	var Url = "./check_delete.php";
	
	var check = [];	var idxArray = [];
	for (i=0; i<chk.length; i++)
		{
			// 실제 번호를 넘김
			check[i] = chk[i].value;
			idxArray[i] = idx[i].value;
		}
	
	$.ajax({
		type : 'POST', 
		url : Url, 
		data : {check : check, idxArray : idxArray}, 
		error:function(){alert('통신실패!');},
		success : function(result){ 

			if(result){ 
				alert('선택된 게시물이 삭제되었습니다.');
				location.reload();
			} else alert('삭제 실패.');
		} 
	});
}


</script>

