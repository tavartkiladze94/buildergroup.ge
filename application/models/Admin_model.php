<?php 
date_default_timezone_set('Asia/Tbilisi');

class Admin_model extends CI_Model {

        function validate_login($postData){
                $this->db->select('*');
                $this->db->where('email', $postData['email']);
                $this->db->where('password', $postData['password']);
                // $this->db->where('status', 1);
                $this->db->from('users');
                $query=$this->db->get();
                $query->num_rows();
                    
                    return $query->result();
        }
        
        function check($email){
                $this->db->select('*');
                $this->db->where('email', $email);
                // $this->db->where('status', 1);
                $this->db->from('users');
                $query=$this->db->get();
                $query->num_rows();
                    
                    return $query->result();
        }
        public function validation_set($email, $str)
        {
           
         $this->validation_code     = $str;
         $this->db->where('email', $email);
         $this->db->update('users', $this);

               
        }
        public function validation($str)
        {
                $this->validation    = 1;
                $this->db->where('validation_code', $str);
                $this->db->update('users', $this);
        }
        public function update_password($pass){
           
               // $this->password= $pass;
              
                $id = $this->session->userdata('id');

         $this->db->where('id', $id);
         $this->db->update('users', $pass);

               
        }
        public function get_about_text()
        {
               $query = $this->db->get_where('builder_group_about', array('code' => 'about'));
                return $query->row_array();
                
        }
        public function about_update($text)
        {
    
                $this->db->update('builder_group_about', $text);
        }
       
        public function update_profile_photo($photo)
        {
             $id = $this->session->userdata('id');
             $this->db->where('id', $id);
             $this->db->update('users', $photo);   
        }
        public function insert_object_photo($data,$code)
        {
            $date = date('Y-m-d H:i');
            $this->db->set($data);
            $this->db->set('registrator', $this->session->userdata('id'));
            $this->db->set('date', $date);
            $this->db->set('code', $code);
            $this->db->insert('builder_group_projects_images');
        }
      
        public function get_users($id)
        {
            $query = $this->db->get_where('users', array('id' => $id));
            $this->db->order_by("id", "desc");
            $query->num_rows();
                    
            return $query->row_array();
        }
        public function user_view($id, $name, $surname)
        {
            $query = $this->db->get_where('users', array('id' => $id, 'name' => $name, 'surname' => $surname));
            $query->num_rows();
                    
            return $query->row_array();
        }
        public function get_user_list($limit, $start)
        {
            
            $this->db->limit($limit, $start);
            $this->db->order_by("id", "desc");
            $query = $this->db->get('users');
            $query->num_rows();
                    
            return $query->result_array();
        }
        public function get_users_list_search($arrayy, $limit, $start)
        {
             $this->db->select('*');
             $this->db->where($arrayy);

             $this->db->from('users');
             $this->db->limit($limit, $start);
             $this->db->order_by("id", "desc");
             $query=$this->db->get();
             return $query->result_array();
        }
         public function get_users_length($array)
        {
            $this->db->select('*');
            if(count($array) != "0")
            {
             $this->db->where($array);
            }
            $query = $this->db->get('users');
            $this->db->order_by("id", "desc");
            return $query->result_array();
        }
         public function user_delete($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('users');
        }
        
        public function update_users($id, $postdata)
        {
            $this->db->where('id', $id);
            $this->db->update('users', $postdata);
        }
       
        public function get_user_view_object( $arrayy, $limit, $start)
        {
             $this->db->select('*');
             $this->db->where($arrayy);
             $this->db->from('builder_group_projects');
             $this->db->limit($limit, $start);
             $this->db->order_by("id", "desc");
             $query=$this->db->get();
            return $query->result_array();
        }
        public function get_user_object( $arrayy, $limit, $start)
        {
             $this->db->select('*');
             $this->db->where($arrayy);
             $this->db->from('builder_group_projects');
             $this->db->limit($limit, $start);
             $this->db->order_by("id", "desc");
             $query=$this->db->get();
            return $query->result_array();
        }
        
        public function get_object_list()
        {
            
            $this->db->select('*');
           /* if($this->session->userdata('Real_Palace')==1)
               {
               $this->db->where('object', 'Real_Palace');
               }
               if($this->session->userdata('Villa_Akhalsopeli_Batumi')==1)
               {
               $this->db->where('object', 'Villa_Akhalsopeli_Batumi');
               }
               if($this->session->userdata('Maqacaria')==1)
               {
               $this->db->where('object', 'Maqacaria');
               }
               if($this->session->userdata('Villa_Gonio')=='1')
               {
               $this->db->where('object', 'Villa_Gonio');
               }
               if($this->session->userdata('Villa_Akhalsopeli_Khelvachauri')=='1')
               {
               $this->db->where('object', 'Villa_Akhalsopeli_Khelvachauri');
               }
               if($this->session->userdata('Maxinjauri_House')=='1')
               {
               $this->db->where('object', 'Maxinjauri_House');
               }
               */
             $this->db->order_by("id", "desc");
               
              
             $this->db->from('builder_group_projects');
             $query=$this->db->get();
             return $query->result_array();
        }
        public function get_object_list_edit($code)
        {
        
            $query = $this->db->get_where('builder_group_projects', array('code' => $code));
            $this->db->order_by("id", "desc");
            $query->num_rows();
                    
            return $query->result_array();
        }
        
