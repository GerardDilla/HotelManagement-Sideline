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
    function get($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->get('facilities');
        return $result->row();
    }
    function get_all()
    {
        $result = $this->db->get('facilities');
        return $result->result();
    }
   function get_images($id)
    {
        $this->db->where('facilities_id', $id);
        $result = $this->db->get('facilities_images');
        return $result->result();
    }
    
    function update_images($save,$id){
        $this->db->where('id', $id);
        $this->db->update('facilities_images',$save);
    }
    function set_featured($id){
        $this->db->where('id', $id);
        $this->db->set('is_featured', 1);
        $this->db->update('facilities_images');
    }
    
    function get_image($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->get('facilities_images');
        return $result->row();
    }
    function delete_image($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('facilities_images');
       
    }
    
    function save_images($save){
        $this->db->insert('facilities_images', $save);
    }   
    function save($save)
    {
        if ($save['id'])
        {
            $this->db->where('id', $save['id']);
            $this->db->update('facilities', $save);
            return $save['id'];
        }
        else
        {
            $this->db->insert('facilities', $save);
            return $this->db->insert_id();
        }
    }
     
    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('facilities');
    }
    function check_slug($slug, $id=false)
    {
        if($id)
        {
            $this->db->where('id !=', $id);
        }
        $this->db->where('slug', $slug);
        
        return (bool) $this->db->count_all_results('facilities');
    }
    
    function validate_slug($slug, $id=false, $count=false)
    {
        if($this->check_slug($slug.$count, $id))
        {
            if(!$count)
            {
                $count  = 1;
            }
            else
            {
                $count++;
            }
            return $this->validate_slug($slug, $id, $count);
        }
        else
        {
            return $slug.$count;
        }
    }
    }