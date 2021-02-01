<?php
class Facilities extends Front_Controller {

	function __construct()
	{		
		parent::__construct();
		$this->load->model(array('facilities_model','homepage_model'));
	}
	
	function index()
	{
		
		$data['page_title']		= lang('facilities');
		$data['meta_description']	=	$this->setting->meta_description;
		$data['meta_keywords']		=	$this->setting->meta_keywords;	
		$data['facilities']		= $this->facilities_model->get_facilities_all();
		//$data['gallery']		= $this->gallery_model->get_gallery();
		//$data['images']			= $this->gallery_model->get_images();
			//echo '<pre>'; print_r($data['coupons']);die;
		$this->render('facilities/facilities', $data);		
	}
	
	function facility($id)
	{
		$data['facility']			=	$facility	=	 $this->facilities_model->get_facility_type($id);
		
		$data['facilities']			= $this->facilities_model->get_facility_types();
		$data['images']				= $this->facilities_model->get_images($id);
			//echo '<pre>'; print_r($data['images']);die;
		$data['meta_description']	=	$this->setting->meta_description;
		$data['meta_keywords']		=	$this->setting->meta_keywords;	
		$data['page_title']		= $facility->title;
		
		//$data['testimonials']	= $this->testimonial_model->get_all();
		$this->render('facilities/facility', $data);		
	}
}