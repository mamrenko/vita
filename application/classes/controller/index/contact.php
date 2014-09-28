<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Index_Contact extends Controller_Index

{
    public function before() {
        parent::before();
         $this->template->styles[] = 'media/js/plugins/flexslider/flexslider.css';
         $this->template->styles[] = '';
         
         
        $this->template->scripts[] = 'https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js';
        
         //$this->template->scripts[] = 'canvas/js/plugins/parsley/parsley.js';
     
         $this->template->scripts[] = 'canvas/js/plugins/parsley/messages.ru.js';
        
       
         
         
         $this->template->scripts[] = 'media/js/plugins/mascedinput/jquery-2.0.2.min.js';
         $this->template->scripts[] = 'media/js/plugins/mascedinput/jquery.maskedinput.min.js';
         $this->template->scripts[] = 'media/js/plugins/mascedinput/phonescr.js';
         $this->template->scripts[] = 'media/js/plugins/maxlength/jquery.maxlength.js';
         $this->template->scripts[] = 'media/js/plugins/maxlength/maxlength.js';
        // $this->template->scripts[] = 'assets/js/app.js';
         $this->template->scripts[] = 'media/js/plugins/flexslider/jquery.flexslider.js';
          $this->template->scripts[] = 'media/js/plugins/flexslider/my.js';
         
    }
    

    public function action_index()
	{
        
        //$config = Kohana::config('captcha');
        $captchaimg = Captcha_Riddle::instance();
       
       // var_dump($captcha);
         //Captcha::valid($_POST['captcha']);
     
     
      
          
    
             if (isset($_POST['submit']) )
        {
                 
                 
             $_POST['captcha'] = Security::xss_clean( $_POST['captcha']);    
            $_POST['name'] = Security::xss_clean( $_POST['name']);
            $_POST['email'] = Security::xss_clean( $_POST['email']);
            $_POST['phone'] = Security::xss_clean( $_POST['phone']);
            $_POST['text'] = Security::xss_clean( $_POST['text']);
            
            
            $data = Arr::extract($_POST, array('name', 'email', 'phone','intime', 'text'));
            
            
            if (Captcha::valid($_POST['captcha'])) {
                
            
            $message = ORM::factory('message');
            $message->values($data);
            
          

         try {
             
              
            
            
                $message->save();
                
                
                $admin_email = Kohana::config('settings.admin_email');
                $site_name = Kohana::config('settings.site_name');
            
            
                   $email = Email::factory('Контакты', $data['text'] )
                    ->to($data['email'], $data['name'])
                    ->from($admin_email, $site_name)
                    ->send();
                   
                   
                   //Отсылаем сообщение себе
                   
                   $emailtome = Email::factory('Сообщение из контактов', $data['text'])
                           ->to($admin_email, $site_name)
                           ->from($data['email'], $data['name'])
                           ->send();
               
               
               
               
               
            
                //$this->request->redirect('contact/add');
            } 
            catch (ORM_Validation_Exception $e) {
               
                $errors = $e->errors('validation');
        }
         }
 else {
    $error_captcha = "Введите символы с картинки правильно";
}
               
 }
    
               $events = ORM::factory('event')
                      ->group_by('place_id')
                      ->order_by('place_id')
                      ->find_all();
              
             $content = View::factory(
                     'index/contact/v_contact')
                      ->bind('errors', $errors)
                      ->bind('data', $data)
                      ->bind('events', $events)
                      ->bind('email', $email)
                      ->bind('captchaimg', $captchaimg)
                     ->bind('error_captcha', $error_captcha)
                     
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
