<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Личный кабинет
 */
class Controller_Index_Account extends Controller_Index {

    public function before(){
        parent::before();
         if (!$this->auth->logged_in()) {
            $this->request->redirect('login');
        }


        $account_menu = Widget::load('menuaccount');

         // Выводим в шаблон
        $this->template->block_right = null;
        $this->template->block_left = array($account_menu);
    }

    public function action_index() {
        
        $content = View::factory('index/account/v_account_index');

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
              $this->request->redirect('account/profile');
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


}
