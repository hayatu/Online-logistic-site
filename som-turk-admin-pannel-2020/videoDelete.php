<?php
session_start();
  require_once("common/db_func.php");
	      $conn = db_connect();	
 $query1 = sprintf("select name from tbl_video where id = %s", 
							GetSQLValueString($_REQUEST["video-id"], "int"));
$n1 = db_select_query($conn, $query1, $rs_image);
if ($n1 == 1) {
	if (file_exists($SOMTURK_Video_DIR.$rs_image[0]["name"])) unlink($SOMTURK_Video_DIR.$rs_image[0]["name"]);	
}

 $query2 = sprintf("DELETE FROM tbl_video WHERE id = %s", GetSQLValueString($_REQUEST["video-id"], "int") );
		$n2 = db_other_query($conn, $query2);
		//$sql = "DELETE FROM image_gallery WHERE id = ".$_POST['id'];
		//$mysqli->query($sql);
		$_SESSION['success'] = 'Image Deleted successfully.';
		header("Location: video-upload.php");
?>