<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function  __construct() {
	      parent::__construct();
	  	
    	$this->load->model("main_model");
    	$this->load->model("admin_model");
    	$this->load->library('goglemaps');
    	$this->load->helper('form');
        $this->load->helper('url');

          $this->load->helper('url_helper');
          
        $this->load->helper('security');
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
	    $arr = array();
	    $vieww = array();
	    $data["content"] = "";
	    $view_numb = 0;
	    $arr["page"] = "index";
	    $vieww = $this->main_model->get_page_view_count($arr["page"]);
	    if(count($vieww)!= 0)
	    $view_numb = $vieww[0]->view;
	    
	    $arr["view"] = $view_numb+1;
	    $view_update = $this->main_model->update_page_view($arr);
	    $arr["ip_addr"] = $this->input->ip_address();
	    $history_view_update = $this->main_model->update_page_history_view($arr);
	    
	    $data["view"] = $arr["view"];
	    $data['about_text'] = $this->main_model->get_about_text();
	    $data['project_Aliansi'] = $this->main_model->get_builder_group_project("Aliansi_Centro_Polis");
        $data['materials'] = $this->main_model->get_main_materials();
	    $data['news'] = $this->main_model->get_main_news();
	    
	    $data["content"] = "სამშენებლო კომპანია Bestbuildergroup აწარმოებსს მეტალის სხვადასხვა კონსტრუქციებს: აივნის მოაჯირები, კიბის მოაჯირები, გისოსები, კარები, ხარაჩოებ, კედლის საყალიბე მასალა, შერის საყალიბე მასალა, სამშენებლო სტენდი და სხვა...";
		$this->load->view('layouts/header',$data);
		$this->load->view('main/index', $data);
		$this->load->view('layouts/footer');
	}
	
    public function services()
	{
	    $data["content"] ="";
	    $data["content"] = "სამშენებლო კომპანია, ბესთბილდერგრუპ სამშენებლო, სარემონტო სფეროში არსებულ, ინოვაციურ-კრეატიულ გუნდს წარმოადგენს. კომპანია შპს ბესთბილდერგრუპ დაფუძნდა 2020 წლის 24 მარტს. კომპანია აერთიანებს იმ ადამიანების ჯგუფს, რომლებიც ბოლო 10-12 წლის განმავლობაში საქართველოს სხვადასხვა რეგიონებში აწარმოებდნენ და უშუალოდ მონაწილეობას ღებულობდნენ სამშენებლო სარემონტო საპროექტო სამუშაოებში... ";  
		$this->load->view('layouts/header',$data);
		$this->load->view('main/services');
		$this->load->view('layouts/footer');
	}
	public function building_materials()
	{
	    $arr = array();
	    $data["content"] = "";
	    $arr["page"] = "building_materials";
	    $vieww = $this->main_model->get_page_view_count($arr["page"]);
	    $view_numb = $vieww[0]->view;
	    $arr["view"] = $view_numb+1;
	    $view_update = $this->main_model->update_page_view($arr);
	    $arr["ip_addr"] = $this->input->ip_address();
	    $history_view_update = $this->main_model->update_page_history_view($arr);
	    $data['materials'] = $this->main_model->get_building_materials();
	    
	    $data["view"] = $arr["view"];
	    $data["content"] = "სამშენებლო კომპანია Bestbuildergroup აწარმოებსს მეტალის სხვადასხვა კონსტრუქციებს: აივნის მოაჯირები, კიბის მოაჯირები, გისოსები, კარები, ხარაჩოებ, კედლის საყალიბე მასალა, შერის საყალიბე მასალა, სამშენებლო სტენდი და სხვა...";
		
		$this->load->view('layouts/header',$data);
		$this->load->view('main/building_materials',$data);
		$this->load->view('layouts/footer');
	}
	public function material_details($category)
	{
	    $arr = array();
	    $arr["page"] = "material_details/".$category;
	    $vieww = $this->main_model->get_page_view_count("material_details");
	    $view_numb = $vieww[0]->view;
	    $arr["view"] = $view_numb+1;
	    $view_update = $this->main_model->update_page_view($arr);
	    $arr["ip_addr"] = $this->input->ip_address();
	    $history_view_update = $this->main_model->update_page_history_view($arr);
	    $data['material_details'] = $this->main_model->get_material_details($category);
	    $data["category"] =  $category;
	    $data['images'] = $this->main_model->get_material_images($category);
	    $data['imagess'] = $this->main_model->get_material_images($category);
	
		$this->load->view('main/material_details',$data);
		$this->load->view('layouts/footer');
	}
	public function about()
	{
	     $arr = array();
	    $arr["page"] = "about";
	    $vieww = $this->main_model->get_page_view_count($arr["page"]);
	    $view_numb = $vieww[0]->view;
	    $arr["view"] = $view_numb+1;
	    $view_update = $this->main_model->update_page_view($arr);
	    $arr["ip_addr"] = $this->input->ip_address();
	    $history_view_update = $this->main_model->update_page_history_view($arr);
	    $data['about_text'] = $this->main_model->get_about_text();
	    $data["view"] = $arr["view"];
	    $data["content"] ="";
	    $data["content"] = "სამშენებლო კომპანია, ბესთბილდერგრუპ სამშენებლო, სარემონტო სფეროში არსებულ, ინოვაციურ-კრეატიულ გუნდს წარმოადგენს. კომპანია შპს ბესთბილდერგრუპ დაფუძნდა 2020 წლის 24 მარტს. კომპანია აერთიანებს იმ ადამიანების ჯგუფს, რომლებიც ბოლო 10-12 წლის განმავლობაში საქართველოს სხვადასხვა რეგიონებში აწარმოებდნენ და უშუალოდ მონაწილეობას ღებულობდნენ სამშენებლო სარემონტო საპროექტო სამუშაოებში... ";  
		$this->load->view('layouts/header',$data);
		
		$this->load->view('main/about', $data);
		$this->load->view('layouts/footer');
	}
	
	public function rules_and_security()
	{
	   $data["content"] ="";
	    $data["content"] = "სამშენებლო კომპანია, ბესთბილდერგრუპ სამშენებლო, სარემონტო სფეროში არსებულ, ინოვაციურ-კრეატიულ გუნდს წარმოადგენს. კომპანია შპს ბესთბილდერგრუპ დაფუძნდა 2020 წლის 24 მარტს. კომპანია აერთიანებს იმ ადამიანების ჯგუფს, რომლებიც ბოლო 10-12 წლის განმავლობაში საქართველოს სხვადასხვა რეგიონებში აწარმოებდნენ და უშუალოდ მონაწილეობას ღებულობდნენ სამშენებლო სარემონტო საპროექტო სამუშაოებში... ";  
		$this->load->view('main/rules_and_security');
		$this->load->view('layouts/footer');
	}
	public function gallery()
	{
		$this->load->view('layouts/header');
		$this->load->view('main/gallery');
		$this->load->view('layouts/footer');
	}
	public function questions()
	{
		$this->load->view('layouts/header');
		$this->load->view('main/questions');
		$this->load->view('layouts/footer');
	}
	public function contact()
	{
	     $arr = array();
	    $arr["page"] = "contact";
	    $vieww = $this->main_model->get_page_view_count($arr["page"]);
	    $view_numb = $vieww[0]->view;
	    $arr["view"] = $view_numb+1;
	    $view_update = $this->main_model->update_page_view($arr);
	    $arr["ip_addr"] = $this->input->ip_address();
	    $history_view_update = $this->main_model->update_page_history_view($arr);
	    $config['center'] = '41.64237459468645, 41.627464878769864';
        $config['zoom'] = '15';

        $this->goglemaps->initialize($config);
        $marker = array();
        $marker['position'] = '41.64237459468645, 41.627464878769864';
        $this->goglemaps->add_marker($marker);
    	$data['map'] = $this->goglemaps->create_map();
    	$data["view"] = $arr["view"];
    	$data["content"] ="";
	    $data["content"] = "სამშენებლო კომპანია, ბესთბილდერგრუპ სამშენებლო, სარემონტო სფეროში არსებულ, ინოვაციურ-კრეატიულ გუნდს წარმოადგენს. კომპანია შპს ბესთბილდერგრუპ დაფუძნდა 2020 წლის 24 მარტს. კომპანია აერთიანებს იმ ადამიანების ჯგუფს, რომლებიც ბოლო 10-12 წლის განმავლობაში საქართველოს სხვადასხვა რეგიონებში აწარმოებდნენ და უშუალოდ მონაწილეობას ღებულობდნენ სამშენებლო სარემონტო საპროექტო სამუშაოებში... ";  
		$this->load->view('layouts/header',$data);
		
		$this->load->view('main/contact',$data);
		$this->load->view('layouts/footer');
	}
	public function projects()
	{ 
	    $arr = array();
	    $arr["page"] = "projects";
	    $vieww = $this->main_model->get_page_view_count($arr["page"]);
	    $view_numb = $vieww[0]->view;
	    $arr["view"] = $view_numb+1;
	    $view_update = $this->main_model->update_page_view($arr);
	    $arr["ip_addr"] = $this->input->ip_address();
	    $history_view_update = $this->main_model->update_page_history_view($arr);
	    $data['projects'] = $this->main_model->get_builder_group_projects();
	    $data["view"] = $arr["view"];
	    $data["content"] ="";
	    $data["content"] = "სამშენებლო კომპანია, ბესთბილდერგრუპ სამშენებლო, სარემონტო სფეროში არსებულ, ინოვაციურ-კრეატიულ გუნდს წარმოადგენს. კომპანია შპს ბესთბილდერგრუპ დაფუძნდა 2020 წლის 24 მარტს. კომპანია აერთიანებს იმ ადამიანების ჯგუფს, რომლებიც ბოლო 10-12 წლის განმავლობაში საქართველოს სხვადასხვა რეგიონებში აწარმოებდნენ და უშუალოდ მონაწილეობას ღებულობდნენ სამშენებლო სარემონტო საპროექტო სამუშაოებში... ";  
		$this->load->view('layouts/header',$data);
		
		$this->load->view('main/projects', $data);
		$this->load->view('layouts/footer');
	     
	}
	public function project_details($code)
	{  
	    $arr = array();
	    $img = array();
	    $arr["page"] = "project_details/".$code;
	    $vieww = $this->main_model->get_page_view_count("project_details");
	    $view_numb = $vieww[0]->view;
	    $arr["view"] = $view_numb+1;
	    $view_update = $this->main_model->update_page_view($arr);
	    
	    $arr["ip_addr"] = $this->input->ip_address();
	    $history_view_update = $this->main_model->update_page_history_view($arr);
	    $data['current_works_images'] = 0;
	    $data['project_details'] = $this->main_model->get_builder_group_project($code);
	    $data['images'] = array();
	    $data['current_works'] = array();
	    $data['images'] = $this->main_model->get_object_images($code);
	    $data['imagess'] = $this->main_model->get_object_images($code);
	    $data['current_works'] = $this->main_model->get_current_works($code);
	    $data['current_works_images'] = $this->main_model->get_current_work_images($code);
		$data['current_works_imagess'] = $this->main_model->get_current_work_images($code);
	
		foreach($data['current_works'] as $curr_works_item)
	    {
	       $img[$curr_works_item['code']] =  $this->main_model->get_current_work_images($curr_works_item['code']);
	    }
	    $data["code"] = '';
	    $data["code"] = $code;
	    $data['curr_works_img'] = $img;
	    
		$this->load->view('main/project_details', $data);
		$this->load->view('layouts/footer');
	     
	}
	public function news()
	{
	     $arr = array();
	    $arr["page"] = "news";
	    $vieww = $this->main_model->get_page_view_count($arr["page"]);
	    $view_numb = $vieww[0]->view;
	    $arr["view"] = $view_numb+1;
	    $view_update = $this->main_model->update_page_view($arr);
	    $arr["ip_addr"] = $this->input->ip_address();
	    $history_view_update = $this->main_model->update_page_history_view($arr);
	    $data['news'] = $this->main_model->get_builder_group_news();
	    $data["view"] = $arr["view"];
	    $data["newss"] = "News";
	    $data["content"] ="";
	    $data["content"] = "სამშენებლო კომპანია, ბესთბილდერგრუპ სამშენებლო, სარემონტო სფეროში არსებულ, ინოვაციურ-კრეატიულ გუნდს წარმოადგენს. კომპანია შპს ბესთბილდერგრუპ დაფუძნდა 2020 წლის 24 მარტს. კომპანია აერთიანებს იმ ადამიანების ჯგუფს, რომლებიც ბოლო 10-12 წლის განმავლობაში საქართველოს სხვადასხვა რეგიონებში აწარმოებდნენ და უშუალოდ მონაწილეობას ღებულობდნენ სამშენებლო სარემონტო საპროექტო სამუშაოებში... ";  
		$this->load->view('layouts/header',$data);
		
		$this->load->view('main/news', $data);
		$this->load->view('layouts/footer');
	}
	public function news_details($code)
	{
	     $arr = array();
	    $arr["page"] = "news_details/".$code;
	    $vieww = $this->main_model->get_page_view_count("news_details");
	    $view_numb = $vieww[0]->view;
	    $arr["view"] = $view_numb+1;
	    $view_update = $this->main_model->update_page_view($arr);
	    $arr["ip_addr"] = $this->input->ip_address();
	    $history_view_update = $this->main_model->update_page_history_view($arr);
	    $data['news_details'] = 0;
	    $data['images'] = 0;
	    $data['imagess'] = 0;
	    $data['news_details'] = $this->main_model->get_builder_group_news_details($code);
	    $data['images'] = $this->main_model->get_news_images($code);
	    $data['imagess'] = $this->main_model->get_news_images($code);
		$this->load->view('main/news_details', $data);
		$this->load->view('layouts/footer');
	}
	
	public function service_details($type)
	{  
	    $arr = array();
	    $img = array();
	    $data = array();
	    $arr["page"] = "service_details/".$type;
	    $vieww = $this->main_model->get_page_view_count("project_details");
	    $view_numb = $vieww[0]->view;
	    $arr["view"] = $view_numb+1;
	    $view_update = $this->main_model->update_page_view($arr);
	    
	    $arr["ip_addr"] = $this->input->ip_address();
	    $history_view_update = $this->main_model->update_page_history_view($arr);
	    
	    $data['service_details'] = $this->main_model->get_builder_group_service($type);
	    $data['images'] = array();
	    $data['images'] = $this->main_model->get_service_images($type);
	    $data['imagess'] = $this->main_model->get_service_images($type);
	   
		$this->load->view('main/service_details', $data);
		$this->load->view('layouts/footer');
	     
	}
	public function setLanguage($lang)
	{
		$this->session->set_userdata('lan', $lang);	
		redirect('main/'.$this->uri->segment(4).'/'.$this->uri->segment(5));
	
	    
		// $oops = $this->lang->line('message_key');
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
	
 }
