<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Tbilisi');
class Redaqtor extends CI_Controller {

	public function __construct() {       
        parent::__construct();     
        $this->load->model("redaqtor_model");
          $this->load->library('goglemaps');
          $this->load->library('pagination');
        
        $this->load->helper('url'); 
         $this->load->helper('form');       
         $this->load->helper('url_helper');
        $this->load->helper('security');
        $this->load->library('session');
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
			if(!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$array = [];
		$config["per_page"] = 20;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['object_list'] = array();
	    $data['object_list'] = $this->redaqtor_model->get_object_list($config["per_page"], $page);
	    $data['count_ap_list'] = count($this->redaqtor_model->get_object_length($array));
	    
	    $config = array();
        $config["base_url"] = base_url() . "redaqtor/object_list";
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
		$this->load->view('layouts/Rheader');
		$this->load->view('redaqtor/index', $data);
		$this->load->view('layouts/Rfooter');
	}
	public function about()
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		
		$data['about_text'] = $this->redaqtor_model->get_about_text();
		$this->load->view('layouts/Rheader');
		$this->load->view('redaqtor/about', $data);
		$this->load->view('layouts/Rfooter');
	}
	public function news()
	{
	    
		if(!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$array = [];
		$config["per_page"] = 20;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['news_list'] = array();
	    $data['news_list'] = $this->redaqtor_model->get_news_list($config["per_page"], $page);
	    $data['count_ap_list'] = count($this->redaqtor_model->get_news_length($array));
	    
	    $config = array();
        $config["base_url"] = base_url() . "redaqtor/news";
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
		$this->load->view('layouts/Rheader');
		$this->load->view('redaqtor/news', $data);
		$this->load->view('layouts/Rfooter');
	}
	public function news_create()
	{
		$code = $this->generateRandomString(12);
		$data['code'] = $code;
		
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
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
	
	
	
		$this->db->insert('builder_group_news');
        $this->session->set_flashdata('alert', 'ჩანაწერი წარმატებით დაემატა');
	    $this->session->set_flashdata('alertype', 'success');
	    $this->session->set_userdata('news_edit_block', 'info_block');
	    redirect(base_url("redaqtor/news_edit/".$code)); 
		}
		$this->load->view('layouts/Rheader');
		$this->load->view('redaqtor/news_create', $data);
		$this->load->view('layouts/Rfooter');
	}
	public function news_edit($code)
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$data['images'] = $this->redaqtor_model->get_news_images($code);
		$data['imagess'] = $this->redaqtor_model->get_news_images($code);
		$data['news_edit'] = array();
		$data['news_edit'] = $this->redaqtor_model->news_edit($code);
		
