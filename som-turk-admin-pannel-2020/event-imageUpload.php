<?php
session_start();
 require_once("common/db_func.php");
	      $conn = db_connect();	


if(isset($_POST) && !empty($_FILES['image']['name']) && !empty($_POST['title'])){


	$name = $_FILES['image']['name'];
	list($txt, $ext) = explode(".", $name);
	$image_name = time().".".$ext;
	$tmp = $_FILES['image']['tmp_name'];

	if(move_uploaded_file($tmp, '../events/'.$image_name)){
		
		$query1 = sprintf("insert into tbl_image_events(title, image) values(%s, %s)", 																								
									GetSQLValueString($_POST["title"], "text"),
									GetSQLValueString($image_name, "text"));
			$n1 = db_other_query($conn, $query1);		
		  
		$_SESSION['success'] = 'Image Uploaded successfully.';
		header("Location: event-gallery.php");
	}else{
		$_SESSION['error'] = 'image uploading failed';
		header("Location: event-gallery.php");
	}
}else{
	$_SESSION['error'] = 'Please Select Image or Write title';
	header("Location: event-gallery.php");
}


?>