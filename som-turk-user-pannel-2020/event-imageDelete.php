<?php
session_start();
require_once($_SERVER["DOCUMENT_ROOT"]."/configs.php");
  require_once("common/db_func.php");
	      $conn = db_connect();	
 $query1 = sprintf("select image from tbl_image_events where id = %s", 
							GetSQLValueString($_REQUEST["image-id"], "int"));
$n1 = db_select_query($conn, $query1, $rs_image);
if ($n1 == 1) {
	if (file_exists($SOMTURK_event_Image_DIR.$rs_image[0]["image"])) unlink($SOMTURK_event_Image_DIR.$rs_image[0]["image"]);	
}

 $query2 = sprintf("DELETE FROM tbl_image_events WHERE id = %s", GetSQLValueString($_REQUEST["image-id"], "int") );
		$n2 = db_other_query($conn, $query2);
		//$sql = "DELETE FROM image_gallery WHERE id = ".$_POST['id'];
		//$mysqli->query($sql);
		$_SESSION['success'] = 'Image Deleted successfully.';
		header("Location: event-gallery.php");
		
		
?>