        public function get_object_list_type($limit, $start, $type)
        {
            
            $this->db->select('*');
             $this->db->where('type', $type);
             $this->db->order_by("id", "desc");
             $this->db->from('builder_group_projects');
             $this->db->limit($limit, $start);
             $query=$this->db->get();
             return $query->result_array();
        }
        public function get_object_list_search($arrayy, $limit, $start)
        {
             $this->db->select('*');
             $this->db->where($arrayy);

             $this->db->from('builder_group_projects');
             $this->db->limit($limit, $start);
             $query=$this->db->get();
             return $query->result_array();
        }
        public function object_edit($code)
        {
            $query = $this->db->get_where('builder_group_projects', array('code' => $code));
            $query->num_rows();
                    
            return $query->row_array();
        }
        public function object_view($code)
        {
            $query = $this->db->get_where('builder_group_projects', array('code' => $code));
            $this->db->order_by("id", "desc");
            $query->num_rows();
                    
            return $query->row_array();
        }
        public function get_object_length($array)
        {
            $this->db->select('*');
            if(count($array) != "0")
            {
             $this->db->where($array);
            }
            $query = $this->db->get('builder_group_projects');
            $this->db->order_by("id", "desc");
            return $query->result_array();
        }
        
        public function get_object_length_type($array,$type)
        {
            $this->db->select('*');
            if(count($array) != "0")
            {
             $this->db->where($array);
            }
            $this->db->where('type', $type);
            $query = $this->db->get('builder_group_projects');
            $this->db->order_by("id", "desc");
            return $query->result_array();
        }
        public function get_object_images($code)
        {
            $query = $this->db->get_where('builder_group_projects_images', array('code' => $code));
            
            $query->num_rows();
                    
            return $query->result_array();
        }
         public function object_update($code, $postdata)
        {
            $this->db->where('code', $code);
            //$this->db->where('reg_id', $this->session->userdata('id'));
            //$this->db->where('reg_name', $this->session->userdata('name'));
            //$this->db->where('reg_surname', $this->session->userdata('surname'));
            $this->db->update('builder_group_projects', $postdata);
        }
        public function object_view_update($code, $postdata)
        {
            $this->db->where('code', $code);
            $this->db->update('builder_group_projects', $postdata);
        }

         public function object_delete($code)
        {
                $this->db->where('code', $code);
                //$this->db->where('reg_id', $this->session->userdata('id'));
                //$this->db->where('reg_name', $this->session->userdata('name'));
                //$this->db->where('reg_surname', $this->session->userdata('surname'));
                $this->db->delete('builder_group_projects');
        }
        public function news_delete($code)
        {
                $this->db->where('code', $code);
                //$this->db->where('reg_id', $this->session->userdata('id'));
                //$this->db->where('reg_name', $this->session->userdata('name'));
                //$this->db->where('reg_surname', $this->session->userdata('surname'));
                $this->db->delete('builder_group_news');
        }
         public function object_booking_delete($book_code)
        {
                $this->db->where('book_code', $book_code);
                $this->db->delete('booking_object');
        }
         public function update_object_gallery($data, $code)
        {
            $date = date('Y-m-d H:i');
               $this->db->set($data);
               $this->db->set('registrator', $this->session->userdata('id'));
                $this->db->set('code', $code);
                $this->db->set('date', $date);

                $this->db->insert('builder_group_projects_images');
        }
        
         public function object_image_delete($file_name)
        {
                $this->db->where('file_name', $file_name);
                $this->db->delete('builder_group_projects_images');
        }
         public function object_main_image($file_name, $code)
        {
                $this->db->where('code', $code);
                
                $this->file_name     = $file_name;
                $this->db->update('builder_group_projects', $this);
        }
        
        public function get_object_booking($id)
        {
            $query = $this->db->get_where('booking_object', array('registrator' => $id));
            $this->db->order_by("id", "desc");
            $query->num_rows();
                    
            return $query->result_array();
        }
        public function get_object_booking_all()
        {
            $query = $this->db->get('booking_object');
            $this->db->order_by("id", "desc");
            $query->num_rows();
                    
            return $query->result_array();
        }
        
        public function object_activate($id)
        {
                $this->db->where('id', $id);
                  $this->status     = "Active";
                $this->db->update('builder_group_projects', $this);
        }
        public function object_expired($id)
        {
                $this->db->where('id', $id);
                  $this->status     = "Expired";
                $this->db->update('builder_group_projects', $this);
        }
        public function object_canceled($id)
        {
                $this->db->where('id', $id);
                $this->status     = "Canceled";
                $this->db->update('builder_group_projects', $this);
        }
        
        
        
        public function insert_current_work($post, $code, $object_code)
        {
             $postData = $post;
			$date = date('Y-m-d H:i');
			$reg_id =$this->session->userdata('id');
			$reg_name =$this->session->userdata('name');
			$reg_surname =$this->session->userdata('surname');
		


	
		$this->db->set('reg_id', $reg_id);
		$this->db->set('reg_name', $reg_name);
		$this->db->set('reg_surname', $reg_surname);
		$this->db->set('code', $code);
		$this->db->set('object_code', $object_code);
		$this->db->set('date', $date);

		$this->db->set($postData);
		$this->db->insert('builder_group_current_work');

                
        }
        public function get_current_work_list_edit($code)
        {
        
            $this->db->order_by("id", "desc");
            $query = $this->db->get_where('builder_group_current_work', array('object_code' => $code));
            
            $query->num_rows();
                    
            return $query->result_array();
        }
        
        public function get_current_work_list($limit, $start)
        {
            
            $this->db->select('*');
             $this->db->order_by("id", "desc");
             $this->db->from('builder_group_current_work');
             $this->db->limit($limit, $start);
             $query=$this->db->get();
             return $query->result_array();
        }
        
