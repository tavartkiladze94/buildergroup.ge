<?php 
class Redaqtor_model extends CI_Model {

        function validate_login($postData){
                $this->db->select('*');
                $this->db->where('email', $postData['email']);
                $this->db->where('password', $postData['password']);
                // $this->db->where('status', 1);
                $this->db->from('users');
                $query=$this->db->get();
                if ($query->num_rows() == 0)
                    return false;
                else
                    return $query->result();
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
       
        public function insert_object_photo($data,$code)
        {
            $date = date('Y-m-d H:i');
            $this->db->set($data);
            $this->db->set('registrator', $this->session->userdata('id'));
            $this->db->set('date', $date);
            $this->db->set('code', $code);
            $this->db->insert('builder_group_projects_images');
        }
      
       
        public function get_object_list_edit($code)
        {
        
            $query = $this->db->get_where('builder_group_projects', array('code' => $code));
            $this->db->order_by("id", "desc");
            if ($query->num_rows() == 0)
                    return false;
            else
            return $query->result_array();
        }
        
        public function get_object_list($limit, $start)
        {
            
            $this->db->select('*');
             $this->db->order_by("id", "desc");
             $this->db->from('builder_group_projects');
             $this->db->limit($limit, $start);
             $query=$this->db->get();
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
            if ($query->num_rows() == 0)
                    return false;
            else
            return $query->row_array();
        }
        public function object_view($code)
        {
            $query = $this->db->get_where('builder_group_projects', array('code' => $code));
            $this->db->order_by("id", "desc");
            if ($query->num_rows() == 0)
                    return false;
            else
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
            
            if ($query->num_rows() == 0)
                    return false;
            else
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
                $this->db->delete('builder_group_news');
        }
        public function news_images_delete($code)
        {
                $this->db->where('code', $code);
                $this->db->delete('builder_group_news_images');
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
                $this->db->where('reg_id', $this->session->userdata('id'));
                $this->db->where('reg_name', $this->session->userdata('name'));
                $this->db->where('reg_surname', $this->session->userdata('surname'));
                $this->file_name     = $file_name;
                $this->db->update('builder_group_projects', $this);
        }
        
        public function get_object_booking($id)
        {
            $query = $this->db->get_where('booking_object', array('registrator' => $id));
            $this->db->order_by("id", "desc");
            if ($query->num_rows() == 0)
                    return false;
            else
            return $query->result_array();
        }
        public function get_object_booking_all()
        {
            $query = $this->db->get('booking_object');
            $this->db->order_by("id", "desc");
            if ($query->num_rows() == 0)
                    return false;
            else
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
        public function get_current_work_list_edit($code)
        {
        
            $this->db->order_by("id", "desc");
            $query = $this->db->get_where('builder_group_current_work', array('object_code' => $code));
            
            if ($query->num_rows() == 0)
                    return false;
            else
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
            if ($query->num_rows() == 0)
                    return false;
            else
            return $query->row_array();
        }
        public function current_work_view($code)
        {
            $query = $this->db->get_where('builder_group_current_work', array('code' => $code));
            $this->db->order_by("id", "desc");
            if ($query->num_rows() == 0)
                    return false;
            else
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
            if ($query->num_rows() == 0)
                    return false;
            else
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
                $this->db->where('reg_id', $this->session->userdata('id'));
                $this->db->where('reg_name', $this->session->userdata('name'));
                $this->db->where('reg_surname', $this->session->userdata('surname'));
                $this->file_name     = $file_name;
                $this->db->update('builder_group_current_work', $this);
        }
        
        public function get_current_work_booking($id)
        {
            $query = $this->db->get_where('booking_current_work', array('registrator' => $id));
            $this->db->order_by("id", "desc");
            if ($query->num_rows() == 0)
                    return false;
            else
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
            if ($query->num_rows() == 0)
                    return false;
            else
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
            
            if ($query->num_rows() == 0)
                    return false;
            else
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
                $this->file_name     = $file_name;
                $this->db->update('builder_group_news', $this);
        }
       
        public function get_services()
        {
           
            $this->db->order_by("id", "desc");
            $query = $this->db->get('builder_group_services');
            $query->num_rows();
                    
            return $query->result_array();
        }
        public function get_service_edit($type)
        {
            $query = $this->db->get_where('builder_group_services', array('type' => $type));
            $this->db->order_by("id", "desc");
            $query->num_rows();
                    
            return $query->row_array();
        }
        public function service_update($type, $postdata)
        {
            $this->db->where('type', $type);
            $this->db->update('builder_group_services', $postdata);
        }
        public function get_service_images($type)
        {
            $this->db->order_by("id", "desc");
            $this->db->where('type', $type);
            $query = $this->db->get('builder_group_services_images');
            $query->num_rows();
                    
            return $query->result_array();
        }
        public function update_service_gallery($data, $type)
        {
            $date = date('Y-m-d H:i');
               $this->db->set($data);
               
                $this->db->set('type', $type);
                $this->db->set('date', $date);

                $this->db->insert('builder_group_services_images');
        }
        
         public function service_main_image($file_name, $type)
        {
                $this->db->where('type', $type);
                $this->file_name     = $file_name;
                $this->db->update('builder_group_services', $this);
        }
        public function service_image_delete($file_name)
        {
                $this->db->where('file_name', $file_name);
                $this->db->delete('builder_group_services_images');
        }

}