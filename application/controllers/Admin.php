<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Tbilisi');
class Admin extends CI_Controller {

	public function __construct() {       
        
        parent::__construct();     
        $this->load->model("admin_model");
          $this->load->library('goglemaps');
          $this->load->library('pagination');
        $this->load->helper("file");

        $this->load->helper('url'); 
        $this->load->helper('form');       
        $this->load->helper('url_helper');
        $this->load->helper('security');
        $this->load->library('session');
        $this->load->library("email");
        //$this->load->library('fcm');
        
        $this->perPage = 4;
        if ($this->session->has_userdata('lan')) {
        	$idiom = $this->session->lan;
        		}else {
			$idiom = 'ge';
			$this->session->set_userdata('lan', $idiom);
		}		
		$this->lang->load('main', $idiom);
    }

	public function index()
	{
		if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if($this->session->userdata('usafrtxoeba') == "1")
            {

		$array = [];
		$viewed = [];

        $data['object_list'] = array();
       
        foreach($this->admin_model->get_object_list() as $valuee)
        {
            if( $this->session->userdata($valuee["object"]) == 1)
            {
                array_push($data['object_list'], $valuee);

            }
        }
	    foreach ($data['object_list'] as $value) {
	        $viewed['object']= $value['object'];
	        $viewed['viewed']= "1";
            $data['viewed_'.$value['object'].'_yes'] = count($this->admin_model->get_problems_length($viewed));
            $viewed['viewed']= "0";
            $data['viewed_'.$value['object'].'_no'] = count($this->admin_model->get_problems_length($viewed));
         }
	    
		$this->load->view('layouts/Aheader');
		$this->load->view('admin/index', $data);
		$this->load->view('layouts/Afooter');
        }
           
        else
            {
              if($this->session->userdata('finansebi') == "1")
              {
            	redirect(base_url("admin/finansebi_migebuli")); 
              }  
              if($this->session->userdata('iuridiuli') == "1")
              {
            	redirect(base_url("admin/iuridiuli_migebuli")); 
              }
              if($this->session->userdata('brigadiri') == "1")
              {
            	redirect(base_url("admin/brigadiri_migebuli")); 
              }
            }
	}


  
	public function about()
	{
	    if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		
		
		$data['about_text'] = $this->admin_model->get_about_text();
		$this->load->view('layouts/Aheader');
		$this->load->view('admin/about', $data);
		$this->load->view('layouts/Afooter');
	}
	public function news()
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
	    
		if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		$array = [];
		$config["per_page"] = 20;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['news_list'] = array();
	    $data['news_list'] = $this->admin_model->get_news_list($config["per_page"], $page);
	    $data['count_ap_list'] = count($this->admin_model->get_news_length($array));
	    
