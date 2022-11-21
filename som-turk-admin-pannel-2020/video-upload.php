<?php include_once("main-top-header.php"); ?>
<!-- Navigation -->
<?php include("top-header-main.php"); ?>
<!-- Main layout -->
<!-- Navbar -->
<?php include("nav-bar.php"); ?>
<link rel="stylesheet" href="gallery/gallery.bootstrap.min.css">
    <!-- Latest compiled and minified CSS -->   
    <link rel="stylesheet" href="gallery/jquery.fancybox.min.css" media="screen">
    <script src="gallery/jquery.min.js"></script>
    <script src="gallery/jquery.fancybox.min.js"></script>
    <style type="text/css">
    .gallery
    {
        display: inline-block;
        margin-top: 20px;
    }
	.img-responsive {
		height:100px;
		}
	
    .close-icon{
    border-radius: 50%;
        position: absolute;
        right: 5px;
        top: -10px;
        padding: 5px 8px;
    }
        .form-image-upload{
            background: #e8e8e8 none repeat scroll 0 0;
            padding: 15px;
        }
    </style>

<div class="container pt-5">
    <h3>SOMTURK Video Gallery</h3>
    <form action="videoUpload.php" class="form-image-upload" method="POST" enctype="multipart/form-data">

        <div class="col-md-5">
                <strong>Title:</strong>
                <input type="text" name="title" class="form-control" placeholder="Title">
            </div>
            <div class="col-md-5">
                <strong>Video:</strong>
                <input type="file" name="uploadvideo" class="form-control">
            </div>
            <div class="col-md-2">
                <br/>
                <button type="submit" class="btn btn-success">Upload</button>
            
        </div>


    </form> 
    <div class="row">
    <div class='list-group gallery'>
		<?php
		require_once("common/db_func.php");
		$conn = db_connect();	

		$query = sprintf("SELECT * FROM tbl_video" );
		$images = db_select_query($conn, $query, $rs_images);      

		for($image=0; $image<$images; $image++){
		?>
			<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure To delete?');
}
</script>
			<div class='col-sm-4 col-xs-6 col-md-3 col-lg-3 p-5'>
			<video width="300" height="200" controls>
			<source src="../video/<?php echo $rs_images[$image]['name']; ?>" type="video/mp4" class="p-5">
			</video>
			<div class='text-center'>
			<small class='text-muted'><?php echo $rs_images[$image]["title"]; ?></small>
			</div> <!-- text-center / end -->

			<a onclick="return checkDelete()" href="videoDelete.php?video-id=<?php echo $rs_images[$image]["id"]; ?>"                    
			<button type="submit" class="close-icon btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button></a>
			</div> <!-- col-6 / end -->
            <?php } ?>


        </div> <!-- list-group / end -->
    </div> <!-- row / end -->
</div> <!-- container / end -->


</body>


<script type="text/javascript">
    $(document).ready(function(){
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });
    });
</script>
</html>