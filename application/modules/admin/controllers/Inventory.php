<?php
class Inventory extends Admin_Controller {

	function __construct()
	{		
		parent::__construct();
		$this->load->model('Inventory_Model');
	}
	
	function index()
	{	
		$data['page_title']	= 'Inventory';
		$data['inventory']	= $this->Inventory_Model->get_all();
			//echo '<pre>'; print_r($data['floors']);
		$this->render_admin('inventory/list', $data);		
	}
	
	function view($id,$tab=false){
		
		$admin = $this->session->userdata('admin');
		$data['inventory']			=	$inventory		= $this->Inventory_Model->get($id);
		$data['page_title']	= lang('view')." Inventory";
		$this->render_admin('inventory/view', $data);
	}
	
	function form($id = false)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['page_title']		= 'Update Inventory';
		//default values are empty if the customer is new
		$data['ID']					= '';
		$data['itemName']				= '';
		$data['itemDescription']				= '';
		$data['stock']				= '';
		$data['active']		= '';
		
		if ($id)
		{	
			$data['inventory']			=	$inventory		= $this->Inventory_Model->get($id);
			//if the customer does not exist, redirect them to the customer list with an error
			if (!$inventory)
			{
				$this->session->set_flashdata('error', 'Item Not Found');
				redirect('admin/Inventory');
			}
			
			//set values to db values
			$data['ID']					= $inventory->ID;
			$data['itemName']				= $inventory->itemName;
			$data['itemDescription']				= $inventory->itemDescription;
			$data['stock']				= $inventory->stock;
			$data['active']		= $inventory->active;
			
		}
		
		$this->form_validation->set_rules('name', 'lang:name', 'trim|required');
		
				
		if ($this->form_validation->run() == FALSE)
		{
			$this->render_admin('Inventory/form', $data);		
		}
		else
		{
			$save['ID']					= $id;
			$save['itemName']				= $this->input->post('name');
			$save['itemDescription']				= $this->input->post('description');
			$save['stock']				= $this->input->post('stock');
			$save['active']		= $this->input->post('active');
			
			$this->Inventory_Model->save($save);
			if($id){
				$this->session->set_flashdata('message', 'Item Updated!');
			}else{
				$this->session->set_flashdata('message', 'Item Saved!');
			}
			
			redirect('admin/Inventory');
		}
	}
	
	function delete($id = false)
	{
		if ($id)
		{	
			$inventory	= $this->Inventory_Model->get($id);
			//if the customer does not exist, redirect them to the customer list with an error
			if (!$inventory)
			{
				$this->session->set_flashdata('error', 'Item Not Found');
				redirect('admin/Inventory');
			}
			else
			{
				$delete	= $this->Inventory_Model->delete($id);
				$this->session->set_flashdata('message', 'Item Deleted');
				redirect('admin/Inventory');
			}
		}
		else
		{
			//if they do not provide an id send them to the customer list page with an error
			$this->session->set_flashdata('error', 'Item Not Found');
				redirect('admin/Inventory');
		}
	}
	
	
}