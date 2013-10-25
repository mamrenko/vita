<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Страницы
 */
class Controller_Index_Page extends Controller_Index {

    public function action_index() {
        $this->action_static();
    }

    // Статические страницы
    public function action_static() {
        
        $content = View::factory('index/page/v_page_static');
        
        // Выводим в шаблон
        $this->template->page_title = 'Страница';
        $this->template->content_title ='Страница';
        $this->template->block_center = array($content);
    }

    // Контакты
    public function action_contacts() {

        $content = View::factory('index/page/v_page_contacts');

        // Выводим в шаблон
        $this->template->page_title = 'Контакты';
        $this->template->content_title ='Контакты';
        $this->template->block_center = array($content);
    }


}