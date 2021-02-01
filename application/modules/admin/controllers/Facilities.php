<?php
class Facilities extends Admin_Controller {

	function __construct()
	{		
		parent::__construct();
		$this->load->model(array('facilities_model'));
	}
	
	function index()
	{	
		$data['page_title']	= lang('facilities');
		$data['facilities']	= $this->facilities_model->get_all();
			//echo '<pre>'; print_r($data['floors']);
		$this->render_admin('facilities/list', $data);		
	}
	function view($id,$tab=false){
		
		$data['facilities']			=	$facility		= $this->facilities_model->get($id);
		$data['page_title']	= lang('view')." ".lang('facility') ;
		$this->render_admin('facilities/view', $data);
	}
	function form($id = false)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['page_title']		= lang('facility_form');
		//default values are empty if the customer is new
		$data['id']					= '';
		$data['title']				= '';
		$data['slug']				= '';
		$data['images']	= array();
		
		$data['description']		= '';
		
		if ($id)
		{	
			$data['facility']			=	$facility		= $this->facilities_model->get($id);
			//if the customer does not exist, redirect them to the customer list with an error
			if (!$facility)
			{
				$this->session->set_flashdata('error', lang('facility_not_found'));
				redirect('admin/facilities');
			}
			
			//set values to db values
			$data['id']					= $facility->id;
			$data['title']				= $facility->title;
			$data['slug']				= $facility->slug;
			$data['description']		= $facility->description;
			$data['images']				= $this->facilities_model->get_images($id);
			
		}
		
