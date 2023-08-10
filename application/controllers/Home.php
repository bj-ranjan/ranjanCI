<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function __construct()
	{
	parent::__construct();
	$this->load->database();
	$this->load->helper('url');
	$this->load->model('Auth_model');
	}



	public function index1()
	{
		//$this->load->view('welcome_message');
		//$this->load->view('second_view');
		//$this->load->helper('form');
		$this->load->view('view_me');

	}
	public function index()
	{
		//echo "hi...this is my first try";
		//$this->load->view('my_view');
		//$this->load->view('second_view');
		//$this->load->helper('form');
		//$this->load->helper('url');
		//$this->load->view('view_me');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name','First Name','required');
		$this->form_validation->set_rules('last_name','Last Name','required');

		//$this->load->view('view_bt');

		if ($this->form_validation->run()==false){

			$this->load->view('view_bt_ajax');
			//echo 'required fields absent';

		}
		else
		{
			//echo 'db insert';
			//$this->load->model('Auth_model');

			$formArray= array();
			$formArray['first_name']=$this->input->post('first_name');
			$formArray['last_name']=$this->input->post('last_name');
			$this->Auth_model->create($formArray);
			//$this->session->set_flashsdata('msg','Successfully inserted data');
			//redirect(base_url().'Home/index');

			//$this->load->view('view_users_lst');
			
			$this->dispdata();

		}

		//echo "hello";

		//$this->index1();
	}

	public function dispdata()
	{
		//$result['data']=$this->Auth_model->displayrecords();
			//$this->load->view('view_users_lst',$result);
		//$this->load->view('view_users_lst',$result);

		$this->load->helper('url');
		$this->load->library("pagination");
		$config = array();
        $config["base_url"] = base_url() . "Home/dispdata";
        $config["total_rows"] = $this->Auth_model->get_count();
        $config["per_page"] = 7;
        $config["uri_segment"] = 3;
        $config['num_links'] = 3;
        //$config['use_page_numbers'] = TRUE;
        

        

		$config["full_tag_open"] = '<ul class="pagination">';
		$config["full_tag_open"] = '<ul class="pagination">';
		$config["full_tag_close"] = '</ul>';	

		$config["first_link"] = "&laquo;";
		$config["first_tag_open"] = "<li>";
		$config["first_tag_close"] = "</li>";

		$config["last_link"] = "&raquo;";
		$config["last_tag_open"] = "<li>";
		$config["last_tag_close"] = "</li>";

		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '<li>';

		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '<li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';




        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data["links"] = $this->pagination->create_links();

        $data['users'] = $this->Auth_model->displayrecords($config["per_page"], $page);
        //$data['users'] = $this->Auth_model->displayrecords(6, 0);

        $this->load->view('view_users_lst3', $data);




	}

	public function deletedata()
	{
	$id=$this->input->get('id');
	$this->Auth_model->deleterecords($id);
	redirect("Home/dispdata");

	}

	public function updatedata()
	{
	$id=$this->input->get('id');
	$result['data']=$this->Auth_model->displayrecordsById($id);
	$this->load->view('update_records',$result);	
	
		if($this->input->post('update'))
		{
		$fn=$this->input->post('first_name');
		$ln=$this->input->post('last_name');
		
		$this->Auth_model->updaterecords($fn,$ln,$id);
		redirect("Home/dispdata");
		}
	}

	public function detaildata()
	{
	$id=$this->input->get('id');
	echo "hi";


	$result['data']=$this->Auth_model->displayrecordsById($id);


	}


	public function fetch_single_user(){

		$id = $this->input->get('id');
		//$id=11;
		$this->load->model("Auth_model");
    	$get_user =$this->Auth_model->fetch_single_user($id);

    	echo json_encode($get_user); 

    	//$this->output->set_content_type('application/json');
		//$this->output->set_output(json_encode($get_user));

    	
    	exit();
	}

	public function fetch_prt_user1(){

		$id = $this->input->get('id');
		$this->load->model("Auth_model");
    	$get_user =$this->Auth_model->fetch_prt_user($id);

    	echo json_encode($get_user); 

    	//$this->output->set_content_type('application/json');
		//$this->output->set_output(json_encode($get_user));

    	
    	exit();
	}


	
	public function save_user_data(){
		echo $this->input->post('fname');
		echo $this->input->post('password');



	}

	public function checkUser()
   {
      
		$first_name=$this->input->post('first_name');
		//alert ($first_name);
		
		$this->load->model('AjaxModel');
		
		$result=$this->AjaxModel->checkuser($first_name);
		if($result)
		{
		echo  1;	
		}
		else
		{
		echo  0;	
		}
    }

    public function ajax_edit()
    {
        $data = array(

                'first_name' => $this->input->post('firstName'),
                'last_name' => $this->input->post('lastName'),
                
            );

        $id=$this->input->post('uID');

        $this->load->model("Auth_model");
    	//$get_user =$this->Auth_model->fetch_single_user($id);

    	
        $insert = $this->Auth_model->save_new($data, $id);
       // $insert = $this->Auth_model->updatenew($data);

        echo json_encode(array("status" => TRUE));

    }



 public function ajax_add_new()
    {
        //$this->_validate();
        //$data = array(
               // 'first_name' => $this->input->post('firstName'),
              //  'last_name' => $this->input->post('lastName'),
                
           // );

        $fn=$this->input->post('firstName');
        $ln=$this->input->post('lastName');

        $this->load->model("Auth_model");
    	//$get_user =$this->Auth_model->fetch_single_user($id);

        $insert = $this->Auth_model->save_new($fn, $ln);
       // $insert = $this->Auth_model->updatenew($data);

        echo json_encode(array("status" => TRUE));
    }	



    public function ajax_add()
    {
        //$this->_validate();
        $data = array(
                'first_name' => $this->input->post('firstName'),
                'last_name' => $this->input->post('lastName'),
                
            );


        $this->load->model("Auth_model");
    	//$get_user =$this->Auth_model->fetch_single_user($id);

    	
        $insert = $this->Auth_model->save($data);
       // $insert = $this->Auth_model->updatenew($data);

        echo json_encode(array("status" => TRUE));

    }	


    public function ajax_edit1()
    {
        //$this->_validate();
        $data = array(
        		'user_id'=>$this->input->post('uID'),
                'first_name' => $this->input->post('firstName'),
                'last_name' => $this->input->post('lastName'),
                
            );


        $this->load->model("Auth_model");
    	//$get_user =$this->Auth_model->fetch_single_user($id);

    	//$this->Auth_model->update(array('user_id'), $data);
    	$this->Auth_model->update(11, $data);

        echo json_encode(array("status" => TRUE));

        //$insert = $this->Auth_model->edit($data);
        //echo json_encode(array("status" => TRUE));
    }	

    public function repdata(){

    	 $data['users'] = $this->Auth_model->displayrep();
    	 $this->load->view('view_users_rep', $data);

    }
    

    public function pdfrepdata(){

    	 $data['users'] = $this->Auth_model->displayrep();
    	 $this->load->view('view_users_pdf1', $data);

    }


}