<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Личный кабинет
 */
class Controller_Index_Account extends Controller_Index {

    public function before(){
        parent::before();

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

        $content = View::factory('index/account/v_account_profile');

        // Выводим в шаблон
        $this->template->page_title = 'Профиль';
        $this->template->content_title ='Профиль';
        $this->template->block_center = array($content);
    }


}
