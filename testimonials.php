<div class="col-12 col-lg-12 home-testimonial">
          <h3 class="heading3-border text-uppercase">Bussiness and Social Events</h3>
          <div class="owl-carousel testimonial">            
            <?php
			require_once("som-turk-admin-pannel-2020/common/db_func.php");
			$conn = db_connect();	
			$query = sprintf("SELECT * FROM image_events" );
			echo $images = db_select_query($conn, $query, $rs_images);
			for($image=0; $image<$images; $image++){
			?>
			<div class="testimonial-item">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-5">
				 <div><img height="300" src="events/<?php echo $rs_images[$image]["image"]; ?>" alt=""/></div>
                  <!--<div><img src="assets/events/events1.jpg" alt=""/></div>-->
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7">
                  <div class="testimonial-content">
                    <p><?php echo $rs_images[$image]["title"]; ?></p>
                  </div>
                </div>
              </div>
            </div>
			 <?php } ?>
			<!--<div class="testimonial-item">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-5">
                  <div><img src="assets/events/events2.jpg" alt=""/></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7">
                  <div class="testimonial-content">
                    <p>Somturk host or sponsor a trade and bussiness discussion to reinforce their image as a bussiness leader among those who attend.</p>
                  </div>
                </div>
              </div>
            </div>
			<div class="testimonial-item">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-5">
                  <div><img src="assets/events/events3.jpg" alt=""/></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7">
                  <div class="testimonial-content">
                    <p>Somturk host or sponsor a trade and bussiness discussion to reinforce their image as a bussiness leader among those who attend.</p>
                  </div>
                </div>
              </div>
            </div>
			<div class="testimonial-item">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-5">
                  <div><img src="assets/events/events4.jpg" alt=""/></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7">
                  <div class="testimonial-content">
                    <p>Somturk host or sponsor a trade and bussiness discussion to reinforce their image as a bussiness leader among those who attend.</p>
                  </div>
                </div>
              </div>
            </div>
			<div class="testimonial-item">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-5">
                  <div><img src="assets/events/events3.jpg" alt=""/></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7">
                  <div class="testimonial-content">
                    <p>Somturk host or sponsor a trade and bussiness discussion to reinforce their image as a bussiness leader among those who attend.</p>
                  </div>
                </div>
              </div>
            </div>
			<div class="testimonial-item">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-5">
                  <div><img src="assets/events/events4.jpg" alt=""/></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7">
                  <div class="testimonial-content">
                    <p>Somturk host or sponsor a trade and bussiness discussion to reinforce their image as a bussiness leader among those who attend.</p>
                  </div>
                </div>
              </div>
            </div>
			<div class="testimonial-item">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-5">
                  <div><img src="assets/events/events5.jpg" alt=""/></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7">
                  <div class="testimonial-content">
                    <p>Somturk host or sponsor a trade and bussiness discussion to reinforce their image as a bussiness leader among those who attend.</p>
                  </div>
                </div>
              </div>
            </div>
			<div class="testimonial-item">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-5">
                  <div><img src="assets/events/events6.jpg" alt=""/></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7">
                  <div class="testimonial-content">
                    <p>Somturk host or sponsor a trade and bussiness discussion to reinforce their image as a bussiness leader among those who attend.</p>
                  </div>
                </div>
              </div>
            </div>
			<div class="testimonial-item">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-5">
                  <div><img src="assets/events/events7.jpg" alt=""/></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7">
                  <div class="testimonial-content">
                    <p>Somturk host or sponsor a trade and bussiness discussion to reinforce their image as a bussiness leader among those who attend.</p>
                  </div>
                </div>
              </div>
            </div>
			<div class="testimonial-item">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-5">
                  <div><img src="assets/events/events8.jpg" alt=""/></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7">
                  <div class="testimonial-content">
                    <p>Somturk host or sponsor a sports events reinforce their image as a bussiness leader among those who attend.</p>
                  </div>
                </div>
              </div>
            </div>
			<div class="testimonial-item">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-5">
                  <div><a class="latest-gallery" data-fancybox href="assets/videos/sport.mp4" title=""><i class="far fa-play-circle"></i><img src="assets/events/events9.jpg" alt="" /></a></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7">
                  <div class="testimonial-content">
                    <p>Somturk host or sponsor a sports events reinforce their image as a bussiness leader among those who attend.</p>
                  </div>
                </div>
              </div>
            </div>	-->
			
          </div>
		  
        </div>