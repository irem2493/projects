<?
	include  $_SERVER['DOCUMENT_ROOT']."/head.php";
?>
<!-- 콘텐츠 시작 { -->

<div id="wrapper" style="height: 1550px">
    <div id="container_wr">
		<div id="container">
			<h2 id="container_title"><span title="회사소개">회사소개</span></h2>
			<div style = "text-align:center">
				<iframe width="90%" height="25%" src="https://www.youtube.com/embed/wpsQH_M8eYc"frameborder="0" allowfullscreen></iframe>
				
				<div style = "padding:15px; text-align:left" >
					<font size="3"><p style="line-height: 2.2;">저희 샛별감귤농장을 찾아주신 고객님께 감사드립니다.&nbsp;<br>17년동안 대기업 컴퓨터 회사에 근무하다 회사의 분사 및 매각으로 현재는 고향에 내려와 한라봉&nbsp;및 노지감귤을 재배하고 있습니다.&nbsp;어려서부터 꿈이 검,판사나 장군이 아닌 농업지도자라고 말할 정도로 농업과 농촌에 많은 관심을&nbsp;가져 왔습니다.&nbsp;농업에 종사함에 있어 기존 관행 농업이 아닌 발상의 전환을 통한 차별화된 농업, 농업과 IT 산업&nbsp;그리고 문화와 예술이 접목될 수 있는 벤처농업을 목표로 하고 있습니다. 물론 친환경 농업에도&nbsp;많은 열정을 바치고 있습니다.&nbsp;공과대학 전자과를 졸업하였지만 환경관련 대학원이나 농업관련 최고경영자과정, 벤처농업대학&nbsp;등을 수료하면서 희망있는 농업을 만들기 위해 최선을 다하고 있습니다.&nbsp;차별화된 농업(1.5차 농업, 타이벡농법)을 통해 경쟁력을 강화하고 있고, 연 3,000 여명에게 사례발표나 강의를 통해 함께 잘살 수 있는 농업이 될 수 있도록 노력하고 있으며 의기투합하는 젊은&nbsp;농업인들과 토론하고 공부해가고 있습니다.&nbsp;또한 제주특별자치도에서 추진하는 감귤경쟁력 강화 혁신연구단원으로, 농촌진흥청에서 주관하는&nbsp;한라봉 특화사업단이나 컨설팅 요원으로 활동하고 있습니다.&nbsp;<br>꾸준히 노력하는 샛별감귤농장이 되겠습니다.&nbsp;고객 여러분의 많은 관심 부탁드리겠습니다. &nbsp;감사합니다.</p></font>
					<br>
					<font size="4"><span style="color:tomato; font-weight:bold">샛별감귤농장</span>&nbsp;</font>
					<span style="font-weight:bold"><font size="4">대표 김 종 우</font></span>
				</div>
			</div>
			<h2 id="container_title"><span title="찾아오는 길">찾아오는 길</span></h2>
			<div id="map" style="width:90%;height:25%; text-align:center;">
				<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=	357853be80c2505076315b08259507aa"></script>
				<script type="text/javascript">
					var container = document.getElementById('map'); //지도를 담을 영역의 DOM 레퍼런스
					var options = { //지도를 생성할 때 필요한 기본 옵션
						center: new kakao.maps.LatLng(33.263103, 126.603763), //지도의 중심좌표.
						level: 3 //지도의 레벨(확대, 축소 정도)
					};

				var map = new kakao.maps.Map(container, options); //지도 생성 및 객체 리턴
				var mapTypeControl = new kakao.maps.MapTypeControl();

				// 지도에 컨트롤을 추가해야 지도위에 표시됩니다
				// kakao.maps.ControlPosition은 컨트롤이 표시될 위치를 정의하는데 TOPRIGHT는 오른쪽 위를 의미합니다
				map.addControl(mapTypeControl, kakao.maps.ControlPosition.TOPRIGHT);

				// 지도 확대 축소를 제어할 수 있는  줌 컨트롤을 생성합니다
				var zoomControl = new kakao.maps.ZoomControl();
				map.addControl(zoomControl, kakao.maps.ControlPosition.RIGHT);

				// 지도를 클릭한 위치에 표출할 마커입니다
				var marker = new kakao.maps.Marker({ 
					// 지도 중심좌표에 마커를 생성합니다 
					position: map.getCenter() 
				}); 
				// 지도에 마커를 표시합니다
				marker.setMap(map);
				</script>
			</div>
			<div style = "padding:15px; text-align:left" >
			<font size="3"><p style="line-height: 2.2;">
			제주국제공항 버스편<br>
			1. 181번, 622번 환승<br>
			2. 181번, 510번 환승<br>
			3. 132번, 295번 환승<br>
			4. 102번, 231번 환승<br>
			</p></font>
			</div>
		</div>
	</div>
</div>
<?
	include  $_SERVER['DOCUMENT_ROOT']."/tail.php";
?>
