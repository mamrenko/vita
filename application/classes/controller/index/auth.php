<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Авторизация
 */
class Controller_Index_Auth extends Controller_Index {

    public function action_index() {
        $this->action_login();
    }

    public function action_login() {
        
        $content = View::factory('index/auth/v_auth_login');
        
        // Выводим в шаблон
        $this->template->page_title = 'Вход';
        $this->template->content_title ='Вход';
        $this->template->block_center = array($content);
    }

    public function action_register() {

        $content = View::factory('index/auth/v_auth_register');

        // Выводим в шаблон
        $this->template->page_title = 'Регистрация';
        $this->template->content_title ='Регистрация';
        $this->template->block_center = array($content);
    }

    public function action_logout() {
        $this->request->redirect();
    }

}