        public function get_current_work_list_type($limit, $start, $type)
        {
            
            $this->db->select('*');
             $this->db->where('type', $type);
             $this->db->order_by("id", "desc");
             $this->db->from('builder_group_current_work');
             $this->db->limit($limit, $start);
             $query=$this->db->get();
             return $query->result_array();
        }
        public function get_current_work_list_search($arrayy, $limit, $start)
        {
             $this->db->select('*');
             $this->db->where($arrayy);

             $this->db->from('builder_group_current_work');
             $this->db->limit($limit, $start);
             $query=$this->db->get();
             return $query->result_array();
        }
        public function current_work_edit($code)
        {
            $query = $this->db->get_where('builder_group_current_work', array('code' => $code));
            $this->db->order_by("id", "desc");
            $query->num_rows();
                    
            return $query->row_array();
        }
        public function current_work_view($code)
        {
            $query = $this->db->get_where('builder_group_current_work', array('code' => $code));
            $this->db->order_by("id", "desc");
            $query->num_rows();
                    
            return $query->row_array();
        }
        public function get_current_work_length($array)
        {
            $this->db->select('*');
            if(count($array) != "0")
            {
             $this->db->where($array);
            }
            $query = $this->db->get('builder_group_current_work');
            $this->db->order_by("id", "desc");
            return $query->result_array();
        }
        
        public function get_current_work_length_type($array,$type)
        {
            $this->db->select('*');
            if(count($array) != "0")
            {
             $this->db->where($array);
            }
            $this->db->where('type', $type);
            $query = $this->db->get('builder_group_current_work');
            $this->db->order_by("id", "desc");
            return $query->result_array();
        }
        public function insert_current_work_photo($data,$code, $object_code)
        {
            $date = date('Y-m-d H:i');
            $this->db->set($data);
            $this->db->set('registrator', $this->session->userdata('id'));
            $this->db->set('date', $date);
            $this->db->set('code', $code);
            $this->db->set('object_code', $object_code);
            $this->db->insert('builder_group_current_work_images');
        }
        public function get_current_work_images($code)
        {
           
            $query = $this->db->get_where('builder_group_current_work_images', array('code' => $code));
            $query->num_rows();
                    
            return $query->result_array();
        }
         public function current_work_update($code, $postdata)
        {
            $this->db->where('code', $code);
            //$this->db->where('reg_id', $this->session->userdata('id'));
            //$this->db->where('reg_name', $this->session->userdata('name'));
            //$this->db->where('reg_surname', $this->session->userdata('surname'));
            $this->db->update('builder_group_current_work', $postdata);
        }
        public function current_work_view_update($code, $postdata)
        {
            $this->db->where('code', $code);
            $this->db->update('builder_group_current_work', $postdata);
        }

         public function current_work_delete($code)
        {
                $this->db->where('code', $code);
                //$this->db->where('reg_id', $this->session->userdata('id'));
                //$this->db->where('reg_name', $this->session->userdata('name'));
                //$this->db->where('reg_surname', $this->session->userdata('surname'));
                $this->db->delete('builder_group_current_work');
        }
         public function current_work_booking_delete($book_code)
        {
                $this->db->where('book_code', $book_code);
                $this->db->delete('booking_current_work');
        }
         public function update_current_work_gallery($data, $code, $object_code)
        {
            $date = date('Y-m-d H:i');
               $this->db->set($data);
               $this->db->set('registrator', $this->session->userdata('id'));
                $this->db->set('code', $code);
                $this->db->set('object_code', $object_code);
                $this->db->set('date', $date);

                $this->db->insert('builder_group_current_work_images');
        }
         public function current_work_image_delete($file_name)
        {
                $this->db->where('file_name', $file_name);
                $this->db->delete('builder_group_current_work_images');
        }
         public function current_work_main_image($file_name, $code)
        {
                $this->db->where('code', $code);
                
                $this->file_name     = $file_name;
                $this->db->update('builder_group_current_work', $this);
        }
        
        public function get_current_work_booking($id)
        {
            $query = $this->db->get_where('booking_current_work', array('registrator' => $id));
            $this->db->order_by("id", "desc");
            $query->num_rows();
                    
            return $query->result_array();
        }
        public function get_current_work_booking_all()
        {
            $query = $this->db->get('booking_current_work');
            $this->db->order_by("id", "desc");
            $query->num_rows();
                    
            return $query->result_array();
        }

        


        public function update_coords($coords)
        {
                $this->db->update('builder_group_projects', $coords);
        }
        
    
        public function user_activate($id, $name, $surname)
        {
                $this->db->where('id', $id);
                $this->db->where('name', $name);
                $this->db->where('surname', $surname);
                  $this->status     = "Active";
                $this->db->update('users', $this);
        }
        public function user_expired($id, $name, $surname)
        {
                $this->db->where('id', $id);
                $this->db->where('name', $name);
                $this->db->where('surname', $surname);
                  $this->status     = "Expired";
                $this->db->update('users', $this);
        }
         
        public function update_object_coords($code, $lat,$lng)
        {
                $this->lat  = $lat;
                $this->lng  = $lng;
                $this->db->where('code', $code);
                $this->db->where('reg_id', $this->session->userdata('id'));
                $this->db->where('reg_name', $this->session->userdata('name'));
                $this->db->where('reg_surname', $this->session->userdata('surname'));
                $this->db->update('builder_group_projects', $this);
        }
        public function chat_insertt($obj)
        { 
           $this->db->set($obj);
           //$this->db->set('status', 'unread');
		   $this->db->insert('support_chat');
        }
        public function chat_update($user)
        {
                $this->db->where('user', $user);
                  $this->status     = "read";
                $this->db->update('support_chat', $this);
        }
        public function get_chat_count()
        {
             $this->db->select('user');
             $this->db->where('status', 'unread');
             $this->db->order_by("id", "desc");
             $this->db->from('support_chat');
             $query=$this->db->get();
                return $query->result_array(); 
        }
        public function get_chat_users()
        {
             $this->db->select('user');
             //$this->db->where('status', 'unread');
              $this->db->order_by("id", "desc");
             $this->db->from('support_chat');
             $this->db->distinct();
             $query=$this->db->get();
             return $query->result_array(); 
        }
        public function get_chat_full($user)
        {
             $this->db->select('*');
             //$this->db->where('status', 'unread');
             $this->db->where('user', $user);
             $this->db->from('support_chat');
             $query=$this->db->get();
             return $query->result_array(); 
        }
        
        
        
