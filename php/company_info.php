<?
	include  $_SERVER['DOCUMENT_ROOT']."/head.php";
?>
<!-- ������ ���� { -->

<div id="wrapper" style="height: 1550px">
    <div id="container_wr">
		<div id="container">
			<h2 id="container_title"><span title="ȸ��Ұ�">ȸ��Ұ�</span></h2>
			<div style = "text-align:center">
				<iframe width="90%" height="25%" src="https://www.youtube.com/embed/wpsQH_M8eYc"frameborder="0" allowfullscreen></iframe>
				
				<div style = "padding:15px; text-align:left" >
					<font size="3"><p style="line-height: 2.2;">���� �������ֳ����� ã���ֽ� ���Բ� ����帳�ϴ�.&nbsp;<br>17�⵿�� ���� ��ǻ�� ȸ�翡 �ٹ��ϴ� ȸ���� �л� �� �Ű����� ����� ���⿡ ������ �Ѷ��&nbsp;�� ���������� ����ϰ� �ֽ��ϴ�.&nbsp;��������� ���� ��,�ǻ糪 �屺�� �ƴ� ��������ڶ�� ���� ������ ����� ���̿� ���� ������&nbsp;���� �Խ��ϴ�.&nbsp;����� �����Կ� �־� ���� ���� ����� �ƴ� �߻��� ��ȯ�� ���� ����ȭ�� ���, ����� IT ���&nbsp;�׸��� ��ȭ�� ������ ����� �� �ִ� ��ó����� ��ǥ�� �ϰ� �ֽ��ϴ�. ���� ģȯ�� �������&nbsp;���� ������ ��ġ�� �ֽ��ϴ�.&nbsp;�������� ���ڰ��� �����Ͽ����� ȯ����� ���п��̳� ������� �ְ�濵�ڰ���, ��ó�������&nbsp;���� �����ϸ鼭 ����ִ� ����� ����� ���� �ּ��� ���ϰ� �ֽ��ϴ�.&nbsp;����ȭ�� ���(1.5�� ���, Ÿ�̺����)�� ���� ������� ��ȭ�ϰ� �ְ�, �� 3,000 ������ ��ʹ�ǥ�� ���Ǹ� ���� �Բ� �߻� �� �ִ� ����� �� �� �ֵ��� ����ϰ� ������ �Ǳ������ϴ� ����&nbsp;����ε�� ����ϰ� �����ذ��� �ֽ��ϴ�.&nbsp;���� ����Ư����ġ������ �����ϴ� ���ְ���� ��ȭ ���ſ����ܿ�����, ��������û���� �ְ��ϴ�&nbsp;�Ѷ�� Ưȭ������̳� ������ ������� Ȱ���ϰ� �ֽ��ϴ�.&nbsp;<br>������ ����ϴ� �������ֳ����� �ǰڽ��ϴ�.&nbsp;�� �������� ���� ���� ��Ź�帮�ڽ��ϴ�. &nbsp;�����մϴ�.</p></font>
					<br>
					<font size="4"><span style="color:tomato; font-weight:bold">�������ֳ���</span>&nbsp;</font>
					<span style="font-weight:bold"><font size="4">��ǥ �� �� ��</font></span>
				</div>
			</div>
			<h2 id="container_title"><span title="ã�ƿ��� ��">ã�ƿ��� ��</span></h2>
			<div id="map" style="width:90%;height:25%; text-align:center;">
				<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=	357853be80c2505076315b08259507aa"></script>
				<script type="text/javascript">
					var container = document.getElementById('map'); //������ ���� ������ DOM ���۷���
					var options = { //������ ������ �� �ʿ��� �⺻ �ɼ�
						center: new kakao.maps.LatLng(33.263103, 126.603763), //������ �߽���ǥ.
						level: 3 //������ ����(Ȯ��, ��� ����)
					};

				var map = new kakao.maps.Map(container, options); //���� ���� �� ��ü ����
				var mapTypeControl = new kakao.maps.MapTypeControl();

				// ������ ��Ʈ���� �߰��ؾ� �������� ǥ�õ˴ϴ�
				// kakao.maps.ControlPosition�� ��Ʈ���� ǥ�õ� ��ġ�� �����ϴµ� TOPRIGHT�� ������ ���� �ǹ��մϴ�
				map.addControl(mapTypeControl, kakao.maps.ControlPosition.TOPRIGHT);

				// ���� Ȯ�� ��Ҹ� ������ �� �ִ�  �� ��Ʈ���� �����մϴ�
				var zoomControl = new kakao.maps.ZoomControl();
				map.addControl(zoomControl, kakao.maps.ControlPosition.RIGHT);

				// ������ Ŭ���� ��ġ�� ǥ���� ��Ŀ�Դϴ�
				var marker = new kakao.maps.Marker({ 
					// ���� �߽���ǥ�� ��Ŀ�� �����մϴ� 
					position: map.getCenter() 
				}); 
				// ������ ��Ŀ�� ǥ���մϴ�
				marker.setMap(map);
				</script>
			</div>
			<div style = "padding:15px; text-align:left" >
			<font size="3"><p style="line-height: 2.2;">
			���ֱ������� ������<br>
			1. 181��, 622�� ȯ��<br>
			2. 181��, 510�� ȯ��<br>
			3. 132��, 295�� ȯ��<br>
			4. 102��, 231�� ȯ��<br>
			</p></font>
			</div>
		</div>
	</div>
</div>
<?
	include  $_SERVER['DOCUMENT_ROOT']."/tail.php";
?>
