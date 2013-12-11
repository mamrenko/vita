<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Index_Contact extends Controller_Index

{
    public function before() {
        parent::before();
        
        $this->template->scripts[] = 'assets/js/site.js';
        $this->template->scripts[] = 'canvas/js/plugins/parsley/parsley.js';
    }

        public function action_index()
	{
             if (isset($_POST['submit']))
        {
            $_POST['name'] = Security::xss_clean( $_POST['name']);
            
            
            
            $data = Arr::extract($_POST, array('name', 'email', 'text'));
            $message = ORM::factory('message');
            $message->values($data);
        

         try {
                $message->save();
                $this->request->redirect('contact/add');
            }
            catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            }

      }
           
             $content = View::factory(
                     'index/contact/v_contact')
                      ->bind('errors', $errors)
                      ->bind('data', $data)
                     
             ; 
             $this->template->page_title = 'Контакт';
             $this->template->content_title ='Контакт';
             $this->template->block_header = array(
                $content, 
             );
            
	}
        public function action_add()
	{
            
           
             $content = View::factory(
                     'index/contact/add_contact')
                    
                   
            ; 
             $this->template->page_title = 'Контакт';
             $this->template->content_title ='Контакт';
             $this->template->block_header = array(
                $content, 
             );
            
	}
         
        
        
} 