        public function insert_news($post, $code)
        {
             $postData = $post;
			$date = date('Y-m-d H:i');
			$reg_id =$this->session->userdata('id');
			$reg_name =$this->session->userdata('name');
			$reg_surname =$this->session->userdata('surname');
		


	
		$this->db->set('reg_id', $reg_id);
		$this->db->set('reg_name', $reg_name);
		$this->db->set('reg_surname', $reg_surname);
		$this->db->set('code', $code);
		$this->db->set('date', $date);

		$this->db->set($postData);
		$this->db->insert('builder_group_news');

                
        }
        public function get_news_list($limit, $start)
        {
            
            $this->db->select('*');
             $this->db->order_by("id", "desc");
             $this->db->from('builder_group_news');
             $this->db->limit($limit, $start);
             $query=$this->db->get();
             return $query->result_array();
        }
        public function get_news_length($array)
        {
            $this->db->select('*');
            if(count($array) != "0")
            {
             $this->db->where($array);
            }
            $query = $this->db->get('builder_group_news');
            $this->db->order_by("id", "desc");
            return $query->result_array();
        }
        
        public function news_edit($code)
        {
            $query = $this->db->get_where('builder_group_news', array('code' => $code));
            $this->db->order_by("id", "desc");
            $query->num_rows();
                    
            return $query->row_array();
        }
        public function insert_news_photo($data,$code)
        {
            $date = date('Y-m-d H:i');
            $this->db->set($data);
            $this->db->set('registrator', $this->session->userdata('id'));
            $this->db->set('date', $date);
            $this->db->set('code', $code);
            $this->db->insert('builder_group_news_images');
        }
        
        public function get_news_images($code)
        {
            $query = $this->db->get_where('builder_group_news_images', array('code' => $code));
            
            $query->num_rows();
                    
            return $query->result_array();
        }
         public function news_update($code, $postdata)
        {
            $this->db->where('code', $code);
            //$this->db->where('reg_id', $this->session->userdata('id'));
            //$this->db->where('reg_name', $this->session->userdata('name'));
            //$this->db->where('reg_surname', $this->session->userdata('surname'));
            $this->db->update('builder_group_news', $postdata);
        }
        public function news_view_update($code, $postdata)
        {
            $this->db->where('code', $code);
            $this->db->update('builder_group_news', $postdata);
        }

         
        public function update_news_gallery($data, $code)
        {
            $date = date('Y-m-d H:i');
               $this->db->set($data);
               $this->db->set('registrator', $this->session->userdata('id'));
                $this->db->set('code', $code);
                $this->db->set('date', $date);

                $this->db->insert('builder_group_news_images');
        }
        public function news_image_delete($file_name)
        {
                $this->db->where('file_name', $file_name);
                $this->db->delete('builder_group_news_images');
        }
         public function news_main_image($file_name, $code)
        {
                $this->db->where('code', $code);
               // $this->db->where('reg_id', $this->session->userdata('id'));
                //$this->db->where('reg_name', $this->session->userdata('name'));
               // $this->db->where('reg_surname', $this->session->userdata('surname'));
                $this->file_name     = $file_name;
                $this->db->update('builder_group_news', $this);
        }
        //////////////////////////////////////////////////////////////////////FINANSEBI
        public function get_finansebi_users_all_select()
        {
            $this->db->order_by("id", "desc");
            $this->db->where('finansebi', '1');
            $query = $this->db->get('users');
            $query->num_rows() ;
            return $query->result_array();
        }
        public function get_finansebi_sms_migebuli($limit, $start)
        {
            
            $this->db->limit($limit, $start);
            $this->db->order_by("id", "desc");
            $this->db->where('mimgebi', $this->session->userdata('name').' '.$this->session->userdata('surname'));
            $query = $this->db->get('finansebis_sms');
            $query->num_rows() ;
            return $query->result_array();
        }
        public function get_finansebi_sms_migebuli_all()
        {
            $this->db->order_by("id", "desc");
            $this->db->where('mimgebi', $this->session->userdata('name').' '.$this->session->userdata('surname'));
            $query = $this->db->get('finansebis_sms');
            $query->num_rows();
                    
            return $query->result_array();
        }
        public function get_finansebi_all_search($array, $limit, $start)
        {
           
           
            if (array_key_exists("status",$array))
            {
               $this->db->where('status', $array['status']);

            }
            if (array_key_exists("category",$array))
            {
                $this->db->where($array['category'], $this->session->userdata('name').' '.$this->session->userdata('surname'));

            }
            if (array_key_exists("from",$array))
            {
                $this->db->where('date >=', $array['from']);

            }
            if (array_key_exists("to",$array))
            {
                $this->db->where('date <=', $array['to']);

            }
            $this->db->limit($limit, $start);
            
            $this->db->order_by("id", "desc");
            $query = $this->db->get('finansebis_sms');
            $query->num_rows();
                    
            return $query->result_array();
        }
        public function get_finansebi_all_search_count($array)
        {
            
            
           if (array_key_exists("status",$array))
            {
               $this->db->where('status', $array['status']);

            }
            if (array_key_exists("category",$array))
            {
                $this->db->where($array['category'], $this->session->userdata('name').' '.$this->session->userdata('surname'));

            }
            if (array_key_exists("from",$array))
            {
                $this->db->where('date >=', $array['from']);

            }
            if (array_key_exists("to",$array))
            {
                $this->db->where('date <=', $array['to']);

            }
            $this->db->order_by("id", "desc");
            $query = $this->db->get('finansebis_sms');
            $query->num_rows();
                    
            return $query->result_array();
        }
        public function get_finansebi_sms_gagzavnili($limit, $start)
        {
            
            $this->db->limit($limit, $start);
            $this->db->order_by("id", "desc");
            $this->db->where('reg_name', $this->session->userdata('name'));
            $this->db->where('reg_surname', $this->session->userdata('surname'));
            $query = $this->db->get('finansebis_sms');
            $query->num_rows();
                    
            return $query->result_array();
        } 
        public function get_finansebi_sms_gagzavnili_all()
        {
            $this->db->order_by("id", "desc");
            $this->db->where('reg_name', $this->session->userdata('name'));
            $this->db->where('reg_surname', $this->session->userdata('surname'));
            $query = $this->db->get('finansebis_sms');
            $query->num_rows();
                    
            return $query->result_array();
        }
        public function get_finansebi_files()
        {
            $this->db->order_by("id", "desc");
           // $this->db->where('reg_name', $this->session->userdata('name'));
           // $this->db->where('reg_surname', $this->session->userdata('surname'));
            $query = $this->db->get('finansebis_files');
            $query->num_rows();
                    
            return $query->result_array();
        }
        public function finansebi_gagzavnili_files($code)
        {
            $this->db->order_by("id", "desc");
            $this->db->where("code", $code);
            $this->db->where("sms_status", '1');
           // $this->db->where('reg_name', $this->session->userdata('name'));
           // $this->db->where('reg_surname', $this->session->userdata('surname'));
            $query = $this->db->get('finansebis_files');
            $query->num_rows();
                    
            return $query->result_array();
        }
        public function finansebi_migebuli_files($code)
        {
            $this->db->order_by("id", "desc");
            $this->db->where("sms_status", '1');
            $this->db->where("code", $code);
           // $this->db->where('reg_name', $this->session->userdata('name'));
           // $this->db->where('reg_surname', $this->session->userdata('surname'));
            $query = $this->db->get('finansebis_files');
            $query->num_rows();
                    
            return $query->result_array();
        }
        
