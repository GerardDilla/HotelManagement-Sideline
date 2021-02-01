<?php
Class Facilities_model extends CI_Model
{

    var $CI;

    function __construct()
    {
        parent::__construct();

        $this->CI =& get_instance();
        $this->CI->load->database(); 
        $this->CI->load->helper('url');
    }
	function get_facilities_all()
    {
               $this->db->order_by('title', 'ASC'); 
        return $this->db->get('facilities')->result();
    }
    function get_facility_type($id)
    {
                $this->db->where('id', $id);
        return $this->db->get('facilities')->row();
    }
    function get_images($id)
    {
        $this->db->where('id', $id);
      
        $result = $this->db->get('facilities');
        return $result->result();
    }
    function get_facility_types()
    {
                $this->db->order_by('id', 'RANDOM');
        return $this->db->get('facilities',4)->result();
    }
	}