<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title><?php echo @$this->setting->name;?> | <?php echo @$page_title;?></title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="<?php echo @$meta_description?>" />
<meta name="keywords" content="<?php echo @$meta_keywords?>" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="<?php echo base_url('assets/front')?>/css/bootstrap2.css" rel="stylesheet" type="text/css" media="all" />
<link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap" rel="stylesheet">
<link href="<?php echo base_url('assets/front')?>/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />

<link href="<?php echo base_url('assets/front')?>/css/style-new.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url('assets/front/plugins/font-awesome/css')?>/font-awesome.min.css" rel="stylesheet" type="text/css" media="all"/>
<link href="<?php echo base_url('assets/front')?>/css/owl.carousel.css" rel="stylesheet" />
<link href="<?php echo base_url('assets/admin/plugins/toastr')?>/toastr.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url('assets/front')?>/css/flexslider.css" type="text/css" media="screen" />    



<!-- start-smoth-scrolling -->
<script>
	SITE_URL	=	'<?php echo site_url()?>';
	BASE_URL	=	'<?php echo base_url()?>';
</script>	
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="<?php echo base_url('assets/front')?>/js/jquery.min.js"></script>
<script src="<?php echo base_url('assets/front')?>/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/admin/plugins/')?>/jquery-validation/jquery.validate.min.js"></script><!-- Counter js --> 
<script src="<?php echo base_url('assets/front')?>/js/owl.carousel.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/front')?>/js/move-top.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/front')?>/js/easing.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/front')?>/js/client_captcha.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>


<style>
/* Captcha */
	p.wrong {
		display: none;
	}

	p.wrong.shake {
		display: block;
	}

	p.wrong.shake {
		animation: shake .4s cubic-bezier(.36, .07, .19, .97) both;
		transform: translate3d(0, 0, 0);
		backface-visibility: hidden;
		perspective: 1000px;
	}

	@keyframes shake {
		10%,
		90% {
			transform: translate3d(-1px, 0, 0);
		}
		20%,
		80% {
			transform: translate3d(1px, 0, 0);
		}
		30%,
		50%,
		70% {
			transform: translate3d(-2px, 0, 0);
		}
		40%,
		60% {
			transform: translate3d(2px, 0, 0);
		}
	}

	.controls img {
		height: 20px;
	}

</style>

</head>
<body>

<?php 
//echo json_encode($this->session->userdata('front_user'));
$currency	= $this->homepage_model->get_currency();
$langs	= $this->homepage_model->get_languages();
?>

<!-- header -->
	<div class="header">	
		<div class="header-top">
			<div class="container"> 
                <div class="row">
                    <div class="col-md-5">
        				<div class="header-top-left">
			       		 <ul>
        						<li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span><?php echo $this->setting->phone?></li>
        						<li><a href="mailto:<?php echo $this->setting->email?>"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> <?php echo $this->setting->email?></a></li>
        					</ul>

        				</div>
                    </div>
                    <div class="col-md-7 text-center curlang">
                       
						<?php 
							
							if(!is_array($this->front_user)){
								$this->front_user = array();
							}
						?>
    					<div class="navbar-nav nav ">
    						<?php if(count($this->front_user)<1):?>
               				        <li><a class = "lgn"data-target="#cs-login" href="#" data-toggle="modal" ><?php echo lang('login')?></a></li>
                   				    <li><a class = "lgn" data-target="#cs-signup" href="#" data-toggle="modal" ><?php echo lang('signup')?></a></li>
                			<?php endif; ?>

                			</div>
                			</div>
                    
                </div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="header-bottom">
			<div class="container">
				<nav class="navbar navbar-default">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
						<div class="logo">
							<img src="<?php echo base_url('assets/admin/uploads/images/hd1.png'); ?>" class="center" style="width:130px;height:90px;"/>
							
						
						</div>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
						<nav>
							<ul class="nav navbar-nav">
								<?php echo top_menu('header'); //Dynamic Menus?>
                                <?php if(count($this->front_user)>0):?>
                    				<li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                    						<?php echo $this->front_user['firstname']?> <?php echo $this->front_user['lastname']?> 
                    					</a>
                    					<ul class="dropdown-menu">
                    							 <li><a href="<?php echo site_url('front/account/profile')?>" > <i class="fa fa-user pull-left"></i> <?php echo lang('profile')?></a></li>
                    							 <li><a href="<?php echo site_url('front/account/bookings')?>" > <i class="fa fa-ticket pull-left"></i> <?php echo lang('my_bookings')?></a></li>
                    							 <li><a href="<?php echo site_url('front/payments')?>" > <i class="fa fa-credit-card pull-left"></i> <?php echo lang('payment')?></a></li>
                    							 <li><a href="<?php echo site_url('front/account/logout')?>" > <i class="fa fa-sign-out pull-left"></i>  <?php echo lang('logout')?></a></li>
                    					</ul>
                    				</li>	
                				<?php endif; ?>
                                
                                
                                
                				
							</ul>
						</nav>
					</div>
					<!-- /.navbar-collapse -->
				</nav>
			</div>
		</div>
	</div>
