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
	
    
        
			<br>
			<?php $i=0; foreach($room_types as $rt): ?>

				<?php 			
					$rt_image	=	get_room_type_featured_image_medium($rt->id);
					$amenities	=	$this->homepage_model->get_amenities($rt->id);
				?>
			<div class="row">
				<div class="col-md-3">
				
				</div>
				<div class="col-md-6 bg-light">
					<div class="row">
						<div class="col-md-6">
							<img src="<?php echo $rt_image?>" style="width:100%; height:auto"/>
						</div>
						<div class="col-md-6">
							<h1 style="margin:5%"><b class = "roomname"href="<?php echo site_url('rooms/'.$rt->slug)?>"><?php echo $rt->title?></b></h1>
							<h4 style="margin:5%"><?php echo substr($rt->description,0,200)?></h4>
							<ul class="items list-inline" style="margin:5%">
								<?php foreach($amenities as $am):?>
									<li class = "amenitiesmargin"><img src="<?php echo base_url('assets/admin/uploads/amenities/'.$am->image)?>" class="img-responsive gray " width="25" title="<?php echo $am->name?>" data-toggle="tooltip"/></li>
								<?php endforeach; ?>	
							</ul>
							<br>
							<div class="row" >
								<div class="col-md-12">
									<h4 class="text-uppercase">
										<?php echo lang('from')?> 
										<?php echo $this->session->userdata('currency_sybmol'); ?> 
										<?php echo rate_exchange($rt->base_price)?> 
										<span class="small rates"> / <?php echo lang('night')?></span>
									</h4>
								</div>
								<div class="col-md-6">
									<!-- <form method="get" action="<?php echo site_url('front/book/index')?>">
										<input type="hidden" name="date_from" value="<?php echo @$_GET['date_from']?>" />
										<input type="hidden" name="date_to" value="<?php echo @$_GET['date_to']?>" />
										<input type="hidden" name="adults" value="<?php echo @$_GET['adults']?>" />
										<input type="hidden" name="kids" value="<?php echo @$_GET['kids']?>" />
										<input type="hidden" name="room_type" value="<?php echo $rt->id?>" />
										
									</form> -->
									<a style = "color:black;"href="<?php echo site_url('rooms/'.$rt->slug)?>"><button type="submit" style="width:100%" class = "btnbook">Room Details</button></a>
								</div>
								<div class="col-md-6">
									<form method="post" action="<?php echo site_url('page/room-availability')?>" target="_blank">
										<input type="hidden" name="room_type_id" value="<?php echo $rt->id?>" />
										<button type="submit" style="width:100%" class = "btnbook">Check Availability</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
				
				</div>
				<div class="col-md-12">
					<br>
				</div>
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
