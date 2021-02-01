<link href="<?php echo base_url('assets/front/plugins/prettyphoto/css/')?>/prettyPhoto.css" rel="stylesheet" type="text/css" media="all" />
<div class="site-blocks-cover overlay" style="background-image: url(../images2/image_777.jpg); " data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row2 align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <span class="caption mb-3 text-center" style = "margin-top:205px;"  >Discover Hotel Dominico</span>
              <h1 class="mb-4"  >Gallery Page</h1>
            </div>
          </div>
        </div>
      </div>  
<!-- breadcrumbs -->
<div class="services-top-breadcrumbs">
	<div class="container">
		<div class="services-top-breadcrumbs-right">
			<ul>
				<li ><a class = "rates" href="<?php echo site_url()?>">Home</a> <i>/</i></li>
				<li class = "rates"><?php echo lang('gallery')?></li>
			</ul>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- //breadcrumbs -->

<div class="testimonials">
    <div class="container">
        <div class="row">
			<h3 class = "contentdesc"><span><?php echo lang('gallery')?></span></h3>
            <div class="panel-primary margin-40-y" >
    			<div class="panel-body">
                    <div class="gal-btm">	
    					<ul class="portfolio-filter text-center">
    					<li><a class="btn btn-primary active" href="#" data-filter="*">All</a></li>
    					<?php 	foreach($gallery as $gal){?>
    						<li><a class="btn btn-primary" href="#" data-filter=".filter<?php echo $gal->id ?>"><?php echo $gal->title; ?></a></li>
    					<?php  } ?>
    					
    					</ul> 
    					<div class="row">
    						<div class="portfolio-items">
    						<?php 
                            $i = 1;
                            foreach($images as $img){?>
    							<div class="portfolio-item filter<?php echo $img->gallery_id ?> col-xs-12 col-sm-4 col-md-4">
    								<div class="recent-work-wrap">
    									<img class="img-responsive" src="<?php echo base_url('assets/admin/uploads/gallery/medium/'.$img->image)?>" alt="">
    										<div class="overlay">
    											<div class="recent-work-inner">
    												<h3><a href="#"><?php echo $img->caption?></a></h3>
    												<a class="preview" href="<?php echo base_url('assets/admin/uploads/gallery/medium/'.$img->image)?>" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
    											</div>
    										</div>
    								</div>
    							</div>
    						<?php
                            if($i%3 == 0){
                                echo '</div></div>';
                                echo '<div class="row"><div class="portfolio-items">';
                            } 
                            $i++;
                            } ?>
    						</div> 
    					</div>		
    			 </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/front/plugins/prettyphoto/js/')?>/jquery.prettyPhoto.js"></script>
<script src="<?php echo base_url('assets/front')?>/js/jquery.isotope.min.js"></script>	
<script src="<?php echo base_url('assets/front')?>/js/wow.min.js"></script>	

<script>
jQuery(function($){'use strict',//#main-slider
new WOW().init();$(window).load(function(){'use strict';var $portfolio_selectors=$('.portfolio-filter >li>a');var $portfolio=$('.portfolio-items');$portfolio.isotope({itemSelector:'.portfolio-item',layoutMode:'fitRows'});$portfolio_selectors.on('click',function(){$portfolio_selectors.removeClass('active');$(this).addClass('active');var selector=$(this).attr('data-filter');$portfolio.isotope({filter:selector});return false;});});$("a[rel^='prettyPhoto']").prettyPhoto({social_tools:false});});
</script>