<!-- //header -->
    
<div id="cs-login" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        
      <div class="modal-header header-panal">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color:#FFFFFF"><?php echo lang('login')?></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="signinForm">
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label loginregister"><?php echo lang('email')?></label>
			<div class="col-sm-10">
			  <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" required  autocomplete='off'>
			</div>
		  </div>
		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label loginregister"><?php echo lang('password')?></label>
			<div class="col-sm-10">
			  <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" required autocomplete='off'>
			</div>
		  </div>

		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-theme loginregister"><?php echo lang('sign_in')?></button>
			  
			  <button type="submit" class="btn btn-theme loginregister" data-dismiss="modal" data-target="#cs-forgot" data-toggle="modal" >Forgot Password</button>
			</div>
		  </div>
		</form>
      </div>
      <div class="modal-footer " style="background-color:rgba(0, 173, 138, 0.06);">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close')?></button>
      </div>
    </div>

  </div>
</div>

<div id="cs-signup" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header-panal" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color:#FFFFFF"><?php echo lang('signup')?></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="signup_form" method="post">
		   <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label loginregister"><?php echo lang('firstname')?></label>
			<div class="col-sm-10">
			  <input type="text" name="firstname" class="form-control" id="sufirstname" required  autocomplete='off' placeholder="<?php echo lang('firstname')?>">
			</div>
		  </div>
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label loginregister"><?php echo lang('lastname')?></label>
			<div class="col-sm-10">
			  <input type="text" name="lastname" class="form-control"  id="sulastname" required  autocomplete='off' placeholder="<?php echo lang('lastname')?>">
			</div>
		  </div>
		   <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label loginregister"><?php echo lang('email')?></label>
			<div class="col-sm-10">
			  <input type="email" name="email" class="form-control" id="suemail" placeholder="Email" required  autocomplete='off'>
			</div>
		  </div>
		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label loginregister"><?php echo lang('password')?></label>
			<div class="col-sm-10">
			  <input type="password" name="password" class="form-control" id="supassword" placeholder="Password" required autocomplete='off'>
			</div>
		  </div>
		   <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label loginregister"><?php echo lang('password_confirm')?></label>
			<div class="col-sm-10">
			  <input type="password" name="confirm" class="form-control" id="suconfirm" placeholder="<?php echo lang('password_confirm')?>" required autocomplete='off'>
			</div>
		  </div>
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label loginregister"><?php echo lang('mobile')?></label>
			<div class="col-sm-10">
			  <input type="text" name="mobile" class="form-control" id="sumobile" placeholder="<?php echo lang('mobile')?>" required  autocomplete='off'>
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <!-- <button type="submit" class="btn btn-theme loginregister"><?php echo lang('signup')?></button> -->
			  	<div class="captcha-chat">
					<div class="captcha-container media">
						<div class="media-body">
							<p class="security">Security Check:</p>                
						</div>
						<div id="captcha">
							<div class="controls" >
								<input class="user-text btn-common" placeholder="Type here" type="text" />
								<button type="button" class=" refresh btn-common" style="width:38px; height:auto">
									<!-- this image should be converted into inline svg -->
									<img style="width:100%" src="<?php echo base_url('assets/front')?>/images/refresh_icon.png" alt="refresh icon">
								</button>
								<hr>
								<button type="button" class="btn btn-info validate btn-common loginregister" >
									<?php echo lang('signup')?>
									<!-- <img style="width:100%" src="<?php echo base_url('assets/front')?>/images/enter_icon.png" alt="submit icon"> -->
								</button>


							</div>
						</div>
						<!-- <p class="wrong info">Wrong!, please try again.</p> -->
						<p style="display:none" class="wrong info">Invalid!, please try again.</p>
					</div>
				</div>
			</div>
		  </div>



		  
		</form>
      </div>
      <div class="modal-footer" style="background-color:rgba(0, 173, 138, 0.06);">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close')?></button>

      </div>
    </div>

  </div>
</div>

<div id="cs-forgot" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header-panal">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color:#FFFFFF"><?php echo lang('i_forgot_my_password')?></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="forgotForm">
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label loginregister"><?php echo lang('email')?></label>
			<div class="col-sm-10">
			  <input type="email" name="email" class="form-control" id="femail" placeholder="Email" required  autocomplete='off'>
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-theme loginregister"><?php echo lang('get_reset_password_link')?></button>
			</div>
		  </div>
		</form>
      </div>
      <div class="modal-footer" style="background-color:rgba(0, 173, 138, 0.06);">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close')?></button>
      </div>
    </div>

  </div>
</div>

