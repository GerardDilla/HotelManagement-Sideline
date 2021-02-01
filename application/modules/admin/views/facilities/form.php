<link type="text/css" href="<?php echo base_url('assets/admin/plugins/redactor/redactor.css');?>" rel="stylesheet" />
<link href="<?php echo base_url('assets/admin/plugins/responsivetabs/responsive-tabs.css')?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/admin/plugins/responsivetabs/style.css')?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/admin/plugins/iCheck/all.css')?>" rel="stylesheet" type="text/css" />
<?php  $seg= $this->uri->segment(4);?>
<section class="content-header">
          <h1>
            <?php echo $page_title; ?>
           </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo site_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> <?php echo lang('dashboard')?></a></li>
			<li><a href="<?php echo site_url('admin/facilities') ?>"> <?php echo lang('facilities')?> </a></li>
            <li class="active"><?php echo (empty($seg))?lang('add'):lang('edit');?></li>
          </ol>
</section>
<section class="content">
    	 
		  <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body">
					
				<form method="post" action="<?php echo site_url('admin/facilities/form/'.$id); ?>" enctype="multipart/form-data">	
					<div id="responsiveTabsDemo">
						<ul>
							<li><a href="#tab-1"> <?php echo lang('details')?> </a></li>
							<li><a href="#tab-2"> <?php echo lang('images')?></a></li>
						</ul>
						
						<div id="tab-1"> 
								<div class="form-group">
								  <div class="row">
									<div class="col-md-2">
										<label><?php echo lang('title') ?></label>
									</div>
									<div class="col-md-4">
										<?php
											$data	= array('name'=>'title', 'value'=>set_value('title', $title), 'class'=>'form-control');
											echo form_input($data); ?>
									</div>	
								  </div>		
								</div>
								<div class="form-group">
								  <div class="row">
									<div class="col-md-2">
										<label><?php echo lang('slug') ?></label>
									</div>
									<div class="col-md-4">
										<?php
											$data	= array('name'=>'slug', 'value'=>set_value('slug', $slug), 'class'=>'form-control');
											echo form_input($data); ?>
											</div>	
								  </div>		
								</div>
								<div class="form-group">
								  <div class="row">
									<div class="col-md-2">
										<label><?php echo lang('description') ?></label>
									</div>
									<div class="col-md-8">	
										<textarea name="description" class="form-control redactor"><?php echo $description?></textarea>
									</div>	
								  </div>		
								</div>
								
								<div id="tab-2">
								<div class="form-group ">
								<div class="input_fields_wrap">
								<?php if(!$id){?>
								  <div class="row ">
									<div class="col-md-3">
										<label><?php echo lang('image') ?></label>
										<input type="file" name="image[]" class="form-control" id="1"  onchange="readURL(this,blah1);"   />
									</div>	
									<div class="col-md-2  blah1"  >
												<img class="blah hide" src="#" alt="your image" id="blah1" />
									</div>
										<div style="padding-top:20px;"><button class="add_field_button btn btn-success"><?php echo lang('add_more');?></button>
									</div>
								 </div>	
								 <?php } ?>
									<?php if($id){?>
									<?php if(empty($images)){?>
										<div class="row ">
										<div class="col-md-3">
											<label><?php echo lang('image') ?></label>
											<input type="file" name="image[]" class="form-control" id="1"  onchange="readURL(this,blah1);"   />
										</div>	
										<div class="col-md-2  blah1"  >
													<img class="blah hide" src="#" alt="your image" id="blah1" />
										</div>
											<div style="padding-top:20px;"><button class="add_field_button btn btn-success"><?php echo lang('add_more');?></button>
										</div>
									 </div>	
									<?php } ?>
									
									<?php $i=0;foreach($images as $img){?>
									<div class="row ">
										<div class="col-md-3 ">
											<label><?php echo lang('image') ?></label>
											<input type="file" name="image[]" class="form-control imgchange"  id="<?php echo $img->id?>"onchange="readURL(this,urblah<?php echo $i?>);" />
										</div>	
										<div class="col-md-2  urblah<?php echo $i?>"  >
													<img class="blah " src="<?php echo base_url('assets/admin/uploads/gallery/small/'.$img->image)?>" alt="your image" id="urblah<?php echo $i?>" width="100" height="80" />
										</div>
										<div class="col-md-3" style="padding-top:10px;">
											<input type="radio" name="featured" value="1" id="<?php echo $img->id?>" class="featured" <?php echo ($img->is_featured==1)?'checked="checked"':''?>  /> <?php echo lang('featured_image')?>
										</div>
										<?php if($i==0){?>
											<div style="padding-top:20px;"><button class="add_field_button btn btn-success"><?php echo lang('add_more');?></button></div>
										<?php }else{?>	
											<div class="col-md-2"><div style="padding-top:20px;"><a href="#" id="<?php echo $img->id?>" class="remove_fieldedit btn btn-danger">Remove</a></div></div>
										<?php } ?>
									</div>
								  <?php $i++;}
									}
								  ?>
								  
								  
									
								 </div>
									
								 </div>
								</div>
						</div>
					</div>
					
					
					<div class="box-footer">
							<input class="btn btn-primary" type="submit" value="Save"/>
					</div>
					</form>
     			 </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section>




<script type="text/javascript" src="<?php echo base_url('assets/admin/plugins/redactor/redactor.min.js');?>"></script>		
<script src="<?php echo base_url('assets/admin/plugins/iCheck/icheck.min.js')?>" type="text/javascript"></script>		
<script src="<?php echo base_url('assets/admin/plugins/responsivetabs/jquery.responsiveTabs.min.js')?>" type="text/javascript"></script>
<script>
$(function() {
	$('#responsiveTabsDemo').responsiveTabs({
    	startCollapsed: 'accordion',
		<?php
		 if(isset($_GET['show'])){?>
		active: 1,
		<?php } ?>
	});
	$('.redactor').redactor({
			  // formatting: ['p', 'blockquote', 'h2','img'],
            minHeight: 200,
            imageUpload: '<?php echo site_url('/wysiwyg/upload_image');?>',
            fileUpload: '<?php echo site_url('/wysiwyg/upload_file');?>',
            imageGetJson: '<?php echo site_url('/wysiwyg/get_images');?>',
            imageUploadErrorCallback: function(json)
            {
                alert(json.error);
            },
            fileUploadErrorCallback: function(json)
            {
                alert(json.error);
            }
      });
});



