	<!-- breadcrumbs -->

<div class="site-blocks-cover overlay" style="background-image: url(images2/image_13.jpg); " data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row2 align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <span class="caption mb-3 text-center" style = "margin-top:205px;"  >Luxurious Rooms</span>
              <h1 class="mb-4"  >Hotel Rooms</h1>
            </div>
          </div>
        </div>
      </div>  
	<div class="services-top-breadcrumbs">
		<div class="container">
			<div class="services-top-breadcrumbs-right">
				<ul>
					<li><a class = "rates" href="<?php echo site_url()?>">Home</a> <i>/</i></li>
					<li class = "rates"><?php echo lang('rooms_rates')?></li>
				</ul>
			</div>
			<div class="services-top-breadcrumbs-left">
				<h3 class = "rates"><?php echo lang('rooms_rates')?></h3>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //breadcrumbs -->

<div class="rooms-rates">
	
    
        

             <?php 
             $i=0;
             foreach($room_types as $rt):
             $rt_image	=	get_room_type_featured_image_medium($rt->id);
             $amenities	=	$this->homepage_model->get_amenities($rt->id);
             ?>
			 <div class="room-sec">
			 	<div class=" text-center">
			 
			 <div class = "container">
			 	<div class = "bg-light">
			 	 <div class = "row2">
			 	<div class = "col-md-4">
			 
                 <form method="get" action="<?php echo site_url('front/book/index')?>">
					<input type="hidden" name="date_from" value="<?php echo @$_GET['date_from']?>" />
					<input type="hidden" name="date_to" value="<?php echo @$_GET['date_to']?>" />
					<input type="hidden" name="adults" value="<?php echo @$_GET['adults']?>" />
					<input type="hidden" name="kids" value="<?php echo @$_GET['kids']?>" />
					<input type="hidden" name="room_type" value="<?php echo $rt->id?>" />
                    <img src="<?php echo $rt_image?>" alt="" class=" "style = "width:500px !important; height: 300px;" />
                    </div>
                    <div class = "col-md-8">
				    <h4 class = "rmname" ><a class = "roomname"href="<?php echo site_url('rooms/'.$rt->slug)?>"><?php echo $rt->title?></a></h4>
                   <h4 class = "roomdesc"><?php echo substr($rt->description,0,200)?></h4>
                    <ul class="items list-inline">
                        <?php foreach($amenities as $am):?>
							<li class = "amenitiesmargin"><img src="<?php echo base_url('assets/admin/uploads/amenities/'.$am->image)?>" class="img-responsive gray " width="25" title="<?php echo $am->name?>" data-toggle="tooltip"/></li>

						<?php endforeach; ?>	
   				    
   				    

   				    
                    <h4 class="text-uppercase roomfrom"><?php echo lang('from')?> <?php echo $this->session->userdata('currency_sybmol'); ?> <?php echo rate_exchange($rt->base_price)?> <span class="small rates"> / <?php echo lang('night')?></span></h4>
                    <div class="keywords" style = "margin-left: 240px;width:40% !important;">	
			   	         <button type="submit" class = "btnbook"><a style = "color:black;"href="<?php echo site_url('rooms/'.$rt->slug)?>">Room Details</a></button>
			   	         </div>
			   	         </div>
			   	         </div>
        			</div>
        		</div>
				</form>
			 </div>
             <?php 
             $i++;
			 if($i%4 == 0) :
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
