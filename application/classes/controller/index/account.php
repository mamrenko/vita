<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Личный кабинет
 */
class Controller_Index_Account extends Controller_Index {

    public function before(){
        parent::before();
        $this->template->scripts[] = 'media/js/plugins/mascedinput/jquery-2.0.2.min.js';
         $this->template->scripts[] = 'media/js/plugins/mascedinput/jquery.maskedinput.min.js';
         $this->template->scripts[] = 'media/js/plugins/mascedinput/phonescr.js';
         $this->template->scripts[] = 'media/js/plugins/maxlength/jquery.maxlength.js';
         $this->template->scripts[] = 'media/js/plugins/maxlength/maxlength.js';
         
         
         if (!$this->auth->logged_in()) {
            $this->request->redirect('login');
        }


        $account_menu = Widget::load('menuaccount');

         // Выводим в шаблон
        $this->template->block_right = null;
        $this->template->block_left = array($account_menu);
    }

    public function action_index() {
                $user = ORM::factory('user')
                ->where('id', '=', $this->user->id)
                ->find();
        
        
        
        $content = View::factory('index/account/v_account_index')
                ->bind('user', $user);

        // Выводим в шаблон
        $this->template->page_title = 'Личный кабинет';
        $this->template->content_title ='Личный кабинет';
        $this->template->block_center = array($content);
         
    }

    public function action_orders() {
        
        $content = View::factory('index/account/v_account_orders');
        
        // Выводим в шаблон
        $this->template->page_title = 'Заказы';
        $this->template->content_title ='Заказы';
        $this->template->block_center = array($content);
    }

    public function action_profile() {
        if (isset($_POST['submit'])){
            $users = ORM::factory('user');
            try {
            $users
               ->where('id', '=', $this->user->id)
               ->find()
               ->update_user($_POST,array(
                   'username',
                   'phonenumber',
                   'email',
                    )) ;
              $this->request->redirect('account/index');
        }
            catch (ORM_Validation_Exception $e){
                   $errors = $e->errors('auth');
            }
        }
        $content = View::factory('index/account/v_account_profile')
                ->bind('errors', $errors)
                ->bind('user', $this->user)
                ;

        // Выводим в шаблон
        $this->template->page_title = 'Профиль';
        $this->template->content_title ='Профиль';
        $this->template->block_center = array($content);
    }

    public function action_adress(){
        $adresses = ORM::factory('adress')
                ->where('user_id', '=', $this->user->id)
                 ->find_all();
        $user = $this->user->username;
         $content = View::factory('index/account/v_account_adress')
                 ->bind('adresses', $adresses)
                 ->bind('user', $user);
        
        // Выводим в шаблон
        $this->template->page_title = 'Адреса Доставки';
        $this->template->content_title ='Адреса Доставки';
        $this->template->block_center = array($content);
        
        
    }
    
    public function action_adress_add(){
        $adresses = ORM::factory('adress')
                ->where('user_id', '=', $this->user->id)
                ->find_all();
        
            $user = $this->user->id;
            
            $get_sets = Model::factory('adress')->get_sets();
          $gets = array();
          foreach ($get_sets as $key => $value) {
            $gets[$value] = $value;
            }
            
            
            
            $db = Database::instance('alternate');
            if (isset($_POST['submit']))
        {
            
           // $adress = $db->quote($_POST['adress']);
         
            //$metro = $db->quote($_POST['metro']);
             $_POST['adress'] = Security::xss_clean($_POST['adress']);  
            $_POST['metro'] = Security::xss_clean($_POST['metro']); 
            
            
            $val = array('user_id' => $user);
            $data =Arr::extract($_POST,array('adress', 'metro'));
            $data = Arr::merge($data, $val);
//            $data = array(
//                'adress' =>$adress,
//                'metro' => $metro,
//                'user_id ' => $user,
//            );
            $adress = ORM::factory('adress');
            $adress->values($data);
//            $sql = "INSERT INTO adresses (adress, metro, user_id)
//                VALUES (
//                $adress,
//                 $metro, 
//                 $user
//                )";
//               
               try {
                 //$adress =  $db->query(Database::INSERT, $sql);
                  $adress->save();
                $this->request->redirect('account/adress');
            }
            catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            }
            
        }
          $content = View::factory('index/account/v_account_adress_add')
                    ->bind('data', $data)
                    ->bind('errors', $errors)
                    ->bind('gets', $gets)
                    ->bind('adresses', $adresses)
                    ;
          // Выводим в шаблон
        $this->template->page_title = 'Добавление Адреса Доставки';
        $this->template->content_title ='Добавление Адреса Доставки';
        $this->template->block_center = array($content);
        
        
    }
    
    
    public function action_adress_edit(){
        $id = abs((int) $this->request->param('id'));
        $adress = ORM::factory('adress', $id);
        
         $get_sets = Model::factory('adress')->get_sets();
          $gets = array();
          foreach ($get_sets as $key => $value) {
            $gets[$value] = $value;
            }
            
        if(!$adress->loaded()){
            $this->request->redirect('account/adress');
        }
          $data = $adress->as_array();   
       
        if (isset($_POST['submit'])) {
            $_POST['adress'] = Security::xss_clean( $_POST['adress']);
            
            $_POST['metro'] = Security::xss_clean( $_POST['metro']);
            
            $data = Arr::extract($_POST, array('adress', 'metro'));
            
            $adress->values($data);
            
            try {
           
            $adress->save(); 
            $this->request->redirect('account/adress');
            }  
          catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            } 
           
        }
        
        $content = View::factory('index/account/v_account_adress_edit')
                ->bind('id', $id)
                ->bind('errors', $errors)
                ->bind('data', $data)
                ->bind('adress', $adress)
                 ->bind('gets', $gets)
                
                ;

        // Вывод в шаблон
        $this->template->block_center = array($content);
        $this->template->page_title .= ' :: Редактировать';
        
        
        
    }
    public function action_adress_del(){
        
        $id = abs((int) $this->request->param('id'));
        $adress = ORM::factory('adress', $id);

        if(!$adress->loaded()) {
            $this->request->redirect('account/adress');
        }

        $adress->delete();
        $this->request->redirect('account/adress');  
        
    }
}