        public function get_finansebi_sms_details($code)
        {
            $query = $this->db->get_where('finansebis_sms', array('code' => $code));
            $this->db->order_by("id", "desc");
            $query->num_rows();
                    
            return $query->row_array();
        }
        public function finansebi_status_update($code)
        {
            $this->status =1;
            $this->db->where('code', $code);
            $this->db->update('finansebis_sms', $this);
        }
        public function update_finansebi_files_status($code)
        {
            $this->sms_status =1;
            $this->db->where('code', $code);
            $this->db->update('finansebis_files', $this);
        }
        
        public function update_finansebi_gallery($data, $codee)
        {
            $date = date('Y-m-d H:i');
               $this->db->set($data);
               $this->db->set('reg_id', $this->session->userdata('id'));
               $this->db->set('reg_name', $this->session->userdata('name'));
               $this->db->set('reg_surname', $this->session->userdata('surname'));
                $this->db->set('code', $codee);
                $this->db->set('date', $date);

                $this->db->insert('finansebis_files');
        }
        
        ///////////////////////////////////////////////////////////////////IURIDIULI
        public function get_iuridiuli_users_all_select()
        {
            $this->db->order_by("id", "desc");
            $this->db->where('iuridiuli', '1');
            $query = $this->db->get('users');
            $query->num_rows() ;
            return $query->result_array();
        }
        public function get_iuridiuli_sms_migebuli($limit, $start)
        {
            
            $this->db->limit($limit, $start);
            $this->db->order_by("id", "desc");
            $this->db->where('mimgebi', $this->session->userdata('name').' '.$this->session->userdata('surname'));
            $query = $this->db->get('iuridiulis_sms');
            $query->num_rows() ;
            return $query->result_array();
        }
        public function get_iuridiuli_sms_migebuli_all()
        {
            $this->db->order_by("id", "desc");
            $this->db->where('mimgebi', $this->session->userdata('name').' '.$this->session->userdata('surname'));
            $query = $this->db->get('iuridiulis_sms');
            $query->num_rows();
                    
            return $query->result_array();
        }
        public function get_iuridiuli_all_search($array, $limit, $start)
        {
            
            $this->db->limit($limit, $start);
             if (array_key_exists("status",$array))
            {
               $this->db->where('status', $array['status']);

            }
            if (array_key_exists("category",$array))
            {
                $this->db->where($array['category'], $this->session->userdata('name').' '.$this->session->userdata('surname'));

            }
            $this->db->order_by("id", "desc");
            $query = $this->db->get('iuridiulis_sms');
            $query->num_rows();
                    
            return $query->result_array();
        }
        public function get_iuridiuli_all_search_count($array)
        {
            
             if (array_key_exists("status",$array))
            {
               $this->db->where('status', $array['status']);

            }
            if (array_key_exists("category",$array))
            {
                $this->db->where($array['category'], $this->session->userdata('name').' '.$this->session->userdata('surname'));

            }
            $this->db->order_by("id", "desc");
            $query = $this->db->get('iuridiulis_sms');
            $query->num_rows();
                    
            return $query->result_array();
        }
        public function get_iuridiuli_sms_gagzavnili($limit, $start)
        {
            
            $this->db->limit($limit, $start);
            $this->db->order_by("id", "desc");
            $this->db->where('reg_name', $this->session->userdata('name'));
            $this->db->where('reg_surname', $this->session->userdata('surname'));
            $query = $this->db->get('iuridiulis_sms');
            $query->num_rows();
                    
            return $query->result_array();
        } 
        public function get_iuridiuli_sms_gagzavnili_all()
        {
            $this->db->order_by("id", "desc");
            $this->db->where('reg_name', $this->session->userdata('name'));
            $this->db->where('reg_surname', $this->session->userdata('surname'));
            $query = $this->db->get('iuridiulis_sms');
            $query->num_rows();
                    
            return $query->result_array();
        }
        public function get_iuridiuli_files()
        {
            $this->db->order_by("id", "desc");
           // $this->db->where('reg_name', $this->session->userdata('name'));
           // $this->db->where('reg_surname', $this->session->userdata('surname'));
            $query = $this->db->get('iuridiulis_files');
            $query->num_rows();
                    
            return $query->result_array();
        }
        public function iuridiuli_gagzavnili_files($code)
        {
            $this->db->order_by("id", "desc");
            $this->db->where("code", $code);
            $this->db->where("sms_status", '1');
           // $this->db->where('reg_name', $this->session->userdata('name'));
           // $this->db->where('reg_surname', $this->session->userdata('surname'));
            $query = $this->db->get('iuridiulis_files');
            $query->num_rows();
                    
            return $query->result_array();
        }
        public function iuridiuli_migebuli_files($code)
        {
            $this->db->order_by("id", "desc");
            $this->db->where("sms_status", '1');
            $this->db->where("code", $code);
           // $this->db->where('reg_name', $this->session->userdata('name'));
           // $this->db->where('reg_surname', $this->session->userdata('surname'));
            $query = $this->db->get('iuridiulis_files');
            $query->num_rows();
                    
            return $query->result_array();
        }
        
