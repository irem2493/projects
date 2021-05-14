<div id="ft">
	<div id="ft_wr">
		<div id="ft_link" class="ft_cnt">
            <a href="">회사소개</a>
        </div>
		<div id="ft_company" class="ft_cnt">
        	<h2>사이트 정보</h2>
	        <p class="ft_info">
	        	회사명 : Orange Form / 대표 : 오진영<br>
				주소  : OO도 OO시 OO구 OO동 123-45<br>
				사업자 등록번호  : 123-45-67890<br>
				전화 :  02-123-4567  팩스  : 02-123-4568<br>
			</p>
	    </div>
	</div>
	 <div id="ft_copy">Copyright &copy; <b>소유하신 도메인.</b> All rights reserved.</div>
	 </div>
   
	 <button type="button" id="top_btn">
    	<i class="fa fa-arrow-up" aria-hidden="true"></i><span class="sound_only">상단으로</span>
    </button>
    <script>
    $(function() {
        $("#top_btn").on("click", function() {
            $("html, body").animate({scrollTop:0}, '500');
            return false;
        });
    });
    </script>
</div>

</body>
</html>