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
        
        
         if (isset($_POST['submit'])){
            $data = Arr::extract($_POST, array(
                'email'
                ));
                    $email = $data['email'];
                    $pass = ORM::factory('user')
                   ->where('email', '=', $email)
                            ->find()
                   ;
                    
                    if(!$pass->loaded()){
                        unset($pass);
                        $message = 'Нет такого емейла, попробуйте другой.';
                       
                         //return FALSE;
        }
 else {
     $message = 'Проверьте свой почтовый ящик';
 }
                try {
                  
                    
                     $emailuser = $pass->email;
                     $nameuser = $pass->username;
                    
                     $admin_email = Kohana::config('settings.admin_email');
                     $site_name = Kohana::config('settings.site_name');
                     
                     $letter_for_user = View::factory('index/auth/v_letterforuser')
                             ->bind('site_name', $site_name)
                            
                             ->bind('emailuser', $emailuser)
                             ->bind('nameuser', $nameuser);
                     
                      $email = Email::factory('Восстановление пароля на сайте Аплодисменты', $letter_for_user,'text/html')
                    
                    ->to($emailuser, $nameuser)
                    ->from($admin_email, $site_name)
                    ->send();    
                    
                }
                catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('auth');
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

}