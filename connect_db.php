<?
$conn = mysqli_connect(
  'localhost',
  'root',
  'fnxm@328',
  'jeyeon_lib');

  if ( mysqli_connect_errno() )

	{

	echo "DB 연결에 실패했습니다 " . mysqli_connect_error();

	}

mysqli_query ($conn, 'SET NAMES euckr'); 

?>