		$this->load->view('layouts/Rheader');
		$this->load->view('redaqtor/news_edit', $data);
		$this->load->view('layouts/Rfooter');
	}
	public function news_update($code)
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$data['news_update'] = array();
		$data['news_update'] = $this->redaqtor_model->news_update( $code, $this->input->post());
		$this->session->set_userdata('object_edit_block', 'info_block');
				redirect(base_url("redaqtor/news_edit/".$code));

	}
	public function news_delete($code)
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$newsImages = $this->redaqtor_model->get_news_images($code);
		$delNews = $this->redaqtor_model->news_delete($code);
		$delNewsImages = $this->redaqtor_model->news_images_delete($code);
		foreach($newsImages as $item)
		{
		  $path = FCPATH  ."/assets/images/news/".$item['file_name'];
          unlink($path);
		}
		redirect(base_url("redaqtor/news"));
	}
	public function delete_news_image($file_name, $code)
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$delete = $this->redaqtor_model->news_image_delete($file_name);
		$this->session->set_userdata('news_edit_block', 'gallery_block');
		$path = FCPATH  ."/assets/images/news/".$file_name;
        unlink($path);
        redirect(base_url("redaqtor/news_edit/".$code));
	}
	public function set_as_news_main_image($file_name, $code)
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$delete = $this->redaqtor_model->news_main_image($file_name, $code);
		$this->session->set_userdata('news_edit_block', 'gallery_block');
		redirect(base_url("redaqtor/news_edit/".$code));
	}
	public function set_as_service_main_image($file_name, $type)
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$delete = $this->redaqtor_model->service_main_image($file_name, $type);
		redirect(base_url("redaqtor/service_edit/".$type));
	}
	public function delete_service_image($file_name, $type)
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$delete = $this->redaqtor_model->service_image_delete($file_name);
		$path = FCPATH  ."/assets/images/services/".$file_name;
        unlink($path);
        redirect(base_url("redaqtor/service_edit/".$type));
	}
	public function about_update()
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$data['about_update'] = array();
		$data['about_update'] = $this->redaqtor_model->about_update($this->input->post());
	   	$data['about_text'] = $this->redaqtor_model->get_about_text();
		redirect(base_url("redaqtor/about"));

	}
	public function construction()
	{	
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login")); 
        $this->load->view('layouts/Rheader');
		$this->load->view('redaqtor/construction');
		$this->load->view('layouts/Rfooter');
	}
	public function construction_details()
	{	
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login")); 
        $this->load->view('layouts/Rheader');
		$this->load->view('redaqtor/construction_details');
		$this->load->view('layouts/Rfooter');
	}
	public function repair()
	{	
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login")); 
        $this->load->view('layouts/Rheader');
		$this->load->view('redaqtor/repair');
		$this->load->view('layouts/Rfooter');
	}

	public function login()
	{            
		if ($this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/index")); 
		
		$this->load->view('layouts/header');
		$this->load->view('redaqtor/login');
		$this->load->view('layouts/footer');
		
	}
	public function loginn()
	{
		$postData = $this->input->post();
        $validate = $this->redaqtor_model->validate_login($postData);
        if ($validate && ($validate[0]->validation=='1')){
            $newdata = array(

                'name' => $validate[0]->name,
                'surname' => $validate[0]->surname,
                'email'     => $validate[0]->email,
                'password'     => $validate[0]->password,
                'id' => $validate[0]->id,
                'photo' => $validate[0]->file_name,
                'category' => $validate[0]->category,
                
               
                'logged_in' => TRUE              
            );
            $this->session->set_userdata($newdata);
            if($validate[0]->category == "redaqtor")
            {
            	redirect(base_url("redaqtor/index")); 
            }
            if($validate[0]->category == "user")
            {
            	redirect(base_url("redaqtor/index")); 
            }
            if($validate[0]->category == "controler")
            {
            	redirect(base_url("controler/index")); 
            }
           
        }
        else{
            $data = array('alert' => true);        	
        	//$data['content'] = 'redaqtor/login';
        	
		$this->load->view('layouts/header');
		$this->load->view('redaqtor/login',$data);
		$this->load->view('layouts/footer');
        }		
	}
public function messages()
	{	
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login")); 
        $this->load->view('layouts/Rheader');
		$this->load->view('redaqtor/messages');
		$this->load->view('layouts/Rfooter');
	}
	public function messages_count()
	{	
		$chat_count = $this->redaqtor_model->get_chat_count();
        echo json_encode($chat_count);
	}
	public function messages_chat_users()
	{	
		$chat_count = $this->redaqtor_model->get_chat_users();
        echo json_encode($chat_count);
	}
	public function messages_chat_full($user)
	{	
	    if($this->input->post('text') !='ggggg')
	    {
	        $this->redaqtor = $this->session->userdata('name');
	        $this->text = $this->input->post('text');
	        $this->user = $user;
	        $this->status = 'read';
	        $this->db->set($this);
	        $this->db->insert('support_chat');
	    }
		$chat_count = $this->redaqtor_model->get_chat_full($user);
        echo json_encode($chat_count);
	}
	public function redaqtor_send()
	{	
	    $obj = $this->input->post();
	   // $this->text = $this->input->post('text');
	    $this->db->set($this->input->post());
	    $this->db->set('redaqtor',$this->session->userdata('name'));
		$this->db->insert('support_chat');
		$chat_count = $this->redaqtor_model->get_chat_full($this->input->post('user'));
        echo json_encode($chat_count);
	}
	public function password_change()
	{
		$password = $this->input->post('old_password');
		$new_password = $this->input->post('new_password');
		$repeat_new_password = $this->input->post('repeat_new_password');
		if($password != $this->session->userdata('password'))
		{
			 $data = array('alert' => true); 
			 $this->load->view('layouts/Rheader');
		$this->load->view('redaqtor/profile_password', $data);
		$this->load->view('layouts/Rfooter');
			 
		}
		else
		{
			$pass = array('password' => $new_password );
        $update = $this->redaqtor_model->update_password($pass);
       
           $this->session->set_userdata('password', $new_password);
         $data = array('alert' => true); 
            redirect(base_url("redaqtor/profile_password")); 
        
       	
       }
	}
	public function object_list()
	{
	    
		if(!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$array = [];
		$config["per_page"] = 20;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['object_list'] = array();
	    $data['object_list'] = $this->redaqtor_model->get_object_list($config["per_page"], $page);
	    $data['count_ap_list'] = count($this->redaqtor_model->get_object_length($array));
	    
	    $config = array();
        $config["base_url"] = base_url() . "redaqtor/object_list";
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
		$this->load->view('layouts/Rheader');
		$this->load->view('redaqtor/object_list', $data);
		$this->load->view('layouts/Rfooter');
	}
	
	public function object_list_type($type)
	{
	    
		if(!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$array = [];
		$config["per_page"] = 20;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['object_list'] = array();
	    $data['object_list'] = $this->redaqtor_model->get_object_list_type($config["per_page"], $page, $type);
	    $data['count_ap_list'] = count($this->redaqtor_model->get_object_length_type($array, $type));
	    
	    $config = array();
        $config["base_url"] = base_url() . "redaqtor/object_list/".$type;
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
		$this->load->view('layouts/Rheader');
		$this->load->view('redaqtor/object_list', $data);
		$this->load->view('layouts/Rfooter');
	}
	public function object_list_search()
	{
	    if(!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
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
        $data['object_list_search'] = $this->redaqtor_model->get_object_list_search($arrayy, $config["per_page"], $page);
        $raodenoba = count($this->redaqtor_model->get_object_length($arrayy));
        }
	    if(count($mas) != "0")
	    {
	    $data['object_list_search'] = $this->redaqtor_model->get_object_list_search($mas, $config["per_page"], $page);
	    $raodenoba = count($this->redaqtor_model->get_object_length($mas));
	    }
	    $config = array();
        $config["base_url"] = base_url() . "redaqtor/object_list_search".$link;
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
		$this->load->view('layouts/Rheader');
		$this->load->view('redaqtor/object_list_search', $data);
		$this->load->view('layouts/Rfooter');
	}
	

    public function object_all()
	{
		if(!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$user_ap = [];
		$user_ap['reg_id'] = $this->session->userdata('id');
		$user_ap['reg_name'] = $this->session->userdata('name');
		$user_ap['reg_surname'] = $this->session->userdata('surname');
		$array = [];
		$config["per_page"] = 20;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['user_object_all'] = array();
	    $data['user_object_all'] = $this->redaqtor_model->get_user_object($user_ap, $config["per_page"], $page);
	    $data['count_user_object_all'] = count($this->redaqtor_model->get_object_length($user_ap));
	    
	    $config = array();
        $config["base_url"] = base_url() . "redaqtor/object_all";
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
		$this->load->view('layouts/Rheader');
		$this->load->view('redaqtor/object_all', $data);
		$this->load->view('layouts/Rfooter');
	}
	public function object_all_search()
	{
	    if(!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
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
        $data['user_object_all'] = $this->redaqtor_model->get_user_object($arrayy, $config["per_page"], $page);
	    $data['count_user_object_all'] = count($this->redaqtor_model->get_object_length($arrayy));
        }
	    if(count($mas) != "0")
	    {
	    $data['user_object_all'] = $this->redaqtor_model->get_user_object($user_ap, $config["per_page"], $page);
	    $data['count_user_object_all'] = count($this->redaqtor_model->get_object_length($mas));
	    }
	    $config = array();
        $config["base_url"] = base_url() . "redaqtor/object_all_search".$link;
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
		$this->load->view('layouts/Rheader');
		$this->load->view('redaqtor/object_all', $data);
		$this->load->view('layouts/Rfooter');
	}
	public function object_create()
	{
		$code = $this->generateRandomString(12);
		$data['code'] = $code;
		
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
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
	    redirect(base_url("redaqtor/object_edit/".$code)); 
		}
		$this->load->view('layouts/Rheader');
		$this->load->view('redaqtor/object_create', $data);
		$this->load->view('layouts/Rfooter');
	}
	
	public function object_edit($code)
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$data['current_work_listt'] = array();
		$data['current_work_listt'] = $this->redaqtor_model->get_current_work_list_edit($code);
		
		
		$data['images'] = $this->redaqtor_model->get_object_images($code);
		$data['imagess'] = $this->redaqtor_model->get_object_images($code);
		$data['object_edit'] = array();
		$data['object_edit'] = $this->redaqtor_model->object_edit($code);
		
		$this->load->view('layouts/Rheader');
		$this->load->view('redaqtor/object_edit', $data);
		$this->load->view('layouts/Rfooter');
	}
	public function object_view($code)
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$data['images'] = $this->redaqtor_model->get_object_images($code);
		  $data['imagess'] = $this->redaqtor_model->get_object_images($code);
		$data['object_view'] = array();
		$data['object_view'] = $this->redaqtor_model->object_view($code);
		$this->load->view('layouts/Rheader');
		$this->load->view('redaqtor/object_view', $data);
		$this->load->view('layouts/Rfooter');
	}
	public function object_update($code)
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$data['object_update'] = array();
		$data['object_update'] = $this->redaqtor_model->object_update( $code, $this->input->post());
		$this->session->set_userdata('object_edit_block', 'info_block');
				redirect(base_url("redaqtor/object_edit/".$code));

	}
	public function object_view_update($code)
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$data['object_update'] = array();
		$data['object_update'] = $this->redaqtor_model->object_view_update( $code, $this->input->post());
		$this->session->set_userdata('object_edit_block', 'info_block');
				redirect(base_url("redaqtor/object_view/".$code));

	}
	public function object_delete($code)
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		
		$del = $this->redaqtor_model->object_delete($code);
		redirect(base_url("redaqtor/index"));
	}
	public function object_gallery($code)
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		 $data['images'] = $this->redaqtor_model->get_object_images($code);
		  $data['imagess'] = $this->redaqtor_model->get_object_images($code);
		 $data['cod'] = $code;
		$this->load->view('layouts/Rheader');
		$this->load->view('redaqtor/object_gallery', $data);
		$this->load->view('layouts/Rfooter');
	}
	public function object_booking_delete($book_code)
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		
		$del = $this->redaqtor_model->object_booking_delete($book_code);
		redirect(base_url("redaqtor/object_booking_all/"));
	}
	public function delete_object_image($file_name, $code)
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$delete = $this->redaqtor_model->object_image_delete($file_name);
		$this->session->set_userdata('object_edit_block', 'info_block');
		$path = FCPATH  ."/assets/images/projects/".$file_name;
          unlink($path);
		
        redirect(base_url("redaqtor/object_edit/".$code));
	}
	public function set_as_object_main_image($file_name, $code)
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$delete = $this->redaqtor_model->object_main_image($file_name, $code);
		$this->session->set_userdata('object_edit_block', 'info_block');
		redirect(base_url("redaqtor/object_edit/".$code));
	}
	public function object_activate1($code,$id)
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$this->session->set_userdata('object_edit_block', 'info_block');
		$this->redaqtor_model->object_activate($id);
			redirect(base_url("redaqtor/object_view/".$code));
	}
	public function object_expired($code,$id)
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$this->session->set_userdata('object_edit_block', 'info_block');
		$this->redaqtor_model->object_expired($id);
		redirect(base_url("redaqtor/object_view/".$code));
	}
	public function object_activate2($code,$id)
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$this->session->set_userdata('object_edit_block', 'info_block');
		 $this->redaqtor_model->object_activate($id);
			redirect(base_url("redaqtor/object_edit/".$code));
	}
	public function object_canceled($code,$id)
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$this->session->set_userdata('object_edit_block', 'info_block');
		 $this->redaqtor_model->object_canceled($id);
		redirect(base_url("redaqtor/object_edit/".$code));
	}
	public function current_work_list()
	{
	    
		if(!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$array = [];
		$config["per_page"] = 20;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['current_work_list'] = array();
	    $data['current_work_list'] = $this->redaqtor_model->get_current_work_list($config["per_page"], $page);
	    $data['count_ap_list'] = count($this->redaqtor_model->get_current_work_length($array));
	    
	    $config = array();
        $config["base_url"] = base_url() . "redaqtor/current_work_list";
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
		$this->load->view('layouts/Rheader');
		$this->load->view('redaqtor/current_work_list', $data);
		$this->load->view('layouts/Rfooter');
	}
	
	public function current_work_list_type($type)
	{
	    
		if(!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$array = [];
		$config["per_page"] = 20;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['current_work_list'] = array();
	    $data['current_work_list'] = $this->redaqtor_model->get_current_work_list_type($config["per_page"], $page, $type);
	    $data['count_ap_list'] = count($this->redaqtor_model->get_current_work_length_type($array, $type));
	    
	    $config = array();
        $config["base_url"] = base_url() . "redaqtor/current_work_list/".$type;
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
		$this->load->view('layouts/Rheader');
		$this->load->view('redaqtor/current_work_list', $data);
		$this->load->view('layouts/Rfooter');
	}
	public function current_work_list_search()
	{
	    if(!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
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
        $data['current_work_list_search'] = $this->redaqtor_model->get_current_work_list_search($arrayy, $config["per_page"], $page);
        $raodenoba = count($this->redaqtor_model->get_current_work_length($arrayy));
        }
	    if(count($mas) != "0")
	    {
	    $data['current_work_list_search'] = $this->redaqtor_model->get_current_work_list_search($mas, $config["per_page"], $page);
	    $raodenoba = count($this->redaqtor_model->get_current_work_length($mas));
	    }
	    $config = array();
        $config["base_url"] = base_url() . "redaqtor/current_work_list_search".$link;
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
	    $this->session->set_userdata('current_work_edit_block', 'info_block');
	    $this->session->set_userdata('user_view_block', 'info_block');
		$this->load->view('layouts/Rheader');
		$this->load->view('redaqtor/current_work_list_search', $data);
		$this->load->view('layouts/Rfooter');
	}
	
    public function current_work_all()
	{
		if(!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$user_ap = [];
		$user_ap['reg_id'] = $this->session->userdata('id');
		$user_ap['reg_name'] = $this->session->userdata('name');
		$user_ap['reg_surname'] = $this->session->userdata('surname');
		$array = [];
		$config["per_page"] = 20;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['user_current_work_all'] = array();
	    $data['user_current_work_all'] = $this->redaqtor_model->get_user_current_work($user_ap, $config["per_page"], $page);
	    $data['count_user_current_work_all'] = count($this->redaqtor_model->get_current_work_length($user_ap));
	    
	    $config = array();
        $config["base_url"] = base_url() . "redaqtor/current_work_all";
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
		$this->load->view('layouts/Rheader');
		$this->load->view('redaqtor/current_work_all', $data);
		$this->load->view('layouts/Rfooter');
	}
	public function current_work_all_search()
	{
	    if(!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
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
        $data['user_current_work_all'] = $this->redaqtor_model->get_user_current_work($arrayy, $config["per_page"], $page);
	    $data['count_user_current_work_all'] = count($this->redaqtor_model->get_current_work_length($arrayy));
        }
	    if(count($mas) != "0")
	    {
	    $data['user_current_work_all'] = $this->redaqtor_model->get_user_current_work($user_ap, $config["per_page"], $page);
	    $data['count_user_current_work_all'] = count($this->redaqtor_model->get_current_work_length($mas));
	    }
	    $config = array();
        $config["base_url"] = base_url() . "redaqtor/current_work_all_search".$link;
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
		$this->load->view('layouts/Rheader');
		$this->load->view('redaqtor/current_work_all', $data);
		$this->load->view('layouts/Rfooter');
	}
	public function current_work_create($object_code)
	{

		$data['object_code'] = $object_code;
		
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		else if  ( $this->input->server('REQUEST_METHOD') == 'POST')
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
		$this->db->set('object_code', $object_code);
		$this->db->set('date', $date);

		$this->db->set($postData);
	
	
	
		$this->db->insert('builder_group_current_work');
        $this->session->set_flashdata('alert', 'ჩანაწერი წარმატებით დაემატა');
	    $this->session->set_flashdata('alertype', 'success');
	    $this->session->set_userdata('object_edit_block', 'current_work_block');

	    redirect(base_url("redaqtor/current_work_edit/".$code)); 
		}
		$this->load->view('layouts/Rheader');
		$this->load->view('redaqtor/current_work_create', $data);
		$this->load->view('layouts/Rfooter');
	}
	
	public function current_work_edit($code)
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$data['images'] = $this->redaqtor_model->get_current_work_images($code);
		$data['imagess'] = $this->redaqtor_model->get_current_work_images($code);
		$data['current_work_edit'] = array();
		$data['current_work_edit'] = $this->redaqtor_model->current_work_edit($code);
		
		$this->load->view('layouts/Rheader');
		$this->load->view('redaqtor/current_work_edit', $data);
		$this->load->view('layouts/Rfooter');
	}
	public function current_work_view($code)
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$data['images'] = $this->redaqtor_model->get_current_work_images($code);
		  $data['imagess'] = $this->redaqtor_model->get_current_work_images($code);
		$data['current_work_view'] = array();
		$data['current_work_view'] = $this->redaqtor_model->current_work_view($code);
		$this->load->view('layouts/Rheader');
		$this->load->view('redaqtor/current_work_view', $data);
		$this->load->view('layouts/Rfooter');
	}
	public function current_work_update($code)
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$data['current_work_update'] = array();
		$data['current_work_update'] = $this->redaqtor_model->current_work_update( $code, $this->input->post());
		$this->session->set_userdata('current_work_edit_block', 'info_block');
				redirect(base_url("redaqtor/current_work_edit/".$code));

	}
	public function current_work_view_update($code)
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$data['current_work_update'] = array();
		$data['current_work_update'] = $this->redaqtor_model->current_work_view_update( $code, $this->input->post());
		$this->session->set_userdata('current_work_edit_block', 'info_block');
				redirect(base_url("redaqtor/current_work_view/".$code));

	}
	public function current_work_delete($code, $object_code)
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$this->session->set_userdata('object_edit_block', 'current_work_block');
		$del = $this->redaqtor_model->current_work_delete($code);
		redirect(base_url("redaqtor/object_edit/".$object_code));
	}
	public function current_work_gallery($code)
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		 $data['images'] = $this->redaqtor_model->get_current_work_images($code);
		  $data['imagess'] = $this->redaqtor_model->get_current_work_images($code);
		 $data['cod'] = $code;
		$this->load->view('layouts/Rheader');
		$this->load->view('redaqtor/current_work_gallery', $data);
		$this->load->view('layouts/Rfooter');
	}

	public function delete_current_work_image($file_name, $code)
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$delete = $this->redaqtor_model->current_work_image_delete($file_name);
		$this->session->set_userdata('current_work_edit_block', 'gallery_block');
        redirect(base_url("redaqtor/current_work_edit/".$code));
	}
	public function set_as_current_work_main_image($file_name, $code)
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$delete = $this->redaqtor_model->current_work_main_image($file_name, $code);
		$this->session->set_userdata('current_work_edit_block', 'gallery_block');
		redirect(base_url("redaqtor/current_work_edit/".$code));
	}
	public function services()
	{
	    if(!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
	    if(($this->session->userdata('category') != 'redaqtor')) redirect(base_url("main/error_404"));
		$array = array();
        $data['services'] = array();
        $data['services'] = $this->redaqtor_model->get_services();
	    $data['count_services'] = 0;
	    $data['count_services'] = count($data['services']);
	   
		$this->load->view('layouts/Rheader');
		$this->load->view('redaqtor/services', $data);
		$this->load->view('layouts/Rfooter');
	}
	public function service_edit($type)
	{
	    if(!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
	    if(($this->session->userdata('category') != 'redaqtor')) redirect(base_url("main/error_404"));
	
        $data['service_edit'] = array();
        $data['service_edit'] = $this->redaqtor_model->get_service_edit($type);
	    $data['images'] = $this->redaqtor_model->get_service_images($type);
		$data['imagess'] = $this->redaqtor_model->get_service_images($type);
		$this->load->view('layouts/Rheader');
		$this->load->view('redaqtor/service_edit', $data);
		$this->load->view('layouts/Rfooter');
	}
	public function service_update($category)
	{
	    if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		if(($this->session->userdata('category') != 'redaqtor')) redirect(base_url("main/error_404"));
		$data['service_update'] = array();
		$data['service_update'] = $this->redaqtor_model->service_update( $category, $this->input->post());
	    redirect(base_url("redaqtor/service_edit/".$category));

	}
	
	public function set_as_material_main_image($file_name, $category)
	{
	    if(($this->session->userdata('category') != 'redaqtor')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$delete = $this->redaqtor_model->material_main_image($file_name, $category);
		redirect(base_url("redaqtor/service_edit/".$category));
	}
	public function delete_material_image($file_name, $category)
	{
	    if(($this->session->userdata('category') != 'redaqtor')) redirect(base_url("main/error_404"));
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$abspath=$_SERVER['DOCUMENT_ROOT'];
		$delete = $this->redaqtor_model->material_image_delete($file_name);
      	$path = FCPATH  ."/assets/images/services/".$file_name;
        unlink($path);
	
        redirect(base_url("redaqtor/service_edit/".$category));
	}

	public function profile_edit($id)
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
        $data['profile_edit'] = $this->redaqtor_model->get_users($id);
		$this->load->view('layouts/Rheader');
		$this->load->view('redaqtor/profile_edit',$data);
		$this->load->view('layouts/Rfooter');
	}
	public function profile_edit_save($id)
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
        $data['profile_edit'] = $this->redaqtor_model->update_users($id, $this->input->post());
        redirect(base_url('redaqtor/profile_edit/'.$this->session->userdata('id')));
		
	}
	public function profile_password()
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$this->load->view('layouts/Rheader');
		$this->load->view('redaqtor/profile_password');
		$this->load->view('layouts/Rfooter');
	}
	public function profile_view($id)
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$data['profile'] = $this->redaqtor_model->get_users($id);
		$data['id'] = $this->session->userdata('id');
		$this->load->view('layouts/Rheader',$data);
		$this->load->view('redaqtor/profile_view',$data);
		$this->load->view('layouts/Rfooter');
	}
	
	

	public function user_create()
	{
		$code = $this->generateRandomNumber();
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
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

	    redirect(base_url("redaqtor/user_list/")); 
		}
		$this->load->view('layouts/Rheader');
		$this->load->view('redaqtor/user_create');
		$this->load->view('layouts/Rfooter');
	}
	public function user_list()
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$array = [];
		$config["per_page"] = 20;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['users_list_search'] = array();
		$data['users_list_search'] = $this->redaqtor_model->get_user_list($config["per_page"], $page);
		$data['count_user_list'] = count($this->redaqtor_model->get_users_length($array));
	    
	    $config = array();
        $config["base_url"] = base_url() . "redaqtor/user_list";
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
		$this->load->view('layouts/Rheader');
		$this->load->view('redaqtor/user_list', $data);
		$this->load->view('layouts/Rfooter');
	}
	public function user_search()
	{
	   if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
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
        $data['users_list_search'] = $this->redaqtor_model->get_users_list_search($arrayy, $config["per_page"], $page);
        $raodenoba = count($this->redaqtor_model->get_users_length($arrayy));
        }
	    if(count($mas) != "0")
	    {
	    $data['users_list_search'] = $this->redaqtor_model->get_users_list_search($mas, $config["per_page"], $page);
	    $raodenoba = count($this->redaqtor_model->get_users_length($mas));
	    }
	    $config = array();
        $config["base_url"] = base_url() . "redaqtor/users_search".$link;
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
		$this->load->view('layouts/Rheader');
		$this->load->view('redaqtor/user_list', $data);
		$this->load->view('layouts/Rfooter');
	}
	public function user_view($id, $name, $surname)
	{
		if(!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		
		$data['user'] = $this->redaqtor_model->user_view($id, $name, $surname);
		$data['id'] = $this->session->userdata('id');
		$user_info = [];
		$user_info['reg_id'] = $id;
		$user_info['reg_name'] = $name;
		$user_info['reg_surname'] = $surname;
		$array = [];
		$config["per_page"] = 20;
		$page = ($this->uri->segment(6)) ? $this->uri->segment(6) : 0;
        $data['user_object'] = array();
	    $data['user_object'] = $this->redaqtor_model->get_user_object($user_info, $config["per_page"], $page);
	    $data['count_user_object'] = count($this->redaqtor_model->get_object_length($user_info));
	    
	    $config = array();
        $config["base_url"] = base_url() . "redaqtor/user_view/".$id."/".$name."/".$surname;
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
		$this->load->view('layouts/Rheader',$data);
		$this->load->view('redaqtor/user_view',$data);
		$this->load->view('layouts/Rfooter');
	}
	


	public function user_activate1($id, $name, $surname)
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		 $this->redaqtor_model->user_activate($id,$name,$surname);
			redirect(base_url("redaqtor/user_view/".$id."/".$name."/".$surname));
	}
	public function user_expired($id, $name, $surname)
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		 $this->redaqtor_model->user_expired($id,$name,$surname);
		redirect(base_url("redaqtor/user_view/".$id."/".$name."/".$surname));
	}
	public function user_delete($id)
	{
		if (!$this->session->has_userdata('logged_in')) redirect(base_url("redaqtor/login"));
		$del = $this->redaqtor_model->user_delete($id);
		redirect(base_url("redaqtor/user_list"));
	}
	public function generateRandomString($length = 20) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
	public function generateRandomNumber($length = 8) {
	    $characters = '0123456789';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}


	public function setLanguage($lang)
	{
		$this->session->set_userdata('lan', $lang);	
		redirect('redaqtor/'.$this->uri->segment(4).'/'.$this->uri->segment(5));
	
	    
	}


	public function getLangId()
	{
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
        redirect(base_url('redaqtor/login'));
    }
    public function do_upload()
        {
        	$str = $this->generateRandomString();
            $filename = $this->session->userdata('photo')."_". $str;
               $data = array();
      

                $config['upload_path']          = './uploads/users/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 300000;
                $config['max_width']            = 8096;
                $config['max_height']           = 4048;
                 $config['file_name']             = $filename;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('redaqtor/profile_edit', $error);
                }
                else
                {
                        $data = array('file_name' => $this->upload->data('file_name'));
                       
                         $save  =$this->redaqtor_model->update_profile_photo($data);

                }
    }
     
    public function object_upload($code)
        {
        	if(($this->session->has_userdata('builder_group_object_code')))
        	{
        		$this->session->unset_userdata('builder_group_object_code');
        		 

        	}
		  $this->session->set_userdata('builder_group_object_code', $code);
        	$str = $this->generateRandomString();
            $filename = $this->session->userdata('id')."_". $str;
               $data = array();
      

                $config['upload_path']          = './assets/images/projects/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 200000;
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
                         $save  =$this->redaqtor_model->insert_object_photo($data, $code);

                       
                }
    }
  
    public function update_object_gallery($codee)
        {
        
        	$str = $this->generateRandomString();
            $filename = $this->session->userdata('id')."_". $str;
            
               $data = array();
      

                $config['upload_path']          = './assets/images/projects/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 300000;
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
                         $save  =$this->redaqtor_model->update_object_gallery($data, $codee);
                         

                       
                }
    }
    
    public function news_upload($code)
        {
        	if(($this->session->has_userdata('builder_group_news_code')))
        	{
        		$this->session->unset_userdata('builder_group_news_code');
        		 

        	}
		  $this->session->set_userdata('builder_group_news_code', $code);
        	$str = $this->generateRandomString();
            $filename = $this->session->userdata('id')."_". $str;
               $data = array();
      

                $config['upload_path']          = './assets/images/news/';
                $config['allowed_types']        = '*';
                $config['max_size']             = 2000000;
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
                       //$cod =$this->session->userdata('news_code');
                         $save  =$this->redaqtor_model->insert_news_photo($data, $code);

                       
                }
    }
  
    public function update_news_gallery($codee)
    {
        
        	$str = $this->generateRandomString();
            $filename = $this->session->userdata('id')."_". $str;
            
               $data = array();
      

                $config['upload_path']          = './assets/images/news/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 3000000;
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
                        $data = array('file_name' => $this->upload->data('file_name'), 'file_ext'=> $file_ext = $this->upload->data('file_ext'));
                      // $cod =$this->session->userdata('news_code');
                         $save  =$this->redaqtor_model->update_news_gallery($data, $codee);
                         

                       
                }
    }
    public function update_service_gallery($type)
    {
        
        	$str = $this->generateRandomString();
            $filename = $this->session->userdata('id')."_". $str;
            
               $data = array();
      

                $config['upload_path']          = './assets/images/services/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 3000000;
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
                      // $cod =$this->session->userdata('news_code');
                         $save  =$this->redaqtor_model->update_service_gallery($data, $type);
                         

                       
                }
    }
     public function current_work_upload($code)
    {
            if(($this->session->has_userdata('current_work_code')))
            {
                $this->session->unset_userdata('current_work_code');
                 

            }
          $this->session->set_userdata('current_work_code', $code);
            $str = $this->generateRandomString();
            $filename = $this->session->userdata('id')."_". $str;
               $data = array();
      

                $config['upload_path']          = './assets/images/current_works/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2000000;
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
                         $save  =$this->redaqtor_model->insert_current_work_photo($data, $code);

                       
                }
    }
  
    public function update_current_work_gallery($codee, $object_code)
    {
        
            $str = $this->generateRandomString();
            $filename = $this->session->userdata('id')."_". $str;
            
               $data = array();
      

                $config['upload_path']          = './assets/images/current_works/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 3000000;
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
                         $save  =$this->redaqtor_model->update_current_work_gallery($data, $codee, $object_code);
                         

                       
                }
    }
    
    public function object_map($code,$lat,$lng)
    {
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

    	$this->load->view('layouts/Rheader');
		$this->load->view('redaqtor/object_map', $data);
		$this->load->view('layouts/Rfooter');

    }
    
    public function update_coords($code,$lat,$lng)
    {    
        //$lat = $this->input->get('lat');
        // $lng = $this->input->get('lng');
    	 $coords  =$this->redaqtor_model->update_object_coords($code, $lat,$lng);
    	 $this->session->set_userdata('object_edit_block', 'map_block');
    	 redirect(base_url("redaqtor/object_edit/".$code)); 
    
    }
      public function vvalidation() {
        //Load email library
        $this->load->library("email");
        $this->email->from("tavartkiladze94@gmail.com", "Validation");
        $this->email->to("kompiutingi@gmail.com");
       // $this->redaqtor_model->validation_set($email, $str);
        $this->email->subject("Email Validation");
        $this->email->message("jjjj");
        //Send mail
        $this->email->send();
          
    }
    public function validation( $str)
	{            
	
		 $string =$this->redaqtor_model->validation($str);
		  redirect(base_url("redaqtor/login")); 
		
	}
	
    public function do_upload_files()
        {
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

                        $this->load->view('redaqtor/index', $error);
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
		$this->load->view('redaqtor/upload_files');
	}
      
      
}
