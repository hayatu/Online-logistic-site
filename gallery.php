<!-- Freight Gallery Start -->
     <div class="container">
      <div class="row">
        <div class="col-12 col-lg-6 offset-lg-3">
          <div class="section-title wow fadeInUp">
            <h2>Photos Kargo Gallery</h2>
            
          </div>
        </div>
      </div>
      <div class="row">
        <ul class="simplefilter nav nav-pills d-block">
          <!-- Filter Wrapper Items Starts -->
          <li class="active" data-filter="*"><i class="fas fa-bars"></i> All</li>
          <li data-filter=".air">Air Freight</li>
          <li data-filter=".ocean">Ocean Freight</li>
          <li data-filter=".road">Road &amp; Retail Freight</li>
          <!-- Filter Wrapper Items Ends -->
        </ul>
      </div>
      <div class="row">
        <div class="filtr-container grid">
			<?php
			require_once("som-turk-admin-pannel-2020/common/db_func.php");
			$conn = db_connect();	
			$query = sprintf("SELECT * FROM image_gallery");
			$images = db_select_query($conn, $query, $rs_images);
			for($image=0; $image<$images; $image++){
			?>	  
		  <div class="col-12 col-sm-6 col-lg-6 col-xl-4 air ocean filtr-item">
		    <div class="pGallery-wrapper">
              <div class="pGallery-img"><a class="latest-gallery" data-fancybox href="gallery/<?php echo $rs_images[$image]["image"]; ?>" title=""><i class="fa fa-search-plus" aria-hidden="true"></i><img src="gallery/<?php echo $rs_images[$image]["image"]; ?>" alt="" /></a></div>
              <div class="freight-caption">
                <div class="label-text"> <a class="text-title"><?php echo $rs_images[$image]["title"]; ?></a></div>
              </div>
            </div>
          </div>
		    <?php } ?>
        </div>		
      </div>
	  <div class="row">
        <div class="col-12 col-lg-6 offset-lg-3 pt-5">
          <div class="section-title wow fadeInUp">
            <h2>Video Kargo Gallery</h2>
            
          </div>
        </div>
      </div>
	  <div class="row">
        <div class="filtr-container grid">
			<?php
			require_once("som-turk-admin-pannel-2020/common/db_func.php");
			$conn = db_connect();	
			$query = sprintf("SELECT * FROM tbl_video" );
			$images = db_select_query($conn, $query, $rs_images);
			for($image=0; $image<$images; $image++){
			?>	  
		  <div class="col-12 col-sm-6 col-lg-6 col-xl-4 air ocean filtr-item">
		    <div class="pGallery-wrapper">
              <div class="pGallery-img"><a class="latest-gallery" data-fancybox="" href="video/<?php echo $rs_images[$image]['name']; ?>" title=""><img src="video/thumbnail.png" alt=""></a></div>
			  <div class="freight-caption">
                <div class="label-text"> <a class="text-title"><?php echo $rs_images[$image]["title"]; ?></a></div>
              </div>
            </div>
          </div>
		    <?php } ?>   
        </div>		
      </div>
    </div>

  <!-- Freight Gallery end --> 