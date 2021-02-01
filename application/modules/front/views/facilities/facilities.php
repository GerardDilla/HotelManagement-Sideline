<div class="site-blocks-cover overlay" style="background-image: url(../images2/image_777.jpg); " data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row2 align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <span class="caption mb-3 text-center" style = "margin-top:205px;"  >Discover Hotel Dominico</span>
              <h1 class="mb-4"  >Facilities</h1>
            </div>
          </div>
        </div>
      </div>  

      <div class="services-top-breadcrumbs">
	<div class="container">
		<div class="services-top-breadcrumbs-right">
			<ul>
				<li ><a class = "rates" href="<?php echo site_url()?>">Home</a> <i>/</i></li>
				<li class = "rates"><?php echo lang('facilities')?></li>
			</ul>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<div class="rooms-rates">
  
    
        

             <?php 
             $i=0;
             foreach($facilities as $ft):
             $ft_image  = get_facility_image($ft->id);
             
             ?>
       <div class="room-sec">
        <div class=" text-center">
          
       
       <div class = "container">
        <div class = "bg-light">
         <div class = "row2">
        <div class = "col-md-4">
       
                 
                    <img src="<?php echo $ft_image?>" alt="" class=" "style = "width:500px !important; height: 300px;" />
                    </div>
                    <div class = "col-md-8">
            <h4 class = "rmname" ><a class = "roomname"href="<?php echo site_url('facility/'.$ft->slug)?>"><?php echo $ft->title?></a></h4>
                   <h4 class = "facdesc"><?php echo substr($ft->description,0,200)?></h4>
                   <br>
                    <ul class="items list-inline">
                        
              
              

              
                    
                    <!-- <div class="keywords" style = "margin-left: 240px;width:40% !important;">  -->
                   <!-- <button type="submit" class = "btnbook"><a style = "color:black;"href="<?php echo site_url('facility/'.$ft->slug)?>">Facility Details</a></button> -->
                   <!-- </div> -->
                   </div>
                   </div>
              </div>
            </div>
        </form>
       </div>
             <?php 
             $i++;
       if($i%3 == 0) :
         echo ' <div class="clearfix"></div>
                     </div>
                   <div class="testimonials text-center">';
         endif;
       endforeach; 
             ?>
             <div class="clearfix"></div>
     
    </div>
</div>
</div>
</div>
<br>
