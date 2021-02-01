  <?php  $seg= $this->uri->segment(4);?>
<section class="content-header">
          <h1>
            <?php echo $page_title; ?>
           </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo site_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> <?php echo lang('dashboard')?></a></li>
			<li><a href="<?php echo site_url('admin/facilities') ?>"> <?php echo lang('facility')?> </a></li>
            <li class="active"><?php echo lang('view');?></li>
          </ol>
</section>


<section class="content">
    	 
		  <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body">
					
					<div class="form-group">
					  <div class="row">
						<div class="col-md-2">
                      		<label><?php echo lang('name') ?></label>
                      	</div>
						<div class="col-md-4">
							<?php echo $facilities->title?>
						</div>	
					  </div>		
                    </div>
					<div class="form-group">
					  <div class="row">
						<div class="col-md-2">
                      		<label><?php echo lang('slug') ?></label>
                      	</div>
						<div class="col-md-4">
							<?php echo $facilities->slug?>
						</div>	
					  </div>		
                    </div>
					<div class="form-group">
					  <div class="row">
						<div class="col-md-2">
                      		<label><?php echo lang('description') ?></label>
                      	</div>
						<div class="col-md-4">
							<?php echo $facilities->description?>
						</div>	
					  </div>		
                    </div>
					

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section>