        public function get_iuridiuli_sms_details($code)
        {
            $query = $this->db->get_where('iuridiulis_sms', array('code' => $code));
            $this->db->order_by("id", "desc");
            $query->num_rows();
                    
            return $query->row_array();
        }
        public function iuridiuli_status_update($code)
        {
            $this->status =1;
            $this->db->where('code', $code);
            $this->db->update('iuridiulis_sms', $this);
        }
        public function update_iuridiuli_files_status($code)
        {
            $this->sms_status =1;
            $this->db->where('code', $code);
            $this->db->update('iuridiulis_files', $this);
        }
        
        public function update_iuridiuli_gallery($data, $codee)
        {
            $date = date('Y-m-d H:i');
               $this->db->set($data);
               $this->db->set('reg_id', $this->session->userdata('id'));
               $this->db->set('reg_name', $this->session->userdata('name'));
               $this->db->set('reg_surname', $this->session->userdata('surname'));
                $this->db->set('code', $codee);
                $this->db->set('date', $date);

                $this->db->insert('iuridiulis_files');
        }
        
        /////////////////////////////////////////////////////////////////// BRIGADIRI
         public function get_brigadiri_users_all_select()
        {
            $this->db->order_by("id", "desc");
            $this->db->where('brigadiri', '1');
            $query = $this->db->get('users');
            $query->num_rows() ;
            return $query->result_array();
        }
        public function get_brigadiri_sms_migebuli($limit, $start)
        {
            
            $this->db->limit($limit, $start);
            $this->db->order_by("id", "desc");
            $this->db->where('mimgebi', $this->session->userdata('name').' '.$this->session->userdata('surname'));
            $query = $this->db->get('brigadiris_sms');
            $query->num_rows() ;
            return $query->result_array();
        }
        public function get_brigadiri_sms_migebuli_all()
        {
            $this->db->order_by("id", "desc");
            $this->db->where('mimgebi', $this->session->userdata('name').' '.$this->session->userdata('surname'));
            $query = $this->db->get('brigadiris_sms');
            $query->num_rows();
                    
            return $query->result_array();
        }
        public function get_brigadiri_all_search($array, $limit, $start)
        {
            
            $this->db->limit($limit, $start);
             if (array_key_exists("status",$array))
            {
               $this->db->where('status', $array['status']);

            }
            if (array_key_exists("category",$array))
            {
                $this->db->where($array['category'], $this->session->userdata('name').' '.$this->session->userdata('surname'));

            }
            $this->db->order_by("id", "desc");
            $query = $this->db->get('brigadiris_sms');
            $query->num_rows();
                    
            return $query->result_array();
        }
        public function get_brigadiri_all_search_count($array)
        {
            
             if (array_key_exists("status",$array))
            {
               $this->db->where('status', $array['status']);

            }
            if (array_key_exists("category",$array))
            {
                $this->db->where($array['category'], $this->session->userdata('name').' '.$this->session->userdata('surname'));

            }
            $this->db->order_by("id", "desc");
            $query = $this->db->get('brigadiris_sms');
            $query->num_rows();
                    
            return $query->result_array();
        }
        public function get_brigadiri_sms_gagzavnili($limit, $start)
        {
            
            $this->db->limit($limit, $start);
            $this->db->order_by("id", "desc");
            $this->db->where('reg_name', $this->session->userdata('name'));
            $this->db->where('reg_surname', $this->session->userdata('surname'));
            $query = $this->db->get('brigadiris_sms');
            $query->num_rows();
                    
            return $query->result_array();
        } 
        public function get_brigadiri_sms_gagzavnili_all()
        {
            $this->db->order_by("id", "desc");
            $this->db->where('reg_name', $this->session->userdata('name'));
            $this->db->where('reg_surname', $this->session->userdata('surname'));
            $query = $this->db->get('brigadiris_sms');
            $query->num_rows();
                    
            return $query->result_array();
        }
        public function get_brigadiri_files()
        {
            $this->db->order_by("id", "desc");
           // $this->db->where('reg_name', $this->session->userdata('name'));
           // $this->db->where('reg_surname', $this->session->userdata('surname'));
            $query = $this->db->get('brigadiris_files');
            $query->num_rows();
                    
            return $query->result_array();
        }
        public function brigadiri_gagzavnili_files($code)
        {
            $this->db->order_by("id", "desc");
            $this->db->where("code", $code);
            $this->db->where("sms_status", '1');
           // $this->db->where('reg_name', $this->session->userdata('name'));
           // $this->db->where('reg_surname', $this->session->userdata('surname'));
            $query = $this->db->get('brigadiris_files');
            $query->num_rows();
                    
            return $query->result_array();
        }
        public function brigadiri_migebuli_files($code)
        {
            $this->db->order_by("id", "desc");
            $this->db->where("sms_status", '1');
            $this->db->where("code", $code);
           // $this->db->where('reg_name', $this->session->userdata('name'));
           // $this->db->where('reg_surname', $this->session->userdata('surname'));
            $query = $this->db->get('brigadiris_files');
            $query->num_rows();
                    
            return $query->result_array();
        }
        