<script>
$( "#forgotForm" ).submit(function( event ) {
	event.preventDefault();
	var form = $(form).closest('form');
	call_loader();
	$.ajax({
		url: SITE_URL+'/front/homepage/get_password_link',
		type:'POST',
		data:$("#forgotForm").serialize(),
		success:function(result){
		//alert(result);return false;
			  if(result==1)
				{	remove_loader();
					$('#cs-forgot').modal('toggle');
					toastr.success('Password Reset Link Sent To Email');
			    }
				else
				{
					remove_loader();
					toastr.error('Email Not Found');
				}
		
		 }
	  });
});

$( "#signinForm" ).submit(function( event ) {
	event.preventDefault();
	var form = $(form).closest('form');
	call_loader();
	$.ajax({
		url: SITE_URL+'/front/homepage/login',
		type:'POST',
		data:$("#signinForm").serialize(),
		success:function(result){
		//alert(result);return false;
			  if(result==1)
				{
					toastr.success('You Logged In Successfully');
					//location.reload(); 
			   		window.location.reload()
			   }
				else
				{
					remove_loader();
					toastr.error(result);
					//$('#err').html(result);
				}
		
		 }
	  });
});

$( "#signup_form" ).submit(function( event ) {
	event.preventDefault();
	var form = $(form).closest('form');
	call_loader();
	$.ajax({
		url: SITE_URL+'/front/homepage/signup',
		type:'POST',
		data:$("#signup_form").serialize(),
		success:function(result){
		//alert(result);return false;
			  if(result==1)
				{
					//toastr.success('You Signup In Successfully');
					//location.reload(); 
			   		//window.location.reload();
					   	$.ajax({
							url: SITE_URL+'/front/homepage/login',
							type:'POST',
							data:$("#signup_form").serialize(),
							success:function(result){
							//alert(result);return false;
								if(result==1)
									{
										toastr.success('You Signup In Successfully');
										window.location.reload();
								}
									else
									{
										remove_loader();
										toastr.error(result);
										//$('#err').html(result);
									}
							
							}
						});
			   }
				else
				{
					remove_loader();
					toastr.error(result);
					//$('#err').html(result);
				}
		
		 }
	});
});

			$("#signup_form").validate({
				  rules: {
					sufirstname: { required: true},
					sulastname: { required: true},
					suemail: { required: true ,email: true},
					sumobile: { required: true},
					supassword: { required: true ,minlength: 4},
					suconfirm: { required: true, equalTo: "#su-password" },
				 },messages: {
                        sufirstname: {
                            required: "You must enter firstname",
                        },
						sulastname: {
                            required: "You must enter lastname",
                        },
						suemail: {
                            required: "You must enter email",
                         
                        }, 
						supassword: {
                            required: "You must enter password",
                         	minlength: "Password must be at least 4 characters long"
                        },
						suconfirm: {
                            required: "You must re-enter password ",
							equalTo: "Confirm passsword not macthed to Password",
						},
						sumobile: {
                            required: "You must enter mobile",
                        },
						
                    },submitHandler: function(form) {
						// do other things for a valid form
						//form.submit();
					  }
			});
			
				$("#signup_form").validate({ 
					submitHandler: function(form) {  
										   if ($(form).valid()) 
											   form.submit(); 
										   return false; // prevent normal form posting
									}
				});
                 
               
							    $(document).ready(function() {
							      $("#owl-demo").owlCarousel({
							        items : 1,
							        lazyLoad : true,
							        autoPlay : true,
							        navigation : false,
							        navigationText :  false,
							        pagination : true,
							      });
							    });
                                
                                
                                $(".currency-change").on('click',function() {   
                                	 var val = $(this).attr('id');
                                	 if(val){
                                	 	call_loader();
                                	 	$.ajax({
                                		url: '<?php echo site_url('front/homepage/change_currency') ?>',
                                		type:'POST',
                                		data:{currency_code:val},
                                		success:function(result){
                                		  
                                		  if(result==1){
                                		  	location.reload();
                                		  }
                                		}
                                	  });
                                	 }     
                                }); 
							    
			
		
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.body.scrollTop; //force css repaint to ensure cssom is ready

        var timeout; //global timout variable that holds reference to timer

        var captcha = new $.Captcha({
            onFailure: function() {

                $(".captcha-chat .wrong").show({
                    duration: 30,
                    done: function() {
                        var that = this;
                        clearTimeout(timeout);
                        $(this).removeClass("shake");
                        $(this).css("animation");
                        //Browser Reflow(repaint?): hacky way to ensure removal of css properties after removeclass
                        $(this).addClass("shake");
                        var time = parseFloat($(this).css("animation-duration")) * 1000;
                        timeout = setTimeout(function() {
                            $(that).removeClass("shake");
                        }, time);
                    }
                });

            },

            onSuccess: function() {

                $( "#signup_form" ).submit();
				
            }
        });

        captcha.generate();
    });
</script>