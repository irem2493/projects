<?
	include ("../connect_db.php");
	
	header("Content-type: text/html; charset=euc-kr");
      if ( isset( $_SESSION[ 'adminId' ])) {
        unset($_SESSION['adminId']);
        echo "<script> alert('�α׾ƿ�!'); location.href='../index.php';</script>";
      } 
?>