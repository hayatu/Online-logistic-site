
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 require_once("common/db_func.php");
	      $conn = db_connect();	
		  if(isset($_POST) && !empty($_POST['title'])){
$name=$_FILES['uploadvideo']['name'];
 $type=$_FILES['uploadvideo']['type'];
//$size=$_FILES['uploadvideo']['size'];
$cname=str_replace(" ","_",$name);
$tmp_name=$_FILES['uploadvideo']['tmp_name'];
$target_path="../video/";
$target_path=$target_path.basename($cname);
if(move_uploaded_file($_FILES['uploadvideo']['tmp_name'],$target_path))
{
// $sql="INSERT INTO tbl_video(name,type) VALUE(%s, %s, %s)";

echo $query1 = sprintf("insert into tbl_video(name, type,title) values(%s, %s,%s)", 																								
									GetSQLValueString($name, "text"),
									GetSQLValueString($type, "text"),
									GetSQLValueString($_POST["title"], "text"));
			$n1 = db_other_query($conn, $query1);		
db_close($conn);
//echo "Your video ".$cname." has been successfully uploaded";
header("Location: video-upload.php");
}
}

?>