        public function get_brigadiri_sms_details($code)
        {
            $query = $this->db->get_where('brigadiris_sms', array('code' => $code));
            $this->db->order_by("id", "desc");
            $query->num_rows();
                    
            return $query->row_array();
        }
        public function brigadiri_status_update($code)
        {
            $this->status =1;
            $this->db->where('code', $code);
            $this->db->update('brigadiris_sms', $this);
        }
        public function update_brigadiri_files_status($code)
        {
            $this->sms_status =1;
            $this->db->where('code', $code);
            $this->db->update('brigadiris_files', $this);
        }
        
        public function update_brigadiri_gallery($data, $codee)
        {
            $date = date('Y-m-d H:i');
               $this->db->set($data);
               $this->db->set('reg_id', $this->session->userdata('id'));
               $this->db->set('reg_name', $this->session->userdata('name'));
               $this->db->set('reg_surname', $this->session->userdata('surname'));
                $this->db->set('code', $codee);
                $this->db->set('date', $date);

                $this->db->insert('brigadiris_files');
        }
        
        public function get_sms_gagzavnili($limit, $start)
        {
            
            $this->db->limit($limit, $start);
            $this->db->order_by("id", "desc");
            $this->db->where('reg_name', $this->session->userdata('name'));
            $this->db->where('reg_surname', $this->session->userdata('surname'));
            $query = $this->db->get('sms_gagzavnili');
            $query->num_rows();
                    
            return $query->result_array();
        }
        public function sms_gagzavnili_files($code)
        {
            $this->db->order_by("id", "desc");
            $this->db->where("code", $code);
            $query = $this->db->get('sms_gagzavnili_files');
            $query->num_rows();
                    
            return $query->result_array();
        }
        public function update_sms_gagzavnili_gallery($data, $codee)
        {
            $date = date('Y-m-d H:i');
               $this->db->set($data);
               $this->db->set('reg_id', $this->session->userdata('id'));
               $this->db->set('reg_name', $this->session->userdata('name'));
               $this->db->set('reg_surname', $this->session->userdata('surname'));
                $this->db->set('code', $codee);
                $this->db->set('date', $date);

                $this->db->insert('sms_gagzavnili_files');
        }
        public function get_sms_gagzavnili_details($code)
        {
            $query = $this->db->get_where('sms_gagzavnili', array('code' => $code));
            $this->db->order_by("id", "desc");
            $query->num_rows();
                    
            return $query->row_array();
        }
        ///////////////////////////////////////////////////////////////////PROBLEMS
        public function get_problems_all_select()
        {
            $this->db->order_by("id", "desc");
            $query = $this->db->get('builder_group_projects');
            $query->num_rows();
                    
            return $query->result_array();
        }
        public function get_problems_all($limit, $start)
        {
            
            $this->db->limit($limit, $start);
            $this->db->order_by("id", "desc");
            $query = $this->db->get('problem');
            $query->num_rows();
                    
            return $query->result_array();
        }
        public function get_problems_all_search($array, $limit, $start)
        {
            
            $this->db->limit($limit, $start);
            if(count($array) != "0")
            {
             $this->db->where($array);
            }
            $this->db->order_by("id", "desc");
            $query = $this->db->get('problem');
            $query->num_rows();
                    
            return $query->result_array();
        }
        public function get_problems_length($viewed)
        {
            $this->db->select('*');
            if(count($viewed) != "0")
            {
             $this->db->where($viewed);
            }
            $query = $this->db->get('problem');
            $this->db->order_by("id", "desc");
            return $query->result_array();
        }
        public function insert_problem($postData,$code, $object_code)
        {
            $date = date('Y-m-d H:i');
            $this->db->set($postData);
            $this->db->set('status', '1');
            $this->db->set('reg_id', $this->session->userdata('id'));
            $this->db->set('reg_name', $this->session->userdata('name'));
            $this->db->set('reg_surname', $this->session->userdata('surname'));
            $this->db->set('date', $date);
            $this->db->set('code', $code);
            $this->db->set('object_code', $object_code);
            $this->db->insert('problem');
        }
        public function problem_edit($code)
        {
            $query = $this->db->get_where('problem', array('code' => $code));
            $this->db->order_by("id", "desc");
            $query->num_rows();
                    
            return $query->row_array();
        }
        public function problem_update($code, $postdata)
        {
            $this->db->where('code', $code);
            //$this->db->where('reg_id', $this->session->userdata('id'));
            //$this->db->where('reg_name', $this->session->userdata('name'));
            //$this->db->where('reg_surname', $this->session->userdata('surname'));
            $this->db->update('problem', $postdata);
        }
        public function problem_update_history($code, $t, $c, $d)
        {
            $date = date('Y-m-d H:i');
            if($t !='')
            {
            $this->db->set('text', $t);
            }
            if($c !='')
            {
            $this->db->set('comment', $c);
            }
            if($d !='')
            {
            $this->db->set('duration', $d);
            }
            $this->db->set('duration', $d);
            $this->db->set('reg_id', $this->session->userdata('id'));
            $this->db->set('reg_name', $this->session->userdata('name'));
            $this->db->set('reg_surname', $this->session->userdata('surname'));
            $this->db->set('date', $date);
            $this->db->set('code', $code);
            $this->db->insert('problem_history');
        }
        public function problem_viewed_update($code)
        {
            $this->viewed =1;
            $this->db->where('code', $code);
            $this->db->update('problem', $this);
        }
        public function get_problem_images($code)
        {
            $this->db->order_by("id", "desc");
            $this->db->where('code', $code);
            $query = $this->db->get('problem_images');
            $query->num_rows();
                    
            return $query->result_array();
        }
        public function get_object_problems($object,$limit, $start)
        {
            
            $this->db->limit($limit, $start);
            $this->db->order_by("id", "desc");
            $this->db->where('object', $object);
            $query = $this->db->get('problem');
            $query->num_rows();
                    
            return $query->result_array();
        }
        public function get_object_problems_length($objectt)
        {
            $this->db->order_by("id", "desc");
           
            $this->db->where('object', $objectt);
            $query = $this->db->get('problem');
            
            return $query->result_array();
            
        }
        public function update_problem_gallery($data, $code)
        {
            $date = date('Y-m-d H:i');
               $this->db->set($data);
               $this->db->set('reg_id', $this->session->userdata('id'));
               $this->db->set('reg_name', $this->session->userdata('name'));
               $this->db->set('reg_surname', $this->session->userdata('surname'));
                $this->db->set('code', $code);
                $this->db->set('date', $date);

                $this->db->insert('problem_images');
        }
        public function problem_image_delete($file_name)
        {
                $this->db->where('file_name', $file_name);
                $this->db->delete('problem_images');
        }
        
