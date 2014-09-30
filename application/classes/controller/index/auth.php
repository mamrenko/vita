<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Авторизация
 */
class Controller_Index_Auth extends Controller_Index {
    public function before() {
        parent::before();
        
        
        $this->template->scripts[] = 'media/js/plugins/mascedinput/jquery-2.0.2.min.js';
         $this->template->scripts[] = 'media/js/plugins/mascedinput/jquery.maskedinput.min.js';
         $this->template->scripts[] = 'media/js/plugins/mascedinput/phonescr.js';
         $this->template->scripts[] = 'media/js/plugins/maxlength/jquery.maxlength.js';
         $this->template->scripts[] = 'media/js/plugins/maxlength/maxlength.js';
        
    }

    public function action_index() {
        $this->action_login();
    }

     public function action_login() {

        if(Auth::instance()->logged_in()) {
            $this->request->redirect('account');
        }

        if (isset($_POST['submit'])){
            $data = Arr::extract($_POST, array(
                'email',
                'password', 
                'remember',
                ));
            $status = Auth::instance()->login($data['email'], $data['password'], (bool) $data['remember']);

            if ($status){
                if(Auth::instance()->logged_in('admin')) {
                    $this->request->redirect('admin');
                }
                
                $this->request->redirect('account');
            }
            else {
                $errors = array(Kohana::message('auth/user', 'no_user'));
            }
        }

        
        $content = View::factory('index/auth/v_auth_login')
                    
                    ->bind('errors', $errors)
                    ->bind('data', $data);
                    

        // Выводим в шаблон
        $this->template->title = 'Вход';
        $this->template->page_title = 'Вход';
        $this->template->block_header = array($content);
    }

     public function action_register() {

        if (isset($_POST['submit'])){
            $data = Arr::extract($_POST, array(
                'username', 
                'password',
                'phonenumber',
                'password_confirm', 
                'email'
                ));
            $users = ORM::factory('user');

            try {
                $users->create_user($_POST, array(
                    'username',
                    'phonenumber',
                    'password',
                    'email',
                ));

                $role = ORM::factory('role')->where('name', '=', 'login')->find();
                $users->add('roles', $role);
                
                
                $this->action_login();
                $this->request->redirect('account');
            }
            catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('auth');
            }
        }

        $content = View::factory('index/auth/v_auth_register')
                            
                            ->bind('errors', $errors)
                            ->bind('data', $data);
                                
        // Выводим в шаблон
        $this->template->title = 'Регистрация';
        $this->template->page_title = 'Регистрация';
        $this->template->block_header = array($content);
    }
    

    public function action_logout() {
        if(Auth::instance()->logout()){
        $this->request->redirect();
        }
    }
    
    public function action_remembermepass(){
          $emails = $this->session->get('emails');
        if (isset($emails)) {
             $this->session->delete('emails');
         $this->request->redirect('auth/login');  
         //var_dump($email_s);
        }
        
         if (isset($_POST['submit'])){
             
              $_POST['email'] = Security::xss_clean( $_POST['email']);
            $data = Arr::extract($_POST, array(
                'email'
                ));
                    $email = $data['email'];
                    $pass = ORM::factory('user')
                   ->where('email', '=', $email)
                            ->find()
                   ;
                    
                    if(!$pass->loaded()){
                      //  $this->request->redirect('auth/remembermepass');
                      $message = 'Нет такого емейла, попробуйте другой.';
                     
                  // $content = View::factory('index/auth/v_remembermepass')
               
                 //->bind('message', $message)
                       
           // ;
        }
 else {
    // $message =  'Проверьте свой почтовый ящик';
 
                try {
                  
                    
                     $emailuser = $pass->email;
                     $nameuser = $pass->username;
                    
                     $admin_email = Kohana::config('settings.admin_email');
                     $site_name = Kohana::config('settings.site_name');
                     
                     
                     $linkpassforuser = strtolower(Text::random('alnum', 20));
                     
                     $letter_for_user = View::factory('index/auth/v_letterforuser')
                             ->bind('site_name', $site_name)
                            ->bind('linkpassforuser', $linkpassforuser)
                             ->bind('emailuser', $emailuser)
                             ->bind('nameuser', $nameuser);
                     
                      $emailtouser = Email::factory('Восстановление пароля на сайте Аплодисменты', $letter_for_user,'text/html')
                    
                    ->to($emailuser, $nameuser)
                    ->from($admin_email, $site_name)
                    ->send(); 
                      
                      $pass->rempass = $linkpassforuser;
                      $pass->save();
                      
                     $email_s = $data['email'];
                     $this->session->set('emails', $email_s);
                    
                }
                catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('auth');
            }
            }
         }
                $content = View::factory('index/auth/v_remembermepass')
                ->bind('errors', $errors)
                ->bind('data', $data)
                ->bind('email', $email)
                 ->bind('message', $message)
                 ->bind('pass', $pass)
            ;
        
        
        // Выводим в шаблон
        $this->template->title = 'Восстановление пароля';
        $this->template->page_title = 'Восстановление пароля';
        $this->template->block_header = array($content);
    }
        public function action_hrefpass($code){
            
           
                    $checkcode = ORM::factory('user')
                   ->where('rempass', '=', $code)
                            ->find()
                   ;
                    
                    if(!$checkcode->loaded()){
                        
                      //  $this->request->redirect('auth/remembermepass');
                      $message = 'Вы перешли на неправильную ссылку';
                     
                  // $content = View::factory('index/auth/v_remembermepass')
               
                 //->bind('message', $message)
                       
           // ;
        }
        try {
            
            $newpassword =  strtolower(Text::random('alnum', 8));
            
           // $auth = Auth::instance();
           //$checkcode->password =$auth->hash_password($newpassword);
            $checkcode->password = $newpassword;
            
            $checkcode->rempass = NULL;
            $checkcode->save();
            
            //Пишем письмо
                    $emailuser = $checkcode->email;
                    $nameuser = $checkcode->username;
                    
                     $admin_email = Kohana::config('settings.admin_email');
                     $site_name = Kohana::config('settings.site_name');
                     
             $letter_for_user_newpassword = View::factory('index/auth/v_letterforuser_newpassword')
                            ->bind('site_name', $site_name)
                            ->bind('newpassword', $newpassword)
                             ->bind('emailuser', $emailuser)
                             ->bind('nameuser', $nameuser);
                     
                      $emailtousernewpass = Email::factory('Новый пароль для входа на сайт Аплодисменты',
                              $letter_for_user_newpassword,'text/html')
                    
                    ->to($emailuser, $nameuser)
                    ->from($admin_email, $site_name)
                    ->send(); 
            
            
            
            
        }
         catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('auth');
            }

        $content = View::factory('index/auth/v_newpassforuser')
                  ->bind('emailuser', $emailuser)
                  ->bind('message', $message)
                  ->bind('code', $code)
                    
                 ;
            
            // Выводим в шаблон
        $this->template->page_title = 'Восстановление пароля';
        $this->template->content_title ='Восстановление пароля';
       $this->template->block_header = array(
                $content, );


        }
}