	    $config = array();
        $config["base_url"] = base_url() . "admin/news";
        $config["total_rows"] = $data['count_ap_list'];
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $config['cur_tag_open'] = '<a href="#" class="active">';
        $config['cur_tag_close'] = '</a>';

        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        
	    $this->session->set_userdata('news_edit_block', 'info_block');
	    $this->session->set_userdata('user_view_block', 'info_block');
		$this->load->view('layouts/Aheader');
		$this->load->view('admin/news', $data);
		$this->load->view('layouts/Afooter');
	}
	public function news_create()
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		$code = $this->generateRandomString(12);
		$data['code'] = $code;
		
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		else if  ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			
			$postData = $this->input->post();
		$this->admin_model->insert_news($postData, $code);
        $this->session->set_flashdata('alert', 'ჩანაწერი წარმატებით დაემატა');
	    $this->session->set_flashdata('alertype', 'success');
	    $this->session->set_userdata('news_edit_block', 'info_block');
	    redirect(base_url("admin/news_edit/".$code)); 
		}
		$this->load->view('layouts/Aheader');
		$this->load->view('admin/news_create', $data);
		$this->load->view('layouts/Afooter');
	}
	public function news_edit($code)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		$data['images'] = $this->admin_model->get_news_images($code);
		$data['imagess'] = $this->admin_model->get_news_images($code);
		$data['news_edit'] = array();
		$data['news_edit'] = $this->admin_model->news_edit($code);
		
		$this->load->view('layouts/Aheader');
		$this->load->view('admin/news_edit', $data);
		$this->load->view('layouts/Afooter');
	}


	public function news_update($code)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		$data['news_update'] = array();
		$data['news_update'] = $this->admin_model->news_update( $code, $this->input->post());
		$this->session->set_userdata('object_edit_block', 'info_block');
				redirect(base_url("admin/news_edit/".$code));

	}
	public function news_delete($code)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		
		$del = $this->admin_model->news_delete($code);
		
		redirect(base_url("admin/news"));
	}
	public function delete_news_image($file_name, $code)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		$delete = $this->admin_model->news_image_delete($file_name);
		$this->session->set_userdata('news_edit_block', 'gallery_block');
        redirect(base_url("admin/news_edit/".$code));
	}
	public function set_as_news_main_image($file_name, $code)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		$delete = $this->admin_model->news_main_image($file_name, $code);
		$this->session->set_userdata('news_edit_block', 'gallery_block');
		redirect(base_url("admin/news_edit/".$code));
	}
	
	public function about_update()
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		$data['about_update'] = array();
		$data['about_update'] = $this->admin_model->about_update($this->input->post());
	   	$data['about_text'] = $this->admin_model->get_about_text();
		redirect(base_url("admin/about"));

	}
	public function construction()
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login")); 
        $this->load->view('layouts/Aheader');
		$this->load->view('admin/construction');
		$this->load->view('layouts/Afooter');
	}
	public function construction_details()
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login")); 
        $this->load->view('layouts/Aheader');
		$this->load->view('admin/construction_details');
		$this->load->view('layouts/Afooter');
	}
	public function repair()
	{
	    
		if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login")); 
		
        $this->load->view('layouts/Aheader');
		$this->load->view('admin/repair');
		$this->load->view('layouts/Afooter');
	}

	public function login()
	{
	    if ($this->session->has_userdata('logged_in')) redirect(base_url("admin/index"));
	    $data["content"] ="";
	    $data["content"] = "სამშენებლო კომპანია,ბესთ ბილდინგი სამშენებლო, სარემონტო სფეროში არსებულ, ინოვაციურ-კრეატიულ გუნდს წარმოადგენს. კომპანია შპს ბესთ ბილდინგ დაფუძნდა 2020 წლის 24 მარტს. კომპანია აერთიანებს იმ ადამიანების ჯგუფს, რომლებიც ბოლო 10-12 წლის განმავლობაში საქართველოს სხვადასხვა რეგიონებში აწარმოებდნენ და უშუალოდ მონაწილეობას ღებულობდნენ სამშენებლო სარემონტო საპროექტო სამუშაოებში. ";  
		$this->load->view('layouts/header',$data);
		
		$this->load->view('admin/login');
		$this->load->view('layouts/footer');
		
	}

	public function loginn()
	{
		$postData = $this->input->post();
        $validate = $this->admin_model->validate_login($postData);
        if ($validate && ($validate[0]->validation=='1')){
            $newdata = array(
                'finansebi' => $validate[0]->finansebi,
                'iuridiuli' => $validate[0]->iuridiuli,
                'brigadiri'     => $validate[0]->brigadiri,
                'usafrtxoeba'     => $validate[0]->usafrtxoeba,
                'name' => $validate[0]->name,
                'surname' => $validate[0]->surname,
                'reg_code' => $validate[0]->code,
                'email' => $validate[0]->email,
                'id' => $validate[0]->id,
                'sagareo' => $validate[0]->sagareo,
                'category' => $validate[0]->category,
                'object' => $validate[0]->object,
                'logged_in' => TRUE,
                'Aliansi_Centro_Polis' => $validate[0]->Aliansi_Centro_Polis,
                'Skola' => $validate[0]->Skola,
                
                
                
            );
            if($this->session->has_userdata("edit_code"))
            {
                redirect(base_url("admin/problem_edit/".$this->session->userdata('edit_code')));
                $this->session->unset_userdata('edit_code');
                
            }
            $this->session->set_userdata($newdata);
             
            if($this->session->userdata('usafrtxoeba') == "1")
            {
            	redirect(base_url("admin/index")); 
            }
              
           
            else
            {
              if($this->session->userdata('finansebi') == "1")
              {
            	redirect(base_url("admin/finansebi_migebuli")); 
              }  
              if($this->session->userdata('iuridiuli') == "1")
              {
            	redirect(base_url("admin/iuridiuli_migebuli")); 
              }
              if($this->session->userdata('brigadiri') == "1")
              {
            	redirect(base_url("admin/brigadiri_migebuli")); 
              }
            }
            
           
        }
        else{
            $data = array('alert' => true);        	
        	//$data['content'] = 'admin/login';
        	
		$this->load->view('layouts/header');
		$this->load->view('admin/login',$data);
		$this->load->view('layouts/footer');
        }		
	}
      public function messages()
	{
	if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));	
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login")); 
        $this->load->view('layouts/Aheader');
		$this->load->view('admin/messages');
		$this->load->view('layouts/Afooter');
	}
	public function messages_count()
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		$chat_count = $this->admin_model->get_chat_count();
        echo json_encode($chat_count);
	}
	public function messages_chat_users()
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		$chat_count = $this->admin_model->get_chat_users();
        echo json_encode($chat_count);
	}
	public function messages_chat_full($user)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
	    if($this->input->post('text') !='ggggg')
	    {
	        $this->admin = $this->session->userdata('name');
	        $this->text = $this->input->post('text');
	        $this->user = $user;
	        $this->status = 'read';
	        $this->db->set($this);
	        $this->db->insert('support_chat');
	    }
		$chat_count = $this->admin_model->get_chat_full($user);
        echo json_encode($chat_count);
	}
	public function admin_send()
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
	    $obj = $this->input->post();
	   // $this->text = $this->input->post('text');
	    $this->db->set($this->input->post());
	    $this->db->set('admin',$this->session->userdata('name'));
		$this->db->insert('support_chat');
		$chat_count = $this->admin_model->get_chat_full($this->input->post('user'));
        echo json_encode($chat_count);
	}
	public function password_change()
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		$password = $this->input->post('old_password');
		$new_password = $this->input->post('new_password');
		$repeat_new_password = $this->input->post('repeat_new_password');
		if($password != $this->session->userdata('password'))
		{
			 $data = array('alert' => true); 
			 $this->load->view('layouts/Aheader');
		$this->load->view('admin/profile_password', $data);
		$this->load->view('layouts/Afooter');
			 
		}
		else
		{
			$pass = array('password' => $new_password );
        $update = $this->admin_model->update_password($pass);
       
           $this->session->set_userdata('password', $new_password);
         $data = array('alert' => true); 
            redirect(base_url("admin/profile_password")); 
        
       	
       }
	}
	///////////////////////////////////////////////////////////// Object
	public function object_list()
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
	    
		if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		$array = [];
		$config["per_page"] = 20;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['object_list'] = array();
	    $data['object_list'] = $this->admin_model->get_object_list($config["per_page"], $page);
	    $data['count_ap_list'] = count($this->admin_model->get_object_length($array));
	    
	    $config = array();
        $config["base_url"] = base_url() . "admin/object_list";
        $config["total_rows"] = $data['count_ap_list'];
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $config['cur_tag_open'] = '<a href="#" class="active">';
        $config['cur_tag_close'] = '</a>';

        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        
	    $this->session->set_userdata('object_edit_block', 'info_block');
	    $this->session->set_userdata('user_view_block', 'info_block');
		$this->load->view('layouts/Aheader');
		$this->load->view('admin/object_list', $data);
		$this->load->view('layouts/Afooter');
	}
	public function object($object)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
	    
		if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
	    $data["object"] = $object;
		$this->load->view('layouts/Aheader');
		$this->load->view('admin/object', $data);
		$this->load->view('layouts/Afooter');
	}
	public function object_list_type($type)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
	    
		if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		$array = [];
		$config["per_page"] = 20;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['object_list'] = array();
	    $data['object_list'] = $this->admin_model->get_object_list_type($config["per_page"], $page, $type);
	    $data['count_ap_list'] = count($this->admin_model->get_object_length_type($array, $type));
	    
	    $config = array();
        $config["base_url"] = base_url() . "admin/object_list/".$type;
        $config["total_rows"] = $data['count_ap_list'];
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $config['cur_tag_open'] = '<a href="#" class="active">';
        $config['cur_tag_close'] = '</a>';

        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        
	    $this->session->set_userdata('object_edit_block', 'info_block');
	    $this->session->set_userdata('user_view_block', 'info_block');
		$this->load->view('layouts/Aheader');
		$this->load->view('admin/object_list', $data);
		$this->load->view('layouts/Afooter');
	}
	public function object_list_search()
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
	    if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
	    $config["per_page"] = 20;
        $arrayy = [];
        $raod = 0;
        $link = "";
        $mas = [];
	    if($this->uri->segment(3))
        { 
            $i=4;
       
         while($this->uri->segment($i) != "")
        {
            
            $mas[$this->uri->segment($i-1)] = $this->uri->segment($i);
            $raod = $raod +2;
            $link =$link."/".$this->uri->segment($i-1)."/".$this->uri->segment($i);
            $i = $i +2;
        }
        }
        	    
        else
        {
        if(	$this->input->post('city') != "") 
	    {	        
	        $arrayy['city'] = $this->input->post('city');
	        $raod = $raod+2;
	        $link = $link."/city/".$this->input->post('city');
	    }
	    if(	$this->input->post('code') != "") 
	    {	        
	        $arrayy['code'] = $this->input->post('code');
	        $raod = $raod+2;
	        $link = $link."/code/".$this->input->post('code');
	    }
        if(($this->input->post('category') != "0")) 
	    {
	        $arrayy['category'] = $this->input->post('category');
	        $raod = $raod+2;
	        $link =$link."/category/".$this->input->post('category');

	    }
	    if(	$this->input->post('type') != "0") 
	    {	        
	        $arrayy['type'] = $this->input->post('type');
            $raod = $raod+2;
            $link =$link."/type/".$this->input->post('type');
	    }
	    if(	$this->input->post('status') != "0") 
	    {	        
	        $arrayy['status'] = $this->input->post('status');
	        $raod = $raod+2;
	        $link = $link."/status/".$this->input->post('min_price');
	    }
        }
        $page = ($this->uri->segment(3+$raod)) ? $this->uri->segment(3+$raod) : 0;
        if(count($arrayy) != "0"){
        $data['object_list_search'] = $this->admin_model->get_object_list_search($arrayy, $config["per_page"], $page);
        $raodenoba = count($this->admin_model->get_object_length($arrayy));
        }
	    if(count($mas) != "0")
	    {
	    $data['object_list_search'] = $this->admin_model->get_object_list_search($mas, $config["per_page"], $page);
	    $raodenoba = count($this->admin_model->get_object_length($mas));
	    }
	    $config = array();
        $config["base_url"] = base_url() . "admin/object_list_search".$link;
        $config["total_rows"] = $raodenoba;
        $config["per_page"] = 20;
        $config["uri_segment"] = 3+$raod;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $config['cur_tag_open'] = '<a href="#" class="active">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);
        $data["linkss"] = $this->pagination->create_links();
	    $data['count_ap_list'] = $raodenoba;
	    $this->session->set_userdata('object_edit_block', 'info_block');
	    $this->session->set_userdata('user_view_block', 'info_block');
		$this->load->view('layouts/Aheader');
		$this->load->view('admin/object_list_search', $data);
		$this->load->view('layouts/Afooter');
	}
	

    public function object_all()
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		$user_ap = [];
		$user_ap['reg_id'] = $this->session->userdata('id');
		$user_ap['reg_name'] = $this->session->userdata('name');
		$user_ap['reg_surname'] = $this->session->userdata('surname');
		$array = [];
		$config["per_page"] = 20;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['user_object_all'] = array();
	    $data['user_object_all'] = $this->admin_model->get_user_object($user_ap, $config["per_page"], $page);
	    $data['count_user_object_all'] = count($this->admin_model->get_object_length($user_ap));
	    
	    $config = array();
        $config["base_url"] = base_url() . "admin/object_all";
        $config["total_rows"] = $data['count_user_object_all'];
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $config['cur_tag_open'] = '<a href="#" class="active">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        
	    $this->session->set_userdata('object_edit_block', 'info_block');
		$this->load->view('layouts/Aheader');
		$this->load->view('admin/object_all', $data);
		$this->load->view('layouts/Afooter');
	}
	public function object_all_search()
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
	    if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
	    $config["per_page"] = 20;
        $arrayy = [];
        $raod = 0;
        $link = "";
        $mas = [];
	    if($this->uri->segment(3))
        { 
            $i=4;
       
         while($this->uri->segment($i) != "")
        {
            
            $mas[$this->uri->segment($i-1)] = $this->uri->segment($i);
            $raod = $raod +2;
            $link =$link."/".$this->uri->segment($i-1)."/".$this->uri->segment($i);
            $i = $i +2;
        }
        $mas['reg_id'] = $this->session->userdata('id');
        $mas['reg_name'] = $this->session->userdata('name');
        $mas['reg_surname'] = $this->session->userdata('surname');
        }
        	    
        else
        {
        if(	$this->input->post('city') != "") 
	    {	        
	        $arrayy['city'] = $this->input->post('city');
	        $raod = $raod+2;
	        $link = $link."/city/".$this->input->post('city');
	    }
	    if(	$this->input->post('code') != "") 
	    {	        
	        $arrayy['code'] = $this->input->post('code');
	        $raod = $raod+2;
	        $link = $link."/code/".$this->input->post('code');
	    }
        if(($this->input->post('category') != "0")) 
	    {
	        $arrayy['category'] = $this->input->post('category');
	        $raod = $raod+2;
	        $link =$link."/category/".$this->input->post('category');

	    }
	    if(	$this->input->post('type') != "0") 
	    {	        
	        $arrayy['type'] = $this->input->post('type');
            $raod = $raod+2;
            $link =$link."/type/".$this->input->post('type');
	    }
	    if(	$this->input->post('status') != "0") 
	    {	        
	        $arrayy['status'] = $this->input->post('status');
	        $raod = $raod+2;
	        $link = $link."/status/".$this->input->post('min_price');
	    }
	    $arrayy['reg_id'] = $this->session->userdata('id');
        $arrayy['reg_name'] = $this->session->userdata('name');
        $arrayy['reg_surname'] = $this->session->userdata('surname');
        }
        $page = ($this->uri->segment(3+$raod)) ? $this->uri->segment(3+$raod) : 0;
        if(count($arrayy) != "0"){
        $data['user_object_all'] = $this->admin_model->get_user_object($arrayy, $config["per_page"], $page);
	    $data['count_user_object_all'] = count($this->admin_model->get_object_length($arrayy));
        }
	    if(count($mas) != "0")
	    {
	    $data['user_object_all'] = $this->admin_model->get_user_object($user_ap, $config["per_page"], $page);
	    $data['count_user_object_all'] = count($this->admin_model->get_object_length($mas));
	    }
	    $config = array();
        $config["base_url"] = base_url() . "admin/object_all_search".$link;
        $config["total_rows"] = $data['count_user_object_all'];
        $config["per_page"] = 20;
        $config["uri_segment"] = 3+$raod;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $config['cur_tag_open'] = '<a href="#" class="active">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);
        $data["linkss"] = $this->pagination->create_links();
	    $this->session->set_userdata('object_edit_block', 'info_block');
		$this->load->view('layouts/Aheader');
		$this->load->view('admin/object_all', $data);
		$this->load->view('layouts/Afooter');
	}
	public function object_create()
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		$code = $this->generateRandomString(12);
		$data['code'] = $code;
		
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		else if  ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			
			$postData = $this->input->post();
			$date = date('Y-m-d H:i');
			$reg_id =$this->session->userdata('id');
			$reg_name =$this->session->userdata('name');
			$reg_surname =$this->session->userdata('surname');
			$code = $this->generateRandomString(12);


	
		$this->db->set('reg_id', $reg_id);
		$this->db->set('reg_name', $reg_name);
		$this->db->set('reg_surname', $reg_surname);
		$this->db->set('code', $code);
		$this->db->set('date', $date);

		$this->db->set($postData);
	
	
	
		$this->db->insert('builder_group_projects');
        $this->session->set_flashdata('alert', 'ჩანაწერი წარმატებით დაემატა');
	    $this->session->set_flashdata('alertype', 'success');
	    $this->session->set_userdata('object_edit_block', 'info_block');
	    redirect(base_url("admin/object_edit/".$code)); 
		}
		$this->load->view('layouts/Aheader');
		$this->load->view('admin/object_create', $data);
		$this->load->view('layouts/Afooter');
	}
	
	public function object_edit($code)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		 $this->session->set_userdata('object_edit_block', 'info_block');
		$data['current_work_listt'] = array();
		$data['current_work_listt'] = $this->admin_model->get_current_work_list_edit($code);
		
		
		$data['images'] = $this->admin_model->get_object_images($code);
		$data['imagess'] = $this->admin_model->get_object_images($code);
		$data['object_edit'] = array();
		$data['object_edit'] = $this->admin_model->object_edit($code);
		
		$this->load->view('layouts/Aheader');
		$this->load->view('admin/object_edit', $data);
		$this->load->view('layouts/Afooter');
	}
	public function object_view($code)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		$data['images'] = $this->admin_model->get_object_images($code);
		  $data['imagess'] = $this->admin_model->get_object_images($code);
		$data['object_view'] = array();
		$data['object_view'] = $this->admin_model->object_view($code);
		$this->load->view('layouts/Aheader');
		$this->load->view('admin/object_view', $data);
		$this->load->view('layouts/Afooter');
	}
	public function object_update($code)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		$data['object_update'] = array();
		$data['object_update'] = $this->admin_model->object_update( $code, $this->input->post());
		$this->session->set_userdata('object_edit_block', 'info_block');
				redirect(base_url("admin/object_edit/".$code));

	}
	public function object_view_update($code)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		$data['object_update'] = array();
		$data['object_update'] = $this->admin_model->object_view_update( $code, $this->input->post());
		$this->session->set_userdata('object_edit_block', 'info_block');
				redirect(base_url("admin/object_view/".$code));

	}
	public function object_delete($code)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		
		$del = $this->admin_model->object_delete($code);
		redirect(base_url("admin/index"));
	}
	public function object_gallery($code)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		 $data['images'] = $this->admin_model->get_object_images($code);
		  $data['imagess'] = $this->admin_model->get_object_images($code);
		 $data['cod'] = $code;
		$this->load->view('layouts/Aheader');
		$this->load->view('admin/object_gallery', $data);
		$this->load->view('layouts/Afooter');
	}
	public function object_booking_delete($book_code)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		
		$del = $this->admin_model->object_booking_delete($book_code);
		redirect(base_url("admin/object_booking_all/"));
	}
	public function delete_object_image($file_name, $code)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		$delete = $this->admin_model->object_image_delete($file_name);
		$this->session->set_userdata('object_edit_block', 'gallery_block');
        redirect(base_url("admin/object_edit/".$code));
	}
	public function set_as_object_main_image($file_name, $code)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		$delete = $this->admin_model->object_main_image($file_name, $code);
		$this->session->set_userdata('object_edit_block', 'gallery_block');
		redirect(base_url("admin/object_edit/".$code));
	}
	public function object_activate1($code,$id)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		$this->session->set_userdata('object_edit_block', 'info_block');
		$this->admin_model->object_activate($id);
			redirect(base_url("admin/object_view/".$code));
	}
	public function object_expired($code,$id)
	{
	    
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		$this->session->set_userdata('object_edit_block', 'info_block');
		$this->admin_model->object_expired($id);
		redirect(base_url("admin/object_view/".$code));
	}
	public function object_activate2($code,$id)
	{
	    
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		$this->session->set_userdata('object_edit_block', 'info_block');
		 $this->admin_model->object_activate($id);
			redirect(base_url("admin/object_edit/".$code));
	}
	public function object_canceled($code,$id)
	{
	    
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		$this->session->set_userdata('object_edit_block', 'info_block');
	
		 $this->admin_model->object_canceled($id);
		redirect(base_url("admin/object_edit/".$code));
	}
	///////////////////////////////////////////////////////////////////////// Finansebi
   public function finansebi_migebuli()
  {
      if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
      if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
      $config["per_page"] = 20;
    
    $data['code'] = $this->generateRandomString(12);
      $data['finansebi_users_all_select'] = $this->admin_model->get_finansebi_users_all_select();
      
      $data["migebuli_sms_count"] = 0;
      $data["gagzavnili_sms_count"] = 0;
      $data["files_count"] = 0;
      if(!empty($this->admin_model->get_finansebi_sms_migebuli_all()))
      $data["migebuli_sms_count"] = count($this->admin_model->get_finansebi_sms_migebuli_all());
      if(!empty($this->admin_model->get_finansebi_sms_gagzavnili_all()))
      $data["gagzavnili_sms_count"] = count($this->admin_model->get_finansebi_sms_gagzavnili_all());
      if(!empty($this->admin_model->get_finansebi_files()))
      $data["files_count"] = count($this->admin_model->get_finansebi_files());
      
      $array = [];
    $viewed = [];
    $config["per_page"] = 20;
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['migebuli_sms'] = array();
      $data['migebuli_sms'] = $this->admin_model->get_finansebi_sms_migebuli($config["per_page"], $page);
      

      
      $config = array();
        $config["base_url"] = base_url() . "admin/finansebi_migebuli";
        $config["total_rows"] = $data["migebuli_sms_count"];
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
       // $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = 5;
    
        $config['first_tag_open'] = '<li  class="page-item"> ';
        $config['first_tag_close'] = '</li>';
        //$config['first_url'] = base_url() . 'patients/list/0'; 
        $config['prev_link'] = '<img src="'.base_url('assets/images/icons/left-1.png').'" alt="">';
        $config['next_link'] = '<img src="'.base_url('assets/images/icons/right-1.png').'" alt="">';
        $config['num_tag_open'] = '<li class="page-item ">';
        $config['num_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item " >';
        $config['next_tag_close'] = '</li>';

        $config['prev_tag_open'] = '<li class="page-item" >';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';


        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        $data["satauri"] ='მიღებული შეტყობინებები';
        $this->load->view('layouts/Aheader');
        $this->load->view('admin/finansebi_menu',$data);
        $this->load->view('admin/finansebi_migebuli',$data);
        $this->load->view('layouts/Afooter');
  }
  public function finansebi_gagzavnili()
  {
      if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
      if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
      $config["per_page"] = 20;
    
    $data['code'] = $this->generateRandomString(12);
      $data['finansebi_users_all_select'] = $this->admin_model->get_finansebi_users_all_select();
      
      $data["migebuli_sms_count"] = 0;
      $data["gagzavnili_sms_count"] = 0;
      $data["files_count"] = 0;
      if(!empty($this->admin_model->get_finansebi_sms_migebuli_all()))
      $data["migebuli_sms_count"] = count($this->admin_model->get_finansebi_sms_migebuli_all());
      if(!empty($this->admin_model->get_finansebi_sms_gagzavnili_all()))
      $data["gagzavnili_sms_count"] = count($this->admin_model->get_finansebi_sms_gagzavnili_all());
      if(!empty($this->admin_model->get_finansebi_files()))
      $data["files_count"] = count($this->admin_model->get_finansebi_files());
      
       $array = [];
       $viewed = [];
       $config["per_page"] = 20;
      $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['gagzavnili_sms'] = 0;
      $data['gagzavnili_sms'] = $this->admin_model->get_finansebi_sms_gagzavnili($config["per_page"], $page);
      

      
      $config = array();
        $config["base_url"] = base_url() . "admin/finansebi_gagzavnili";
        $config["total_rows"] = $data["gagzavnili_sms_count"];
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
       // $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = 5;
    
        $config['first_tag_open'] = '<li  class="page-item"> ';
        $config['first_tag_close'] = '</li>';
        //$config['first_url'] = base_url() . 'patients/list/0'; 
        $config['prev_link'] = '<img src="'.base_url('assets/images/icons/left-1.png').'" alt="">';
        $config['next_link'] = '<img src="'.base_url('assets/images/icons/right-1.png').'" alt="">';
        $config['num_tag_open'] = '<li class="page-item ">';
        $config['num_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item " >';
        $config['next_tag_close'] = '</li>';

        $config['prev_tag_open'] = '<li class="page-item" >';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';


        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        $data["satauri"] ='გაგზავნილი შეტყობინებები';
      $this->load->view('layouts/Aheader');
      $this->load->view('admin/finansebi_menu',$data);
      $this->load->view('admin/finansebi_gagzavnili',$data);
      $this->load->view('layouts/Afooter');
  }
  public function finansebi_all_search()
  {
      if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
      if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
      $config["per_page"] = 20;
      $array = [];
      $arrayy = [];
      $viewed = [];
      $raod = 0;
        $link = "";
        $mas = [];
        $data['gagzavnili_sms'] = array();;
        $data["migebuli_sms_count"] = 0;
      $data["gagzavnili_sms_count"] = 0;
      $data['search_sms_count'] = 0;
      $data["files_count"] = 0;
      if(!empty($this->admin_model->get_finansebi_sms_migebuli_all()))
      $data["migebuli_sms_count"] = count($this->admin_model->get_finansebi_sms_migebuli_all());
      if(!empty($this->admin_model->get_finansebi_sms_gagzavnili_all()))
      $data["gagzavnili_sms_count"] = count($this->admin_model->get_finansebi_sms_gagzavnili_all());
      if(!empty($this->admin_model->get_finansebi_files()))
      $data["files_count"] = count($this->admin_model->get_finansebi_files());
        if($this->uri->segment(3))
        { 
            $i=4;
       
         while($this->uri->segment($i) != "")
        {
            
            $mas[$this->uri->segment($i-1)] = $this->uri->segment($i);
            $raod = $raod +2;
            $link =$link."/".$this->uri->segment($i-1)."/".$this->uri->segment($i);
            $i = $i +2;
        }
        }
              
        else
        {
       
      if(($this->input->post('status') != "")) 
      {
          $arrayy['status'] = $this->input->post('status');
          $raod = $raod+2;
          $link =$link."/status/".$this->input->post('status');

      }
      if(($this->input->post('from') != "საიდან")) 
      {
          $arrayy['from'] = $this->input->post('from');
          $raod = $raod+2;
          $link =$link."/from/".$this->input->post('from');

      }
      if(($this->input->post('to') != "სადამდე")) 
      {
          $arrayy['to'] = $this->input->post('to');
          $raod = $raod+2;
          $link =$link."/to/".$this->input->post('to');

      }
      if(($this->input->post('category') != "")) 
      {
          $arrayy['category'] = $this->input->post('category');
          $raod = $raod+2;
          $link =$link."/category/".$this->input->post('gategory');

      }
     
      
        }
        $page = ($this->uri->segment(3+$raod)) ? $this->uri->segment(3+$raod) : 0;
        if(count($arrayy) != "0")
        {
        $data['gagzavnili_sms'] = $this->admin_model->get_finansebi_all_search($arrayy, $config["per_page"], $page);
        $data['search_sms_count'] = count($this->admin_model->get_finansebi_all_search_count($arrayy));
        }
      if(count($mas) != "0")
      {
      $data['gagzavnili_sms'] = $this->admin_model->get_finansebi_all_search($mas, $config["per_page"], $page);
      $data['search_sms_count'] = count($this->admin_model->get_finansebi_all_search_count($mas));
      }
       $data['code'] = $this->generateRandomString(12);
       $data['finansebi_users_all_select'] = $this->admin_model->get_finansebi_users_all_select();
      
      
      
       $config["per_page"] = 20;
       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        

        $config = array();
        $config["base_url"] = base_url() . "admin/finansebi_all_search".$link;
        $config["total_rows"] = $data['search_sms_count'];
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
       // $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = 5;
    
        $config['first_tag_open'] = '<li  class="page-item"> ';
        $config['first_tag_close'] = '</li>';
        //$config['first_url'] = base_url() . 'patients/list/0'; 
        $config['prev_link'] = '<img src="'.base_url('assets/images/icons/left-1.png').'" alt="">';
        $config['next_link'] = '<img src="'.base_url('assets/images/icons/right-1.png').'" alt="">';
        $config['num_tag_open'] = '<li class="page-item ">';
        $config['num_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item " >';
        $config['next_tag_close'] = '</li>';

        $config['prev_tag_open'] = '<li class="page-item" >';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';


        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        $data["satauri"] ='გაფილტრული შეტყობინებები';
      $this->load->view('layouts/Aheader');
      $this->load->view('admin/finansebi_menu',$data);
      $this->load->view('admin/finansebi_all_search',$data);
      $this->load->view('layouts/Afooter');
  }
  public function finansebi_files()
  {
      if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
      if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
      $config["per_page"] = 20;
    
      $data['code'] = $this->generateRandomString(12);
      $data['finansebi_users_all_select'] = $this->admin_model->get_finansebi_users_all_select();
      
      $data["migebuli_sms_count"] = 0;
      $data["gagzavnili_sms_count"] = 0;
      $data["files_count"] = 0;
      if(!empty($this->admin_model->get_finansebi_sms_migebuli_all()))
      $data["migebuli_sms_count"] = count($this->admin_model->get_finansebi_sms_migebuli_all());
      if(!empty($this->admin_model->get_finansebi_sms_gagzavnili_all()))
      $data["gagzavnili_sms_count"] = count($this->admin_model->get_finansebi_sms_gagzavnili_all());
      if(!empty($this->admin_model->get_finansebi_files()))
      $data["files_count"] = count($this->admin_model->get_finansebi_files());
      
      $array = [];
    $viewed = [];
    $config["per_page"] = 20;
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['files'] = array();
      $data['files'] = $this->admin_model->get_finansebi_files($config["per_page"], $page);
      

      
        $config = array();
        $config["base_url"] = base_url() . "admin/finansebi_files";
        $config["total_rows"] = $data["gagzavnili_sms_count"];
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
       // $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = 5;
    
        $config['first_tag_open'] = '<li  class="page-item"> ';
        $config['first_tag_close'] = '</li>';
        //$config['first_url'] = base_url() . 'patients/list/0'; 
        $config['prev_link'] = '<img src="'.base_url('assets/images/icons/left-1.png').'" alt="">';
        $config['next_link'] = '<img src="'.base_url('assets/images/icons/right-1.png').'" alt="">';
        $config['num_tag_open'] = '<li class="page-item ">';
        $config['num_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item " >';
        $config['next_tag_close'] = '</li>';

        $config['prev_tag_open'] = '<li class="page-item" >';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';


        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        $data["satauri"] ='ფაილები';
      $this->load->view('layouts/Aheader');
      $this->load->view('admin/finansebi_menu',$data);
      $this->load->view('admin/finansebi_files',$data);
      $this->load->view('layouts/Afooter');
  }
  public function finansebi_migebuli_sms_details($code)
  {
      if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
      if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
     
      $data['code'] = $this->generateRandomString(12);
      $data['finansebi_users_all_select'] = $this->admin_model->get_finansebi_users_all_select();
      $data['finansebi_sms_details'] = $this->admin_model->get_finansebi_sms_details($code);
      $data['finansebi_sms_status_update'] = $this->admin_model->finansebi_status_update($code);
      
      $data["migebuli_sms_count"] = 0;
      $data["gagzavnili_sms_count"] = 0;
      $data["files_count"] = 0;
      $data['migebuli_files'] = 0;
      if(!empty($this->admin_model->get_finansebi_sms_migebuli_all()))
      $data["migebuli_sms_count"] = count($this->admin_model->get_finansebi_sms_migebuli_all());
      if(!empty($this->admin_model->get_finansebi_sms_gagzavnili_all()))
      $data["gagzavnili_sms_count"] = count($this->admin_model->get_finansebi_sms_gagzavnili_all());
      if(!empty($this->admin_model->get_finansebi_files()))
      $data["files_count"] = count($this->admin_model->get_finansebi_files());
      $data['migebuli_files'] = $this->admin_model->finansebi_migebuli_files($code);
      $data["satauri"] ='მიღებული შეტყობინებები';

      $this->load->view('layouts/Aheader');
      $this->load->view('admin/finansebi_menu',$data);
      $this->load->view('admin/finansebi_migebuli_sms_details',$data);
      $this->load->view('layouts/Afooter');
  }
  public function finansebi_gagzavnili_sms_details($code)
  {
      if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
      if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
     
    $data['code'] = $this->generateRandomString(12);
      $data['finansebi_users_all_select'] = $this->admin_model->get_finansebi_users_all_select();
      $data['finansebi_sms_details'] = $this->admin_model->get_finansebi_sms_details($code);

      $data["migebuli_sms_count"] = 0;
      $data["gagzavnili_sms_count"] = 0;
      $data["files_count"] = 0;
      $data['gagzavnili_files'] = 0;
      if(!empty($this->admin_model->get_finansebi_sms_migebuli_all()))
      $data["migebuli_sms_count"] = count($this->admin_model->get_finansebi_sms_migebuli_all());
      if(!empty($this->admin_model->get_finansebi_sms_gagzavnili_all()))
      $data["gagzavnili_sms_count"] = count($this->admin_model->get_finansebi_sms_gagzavnili_all());
      if(!empty($this->admin_model->get_finansebi_files()))
      $data["files_count"] = count($this->admin_model->get_finansebi_files());
      $data['gagzavnili_files'] = $this->admin_model->finansebi_gagzavnili_files($code);
      $data["satauri"] ='გაგზავნილი შეტყობინებები';

      $this->load->view('layouts/Aheader');
      $this->load->view('admin/finansebi_menu',$data);
      $this->load->view('admin/finansebi_gagzavnili_sms_details',$data);
      $this->load->view('layouts/Afooter');
  }
  public function finansebis_sms_gagzavna($code)
  {
      if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
    
    else if($this->input->server('REQUEST_METHOD') == 'POST')
    {
      $link ="";
      //$postData = $this->input->post();
      if($this->input->post('mimgebi') !=' '){
      $result_explode = explode('-', $this->input->post('mimgebi'));
      $mimgebi = $result_explode[0].' '.$result_explode[1];
      }
      $date = date('Y-m-d');
      $time = date('H:i');
      //$code = $this->session->userdata('finansebis_code');
    
    $this->db->set('mimgebi', $mimgebi);
    $this->db->set('gamgzavni', $this->session->userdata('name').' '.$this->session->userdata('surname'));
    $this->db->set('subject', $this->input->post('subject'));
    $this->db->set('text', $this->input->post('text'));
    $this->db->set('reg_id', $this->session->userdata('id'));
    $this->db->set('reg_name', $this->session->userdata('name'));
    $this->db->set('reg_surname', $this->session->userdata('surname'));
    $this->db->set('date', $date);
    $this->db->set('time', $time);
    $this->db->set('code', $code);
    $this->db->insert('finansebis_sms');
        $this->session->set_flashdata('alert', 'შეტყობინება გაიგზავნა');
      $this->session->set_flashdata('alertype', 'success');
      $data['update_sms_status'] = $this->admin_model->update_finansebi_files_status($code);
      if($this->input->post('email') != '')
     {
         
          $msg = '';
         $config['mailtype'] = 'html';

         $this->email->initialize($config);
         $data['gagzavnili_files'] = 0;
         $data['gagzavnili_files'] = $this->admin_model->finansebi_gagzavnili_files($code);
         if (!empty($data["gagzavnili_files"]))
         {
             foreach ($data["gagzavnili_files"] as $sms_item)
             {
                 if($sms_item['file_ext'] == '.jpg' || $sms_item['file_ext']== '.jpeg' || $sms_item['file_ext']=='.png')
                 
                 {
                 $link = 'finansebi/'.$sms_item['file_name'];
                 $msg .='<div style="width:100%;background-color: #373334!important;"> <img  src="https://www.bestbuildergroup.com/assets/images/'.$link.'" style="border-radius: 0; width:160px; height:100px;" alt="">
           <font style="color:#f1d766!important;">'.$sms_item["file_name"].'- </font><a href="https://www.bestbuildergroup.com/assets/images/finansebi/'.$sms_item["file_name"].'" download style="background-color:#7367F0!important;color:#f1d766!important;"> ჩამოტვირთვა</a></div>';
   
                 }
                 else
                 {
                     $link = $sms_item['file_ext'].'.png';
                     $msg .='<div style="width:100%;background-color: #373334!important;"> <img  src="https://www.bestbuildergroup.com/assets/images/'.$link.'" style="border-radius: 0; width:160px; height:100px;" alt="">
           <font style="color:#f1d766!important;">'.$sms_item["file_name"].'- </font><a href="https://www.bestbuildergroup.com/assets/images/finansebi/'.$sms_item["file_name"].'" download style="background-color:#7367F0!important;color:#f1d766!important;"> ჩამოტვირთვა</a></div>';
   
                 }
                          }
         }
        $this->email->from($this->session->userdata('email'), "ბესთბილდინგ");
        $this->email->to($this->input->post('email'));
        $this->email->subject($this->input->post('subject'));
        $this->email->message($this->input->post('text').'<br> მიბმული ფაილები:<br>'.$msg);
        //Send mail
        $this->email->send();
     }

      redirect(base_url("admin/finansebi_gagzavnili")); 
    }
    redirect(base_url("admin/finansebi_migebuli")); 
  
  }
	//////////////////////////////////////////////////////////////////////// Iuristebi
  public function iuridiuli_migebuli()
  {
      if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
      if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
      $config["per_page"] = 20;
    
    $data['code'] = $this->generateRandomString(12);
      $data['iuridiuli_users_all_select'] = $this->admin_model->get_iuridiuli_users_all_select();
      
      $data["migebuli_sms_count"] = 0;
      $data["gagzavnili_sms_count"] = 0;
      $data["files_count"] = 0;
      if(!empty($this->admin_model->get_iuridiuli_sms_migebuli_all()))
      $data["migebuli_sms_count"] = count($this->admin_model->get_iuridiuli_sms_migebuli_all());
      if(!empty($this->admin_model->get_iuridiuli_sms_gagzavnili_all()))
      $data["gagzavnili_sms_count"] = count($this->admin_model->get_iuridiuli_sms_gagzavnili_all());
      if(!empty($this->admin_model->get_iuridiuli_files()))
      $data["files_count"] = count($this->admin_model->get_iuridiuli_files());
      
      $array = [];
    $viewed = [];
    $config["per_page"] = 20;
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['migebuli_sms'] = array();
      $data['migebuli_sms'] = $this->admin_model->get_iuridiuli_sms_migebuli($config["per_page"], $page);
      

      
      $config = array();
        $config["base_url"] = base_url() . "admin/iuridiuli_migebuli";
        $config["total_rows"] = $data["migebuli_sms_count"];
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
       // $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = 5;
    
        $config['first_tag_open'] = '<li  class="page-item"> ';
        $config['first_tag_close'] = '</li>';
        //$config['first_url'] = base_url() . 'patients/list/0'; 
        $config['prev_link'] = '<img src="'.base_url('assets/images/icons/left-1.png').'" alt="">';
        $config['next_link'] = '<img src="'.base_url('assets/images/icons/right-1.png').'" alt="">';
        $config['num_tag_open'] = '<li class="page-item ">';
        $config['num_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item " >';
        $config['next_tag_close'] = '</li>';

        $config['prev_tag_open'] = '<li class="page-item" >';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';


        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        $data["satauri"] ='მიღებული შეტყობინებები';
      $this->load->view('layouts/Aheader');
      $this->load->view('admin/iuridiuli_menu',$data);
      $this->load->view('admin/iuridiuli_migebuli',$data);
      $this->load->view('layouts/Afooter');
  }
  public function iuridiuli_gagzavnili()
  {
      if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
      if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
      $config["per_page"] = 20;
    
    $data['code'] = $this->generateRandomString(12);
      $data['iuridiuli_users_all_select'] = $this->admin_model->get_iuridiuli_users_all_select();
      
      $data["migebuli_sms_count"] = 0;
      $data["gagzavnili_sms_count"] = 0;
      $data["files_count"] = 0;
      if(!empty($this->admin_model->get_iuridiuli_sms_migebuli_all()))
      $data["migebuli_sms_count"] = count($this->admin_model->get_iuridiuli_sms_migebuli_all());
      if(!empty($this->admin_model->get_iuridiuli_sms_gagzavnili_all()))
      $data["gagzavnili_sms_count"] = count($this->admin_model->get_iuridiuli_sms_gagzavnili_all());
      if(!empty($this->admin_model->get_iuridiuli_files()))
      $data["files_count"] = count($this->admin_model->get_iuridiuli_files());
      
      $array = [];
    $viewed = [];
    $config["per_page"] = 20;
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['gagzavnili_sms'] = 0;
      $data['gagzavnili_sms'] = $this->admin_model->get_iuridiuli_sms_gagzavnili($config["per_page"], $page);
      

      
      $config = array();
        $config["base_url"] = base_url() . "admin/iuridiuli_gagzavnili";
        $config["total_rows"] = $data["gagzavnili_sms_count"];
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
       // $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = 5;
    
        $config['first_tag_open'] = '<li  class="page-item"> ';
        $config['first_tag_close'] = '</li>';
        //$config['first_url'] = base_url() . 'patients/list/0'; 
        $config['prev_link'] = '<img src="'.base_url('assets/images/icons/left-1.png').'" alt="">';
        $config['next_link'] = '<img src="'.base_url('assets/images/icons/right-1.png').'" alt="">';
        $config['num_tag_open'] = '<li class="page-item ">';
        $config['num_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item " >';
        $config['next_tag_close'] = '</li>';

        $config['prev_tag_open'] = '<li class="page-item" >';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';


        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        $data["satauri"] ='გაგზავნილი შეტყობინებები';
      $this->load->view('layouts/Aheader');
      $this->load->view('admin/iuridiuli_menu',$data);
      $this->load->view('admin/iuridiuli_gagzavnili',$data);
      $this->load->view('layouts/Afooter');
  }
  public function iuridiuli_all_search()
  {
      if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
      if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
      $config["per_page"] = 20;
      $array = [];
      $arrayy = [];
    $viewed = [];
    $raod = 0;
        $link = "";
        $mas = [];
        $data['gagzavnili_sms'] = array();
        $data["migebuli_sms_count"] = 0;
      $data["gagzavnili_sms_count"] = 0;
      $data['search_sms_count'] = 0;
      $data["files_count"] = 0;
      if(!empty($this->admin_model->get_iuridiuli_sms_migebuli_all()))
      $data["migebuli_sms_count"] = count($this->admin_model->get_iuridiuli_sms_migebuli_all());
      if(!empty($this->admin_model->get_iuridiuli_sms_gagzavnili_all()))
      $data["gagzavnili_sms_count"] = count($this->admin_model->get_iuridiuli_sms_gagzavnili_all());
      if(!empty($this->admin_model->get_iuridiuli_files()))
      $data["files_count"] = count($this->admin_model->get_iuridiuli_files());
        if($this->uri->segment(3))
        { 
            $i=4;
       
         while($this->uri->segment($i) != "")
        {
            
            $mas[$this->uri->segment($i-1)] = $this->uri->segment($i);
            $raod = $raod +2;
            $link =$link."/".$this->uri->segment($i-1)."/".$this->uri->segment($i);
            $i = $i +2;
        }
        }
              
        else
        {
       
       if(($this->input->post('status') != "")) 
      {
          $arrayy['status'] = $this->input->post('status');
          $raod = $raod+2;
          $link =$link."/status/".$this->input->post('status');

      }
      if(($this->input->post('category') != "")) 
      {
          $arrayy['category'] = $this->input->post('category');
          $raod = $raod+2;
          $link =$link."/category/".$this->input->post('gategory');

      }
     
        }
        $page = ($this->uri->segment(3+$raod)) ? $this->uri->segment(3+$raod) : 0;
        if(count($arrayy) != "0"){
        $data['gagzavnili_sms'] = $this->admin_model->get_iuridiuli_all_search($arrayy, $config["per_page"], $page);
        $data['search_sms_count'] = count($this->admin_model->get_iuridiuli_all_search_count($arrayy));
        }
      if(count($mas) != "0")
      {
        $data['gagzavnili_sms'] = $this->admin_model->get_iuridiuli_all_search($mas, $config["per_page"], $page);
       $data['search_sms_count'] = count($this->admin_model->get_iuridiuli_all_search_count($mas));
      }
       $data['code'] = $this->generateRandomString(12);
       $data['iuridiuli_users_all_select'] = $this->admin_model->get_iuridiuli_users_all_select();
      
      
      
       $config["per_page"] = 20;
       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        

        $config = array();
        $config["base_url"] = base_url() . "admin/iuridiuli_all_search".$link;
        $config["total_rows"] = $data['search_sms_count'];
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
       // $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = 5;
    
        $config['first_tag_open'] = '<li  class="page-item"> ';
        $config['first_tag_close'] = '</li>';
        //$config['first_url'] = base_url() . 'patients/list/0'; 
        $config['prev_link'] = '<img src="'.base_url('assets/images/icons/left-1.png').'" alt="">';
        $config['next_link'] = '<img src="'.base_url('assets/images/icons/right-1.png').'" alt="">';
        $config['num_tag_open'] = '<li class="page-item ">';
        $config['num_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item " >';
        $config['next_tag_close'] = '</li>';

        $config['prev_tag_open'] = '<li class="page-item" >';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';


        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        $data["satauri"] ='გაფილტრული შეტყობინებები';
      $this->load->view('layouts/Aheader');
      $this->load->view('admin/iuridiuli_menu',$data);
      $this->load->view('admin/iuridiuli_all_search',$data);
      $this->load->view('layouts/Afooter');
  }
  public function iuridiuli_files()
  {
      if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
      if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
      $config["per_page"] = 20;
    
    $data['code'] = $this->generateRandomString(12);
      $data['iuridiuli_users_all_select'] = $this->admin_model->get_iuridiuli_users_all_select();
      
      $data["migebuli_sms_count"] = 0;
      $data["gagzavnili_sms_count"] = 0;
      $data["files_count"] = 0;
      if(!empty($this->admin_model->get_iuridiuli_sms_migebuli_all()))
      $data["migebuli_sms_count"] = count($this->admin_model->get_iuridiuli_sms_migebuli_all());
      if(!empty($this->admin_model->get_iuridiuli_sms_gagzavnili_all()))
      $data["gagzavnili_sms_count"] = count($this->admin_model->get_iuridiuli_sms_gagzavnili_all());
      if(!empty($this->admin_model->get_iuridiuli_files()))
      $data["files_count"] = count($this->admin_model->get_iuridiuli_files());
      
      $array = [];
      $viewed = [];
      $config["per_page"] = 20;
      $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['files'] = array();
      $data['files'] = $this->admin_model->get_iuridiuli_files($config["per_page"], $page);
      

      
      $config = array();
        $config["base_url"] = base_url() . "admin/iuridiuli_files";
        $config["total_rows"] = $data["gagzavnili_sms_count"];
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
       // $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = 5;
    
        $config['first_tag_open'] = '<li  class="page-item"> ';
        $config['first_tag_close'] = '</li>';
        //$config['first_url'] = base_url() . 'patients/list/0'; 
        $config['prev_link'] = '<img src="'.base_url('assets/images/icons/left-1.png').'" alt="">';
        $config['next_link'] = '<img src="'.base_url('assets/images/icons/right-1.png').'" alt="">';
        $config['num_tag_open'] = '<li class="page-item ">';
        $config['num_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item " >';
        $config['next_tag_close'] = '</li>';

        $config['prev_tag_open'] = '<li class="page-item" >';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';


        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        $data["satauri"] ='ფაილები';
      $this->load->view('layouts/Aheader');
      $this->load->view('admin/iuridiuli_menu',$data);
      $this->load->view('admin/iuridiuli_files',$data);
      $this->load->view('layouts/Afooter');
  }
  public function iuridiuli_migebuli_sms_details($code)
  {
      if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
      if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
     
    $data['code'] = $this->generateRandomString(12);
      $data['iuridiuli_users_all_select'] = $this->admin_model->get_iuridiuli_users_all_select();
      $data['iuridiuli_sms_details'] = $this->admin_model->get_iuridiuli_sms_details($code);
      $data['iuridiuli_sms_status_update'] = $this->admin_model->iuridiuli_status_update($code);
      
      $data["migebuli_sms_count"] = 0;
      $data["gagzavnili_sms_count"] = 0;
      $data["files_count"] = 0;
      $data['migebuli_files'] = 0;
      if(!empty($this->admin_model->get_iuridiuli_sms_migebuli_all()))
      $data["migebuli_sms_count"] = count($this->admin_model->get_iuridiuli_sms_migebuli_all());
      if(!empty($this->admin_model->get_iuridiuli_sms_gagzavnili_all()))
      $data["gagzavnili_sms_count"] = count($this->admin_model->get_iuridiuli_sms_gagzavnili_all());
      if(!empty($this->admin_model->get_iuridiuli_files()))
      $data["files_count"] = count($this->admin_model->get_iuridiuli_files());
      $data['migebuli_files'] = $this->admin_model->iuridiuli_migebuli_files($code);
    $data["satauri"] ='მიღებული შეტყობინებები';

      $this->load->view('layouts/Aheader');
      $this->load->view('admin/iuridiuli_menu',$data);
      $this->load->view('admin/iuridiuli_migebuli_sms_details',$data);
      $this->load->view('layouts/Afooter');
  }
  public function iuridiuli_gagzavnili_sms_details($code)
  {
      if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
      if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
     
    $data['code'] = $this->generateRandomString(12);
      $data['iuridiuli_users_all_select'] = $this->admin_model->get_iuridiuli_users_all_select();
      $data['iuridiuli_sms_details'] = $this->admin_model->get_iuridiuli_sms_details($code);

      $data["migebuli_sms_count"] = 0;
      $data["gagzavnili_sms_count"] = 0;
      $data["files_count"] = 0;
      $data['gagzavnili_files'] = 0;
      if(!empty($this->admin_model->get_iuridiuli_sms_migebuli_all()))
      $data["migebuli_sms_count"] = count($this->admin_model->get_iuridiuli_sms_migebuli_all());
      if(!empty($this->admin_model->get_iuridiuli_sms_gagzavnili_all()))
      $data["gagzavnili_sms_count"] = count($this->admin_model->get_iuridiuli_sms_gagzavnili_all());
      if(!empty($this->admin_model->get_iuridiuli_files()))
      $data["files_count"] = count($this->admin_model->get_iuridiuli_files());
      $data['gagzavnili_files'] = $this->admin_model->iuridiuli_gagzavnili_files($code);
      $data["satauri"] ='გაგზავნილი შეტყობინებები';

      $this->load->view('layouts/Aheader');
      $this->load->view('admin/iuridiuli_menu',$data);
      $this->load->view('admin/iuridiuli_gagzavnili_sms_details',$data);
      $this->load->view('layouts/Afooter');
  }
  public function iuridiulis_sms_gagzavna($code)
  {
      if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));

    else if($this->input->server('REQUEST_METHOD') == 'POST')
    {
      $link = "";
      //$postData = $this->input->post();
      if($this->input->post('mimgebi') !=' '){
      $result_explode = explode('-', $this->input->post('mimgebi'));
      $mimgebi = $result_explode[0].' '.$result_explode[1];
      }
      $date = date('Y-m-d');
      $time = date('H:i');
      //$code = $this->session->userdata('finansebis_code');
    
    $this->db->set('mimgebi', $mimgebi);
    $this->db->set('gamgzavni', $this->session->userdata('name').' '.$this->session->userdata('surname'));
    $this->db->set('subject', $this->input->post('subject'));
    $this->db->set('text', $this->input->post('text'));
    $this->db->set('reg_id', $this->session->userdata('id'));
    $this->db->set('reg_name', $this->session->userdata('name'));
    $this->db->set('reg_surname', $this->session->userdata('surname'));
    $this->db->set('date', $date);
    $this->db->set('time', $time);
    $this->db->set('code', $code);
    $this->db->insert('iuridiulis_sms');
        $this->session->set_flashdata('alert', 'შეტყობინება გაიგზავნა');
      $this->session->set_flashdata('alertype', 'success');
      $data['update_sms_status'] = $this->admin_model->update_iuridiuli_files_status($code);
      if($this->input->post('email') != '')
     {
          $msg = '';
         $config['mailtype'] = 'html';

         $this->email->initialize($config);
         $data['gagzavnili_files'] = 0;
         $data['gagzavnili_files'] = $this->admin_model->iuridiuli_gagzavnili_files($code);
         if (!empty($data["gagzavnili_files"]))
         {
             foreach ($data["gagzavnili_files"] as $sms_item)
             {
                  if($sms_item['file_ext'] == '.jpg' || $sms_item['file_ext']== '.jpeg' || $sms_item['file_ext']=='.png')
                 
                 {
                 $link = 'iuridiuli/'.$sms_item['file_name'];
                 $msg .='<div style="width:100%;background-color: #373334!important;"> <img  src="https://www.bestbuildergroup.com/assets/images/'.$link.'" style="border-radius: 0; width:160px; height:100px;" alt="">
           <font style="color:#f1d766!important;">'.$sms_item["file_name"].'- </font><a href="https://www.bestbuildergroup.com/assets/images/iuridiuli/'.$sms_item["file_name"].'" download style="background-color:#7367F0!important;color:#f1d766!important;"> ჩამოტვირთვა</a></div>';
   
                 }
                 else
                 {
                     $link = $sms_item['file_ext'].'.png';
                     $msg .='<div style="width:100%;background-color: #373334!important;"> <img  src="https://www.bestbuildergroup.com/assets/images/'.$link.'" style="border-radius: 0; width:160px; height:100px;" alt="">
           <font style="color:#f1d766!important;">'.$sms_item["file_name"].'- </font><a href="https://www.bestbuildergroup.com/assets/images/iuridiuli/'.$sms_item["file_name"].'" download style="background-color:#7367F0!important;color:#f1d766!important;"> ჩამოტვირთვა</a></div>';
   
                 }
                 }
         }
        $this->email->from($this->session->userdata('email'), "ბესთბილდინგ");
        $this->email->to($this->input->post('email'));
        $this->email->subject($this->input->post('subject'));
        $this->email->message($this->input->post('text').'<br> მიბმული ფაილები:<br>'.$msg);
        //Send mail
        $this->email->send();
     }

      redirect(base_url("admin/iuridiuli_gagzavnili")); 
    }
    redirect(base_url("admin/iuridiuli_migebuli")); 
  
  }
	////////////////////////////////////////////////////////////////////////Brigadiri
public function brigadiri_migebuli()
  {
      if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
      if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
      $config["per_page"] = 20;
    
    $data['code'] = $this->generateRandomString(12);
      $data['brigadiri_users_all_select'] = $this->admin_model->get_brigadiri_users_all_select();
      
      $data["migebuli_sms_count"] = 0;
      $data["gagzavnili_sms_count"] = 0;
      $data["files_count"] = 0;
      if(!empty($this->admin_model->get_brigadiri_sms_migebuli_all()))
      $data["migebuli_sms_count"] = count($this->admin_model->get_brigadiri_sms_migebuli_all());
      if(!empty($this->admin_model->get_brigadiri_sms_gagzavnili_all()))
      $data["gagzavnili_sms_count"] = count($this->admin_model->get_brigadiri_sms_gagzavnili_all());
      if(!empty($this->admin_model->get_brigadiri_files()))
      $data["files_count"] = count($this->admin_model->get_brigadiri_files());
      
      $array = [];
    $viewed = [];
    $config["per_page"] = 20;
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['migebuli_sms'] = array();
      $data['migebuli_sms'] = $this->admin_model->get_brigadiri_sms_migebuli($config["per_page"], $page);
      

      
      $config = array();
        $config["base_url"] = base_url() . "admin/brigadiri_migebuli";
        $config["total_rows"] = $data["migebuli_sms_count"];
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
       // $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = 5;
    
        $config['first_tag_open'] = '<li  class="page-item"> ';
        $config['first_tag_close'] = '</li>';
        //$config['first_url'] = base_url() . 'patients/list/0'; 
        $config['prev_link'] = '<img src="'.base_url('assets/images/icons/left-1.png').'" alt="">';
        $config['next_link'] = '<img src="'.base_url('assets/images/icons/right-1.png').'" alt="">';
        $config['num_tag_open'] = '<li class="page-item ">';
        $config['num_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item " >';
        $config['next_tag_close'] = '</li>';

        $config['prev_tag_open'] = '<li class="page-item" >';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';


        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        $data["satauri"] ='მიღებული შეტყობინებები';
      $this->load->view('layouts/Aheader');
      $this->load->view('admin/brigadiri_menu',$data);
      $this->load->view('admin/brigadiri_migebuli',$data);
      $this->load->view('layouts/Afooter');
  }
  public function brigadiri_gagzavnili()
  {
      if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
      if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
      $config["per_page"] = 20;
    
    $data['code'] = $this->generateRandomString(12);
      $data['brigadiri_users_all_select'] = $this->admin_model->get_brigadiri_users_all_select();
      
      $data["migebuli_sms_count"] = 0;
      $data["gagzavnili_sms_count"] = 0;
      $data["files_count"] = 0;
      if(!empty($this->admin_model->get_brigadiri_sms_migebuli_all()))
      $data["migebuli_sms_count"] = count($this->admin_model->get_brigadiri_sms_migebuli_all());
      if(!empty($this->admin_model->get_brigadiri_sms_gagzavnili_all()))
      $data["gagzavnili_sms_count"] = count($this->admin_model->get_brigadiri_sms_gagzavnili_all());
      if(!empty($this->admin_model->get_brigadiri_files()))
      $data["files_count"] = count($this->admin_model->get_brigadiri_files());
      
      $array = [];
    $viewed = [];
    $config["per_page"] = 20;
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['gagzavnili_sms'] = 0;
      $data['gagzavnili_sms'] = $this->admin_model->get_brigadiri_sms_gagzavnili($config["per_page"], $page);
      

      
      $config = array();
        $config["base_url"] = base_url() . "admin/brigadiri_gagzavnili";
        $config["total_rows"] = $data["gagzavnili_sms_count"];
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
       // $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = 5;
    
        $config['first_tag_open'] = '<li  class="page-item"> ';
        $config['first_tag_close'] = '</li>';
        //$config['first_url'] = base_url() . 'patients/list/0'; 
        $config['prev_link'] = '<img src="'.base_url('assets/images/icons/left-1.png').'" alt="">';
        $config['next_link'] = '<img src="'.base_url('assets/images/icons/right-1.png').'" alt="">';
        $config['num_tag_open'] = '<li class="page-item ">';
        $config['num_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item " >';
        $config['next_tag_close'] = '</li>';

        $config['prev_tag_open'] = '<li class="page-item" >';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';


        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        $data["satauri"] ='გაგზავნილი შეტყობინებები';
      $this->load->view('layouts/Aheader');
      $this->load->view('admin/brigadiri_menu',$data);
      $this->load->view('admin/brigadiri_gagzavnili',$data);
      $this->load->view('layouts/Afooter');
  }
  public function brigadiri_all_search()
  {
      if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
      if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
      $config["per_page"] = 20;
      $array = [];
      $arrayy = [];
    $viewed = [];
    $raod = 0;
        $link = "";
        $mas = [];
        $data['gagzavnili_sms'] = array();
        $data["migebuli_sms_count"] = 0;
      $data["gagzavnili_sms_count"] = 0;
      $data['search_sms_count'] = 0;
      $data["files_count"] = 0;
      if(!empty($this->admin_model->get_brigadiri_sms_migebuli_all()))
      $data["migebuli_sms_count"] = count($this->admin_model->get_brigadiri_sms_migebuli_all());
      if(!empty($this->admin_model->get_brigadiri_sms_gagzavnili_all()))
      $data["gagzavnili_sms_count"] = count($this->admin_model->get_brigadiri_sms_gagzavnili_all());
      if(!empty($this->admin_model->get_brigadiri_files()))
      $data["files_count"] = count($this->admin_model->get_brigadiri_files());
        if($this->uri->segment(3))
        { 
            $i=4;
       
         while($this->uri->segment($i) != "")
        {
            
            $mas[$this->uri->segment($i-1)] = $this->uri->segment($i);
            $raod = $raod +2;
            $link =$link."/".$this->uri->segment($i-1)."/".$this->uri->segment($i);
            $i = $i +2;
        }
        }
              
        else
        {
       
       if(($this->input->post('status') != "")) 
      {
          $arrayy['status'] = $this->input->post('status');
          $raod = $raod+2;
          $link =$link."/status/".$this->input->post('status');

      }
      if(($this->input->post('category') != "")) 
      {
          $arrayy['category'] = $this->input->post('category');
          $raod = $raod+2;
          $link =$link."/category/".$this->input->post('gategory');

      }
    
        }
        $page = ($this->uri->segment(3+$raod)) ? $this->uri->segment(3+$raod) : 0;
        if(count($arrayy) != "0"){
        $data['gagzavnili_sms'] = $this->admin_model->get_brigadiri_all_search($arrayy, $config["per_page"], $page);
        $data['search_sms_count'] = count($this->admin_model->get_brigadiri_all_search_count($arrayy));
        }
      if(count($mas) != "0")
      {
      $data['gagzavnili_sms'] = $this->admin_model->get_brigadiri_all_search($mas, $config["per_page"], $page);
      $data['search_sms_count'] = count($this->admin_model->get_brigadiri_all_search_count($mas));
      }
       $data['code'] = $this->generateRandomString(12);
       $data['brigadiri_users_all_select'] = $this->admin_model->get_brigadiri_users_all_select();
      
      
      
       $config["per_page"] = 20;
       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        

        $config = array();
        $config["base_url"] = base_url() . "admin/brigadiri_all_search".$link;
        $config["total_rows"] = $data['search_sms_count'];
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
       // $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = 5;
    
        $config['first_tag_open'] = '<li  class="page-item"> ';
        $config['first_tag_close'] = '</li>';
        //$config['first_url'] = base_url() . 'patients/list/0'; 
        $config['prev_link'] = '<img src="'.base_url('assets/images/icons/left-1.png').'" alt="">';
        $config['next_link'] = '<img src="'.base_url('assets/images/icons/right-1.png').'" alt="">';
        $config['num_tag_open'] = '<li class="page-item ">';
        $config['num_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item " >';
        $config['next_tag_close'] = '</li>';

        $config['prev_tag_open'] = '<li class="page-item" >';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';


        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        $data["satauri"] ='გაფილტრული შეტყობინებები';
      $this->load->view('layouts/Aheader');
      $this->load->view('admin/brigadiri_menu',$data);
      $this->load->view('admin/brigadiri_all_search',$data);
      $this->load->view('layouts/Afooter');
  }
  public function brigadiri_files()
  {
      if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
      if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
      $config["per_page"] = 20;
    
    $data['code'] = $this->generateRandomString(12);
      $data['brigadiri_users_all_select'] = $this->admin_model->get_brigadiri_users_all_select();
      
      $data["migebuli_sms_count"] = 0;
      $data["gagzavnili_sms_count"] = 0;
      $data["files_count"] = 0;
      if(!empty($this->admin_model->get_brigadiri_sms_migebuli_all()))
      $data["migebuli_sms_count"] = count($this->admin_model->get_brigadiri_sms_migebuli_all());
      if(!empty($this->admin_model->get_brigadiri_sms_gagzavnili_all()))
      $data["gagzavnili_sms_count"] = count($this->admin_model->get_brigadiri_sms_gagzavnili_all());
      if(!empty($this->admin_model->get_brigadiri_files()))
      $data["files_count"] = count($this->admin_model->get_brigadiri_files());
      
      $array = [];
    $viewed = [];
    $config["per_page"] = 20;
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['files'] = array();
      $data['files'] = $this->admin_model->get_brigadiri_files($config["per_page"], $page);
      

      
      $config = array();
        $config["base_url"] = base_url() . "admin/brigadiri_files";
        $config["total_rows"] = $data["gagzavnili_sms_count"];
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
       // $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = 5;
    
        $config['first_tag_open'] = '<li  class="page-item"> ';
        $config['first_tag_close'] = '</li>';
        //$config['first_url'] = base_url() . 'patients/list/0'; 
        $config['prev_link'] = '<img src="'.base_url('assets/images/icons/left-1.png').'" alt="">';
        $config['next_link'] = '<img src="'.base_url('assets/images/icons/right-1.png').'" alt="">';
        $config['num_tag_open'] = '<li class="page-item ">';
        $config['num_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item " >';
        $config['next_tag_close'] = '</li>';

        $config['prev_tag_open'] = '<li class="page-item" >';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';


        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        $data["satauri"] ='ფაილები';
      $this->load->view('layouts/Aheader');
      $this->load->view('admin/brigadiri_menu',$data);
      $this->load->view('admin/brigadiri_files',$data);
      $this->load->view('layouts/Afooter');
  }
  public function brigadiri_migebuli_sms_details($code)
  {
      if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
      if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
     
    $data['code'] = $this->generateRandomString(12);
      $data['brigadiri_users_all_select'] = $this->admin_model->get_brigadiri_users_all_select();
      $data['brigadiri_sms_details'] = $this->admin_model->get_brigadiri_sms_details($code);
      $data['brigadiri_sms_status_update'] = $this->admin_model->brigadiri_status_update($code);
      
      $data["migebuli_sms_count"] = 0;
      $data["gagzavnili_sms_count"] = 0;
      $data["files_count"] = 0;
      $data['migebuli_files'] = 0;
      if(!empty($this->admin_model->get_brigadiri_sms_migebuli_all()))
      $data["migebuli_sms_count"] = count($this->admin_model->get_brigadiri_sms_migebuli_all());
      if(!empty($this->admin_model->get_brigadiri_sms_gagzavnili_all()))
      $data["gagzavnili_sms_count"] = count($this->admin_model->get_brigadiri_sms_gagzavnili_all());
      if(!empty($this->admin_model->get_brigadiri_files()))
      $data["files_count"] = count($this->admin_model->get_brigadiri_files());
      $data['migebuli_files'] = $this->admin_model->brigadiri_migebuli_files($code);
    $data["satauri"] ='მიღებული შეტყობინებები';

      $this->load->view('layouts/Aheader');
      $this->load->view('admin/brigadiri_menu',$data);
      $this->load->view('admin/brigadiri_migebuli_sms_details',$data);
      $this->load->view('layouts/Afooter');
  }
  public function brigadiri_gagzavnili_sms_details($code)
  {
      if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
      if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
     
    $data['code'] = $this->generateRandomString(12);
      $data['brigadiri_users_all_select'] = $this->admin_model->get_brigadiri_users_all_select();
      $data['brigadiri_sms_details'] = $this->admin_model->get_brigadiri_sms_details($code);

      $data["migebuli_sms_count"] = 0;
      $data["gagzavnili_sms_count"] = 0;
      $data["files_count"] = 0;
      $data['gagzavnili_files'] = 0;
      if(!empty($this->admin_model->get_brigadiri_sms_migebuli_all()))
      $data["migebuli_sms_count"] = count($this->admin_model->get_brigadiri_sms_migebuli_all());
      if(!empty($this->admin_model->get_brigadiri_sms_gagzavnili_all()))
      $data["gagzavnili_sms_count"] = count($this->admin_model->get_brigadiri_sms_gagzavnili_all());
      if(!empty($this->admin_model->get_brigadiri_files()))
      $data["files_count"] = count($this->admin_model->get_brigadiri_files());
      $data['gagzavnili_files'] = $this->admin_model->brigadiri_gagzavnili_files($code);
      $data["satauri"] ='გაგზავნილი შეტყობინებები';

      $this->load->view('layouts/Aheader');
      $this->load->view('admin/brigadiri_menu',$data);
      $this->load->view('admin/brigadiri_gagzavnili_sms_details',$data);
      $this->load->view('layouts/Afooter');
  }
  public function brigadiris_sms_gagzavna($code)
  {
      if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));

    else if($this->input->server('REQUEST_METHOD') == 'POST')
    {
      $link ="";
      //$postData = $this->input->post();
      if($this->input->post('mimgebi') !=' '){
      $result_explode = explode('-', $this->input->post('mimgebi'));
      $mimgebi = $result_explode[0].' '.$result_explode[1];
      }
      $date = date('Y-m-d');
      $time = date('H:i');
      //$code = $this->session->userdata('finansebis_code');
    
    $this->db->set('mimgebi', $mimgebi);
    $this->db->set('gamgzavni', $this->session->userdata('name').' '.$this->session->userdata('surname'));
    $this->db->set('subject', $this->input->post('subject'));
    $this->db->set('text', $this->input->post('text'));
    $this->db->set('reg_id', $this->session->userdata('id'));
    $this->db->set('reg_name', $this->session->userdata('name'));
    $this->db->set('reg_surname', $this->session->userdata('surname'));
    $this->db->set('date', $date);
    $this->db->set('time', $time);
    $this->db->set('code', $code);
    $this->db->insert('brigadiris_sms');
        $this->session->set_flashdata('alert', 'შეტყობინება გაიგზავნა');
      $this->session->set_flashdata('alertype', 'success');
      $data['update_sms_status'] = $this->admin_model->update_brigadiri_files_status($code);
      if($this->input->post('email') != '')
     {
          $msg = '';
         $config['mailtype'] = 'html';

         $this->email->initialize($config);
         $data['gagzavnili_files'] = 0;
         $data['gagzavnili_files'] = $this->admin_model->brigadiri_gagzavnili_files($code);
         if (!empty($data["gagzavnili_files"]))
         {
             foreach ($data["gagzavnili_files"] as $sms_item)
             { if($sms_item['file_ext'] == '.jpg' || $sms_item['file_ext']== '.jpeg' || $sms_item['file_ext']=='.png')
                 
                 {
                 $link = 'brigadiri/'.$sms_item['file_name'];
                 $msg .='<div style="width:100%;background-color: #373334!important;"> <img  src="https://www.bestbuildergroup.com/assets/images/'.$link.'" style="border-radius: 0; width:160px; height:100px;" alt="">
           <font style="color:#f1d766!important;">'.$sms_item["file_name"].'- </font><a href="https://www.bestbuildergroup.com/assets/images/brigadiri/'.$sms_item["file_name"].'" download style="background-color:#7367F0!important;color:#f1d766!important;"> ჩამოტვირთვა</a></div>';
   
                 }
                 else
                 {
                     $link = $sms_item['file_ext'].'.png';
                     $msg .='<div style="width:100%;background-color: #373334!important;"> <img  src="https://www.bestbuildergroup.com/assets/images/'.$link.'" style="border-radius: 0; width:160px; height:100px;" alt="">
           <font style="color:#f1d766!important;">'.$sms_item["file_name"].'- </font><a href="https://www.bestbuildergroup.com/assets/images/brigadiri/'.$sms_item["file_name"].'" download style="background-color:#7367F0!important;color:#f1d766!important;"> ჩამოტვირთვა</a></div>';
   
                 }       }
         }
        $this->email->from($this->session->userdata('email'), "ბესთბილდინგ");
        $this->email->to($this->input->post('email'));
        $this->email->subject($this->input->post('subject'));
        $this->email->message($this->input->post('text').'<br> მიბმული ფაილები:<br>'.$msg);
        //Send mail
        $this->email->send();
     }

      redirect(base_url("admin/brigadiri_gagzavnili")); 
    }
    redirect(base_url("admin/brigadiri_migebuli")); 
  
  }
  //////////////////////////////////////////////////Sms gagzavna
   public function sms_gagzavnili()
  {
      if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
      if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
      $config["per_page"] = 20;
    
    $data['code'] = $this->generateRandomString(12);
    
      $array = [];
    $viewed = [];
    $data['gagzavnili_sms_count'] = 0;
    
    $config["per_page"] = 20;
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $data['gagzavnili_sms'] = array();
    $data['gagzavnili_sms'] = $this->admin_model->get_sms_gagzavnili($config["per_page"], $page);
    $data['gagzavnili_sms_count'] = count($data["gagzavnili_sms"]);
      
      $config = array();
        $config["base_url"] = base_url() . "admin/sms_gagzavnili";
        $config["total_rows"] = $data['gagzavnili_sms_count'];
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
       // $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = 5;
    
        $config['first_tag_open'] = '<li  class="page-item"> ';
        $config['first_tag_close'] = '</li>';
        //$config['first_url'] = base_url() . 'patients/list/0'; 
        $config['prev_link'] = '<img src="'.base_url('assets/images/icons/left-1.png').'" alt="">';
        $config['next_link'] = '<img src="'.base_url('assets/images/icons/right-1.png').'" alt="">';
        $config['num_tag_open'] = '<li class="page-item ">';
        $config['num_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item " >';
        $config['next_tag_close'] = '</li>';

        $config['prev_tag_open'] = '<li class="page-item" >';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';


        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        $data["satauri"] ='გაგზავნილი შეტყობინებები';
      $this->load->view('layouts/Aheader');
      $this->load->view('admin/sms_gagzavnili',$data);
      $this->load->view('layouts/Afooter');
  }
  public function sms_gagzavna($code)
  {
      if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));

    else if($this->input->server('REQUEST_METHOD') == 'POST')
    {
      
      //$postData = $this->input->post();
      
      $date = date('Y-m-d H:i');
      $time = date('H:i');;
      //$code = $this->session->userdata('brigadiris_code');
    
    
      
      if($this->input->post('email') != '')
     {
        $this->db->set('mimgebi', $this->input->post('email'));
        $this->db->set('gamgzavni', $this->input->post('email_from'));
        $this->db->set('subject', $this->input->post('subject'));
        $this->db->set('text', $this->input->post('text'));
        $this->db->set('reg_name', $this->session->userdata('name'));
        $this->db->set('reg_surname', $this->session->userdata('surname'));
        $this->db->set('date', $date);
        $this->db->set('time', $time);
        $this->db->set('code', $code);
        $this->db->insert('sms_gagzavnili');
        $this->session->set_flashdata('alert', 'შეტყობინება გაიგზავნა');
      $this->session->set_flashdata('alertype', 'success');
          $msg = '';
         $config['mailtype'] = 'html';

         $this->email->initialize($config);
         $data['gagzavnili_files'] = array();
         $data['gagzavnili_files'] = $this->admin_model->sms_gagzavnili_files($code);
         if (!empty($data["gagzavnili_files"]))
         {
             foreach ($data["gagzavnili_files"] as $sms_item)
             { $ff= "";
                 if(($sms_item['file_ext'] == ".jpg") ||($sms_item['file_ext'] == ".png") ||($sms_item['file_ext'] == ".jpeg")) $ff = "sms_gagzavnili/".$sms_item['file_name'];
                 else
                 {
                     $ff = $sms_item['file_ext'].".png";
                 }
                 $msg .='<div style="width:100%;background-color: #373334!important;"> <img style="border-radius: 0; width:160px; height:100px;" src="https://www.bestbuildergroup.com/assets/images/'.$ff.'" alt="">
          <font style="color:#f1d766!important;">'.$sms_item["file_name"].'- </font> <a href="https://www.bestbuildergroup.com/assets/images/sms_gagzavnili/'.$sms_item["file_name"].'" download style="background-color:#7367F0!important;color:#f1d766!important;"> ჩამოტვირთვა</a></div>';
             }
         }
        $this->email->from('bestbilding20@gmail.com', "ბესთბილდინგ");
        $this->email->to($this->input->post('email'));
        $this->email->subject($this->input->post('subject'));
        $this->email->message('<div style="width:100%;height:80px;"><img style="width:140px; height:90px;" src="https://www.bestbuildergroup.com/assets/images/llllog.jpg"/></div> <h3>გამომგზავნი : ბესთბილდინგი</h3><h3>მობილური: (+995 557 62 60 91)</h3><h3>ვებ გვერდი: <a href="https://www.bestbuildergroup.com/main/index"> WWW.bestbuildergroup.com</a></h3><br>'.$this->input->post('text').'<br> მიბმული ფაილები:<br>'.$msg);
        //Send mail
        $this->email->send();
     }

      redirect(base_url("admin/sms_gagzavnili")); 
    }
    
  }
   public function sms_gagzavnili_details($code)
  {
      if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
      if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
     
      $data['code'] = $this->generateRandomString(12);
      $data['sms_gagzavnili_details'] = array();
      $data['gagzavnili_files'] = array();
      $data['sms_gagzavnili_details'] = $this->admin_model->get_sms_gagzavnili_details($code);
       $data['gagzavnili_files'] = $this->admin_model->sms_gagzavnili_files($code);
      $data["satauri"] ='გაგზავნილი შეტყობინება';

      $this->load->view('layouts/Aheader');
     
      $this->load->view('admin/sms_gagzavnili_details',$data);
      $this->load->view('layouts/Afooter');
  }
	//////////////////////////////////////////////////////////////////////// Problems
	public function problems_all()
	{
	    if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
	    
		$array = [];
		$config["per_page"] = 20;
		$data['count_problems'] = array();
		$data['problems_all'] = array();
		$data['problems_all_select'] = array();
	    $mas = array();
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        foreach($this->admin_model->get_problems_all($config["per_page"], $page) as $valuee)
        {
            if( $this->session->userdata($valuee["object"]) == 1)
            {
                array_push($data['problems_all'], $valuee);

            }
        }
	    foreach($this->admin_model->get_problems_length($array) as $valuee)
        {
            if( $this->session->userdata($valuee["object"]) == 1)
            {
                array_push($mas, $valuee);

            }
        }
        foreach($this->admin_model->get_problems_all_select() as $valuee)
        {
            if( $this->session->userdata($valuee["object"]) == 1)
            {
                array_push($data['problems_all_select'], $valuee);

            }
        }
	    $data['count_problems'] = count($mas);

	    $config = array();
        $config["base_url"] = base_url() . "admin/problems_all";
        $config["total_rows"] = $data['count_problems'];
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $config['cur_tag_open'] = '<a href="#" class="active">';
        $config['cur_tag_close'] = '</a>';

        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        
	    
		$this->load->view('layouts/Aheader');
		$this->load->view('admin/problems_all', $data);
		$this->load->view('layouts/Afooter');
	}	
	public function problems_all_search()
  	{
	    if((!$this->session->has_userdata('logged_in'))) redirect(base_url("admin/login"));
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
	    $config["per_page"] = 20;
        $arrayy = array();
        $raod = 0;
        $link = "";
        $mas = array();
        $data['count_problems_search'] = 0;
	    if($this->uri->segment(3))
        { 
            $i=4;
       
         while($this->uri->segment($i) != "")
        {
            
            $mas[$this->uri->segment($i-1)] = $this->uri->segment($i);
            $raod = $raod +2;
            $link =$link."/".$this->uri->segment($i-1)."/".$this->uri->segment($i);
            $i = $i +2;
        }
       
        }
        	    
        else
        {
        
        if($this->session->has_userdata('search_object')){
	        $arrayy['object'] = $this->session->userdata('search_object');
	        $raod = $raod+2;
	        $link =$link."/object/".$this->session->userdata('search_object');
	       
        }
       if(($this->input->post('object') != "0")) 
	    {
	        $arrayy['object'] = $this->input->post('object');
	        $raod = $raod+2;
	        $link =$link."/object/".$this->input->post('object');

	    }
	   
        if(($this->input->post('status') != "")) 
	    {
	        $arrayy['status'] = $this->input->post('status');
	        $raod = $raod+2;
	        $link =$link."/status/".$this->input->post('status');

	    }
	    
	    if((empty($this->input->post() ) && !($this->session->has_userdata('viewed'))))
	    {
	        redirect('admin/problems_all');
	    }
        }
        $data['problems_all_search'] = array();
        $page = ($this->uri->segment(3+$raod)) ? $this->uri->segment(3+$raod) : 0;
        if(count($arrayy) != 0){
            
            foreach($this->admin_model->get_problems_all_search($arrayy, $config["per_page"], $page) as $valuee)
           {
            if( $this->session->userdata($valuee["object"]) == 1)
            {
                array_push($data['problems_all_search'], $valuee);

            }
          }
          $mass =array();
          foreach($this->admin_model->get_problems_length($arrayy) as $valuee)
           {
            if( $this->session->userdata($valuee["object"]) == 1)
            {
                array_push($mass, $valuee);

            }
          }
	    $data['count_problems_search'] = count($mas);
        }
	    if(count($mas) != 0)
	    {
	        foreach($this->admin_model->get_problems_all_search($user_ap, $config["per_page"], $page) as $valuee)
           {
            if( $this->session->userdata($valuee["object"]) == 1)
            {
                array_push($data['problems_all_search'], $valuee);

            }
          }
          $masss =array();
          foreach($this->admin_model->get_problems_length($arrayy) as $valuee)
           {
            if( $this->session->userdata($valuee["object"]) == 1)
            {
                array_push($masss, $valuee);

            }
          }
	    $data['count_problems_search'] = count($masss);
	    }
	    $data['problems_all_select'] =  array();
	    foreach($this->admin_model->get_problems_all_select() as $valuee)
        {
            if( $this->session->userdata($valuee["object"]) == 1)
            {
                array_push($data['problems_all_select'], $valuee);

            }
        }
	    $config = array();
        $config["base_url"] = base_url() . "admin/problems_all_search/".$link;
        $config["total_rows"] = $data['count_problems_search'];
        $config["per_page"] = 20;
        $config["uri_segment"] = 5;
       
        $config['cur_tag_open'] = '<a href="#" class="active">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);
        $data["linkss"] = $this->pagination->create_links();
         $this->session->unset_userdata('viewed');
		$this->load->view('layouts/Aheader');
		$this->load->view('admin/problems_all_search', $data);
		$this->load->view('layouts/Afooter');
	}
    public function object_problems($object)
	{
	    if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
	    
		$array = [];
		
		$config["per_page"] = 20;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
     	$mas = array();
     	$data['problems_all_select'] = array();
        $data['object_problems'] = array();
	    foreach($this->admin_model->get_object_problems($object,$config["per_page"], $page) as $valuee)
           {
            if( $this->session->userdata($valuee["object"]) == 1)
            {
                array_push($data['object_problems'], $valuee);

            }
          }
        foreach($this->admin_model->get_object_problems_length($object) as $valuee)
           {
            if( $this->session->userdata($valuee["object"]) == 1)
            {
                array_push($mas, $valuee);

            }
          }
	    $data['count_problems'] = 0;
	    $data['count_problems'] = count($mas);
	    $data['object'] = $object;
	    $config = array();
        $config["base_url"] = base_url() . "admin/object_problems/".$object;
        $config["total_rows"] = $data['count_problems'];
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $config['cur_tag_open'] = '<a href="#" class="active">';
        $config['cur_tag_close'] = '</a>';

        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        
        foreach($this->admin_model->get_problems_all_select() as $valuee)
           {
            if( $this->session->userdata($valuee["object"]) == 1)
            {
                array_push($data['problems_all_select'], $valuee);

            }
          }

		$this->load->view('layouts/Aheader');
		$this->load->view('admin/object_problems', $data);
		$this->load->view('layouts/Afooter');
	}
	public function object_problems_search()
  	{
	    if((!$this->session->has_userdata('logged_in'))) redirect(base_url("admin/login"));
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
	    $config["per_page"] = 20;
        $arrayy = [];
        $raod = 0;
        $link = "";
        $mas = [];
	    if($this->uri->segment(3))
        { 
            $i=4;
       
         while($this->uri->segment($i) != "")
        {
            
            $mas[$this->uri->segment($i-1)] = $this->uri->segment($i);
            $raod = $raod +2;
            $link =$link."/".$this->uri->segment($i-1)."/".$this->uri->segment($i);
            $i = $i +2;
        }
       
        }
        	    
        else
        {
       if(($this->input->post('object') != "0")) 
	    {
	        $arrayy['object'] = $this->input->post('object');
	        $raod = $raod+2;
	        $link =$link."/object/".$this->input->post('object');

	    }
	   
        if(($this->input->post('status') != "0")) 
	    {
	        $arrayy['status'] = $this->input->post('status');
	        $raod = $raod+2;
	        $link =$link."/status/".$this->input->post('status');

	    }
	   if(empty($this->input->post() )) 
	    {
	        redirect('admin/problems_all');
	    }
        }
        $page = ($this->uri->segment(3+$raod)) ? $this->uri->segment(3+$raod) : 0;
        if(count($arrayy) != 0){
        $data['problems_all_search'] = $this->admin_model->get_problems_all_search($arrayy, $config["per_page"], $page);
        $data['count_problems_search'] = 0;
	    $data['count_problems_search'] = count($this->admin_model->get_problems_length($arrayy));
        }
	    if(count($mas) != 0)
	    {
	    $data['problems_all_search'] = $this->admin_model->get_problems_all_search($user_ap, $config["per_page"], $page);
	    $data['count_problems_search'] = count($this->admin_model->get_problems_length($mas));
	    }
	    else
	    {
	        redirect('admin/problems_all');
	    }
	    
	    $config = array();
        $config["base_url"] = base_url() . "admin/object_problems_search/".$link;
        $config["total_rows"] = $data['count_problems_search'];
        $config["per_page"] = 20;
        $config["uri_segment"] = 5;
       
        $config['cur_tag_open'] = '<a href="#" class="active">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);
        $data["linkss"] = $this->pagination->create_links();
		$this->load->view('layouts/Aheader');
		$this->load->view('admin/problems_all_search', $data);
		$this->load->view('layouts/Afooter');
	}
	public function problems_view_search($viewed, $object)
	{	
	    if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
	
		$viewed_object = $this->session->set_userdata('search_object', $object);
		$viewed = $this->session->set_userdata('search_viewed', $viewed);
				redirect(base_url("admin/problems_all_search"));

	}
	public function problem_create()
	{
	   
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
        if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		$code = $this->generateRandomString(12);
		$data['code'] = $code;
		
	   if  ( $this->input->server('REQUEST_METHOD') == 'POST')
		{
			
			$postData = $this->input->post();
		$object_code =	$this->input->post('object');
		$this->admin_model->insert_problem($postData, $code, $object_code);
		
       /* $this->email->from("info@bestbuildergroup.com", "უსაფრთხოება ");
        $this->email->to("bestbilding20@gmail.com");
        $this->email->subject("ახალი განსახილველი საკითხი");
        $this->email->message(" ობიექტი - ".$this->lang->line($this->input->post('object'))."
         საკითხი-".$this->input->post('text')."
         tp://www.bestbuildergroup.com/admin/problem_edit_red/".$code);
        //Send mail
        $this->email->send(); */
        $this->session->set_flashdata('alert', 'ჩანაწერი წარმატებით დაემატა');
	    $this->session->set_flashdata('alertype', 'success');

	    redirect(base_url("admin/problem_edit/".$code)); 
		}
		$data['problems_all_select'] = array();
		foreach($this->admin_model->get_problems_all_select() as $valuee)
           {
            if( $this->session->userdata($valuee["object"]) == 1)
            {
                array_push($data['problems_all_select'], $valuee);

            }
          }

		$this->load->view('layouts/Aheader');
		$this->load->view('admin/problem_create', $data);
		$this->load->view('layouts/Afooter');
	}
	public function object_problem_create($object)
	{
	   
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
        if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		$code = $this->generateRandomString(12);
		$data['code'] = $code;
		$data["object"] = $object;
	   if  ( $this->input->server('REQUEST_METHOD') == 'POST')
		{
			
			$postData = $this->input->post();
		$object_code =	$this->input->post('object');
		$this->admin_model->insert_problem($postData, $code, $object_code);
	/*	
        $this->email->from("info@bestbuildergroup.com", "უსაფრთხოება ");
        $this->email->to("bestbilding20@gmail.com");
        $this->email->subject("ახალი განსახილველი საკითხი");
        $this->email->message(" ობიექტი - ".$this->lang->line($this->input->post('object'))."
         საკითხი-".$this->input->post('text')."
         tp://www.bestbuildergroup.com/admin/problem_edit_red/".$code);
        //Send mail
        $this->email->send(); */
        $this->session->set_flashdata('alert', 'ჩანაწერი წარმატებით დაემატა');
	    $this->session->set_flashdata('alertype', 'success');

	    redirect(base_url("admin/problem_edit/".$code)); 
		}
		$data['problems_all_select'] = array();
		foreach($this->admin_model->get_problems_all_select() as $valuee)
           {
            if( $this->session->userdata($valuee["object"]) == 1)
            {
                array_push($data['problems_all_select'], $valuee);

            }
          }

		$this->load->view('layouts/Aheader');
		$this->load->view('admin/object_problem_create', $data);
		$this->load->view('layouts/Afooter');
	}
	public function problem_update($code)
	{
	    
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		$data['problem_update'] = array();
		$data['problem_update'] = $this->admin_model->problem_update( $code, $this->input->post());
		$data['problem_update_history'] = $this->admin_model->problem_update_history( $code, $this->input->post('text'),$this->input->post('comment'),$this->input->post('duration'));
				redirect(base_url("admin/problem_edit/".$code));

	}
	public function problem_edit($code)
	{
	    if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));	
	    $data['problems_all_select'] = array();
	    foreach($this->admin_model->get_problems_all_select() as $valuee)
           {
            if( $this->session->userdata($valuee["object"]) == 1)
            {
                array_push($data['problems_all_select'], $valuee);

            }
          }
		$data['images'] = $this->admin_model->get_problem_images($code);
		$data['imagess'] = $this->admin_model->get_problem_images($code);
		$data['problem_edit'] = array();
		$data['problem_edit'] = $this->admin_model->problem_edit($code);
		$data['problem_viewed'] = $this->admin_model->problem_viewed_update($code);
		$this->load->view('layouts/Aheader');
		$this->load->view('admin/problem_edit', $data);
		$this->load->view('layouts/Afooter');
	}
	public function problem_edit_red($code)
	{
		if((!$this->session->has_userdata('logged_in'))) redirect(base_url("admin/login"));
        if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
        $redirect = $this->session->set_userdata("edit_code", $code);
			redirect(base_url("admin/problem_edit/".$code));
	}
	public function problem_activate($code)
	{
		if((!$this->session->has_userdata('logged_in'))) redirect(base_url("admin/login"));
        if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		$this->admin_model->problem_activate($code);
			redirect(base_url("admin/problem_edit/".$code));
	}
	
	public function problem_done($code)
	{
	    
		if((!$this->session->has_userdata('logged_in'))) redirect(base_url("admin/login"));
		if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		$this->admin_model->problem_done($code);
		redirect(base_url("admin/problem_edit/".$code));
	}
	public function problem_delete($code)
	{
	   
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		 if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		
		$del = $this->admin_model->problem_delete($code);
		redirect(base_url("admin/problems_all"));
	}
	public function delete_problems_image($file_name, $code)
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		 if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		$delete = $this->admin_model->problem_image_delete($file_name);
        redirect(base_url("admin/problem_edit/".$code));
	}
	
	public function object_news($object)
	{
	    if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
	    
		$array = [];
		
		$config["per_page"] = 20;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
     	$mas = array();
     
        $data['object_news'] = array();
	    foreach($this->admin_model->get_object_news($object,$config["per_page"], $page) as $valuee)
           {
            if( $this->session->userdata($valuee["object"]) == 1)
            {
                array_push($data['object_news'], $valuee);

            }
          }
        foreach($this->admin_model->get_object_news_length($object) as $valuee)
           {
            if( $this->session->userdata($valuee["object"]) == 1)
            {
                array_push($mas, $valuee);

            }
          }
	    $data['count_object_news'] = 0;
	    $data['count_object_news'] = count($mas);
	    $data['object'] = $object;
	    $config = array();
        $config["base_url"] = base_url() . "admin/object_news/".$object;
        $config["total_rows"] = $data['count_object_news'];
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $config['cur_tag_open'] = '<a href="#" class="active">';
        $config['cur_tag_close'] = '</a>';

        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        
        

		$this->load->view('layouts/Aheader');
		$this->load->view('admin/object_news', $data);
		$this->load->view('layouts/Afooter');
	}
	public function object_news_create($object)
	{
		
		$data['code'] = $this->generateRandomNumber();
		
		if((!$this->session->has_userdata('logged_in'))) redirect(base_url("admin/login"));
		if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		else if(($this->session->has_userdata('object_image_code')) && ($this->input->server('REQUEST_METHOD') == 'POST'))
		{
			$postData = $this->input->post();
			$date = date('Y-m-d H:i');
			$reg_id =$this->session->userdata('id');
			$reg_name =$this->session->userdata('name');
			$reg_surname =$this->session->userdata('surname');
		
			$code = $this->session->userdata('object_image_code');


		$this->db->set($postData);
		$this->db->set('object', $object);
		$this->db->set('reg_id', $reg_id);
		$this->db->set('reg_name', $reg_name);
 	    $this->db->set('reg_surname', $reg_surname);
		$this->db->set('code', $code);
		$this->db->set('date', $date);
		$this->db->insert('news');
        $this->session->set_flashdata('alert', 'ჩანაწერი წარმატებით დაემატა');
	    $this->session->set_flashdata('alertype', 'success');
	   
	    redirect(base_url("admin/object_news_edit/".$code)); 
		}
		$data["object"] = $object;
		$this->load->view('layouts/Aheader');
		$this->load->view('admin/object_news_create', $data);
		$this->load->view('layouts/Afooter');
	}
	public function object_news_update($code)
	{
	    
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		$data['object_news_update'] = array();
		$data['object_news_update'] = $this->admin_model->object_news_update( $code, $this->input->post());
	
				redirect(base_url("admin/object_news_edit/".$code));

	}
	public function object_news_edit($code)
	{
	    if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));	
	   
		$data['images'] = $this->admin_model->get_object_news_images($code);
		$data['imagess'] = $this->admin_model->get_object_news_images($code);
		$data['object_news_edit'] = array();
		$data['object_news_edit'] = $this->admin_model->object_news_edit($code);
	
		$this->load->view('layouts/Aheader');
		$this->load->view('admin/object_news_edit', $data);
		$this->load->view('layouts/Afooter');
	}
	public function delete_object_news_image($file_name, $code)
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		 if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		$delete = $this->admin_model->object_news_image_delete($file_name);
        redirect(base_url("admin/object_news_edit/".$code));
	}
	////////////////////////////////////////////////////////////////////////Current works
	public function current_work_list()
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
	    
		if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		$array = [];
		$config["per_page"] = 20;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['count_ap_list'] = 0;
        $data['current_work_list'] = array();
	    $data['current_work_list'] = $this->admin_model->get_current_work_list($config["per_page"], $page);
	    $data['count_ap_list'] = count($this->admin_model->get_current_work_length($array));
	    
	    $config = array();
        $config["base_url"] = base_url() . "admin/current_work_list";
        $config["total_rows"] = $data['count_ap_list'];
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $config['cur_tag_open'] = '<a href="#" class="active">';
        $config['cur_tag_close'] = '</a>';

        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        
	    $this->session->set_userdata('current_work_edit_block', 'info_block');
	    $this->session->set_userdata('user_view_block', 'info_block');
		$this->load->view('layouts/Aheader');
		$this->load->view('admin/current_work_list', $data);
		$this->load->view('layouts/Afooter');
	}
	public function current_work_list_type($type)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
	    
		if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		$array = [];
		$config["per_page"] = 20;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['count_ap_list'] = 0;
        $data['current_work_list'] = array();
	    $data['current_work_list'] = $this->admin_model->get_current_work_list_type($config["per_page"], $page, $type);
	    $data['count_ap_list'] = count($this->admin_model->get_current_work_length_type($array, $type));
	    
	    $config = array();
        $config["base_url"] = base_url() . "admin/current_work_list/".$type;
        $config["total_rows"] = $data['count_ap_list'];
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $config['cur_tag_open'] = '<a href="#" class="active">';
        $config['cur_tag_close'] = '</a>';

        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        
	    $this->session->set_userdata('current_work_edit_block', 'info_block');
	    $this->session->set_userdata('user_view_block', 'info_block');
		$this->load->view('layouts/Aheader');
		$this->load->view('admin/current_work_list', $data);
		$this->load->view('layouts/Afooter');
	}
	public function current_work_list_search()
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
	    if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
	    $config["per_page"] = 20;
        $arrayy = [];
        $raod = 0;
        $link = "";
        $mas = [];
        $raodenoba = 0;
	    if($this->uri->segment(3))
        { 
            $i=4;
       
         while($this->uri->segment($i) != "")
        {
            
            $mas[$this->uri->segment($i-1)] = $this->uri->segment($i);
            $raod = $raod +2;
            $link =$link."/".$this->uri->segment($i-1)."/".$this->uri->segment($i);
            $i = $i +2;
        }
        }
        	    
        else
        {
        if(	$this->input->post('city') != "") 
	    {	        
	        $arrayy['city'] = $this->input->post('city');
	        $raod = $raod+2;
	        $link = $link."/city/".$this->input->post('city');
	    }
	    if(	$this->input->post('code') != "") 
	    {	        
	        $arrayy['code'] = $this->input->post('code');
	        $raod = $raod+2;
	        $link = $link."/code/".$this->input->post('code');
	    }
        if(($this->input->post('category') != "0")) 
	    {
	        $arrayy['category'] = $this->input->post('category');
	        $raod = $raod+2;
	        $link =$link."/category/".$this->input->post('category');

	    }
	    if(	$this->input->post('type') != "0") 
	    {	        
	        $arrayy['type'] = $this->input->post('type');
            $raod = $raod+2;
            $link =$link."/type/".$this->input->post('type');
	    }
	    if(	$this->input->post('status') != "0") 
	    {	        
	        $arrayy['status'] = $this->input->post('status');
	        $raod = $raod+2;
	        $link = $link."/status/".$this->input->post('min_price');
	    }
        }
        
        $page = ($this->uri->segment(3+$raod)) ? $this->uri->segment(3+$raod) : 0;
        if(count($arrayy) != "0"){
        $data['current_work_list_search'] = $this->admin_model->get_current_work_list_search($arrayy, $config["per_page"], $page);
        $raodenoba = count($this->admin_model->get_current_work_length($arrayy));
        }
	    if(count($mas) != "0")
	    {
	    $data['current_work_list_search'] = $this->admin_model->get_current_work_list_search($mas, $config["per_page"], $page);
	    $raodenoba = count($this->admin_model->get_current_work_length($mas));
	    }
	    $config = array();
        $config["base_url"] = base_url() . "admin/current_work_list_search".$link;
        $config["total_rows"] = $raodenoba;
        $config["per_page"] = 20;
        $config["uri_segment"] = 3+$raod;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $config['cur_tag_open'] = '<a href="#" class="active">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);
        $data["linkss"] = $this->pagination->create_links();
        $data['count_ap_list'] = 0;
	    $data['count_ap_list'] = $raodenoba;
	    $this->session->set_userdata('current_work_edit_block', 'info_block');
	    $this->session->set_userdata('user_view_block', 'info_block');
		$this->load->view('layouts/Aheader');
		$this->load->view('admin/current_work_list_search', $data);
		$this->load->view('layouts/Afooter');
	}
	
    public function current_work_all()
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		$user_ap = [];
		$user_ap['reg_id'] = $this->session->userdata('id');
		$user_ap['reg_name'] = $this->session->userdata('name');
		$user_ap['reg_surname'] = $this->session->userdata('surname');
		$array = [];
		$config["per_page"] = 20;
		$data['count_user_current_work_all'] = 0;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['user_current_work_all'] = array();
	    $data['user_current_work_all'] = $this->admin_model->get_user_current_work($user_ap, $config["per_page"], $page);
	    $data['count_user_current_work_all'] = count($this->admin_model->get_current_work_length($user_ap));
	    
	    $config = array();
        $config["base_url"] = base_url() . "admin/current_work_all";
        $config["total_rows"] = $data['count_user_current_work_all'];
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $config['cur_tag_open'] = '<a href="#" class="active">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        
	    $this->session->set_userdata('current_work_edit_block', 'info_block');
		$this->load->view('layouts/Aheader');
		$this->load->view('admin/current_work_all', $data);
		$this->load->view('layouts/Afooter');
	}
	public function current_work_all_search()
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
	    if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
	    $config["per_page"] = 20;
        $arrayy = [];
        $raod = 0;
        $link = "";
        $mas = [];
	    if($this->uri->segment(3))
        { 
            $i=4;
       
         while($this->uri->segment($i) != "")
        {
            
            $mas[$this->uri->segment($i-1)] = $this->uri->segment($i);
            $raod = $raod +2;
            $link =$link."/".$this->uri->segment($i-1)."/".$this->uri->segment($i);
            $i = $i +2;
        }
        $mas['reg_id'] = $this->session->userdata('id');
        $mas['reg_name'] = $this->session->userdata('name');
        $mas['reg_surname'] = $this->session->userdata('surname');
        }
        	    
        else
        {
        if(	$this->input->post('city') != "") 
	    {	        
	        $arrayy['city'] = $this->input->post('city');
	        $raod = $raod+2;
	        $link = $link."/city/".$this->input->post('city');
	    }
	    if(	$this->input->post('code') != "") 
	    {	        
	        $arrayy['code'] = $this->input->post('code');
	        $raod = $raod+2;
	        $link = $link."/code/".$this->input->post('code');
	    }
        if(($this->input->post('category') != "0")) 
	    {
	        $arrayy['category'] = $this->input->post('category');
	        $raod = $raod+2;
	        $link =$link."/category/".$this->input->post('category');

	    }
	    if(	$this->input->post('type') != "0") 
	    {	        
	        $arrayy['type'] = $this->input->post('type');
            $raod = $raod+2;
            $link =$link."/type/".$this->input->post('type');
	    }
	    if(	$this->input->post('status') != "0") 
	    {	        
	        $arrayy['status'] = $this->input->post('status');
	        $raod = $raod+2;
	        $link = $link."/status/".$this->input->post('min_price');
	    }
	    $arrayy['reg_id'] = $this->session->userdata('id');
        $arrayy['reg_name'] = $this->session->userdata('name');
        $arrayy['reg_surname'] = $this->session->userdata('surname');
        }
        $data['count_user_current_work_all'] = 0;
        $page = ($this->uri->segment(3+$raod)) ? $this->uri->segment(3+$raod) : 0;
        if(count($arrayy) != "0"){
        $data['user_current_work_all'] = $this->admin_model->get_user_current_work($arrayy, $config["per_page"], $page);
	    $data['count_user_current_work_all'] = count($this->admin_model->get_current_work_length($arrayy));
        }
	    if(count($mas) != "0")
	    {
	    $data['user_current_work_all'] = $this->admin_model->get_user_current_work($user_ap, $config["per_page"], $page);
	    $data['count_user_current_work_all'] = count($this->admin_model->get_current_work_length($mas));
	    }
	    $config = array();
        $config["base_url"] = base_url() . "admin/current_work_all_search".$link;
        $config["total_rows"] = $data['count_user_current_work_all'];
        $config["per_page"] = 20;
        $config["uri_segment"] = 3+$raod;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $config['cur_tag_open'] = '<a href="#" class="active">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);
        $data["linkss"] = $this->pagination->create_links();
	    $this->session->set_userdata('current_work_edit_block', 'info_block');
		$this->load->view('layouts/Aheader');
		$this->load->view('admin/current_work_all', $data);
		$this->load->view('layouts/Afooter');
	}
	public function current_work_create($object_code)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));

		$data['object_code'] = $object_code;
		$code = $this->generateRandomString(12);
		$data['code'] = $code;
		
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		else if  ( $this->input->server('REQUEST_METHOD') == 'POST')
		{
			
			$postData = $this->input->post();
		$this->admin_model->insert_current_work($postData, $code, $object_code);
        $this->session->set_flashdata('alert', 'ჩანაწერი წარმატებით დაემატა');
	    $this->session->set_flashdata('alertype', 'success');
	    $this->session->set_userdata('object_edit_block', 'current_work_block');

	    redirect(base_url("admin/current_work_edit/".$code)); 
		}
		$this->load->view('layouts/Aheader');
		$this->load->view('admin/current_work_create', $data);
		$this->load->view('layouts/Afooter');
	}
	
	public function current_work_edit($code)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		$data['images'] = $this->admin_model->get_current_work_images($code);
		$data['imagess'] = $this->admin_model->get_current_work_images($code);
		$data['current_work_edit'] = array();
		$data['current_work_edit'] = $this->admin_model->current_work_edit($code);
		
		$this->load->view('layouts/Aheader');
		$this->load->view('admin/current_work_edit', $data);
		$this->load->view('layouts/Afooter');
	}
	
	public function current_work_view($code)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		$data['images'] = $this->admin_model->get_current_work_images($code);
		  $data['imagess'] = $this->admin_model->get_current_work_images($code);
		$data['current_work_view'] = array();
		$data['current_work_view'] = $this->admin_model->current_work_view($code);
		$this->load->view('layouts/Aheader');
		$this->load->view('admin/current_work_view', $data);
		$this->load->view('layouts/Afooter');
	}
	public function current_work_update($code)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		$data['current_work_update'] = array();
		$data['current_work_update'] = $this->admin_model->current_work_update( $code, $this->input->post());
		$this->session->set_userdata('current_work_edit_block', 'info_block');
				redirect(base_url("admin/current_work_edit/".$code));

	}
	public function current_work_view_update($code)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		$data['current_work_update'] = array();
		$data['current_work_update'] = $this->admin_model->current_work_view_update( $code, $this->input->post());
		$this->session->set_userdata('current_work_edit_block', 'info_block');
				redirect(base_url("admin/current_work_view/".$code));

	}
	public function current_work_delete($code, $object_code)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		$this->session->set_userdata('object_edit_block', 'current_work_block');
		$del = $this->admin_model->current_work_delete($code);
		redirect(base_url("admin/object_edit/".$object_code));
	}
	public function current_work_gallery($code)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		 $data['images'] = $this->admin_model->get_current_work_images($code);
		  $data['imagess'] = $this->admin_model->get_current_work_images($code);
		 $data['cod'] = $code;
		$this->load->view('layouts/Aheader');
		$this->load->view('admin/current_work_gallery', $data);
		$this->load->view('layouts/Afooter');
	}

	public function delete_current_work_image($file_name, $code)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		$delete = $this->admin_model->current_work_image_delete($file_name);
		$this->session->set_userdata('current_work_edit_block', 'gallery_block');
        redirect(base_url("admin/current_work_edit/".$code));
	}
	public function set_as_current_work_main_image($file_name, $code)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		$delete = $this->admin_model->current_work_main_image($file_name, $code);
		$this->session->set_userdata('current_work_edit_block', 'gallery_block');
		redirect(base_url("admin/current_work_edit/".$code));
	}
	public function current_work_activate1($code,$id)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		$this->session->set_userdata('current_work_edit_block', 'info_block');
		$this->admin_model->current_work_activate($id);
			redirect(base_url("admin/current_work_view/".$code));
	}
	public function current_work_expired($code,$id)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		$this->session->set_userdata('current_work_edit_block', 'info_block');
		$this->admin_model->current_work_expired($id);
		redirect(base_url("admin/current_work_view/".$code));
	}
	public function current_work_activate2($code,$id)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		$this->session->set_userdata('current_work_edit_block', 'info_block');
		 $this->admin_model->current_work_activate($id);
			redirect(base_url("admin/current_work_edit/".$code));
	}
	public function current_work_canceled($code,$id)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		$this->session->set_userdata('current_work_edit_block', 'info_block');
		 $this->admin_model->current_work_canceled($id);
		redirect(base_url("admin/current_work_edit/".$code));
	}
	public function profile_edit($id)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
        $data['profile_edit'] = $this->admin_model->get_users($id);
		$this->load->view('layouts/Aheader');
		$this->load->view('admin/profile_edit',$data);
		$this->load->view('layouts/Afooter');
	}
	public function profile_edit_save($id)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
        $data['profile_edit'] = $this->admin_model->update_users($id, $this->input->post());
        redirect(base_url('admin/profile_edit/'.$this->session->userdata('id')));
		
	}
	public function profile_password()
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		$this->load->view('layouts/Aheader');
		$this->load->view('admin/profile_password');
		$this->load->view('layouts/Afooter');
	}
	public function profile_view($id)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		$data['profile'] = $this->admin_model->get_users($id);
		$data['id'] = $this->session->userdata('id');
		$this->load->view('layouts/Aheader',$data);
		$this->load->view('admin/profile_view',$data);
		$this->load->view('layouts/Afooter');
	}
	
	

	public function user_create()
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		$code = $this->generateRandomNumber();
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		else if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			
			
			$postData = $this->input->post();
			$date = date('Y-m-d H:i');
			$registrator =$this->session->userdata('name')."_".$this->session->userdata('surname');
			
		
		$this->db->set($postData);
		$this->db->set('registrator', $registrator);
		$this->db->set('date', $date);
		$this->db->set('code', $code);
		$this->db->insert('users');
        $this->session->set_flashdata('alert', 'ჩანაწერი წარმატებით დაემატა');
	    $this->session->set_flashdata('alertype', 'success');

	    redirect(base_url("admin/user_list/")); 
		}
		$this->load->view('layouts/Aheader');
		$this->load->view('admin/user_create');
		$this->load->view('layouts/Afooter');
	}
	public function user_list()
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		$array = [];
		$data['count_user_list'] = 0;
		$config["per_page"] = 20;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['users_list_search'] = array();
		$data['users_list_search'] = $this->admin_model->get_user_list($config["per_page"], $page);
		$data['count_user_list'] = count($this->admin_model->get_users_length($array));
	    
	    $config = array();
        $config["base_url"] = base_url() . "admin/user_list";
        $config["total_rows"] = $data['count_user_list'];
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $config['cur_tag_open'] = '<a href="#" class="active">';
        $config['cur_tag_close'] = '</a>';

        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
		$this->session->set_userdata('user_view_block', 'info_block');
		$this->load->view('layouts/Aheader');
		$this->load->view('admin/user_list', $data);
		$this->load->view('layouts/Afooter');
	}
	public function user_search()
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
	   if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
        $config["per_page"] = 20;
        $arrayy = [];
        $raod = 0;
        $link = "";
        $mas = [];
        $raodenoba ;
	    if($this->uri->segment(3))
        { 
            $i=4;
       
         while($this->uri->segment($i) != "")
        {
            
            $mas[$this->uri->segment($i-1)] = $this->uri->segment($i);
            $raod = $raod +2;
            $link =$link."/".$this->uri->segment($i-1)."/".$this->uri->segment($i);
            $i = $i +2;
        }
        }
        	    
        else
        {
	   if(	$this->input->post('status') != "0") 
	    {
	        $arrayy['status'] = $this->input->post('status');
	        $raod = $raod+2;
	        $link = $link."/status/".$this->input->post('status');

	    }
	    if(	$this->input->post('name') != "") 
	    {
	        $arrayy['name'] = $this->input->post('name');
	        $raod = $raod+2;
	        $link = $link."/name/".$this->input->post('name');

	    }
	    if(	$this->input->post('surname') != "") 
	    {
	        $arrayy['surname'] = $this->input->post('surname');
	        $raod = $raod+2;
	        $link = $link."/surname/".$this->input->post('surname');

	    }
        if(	$this->input->post('city') != "") 
	    {
	        $arrayy['city'] = $this->input->post('city');
	        $raod = $raod+2;
	        $link = $link."/city/".$this->input->post('city');

	    }
        }
	   $page = ($this->uri->segment(3+$raod)) ? $this->uri->segment(3+$raod) : 0;
	   if(count($arrayy) != "0"){
        $data['users_list_search'] = $this->admin_model->get_users_list_search($arrayy, $config["per_page"], $page);
        $raodenoba = count($this->admin_model->get_users_length($arrayy));
        }
	    if(count($mas) != "0")
	    {
	    $data['users_list_search'] = $this->admin_model->get_users_list_search($mas, $config["per_page"], $page);
	    $raodenoba = count($this->admin_model->get_users_length($mas));
	    }
	    $config = array();
        $config["base_url"] = base_url() . "admin/users_search".$link;
        $config["total_rows"] = $raodenoba;
        $config["per_page"] = 20;
        $config["uri_segment"] = 3+$raod;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $config['cur_tag_open'] = '<a href="#" class="active">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
	  
	    $data['count_user'] = $raodenoba;
	    $this->session->set_userdata('user_view_block', 'info_block');
		$this->load->view('layouts/Aheader');
		$this->load->view('admin/user_list', $data);
		$this->load->view('layouts/Afooter');
	}
	public function user_view($id, $name, $surname)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		
		$data['user'] = $this->admin_model->user_view($id, $name, $surname);
		$data['id'] = $this->session->userdata('id');
		$user_info = [];
		$user_info['reg_id'] = $id;
		$user_info['reg_name'] = $name;
		$user_info['reg_surname'] = $surname;
		$array = [];
		$config["per_page"] = 20;
		$page = ($this->uri->segment(6)) ? $this->uri->segment(6) : 0;
        $data['user_object'] = array();
	    $data['user_object'] = $this->admin_model->get_user_object($user_info, $config["per_page"], $page);
	    $data['count_user_object'] = count($this->admin_model->get_object_length($user_info));
	    
	    $config = array();
        $config["base_url"] = base_url() . "admin/user_view/".$id."/".$name."/".$surname;
        $config["total_rows"] = $data['count_user_object'];
        $config["per_page"] = 20;
        $config["uri_segment"] = 6;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $config['cur_tag_open'] = '<a href="#" class="active">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        $this->session->set_userdata('object_edit_block', 'info_block');
		$this->load->view('layouts/Aheader',$data);
		$this->load->view('admin/user_view',$data);
		$this->load->view('layouts/Afooter');
	}
	


	public function user_activate1($id, $name, $surname)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		 $this->admin_model->user_activate($id,$name,$surname);
			redirect(base_url("admin/user_view/".$id."/".$name."/".$surname));
	}
	public function user_expired($id, $name, $surname)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		 $this->admin_model->user_expired($id,$name,$surname);
		redirect(base_url("admin/user_view/".$id."/".$name."/".$surname));
	}
	public function user_delete($id)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		$del = $this->admin_model->user_delete($id);
		redirect(base_url("admin/user_list"));
	}
	public function generateRandomString($length = 20) {
	 
	 if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));   $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
	public function generateRandomNumber($length = 8) {
	 
	 if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));   $characters = '0123456789';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}


	public function setLanguage($lang)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		$this->session->set_userdata('lan', $lang);	
		redirect('admin/'.$this->uri->segment(4).'/'.$this->uri->segment(5));
	
	    
	}


	public function getLangId()
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		$lang = 'ge';
		if ($this->session->has_userdata('lan')) {
        	$lang = $this->session->lan;        
        }else {
			$lang = 'ge';
			$this->session->set_userdata('lan', $lang);
		}
		switch ($lang) {
			case 'en':
				return 1;
				break;
			case 'ru':
				return 2;
				break;
		    case 'ge':
				return 3;
				break;
		
		}
	} 

	public function logout() {
        
       $this->session->sess_destroy();
        redirect(base_url('admin/login'));
    }
    public function do_upload()
    {
        if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
        	$str = $this->generateRandomString();
            $filename = $this->session->userdata('photo')."_". $str;
               $data = array();
      

                $config['upload_path']          = './uploads/users/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 30000;
                $config['max_width']            = 8096;
                $config['max_height']           = 4048;
                 $config['file_name']             = $filename;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('admin/profile_edit', $error);
                }
                else
                {
                        $data = array('file_name' => $this->upload->data('file_name'));
                       
                         $save  =$this->admin_model->update_profile_photo($data);

                }
    }
     
    public function object_upload($code)
    {
        if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
        	if(($this->session->has_userdata('best_object_code')))
        	{
        		$this->session->unset_userdata('best_object_code');
        		 

        	}
		  $this->session->set_userdata('best_object_code', $code);
        	$str = $this->generateRandomString();
            $filename = $this->session->userdata('id')."_". $str;
               $data = array();
      
      

                $config['upload_path']          = './assets/images/projects/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 20000;
                $config['max_width']            = 8096;
                $config['max_height']           = 4048;
                 $config['file_name']             = $filename;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file'))
                {
                        $error = array('error' => $this->upload->display_errors());

                       
                }
                else
                {
                        $data = array('file_name' => $this->upload->data('file_name'));
                       //$cod =$this->session->userdata('object_code');
                         $save  =$this->admin_model->insert_object_photo($data, $code);

                       
                }
    }
  
    public function update_object_gallery($codee)
    {
        if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
        
        	$str = $this->generateRandomString();
            $filename = $this->session->userdata('id')."_". $str;
            
               $data = array();
      

                $config['upload_path']          = './assets/images/projects/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 30000;
                $config['max_width']            = 8096;
                $config['max_height']           = 4048;
                 $config['file_name']             = $filename;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file'))
                {
                        $error = array('error' => $this->upload->display_errors());

                       
                }
                else
                {
                        $this->session->set_userdata('object_edit_block', 'info_block');
                        $data = array('file_name' => $this->upload->data('file_name'));
                       //$cod =$this->session->userdata('object_code');
                         $save  =$this->admin_model->update_object_gallery($data, $codee);
                         

                       
                }
    }
    
    public function news_upload($code)
    {
        if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
        	if(($this->session->has_userdata('best_news_code')))
        	{
        		$this->session->unset_userdata('best_news_code');
        		 

        	}
		  $this->session->set_userdata('best_news_code', $code);
        	$str = $this->generateRandomString();
            $filename = $this->session->userdata('id')."_". $str;
               $data = array();
      

                $config['upload_path']          = './assets/images/news/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 20000;
                $config['max_width']            = 8096;
                $config['max_height']           = 4048;
                 $config['file_name']             = $filename;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file'))
                {
                        $error = array('error' => $this->upload->display_errors());

                       
                }
                else
                {
                        $data = array('file_name' => $this->upload->data('file_name'));
                       //$cod =$this->session->userdata('news_code');
                         $save  =$this->admin_model->insert_news_photo($data, $code);

                       
                }
    }
     public function update_finansebi_gallery($codee)
    {
        if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
       
            
            $str = $this->generateRandomString();
            $filename = $this->session->userdata('id')."_". $str;
            
               $data = array();
      

                $config['upload_path']          = './assets/images/finansebi/';
                $config['allowed_types']        = '*';
                $config['max_size']             = 30000;
                $config['max_width']            = 8096;
                $config['max_height']           = 4048;
                // $config['file_name']             = $filename;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file'))
                {
                        $error = array('error' => $this->upload->display_errors());

                       
                }
                else
                {
                    $data = array('file_name' => $this->upload->data('file_name'), 'file_ext'=> $file_ext = $this->upload->data('file_ext'));
                    
                        
                        $save  =$this->admin_model->update_finansebi_gallery($data, $codee);
                         

                       
                }
    }
     public function update_iuridiuli_gallery($codee)
    {
        if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
       
            
            $str = $this->generateRandomString();
            $filename = $this->session->userdata('id')."_". $str;
            
               $data = array();
      

                $config['upload_path']          = './assets/images/iuridiuli/';
                $config['allowed_types']        = '*';
                $config['max_size']             = 30000;
                $config['max_width']            = 8096;
                $config['max_height']           = 4048;
                // $config['file_name']             = $filename;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file'))
                {
                        $error = array('error' => $this->upload->display_errors());

                       
                }
                else
                {
                        $data = array('file_name' => $this->upload->data('file_name'), 'file_ext'=> $file_ext = $this->upload->data('file_ext'));
                        $save  =$this->admin_model->update_iuridiuli_gallery($data, $codee);
                         

                       
                }
    }
     public function update_brigadiri_gallery($codee)
    {
        if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
       
            
        	$str = $this->generateRandomString();
            $filename = $this->session->userdata('id')."_". $str;
            
               $data = array();
      

                $config['upload_path']          = './assets/images/brigadiri/';
                $config['allowed_types']        = '*';
                $config['max_size']             = 30000;
                $config['max_width']            = 8096;
                $config['max_height']           = 4048;
                // $config['file_name']             = $filename;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file'))
                {
                        $error = array('error' => $this->upload->display_errors());

                       
                }
                else
                {
                        $data = array('file_name' => $this->upload->data('file_name'), 'file_ext'=> $file_ext = $this->upload->data('file_ext'));
                        $save  =$this->admin_model->update_brigadiri_gallery($data, $codee);
                         

                       
                }
    }
    public function update_sms_gallery($codee)
    {
        if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
       
            
        	$str = $this->generateRandomString();
            $filename = $this->session->userdata('id')."_". $str;
            
               $data = array();
      

                $config['upload_path']          = './assets/images/sms_gagzavnili/';
                $config['allowed_types']        = '*';
                $config['max_size']             = 300000;
                $config['max_width']            = 8096;
                $config['max_height']           = 4048;
                // $config['file_name']             = $filename;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file'))
                {
                        $error = array('error' => $this->upload->display_errors());

                       
                }
                else
                {
                        $data = array('file_name' => $this->upload->data('file_name'), 'file_ext'=> $file_ext = $this->upload->data('file_ext'));
                        $save  =$this->admin_model->update_sms_gagzavnili_gallery($data, $codee);
                         

                       
                }
    }
    public function update_problem_gallery($codee)
    {
        
        
        	$str = $this->generateRandomString();
            $filename = $this->session->userdata('id')."_". $str;
            
               $data = array();
      

                $config['upload_path']          = './assets/images/problem/';
                $config['allowed_types']        = '*';
                $config['max_size']             = 30000;
                $config['max_width']            = 8096;
                $config['max_height']           = 4048;
                 $config['file_name']             = $filename;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file'))
                {
                        $error = array('error' => $this->upload->display_errors());

                       
                }
                else
                {
                        $data = array('file_name' => $this->upload->data('file_name'), 'file_ext'=> $file_ext = $this->upload->data('file_ext'));
                         $save  =$this->admin_model->update_problem_gallery($data, $codee);
                         

                       
                }
    }
    public function update_material_gallery($category)
    {
        if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
        
        	$str = $this->generateRandomString();
            $filename = $this->session->userdata('id')."_". $str;
            
               $data = array();
      

                $config['upload_path']          = './assets/images/building_materials/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 30000;
                $config['max_width']            = 8096;
                $config['max_height']           = 4048;
                 $config['file_name']             = $filename;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file'))
                {
                        $error = array('error' => $this->upload->display_errors());

                       
                }
                else
                {
                        
                        $data = array('file_name' => $this->upload->data('file_name'));
                      // $cod =$this->session->userdata('news_code');
                         $save  =$this->admin_model->update_materials_gallery($data, $category);
                     

                       
                }
    }
    public function update_object_news_gallery($code)
    {
        	if(($this->session->has_userdata('object_image_code')))
        	{
        		$this->session->unset_userdata('object_image_code');
        		 

        	}
		  $this->session->set_userdata('object_image_code', $code);
        	$str = $this->generateRandomString();
            $filename = $this->session->userdata('id')."_". $str;
               $data = array();
      

                $config['upload_path']          = './assets/images/object_news/';
                $config['allowed_types']        = '*';
                $config['max_size']             = 30000;
                $config['max_width']            = 8096;
                $config['max_height']           = 4048;
                 $config['file_name']             = $filename;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file'))
                {
                        $error = array('error' => $this->upload->display_errors());

                       
                }
                else
                {
                       $data = array('file_name' => $this->upload->data('file_name'), 'file_ext'=> $file_ext = $this->upload->data('file_ext'));
                       //$cod =$this->session->userdata('apartment_code');
                         $save  =$this->admin_model->update_object_news_images($data, $code);

                       
                }
    }
    public function update_news_gallery($codee)
    {
        if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
        
        	$str = $this->generateRandomString();
            $filename = $this->session->userdata('id')."_". $str;
            
               $data = array();
      

                $config['upload_path']          = './assets/images/news/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 30000;
                $config['max_width']            = 8096;
                $config['max_height']           = 4048;
                 $config['file_name']             = $filename;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file'))
                {
                        $error = array('error' => $this->upload->display_errors());

                       
                }
                else
                {
                        $this->session->set_userdata('news_edit_block', 'gallery_block');
                        $data = array('file_name' => $this->upload->data('file_name'));
                      // $cod =$this->session->userdata('news_code');
                         $save  =$this->admin_model->update_news_gallery($data, $codee);
                         

                       
                }
    }
     public function current_work_upload($code)
    {

        if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));            if(($this->session->has_userdata('current_work_code')))
            {
                $this->session->unset_userdata('current_work_code');
                 

            }
          $this->session->set_userdata('current_work_code', $code);
            $str = $this->generateRandomString();
            $filename = $this->session->userdata('id')."_". $str;
               $data = array();
      

                $config['upload_path']          = './assets/images/current_works/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 20000;
                $config['max_width']            = 8096;
                $config['max_height']           = 4048;
                 $config['file_name']             = $filename;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file'))
                {
                        $error = array('error' => $this->upload->display_errors());

                       
                }
                else
                {
                        $data = array('file_name' => $this->upload->data('file_name'));
                       //$cod =$this->session->userdata('current_work_code');
                         $save  =$this->admin_model->insert_current_work_photo($data, $code);

                       
                }
    }
  
    public function update_current_work_gallery($codee, $object_code)
    {
        if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
        
            $str = $this->generateRandomString();
            $filename = $this->session->userdata('id')."_". $str;
            
               $data = array();
      

                $config['upload_path']          = './assets/images/current_works/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 30000;
                $config['max_width']            = 8096;
                $config['max_height']           = 4048;
                 $config['file_name']             = $filename;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file'))
                {
                        $error = array('error' => $this->upload->display_errors());

                       
                }
                else
                {
                        $this->session->set_userdata('apart_edit_block', 'gallery_block');
                        $data = array('file_name' => $this->upload->data('file_name'));
                       //$cod =$this->session->userdata('current_work_code');
                         $save  =$this->admin_model->update_current_work_gallery($data, $codee, $object_code);
                         

                       
                }
    }
    
    public function object_map($code,$lat,$lng)
    {
        if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
        /*
$config['center'] = '41.606787,41.5933449';
$config['zoom'] = 'auto';

$config['onclick'] = ' createMarker_map({ map: map, position:event.latLng });';
$this->goglemaps->initialize($config);
$marker = array();
$marker['position'] = '41.606787,41.5933449';
$this->goglemaps->add_marker($marker);
    	$data['map'] = $this->goglemaps->create_map(); */
    	$data["object_map_code"] = $code;
    	$data["object_map_lat"] = $lat;
    	$data["object_map_lng"] = $lng;

    	$this->load->view('layouts/Aheader');
		$this->load->view('admin/object_map', $data);
		$this->load->view('layouts/Afooter');

    }
    
    public function update_coords($code,$lat,$lng)
    {
        if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
        //$lat = $this->input->get('lat');
        // $lng = $this->input->get('lng');
    	 $coords  =$this->admin_model->update_object_coords($code, $lat,$lng);
    	 $this->session->set_userdata('object_edit_block', 'map_block');
    	 redirect(base_url("admin/object_edit/".$code)); 
    
    }
      public function vvalidation() {
       
       if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404")); //Load email library
        $this->load->library("email");
        $this->email->from("tavartkiladze94@gmail.com", "Validation");
        $this->email->to("kompiutingi@gmail.com");
       // $this->admin_model->validation_set($email, $str);
        $this->email->subject("Email Validation");
        $this->email->message("jjjj");
        //Send mail
        $this->email->send();
          
    }
    public function validation( $str)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
	
		 $string =$this->admin_model->validation($str);
		  redirect(base_url("admin/login")); 
		
	}
	
    public function do_upload_files()
    {
        if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
        	$str = $this->generateRandomString();
            $filename = $this->session->userdata('files')."_". $str;
               $data = array();
      

                $config['upload_path']          = './uploads/files/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg|mp4';
                $config['max_size']             = 3000000;
                $config['max_width']            = 8096;
                $config['max_height']           = 8096;
                 $config['file_name']             = $filename;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('admin/index', $error);
                }
                else
                {
                        $data = array('file_name' => $this->upload->data('file_name'));
                         $data['files_name'] = $this->upload->data('file_name');
                       $this->load->view('main/upload_files', $data);
                       

                }
    }
    
    
    public function upload_files()
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		$this->load->view('admin/upload_files');
	}
      /////////////////////////////////////////////////////////////////////////////////////////////////Building materials
    public function building_materials()
	{
	    if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		$array = [];
        $data['materials'] = array();
        $data['materials'] = $this->admin_model->get_materials();
	    $data['count_materials'] = 0;
	    $data['count_materials'] = count($data['materials']);
	   
		$this->load->view('layouts/Aheader');
		$this->load->view('admin/building_materials', $data);
		$this->load->view('layouts/Afooter');
	}
	public function material_edit($category)
	{
	    if(!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
	
        $data['material_edit'] = array();
        $data['material_edit'] = $this->admin_model->get_material_edit($category);
	    $data['images'] = $this->admin_model->get_material_images($category);
		$data['imagess'] = $this->admin_model->get_material_images($category);
		$this->load->view('layouts/Aheader');
		$this->load->view('admin/material_edit', $data);
		$this->load->view('layouts/Afooter');
	}
	public function material_update($category)
	{
	    if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		$data['material_update'] = array();
		$data['material_update'] = $this->admin_model->material_update( $category, $this->input->post());
	    redirect(base_url("admin/material_edit/".$category));

	}
	
	public function set_as_material_main_image($file_name, $category)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		$delete = $this->admin_model->material_main_image($file_name, $category);
		redirect(base_url("admin/material_edit/".$category));
	}
	public function delete_material_image($file_name, $category)
	{
	    if(($this->session->userdata('category') != 'admin')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("admin/login"));
		$abspath=$_SERVER['DOCUMENT_ROOT'];
		$delete = $this->admin_model->material_image_delete($file_name);
      	$path = FCPATH  ."/assets/images/building_materials/".$file_name;
        unlink($path);
	
        redirect(base_url("admin/material_edit/".$category));
	}
}
