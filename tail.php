<div id="ft">
	<div id="ft_wr">
		<div id="ft_link" class="ft_cnt">
            <a href="/php/company_info.php">회사소개</a>
			<a href="/php/product_info.php">상품소개</a>
			<a href="/php/board/board_list.php">공지사항</a>
        </div>
		<div id="ft_company" class="ft_cnt2">
        	<h2>사이트 정보</h2>
	        <p class="ft_info">
	        	회사명 : 제주샛별한라봉농장 / 대표 : 김종우<br>
				주소  : 제주특별자치도 서귀포시 신효동 1124<br>
				전화 : 064-767-0878<br>
				홈페이지에 게시된 이메일 주소가 자동 수집되는 것을 거부하며, 위반시 정보통신망법에 의해 처벌될 수 있습니다.
			</p>
	    </div>
		<div id="ft_account" class="ft_cnt">
        	<h2>계좌번호</h2>
	        <p class="ft_info">
	        	우리은행: 1002-000-201102<br>
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