<?php

class Auth_model extends CI_model{

	public function create($formArray){

		//$db = db_connect();
		//$this->load->database();
		//$this->load->database();
		//echo "database connected";

		$this->db->insert('users',$formArray);
	}

	function displayrecords($limit, $start)
	{

	
	//$query->orderBy('user_id', 'DESC');
	//$builder->db->table('users');
	//$query=builder->orderBy('user_id', 'DESC');
	//$query->orderBy('user_id', 'DESC');
    
	//$query=$this->db->query("select * from users");
	//return $query->result();


	
	//$query=$this->db->query("select * from users");
		//$this->db->from('users');
		
	//$query = $this->db->get("users");

	//$this->db->limit($start , $limit);

	$this->db->limit($limit , $start);
    $query = $this->db->get("users");
    return $query->result();


	//$this->db->from("users");
      //  if($limit!='' && $start!=''){
      // $this->db->limit($limit, $start);
    //}
    //$query  = $this->db->get();
    //$nation = array();
   // foreach ($query->result() as $row)
    //array_push($nation, $row);
    //return $nation;    


	//displayrecords($config["per_page"], $page);

	//$query=$this->db->query("select * from users limit ". $start.",". $limit);
	//return $query->result();

    

	//$this->db->limit($limit, $start);
	//$this->db->order_by("user_id", "desc");
	//$query = $this->db->get('users');
    //return $query->result();
	}


	function displayrep(){

	$query = $this->db->get("users");
    return $query->result();
	}



	function deleterecords($id)
	{
	$this->db->query("delete  from users where user_id='".$id."'");
	}	

	function displayrecordsById($id)
	{
	$query=$this->db->query("select * from users where user_id='".$id."'");
	return $query->result();
	}


	function updaterecords($fname,$lname,$id)
	{
	
	$query=$this->db->query("update users SET first_name='$fname',last_name='$lname' where user_id='".$id."'");
	//$query=$this->db->query("update users SET first_name='xxxx1',last_name='yyyy1' where user_id='".$id."'");
	//$query=$this->db->query("update users SET first_name='$fname',last_name='$lname' where user_id=11");


	}	

	public function get_count() 
	{
        return $this->db->count_all("users");
    }

    public function fetch_single_user($user_id){

    	$query=$this->db->query("select * from users where user_id='".$user_id."'");
		return $query->result();

    	//$this->db->where("user_id",11);
    	//$query->$this->db->get('users');
    	//return $query->result();
    }

     public function fetch_prt_user($user_id){

    	$query=$this->db->query("select * from users where user_id='".$user_id."'");
		return $query->result();
	}


    public function save($data)
    {
        //$this->db->insert($this->table, $data);
       $this->db->insert('users', $data);
       return $this->db->insert_id();
    	
    }

     public function save_new($data, $id)
    {
        //$this->db->insert($this->table, $data);

        // $this->db->insert('users', $data);
       // return $this->db->insert_id();

    	//$query=$this->db->query("insert into users (first_name, last_name) values ('$fn','$ln')");
		//$query->result();
		//return $this->db->affected_rows();

		$this->db->update('users', $data, 'user_id='.$id);
    	return $this->db->affected_rows();
    }

    public function updatenew($id)
    {
        //$this->db->insert($this->table, $data);
        // $this->db->insert('users', $data);
        //return $this->db->insert_id();

       // $this->db->where('user_id', 11);
        //$this->db->update('users', $data);

        //$this->$db->table('users');

        //$this->db->update($data, "user_id = 11");

    	//$this->db->update('users', $data, 'where user_id=11');
       // return $this->db->affected_rows();


        //echo 'order has successfully been updated';
        //return $this->db->affected_rows();

        $query=$this->db->query("update users SET first_name='ranjan',last_name='barman' where user_id='".$id."'");
    
    }

     public function update($where, $data)
    {
        //$this->db->update('users', $data, $where);
        //return $this->db->affected_rows();

       // $query=$this->db->query("update users set first_name='".$data(0)."', last_name='".$data(1)."' where user_id='".$where."'");
		//return $query->result();
		//return $this->db->affected_rows();

		//$data1 =array ('first_name' => 'Joe Joe','last_name' => 'Be' );

		//echo $data(0);

		////$this->db->where('user_id', 11);
       //// $this->db->update('users', $data);
        //echo 'order has successfully been updated';
        ////return $this->db->affected_rows();

        $this->db->update('users', $data, $where);
        //$this->db->update('users', $where, $data);
        return $this->db->affected_rows();
    
    }
}

?>