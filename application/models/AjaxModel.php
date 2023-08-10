<?php
class AjaxModel extends CI_Model 
{  
	public function checkuser($first_name) 
	{
		$this->db->where('first_name',$first_name);
		$query=$this->db->get('users');
		if($query->num_rows()>0)
		{
		return 1;	
		}
		else
		{
		return 0;	
		}
    }
    
}
?>