		$this->form_validation->set_rules('title', 'lang:title', 'trim|required');
		$this->form_validation->set_rules('description', 'lang:description', 'trim|required');
		
				
		if ($this->form_validation->run() == FALSE)
		{
			$this->render_admin('facilities/form', $data);		
		}
		else
		{
			$this->load->helper('text');
			
			//first check the slug field
			$slug = $this->input->post('slug');
			
			//if it's empty assign the name field
			if(empty($slug) || $slug=='')
			{
				$slug = $this->input->post('title');
			}
			
			$slug	= url_title(convert_accented_characters($slug), 'dash', TRUE);
			if($id)
			{
				$slug		= $this->facilities_model->validate_slug($slug, $id);
			}
			else
			{
				$slug			= $this->facilities_model->validate_slug($slug);
			}
		
			$save['id']				= $id;
			$save['title']			= $this->input->post('title');
			$save['slug']				= $slug;
			$save['description']		= $this->input->post('description');

			$p_key	=	$this->facilities_model->save($save);
			$upload_data	=	 array();
				$files 			= 	 $_FILES;
				$save_img		=	 array();
				if(!empty($files)){				
				$cpt = count($_FILES['image']['name']);
						for($i=0; $i<$cpt; $i++)
						{   
							if(!empty($files['image']['name'][$i])){
								$_FILES['userfile']['name']= 	$file_name	=	time().rand(1,988).'.'.substr(strrchr($files['image']['name'][$i],'.'),1);
								$_FILES['userfile']['type']= $files['image']['type'][$i];
								$_FILES['userfile']['tmp_name']= $files['image']['tmp_name'][$i];
								$_FILES['userfile']['error']= $files['image']['error'][$i];
								$_FILES['userfile']['size']= $files['image']['size'][$i];
								
								//$file_name	= time().rand(1,988).'.jpg';
								$save_img['facilities_id']	=	$p_key;
								$save_img['image']		=	$file_name;
								$this->facilities_model->save_images($save_img);
								
								
								$config['upload_path'] = 'assets/admin/uploads/gallery/full';
								$config['allowed_types'] = 'jpg|png|jpeg';
								$config['max_size']	= '10000';
								$config['max_width']  = '10000';
								$config['max_height']  = '6000';
								//$config['file_name'] = $file_name;
								$this->load->library('upload',$config);
								 
						
								if ($this->upload->do_upload())
								{
									$upload_data	= $this->upload->data();
								}
								if($this->upload->display_errors() != '')
								{
									$data['error'] = $this->upload->display_errors();
									echo '<pre>'; print_r($data['error']);die;
								}	
								
								$this->load->library('image_lib');
										//this is the medium image
										$config['image_library'] = 'gd2';
										$config['source_image'] = 'assets/admin/uploads/gallery/full/'.$upload_data['file_name'];
										$config['new_image']	= 'assets/admin/uploads/gallery/medium/'.$upload_data['file_name'];
										$config['maintain_ratio'] = FALSE;
										$config['width'] = 600;
										$config['height'] = 500;
										$this->image_lib->initialize($config);
										$this->image_lib->resize();
										$this->image_lib->clear();
							
										//small image
										$config['image_library'] = 'gd2';
										$config['source_image'] = 'assets/admin/uploads/gallery/medium/'.$upload_data['file_name'];
										$config['new_image']	= 'assets/admin/uploads/gallery/small/'.$upload_data['file_name'];
										$config['maintain_ratio'] = FALSE;
										$config['width'] = 235;
										$config['height'] = 235;
										$this->image_lib->initialize($config); 
										$this->image_lib->resize();
										$this->image_lib->clear();
							
										//cropped thumbnail
										$config['image_library'] = 'gd2';
										$config['source_image'] = 'assets/admin/uploads/gallery/small/'.$upload_data['file_name'];
										$config['new_image']	= 'assets/admin/uploads/gallery/thumbnails/'.$upload_data['file_name'];
										$config['maintain_ratio'] = FALSE;
										$config['width'] = 268;
										$config['height'] = 249;
										$this->image_lib->initialize($config); 	
										$this->image_lib->resize();	
										$this->image_lib->clear();
								}		
						}
							
				}//End Files Is Not Empt
			
			$this->facilities_model->save($save);
			if($id){
				$this->session->set_flashdata('message', lang('facility_update'));
			}else{
				$this->session->set_flashdata('message', lang('facility_save'));
			}
			
			redirect('admin/facilities/form/'.$p_key.'?show=image');
		}
	}
	
	function delete($id = false)
	{
		if ($id)
		{	
			$facilities	= $this->facilities_model->get($id);
			//if the customer does not exist, redirect them to the customer list with an error
			if (!$facilities)
			{
				$this->session->set_flashdata('error', lang('facility_not_found'));
				redirect('admin/facilities');
			}
			else
			{
				//if the customer is legit, delete them
				$file = BASEPATH.'../assets/admin/uploads/facilities/'.$amenities->image;
						if (file_exists($file)) {
							unlink($file);
						}
				$delete	= $this->facilities_model->delete($id);
				
				$this->session->set_flashdata('message', lang('facility_delete'));
				redirect('admin/facilities');
			}
		}
		else
		{
			//if they do not provide an id send them to the customer list page with an error
			$this->session->set_flashdata('error', lang('facility_not_found'));
				redirect('admin/facilities');
		}
		function updateimg(){
		//echo '<pre>'; print_r($_POST);
		$id			=	$_POST['id'];	
		$gallery	=	$this->facilities_model->get_image($id);
		//echo '<pre>-->'; print_r($gallery);die;
		$full 	= BASEPATH.'../assets/admin/uploads/gallery/full/'.$gallery->image;
		$medium 	= BASEPATH.'../assets/admin/uploads/gallery/medium/'.$gallery->image;
		$small 		= BASEPATH.'../assets/admin/uploads/gallery/small/'.$gallery->image;
		$thumbnails = BASEPATH.'../assets/admin/uploads/gallery/thumbnails/'.$gallery->image;
			if (file_exists($full)) {
				unlink($full);
			}
			if (file_exists($medium)) {
				unlink($medium);
			}
			if (file_exists($small)) {
				unlink($small);
			}
			if (file_exists($thumbnails)) {
				unlink($thumbnails);
			}
		//echo '<pre>'; print_r($save);die;
		$this->facilities_model->delete_image($id);
	}	
	}
	
	} 

	