        public function get_object_news($object,$limit, $start)
        {
            
            $this->db->limit($limit, $start);
            $this->db->order_by("id", "desc");
            $this->db->where('object', $object);
            $query = $this->db->get('news');
            $query->num_rows();
                    
            return $query->result_array();
        }
        public function get_object_news_length($objectt)
        {
            $this->db->order_by("id", "desc");
           
            $this->db->where('object', $objectt);
            $query = $this->db->get('news');
            
            return $query->result_array();
            
        }
        
        public function update_object_news_images($data, $code)
        {
            $date = date('Y-m-d H:i');
               $this->db->set($data);
               $this->db->set('reg_id', $this->session->userdata('id'));
               $this->db->set('reg_name', $this->session->userdata('name'));
               $this->db->set('reg_surname', $this->session->userdata('surname'));
                $this->db->set('code', $code);
                $this->db->set('date', $date);

                $this->db->insert('news_images');
        }
         public function get_object_news_images($code)
        {
            $this->db->order_by("id", "desc");
            $this->db->where('code', $code);
            $query = $this->db->get('news_images');
            $query->num_rows();
                    
            return $query->result_array();
        }
        public function object_news_edit($code)
        {
            $query = $this->db->get_where('news', array('code' => $code));
            $this->db->order_by("id", "desc");
            $query->num_rows();
                    
            return $query->row_array();
        }
        public function object_news_update($code, $postdata)
        {
            $this->db->where('code', $code);
            //$this->db->where('reg_id', $this->session->userdata('id'));
            //$this->db->where('reg_name', $this->session->userdata('name'));
            //$this->db->where('reg_surname', $this->session->userdata('surname'));
            $this->db->update('news', $postdata);
        }
        public function object_news_image_delete($file_name)
        {
                $this->db->where('file_name', $file_name);
                $this->db->delete('news_images');
        }
        
         public function get_materials()
        {
           
            $this->db->order_by("id", "desc");
            $query = $this->db->get('building_materials');
            $query->num_rows();
                    
            return $query->result_array();
        }
        public function get_material_edit($category)
        {
            $query = $this->db->get_where('building_materials', array('category' => $category));
            $this->db->order_by("id", "desc");
            $query->num_rows();
                    
            return $query->row_array();
        }
        public function material_update($category, $postdata)
        {
            $this->db->where('category', $category);
            $this->db->update('building_materials', $postdata);
        }
        public function get_material_images($category)
        {
            $this->db->order_by("id", "desc");
            $this->db->where('category', $category);
            $query = $this->db->get('building_materials_images');
            $query->num_rows();
                    
            return $query->result_array();
        }
        public function update_materials_gallery($data, $category)
        {
            $date = date('Y-m-d H:i');
               $this->db->set($data);
               
                $this->db->set('category', $category);
                $this->db->set('date', $date);

                $this->db->insert('building_materials_images');
        }
        
         public function material_main_image($file_name, $category)
        {
                $this->db->where('category', $category);
                $this->file_name     = $file_name;
                $this->db->update('building_materials', $this);
        }
        public function material_image_delete($file_name)
        {
                $this->db->where('file_name', $file_name);
                $this->db->delete('building_materials_images');
        }

}