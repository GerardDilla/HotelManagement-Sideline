<?php
Class Inventory_Model extends CI_Model
{

    var $CI;

    function __construct()
    {
        parent::__construct();

        $this->CI =& get_instance();
        $this->CI->load->database(); 
        $this->CI->load->helper('url');
		
		
    }
	
    function get_all()
    {
		$result = $this->db->get('Inventory');
        return $result->result();
    }
	function get_all2()
    {
        $result = $this->db->get('floors');
        return $result->result();
    }
	
    
	function get($id)
    {
		$this->db->where('ID', $id);
		$result = $this->db->get('Inventory');
        return $result->row();
    }
	
	
   
    
    function save($save)
    {
        if ($save['ID'])
        {
            $this->db->where('ID', $save['ID']);
            $this->db->update('Inventory', $save);
            return $save['ID'];
        }
        else
        {
            $this->db->insert('Inventory', $save);
            return $this->db->insert_id();
        }
    }
	 
    function delete($id)
    {
        $this->db->where('ID', $id);
        $this->db->delete('Inventory');
    }
    
    
   
}