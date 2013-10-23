<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Главная страница
 */
class Controller_Admin_Articals extends Controller_Admin {

    public function before() {
        parent::before();
      $submenu = Widget::load('adminmenupages');
        // Вывод в шаблон
        $this->template->submenu = Widget::load('adminmenupages');
        
        $this->template->block_left = array($submenu);
    }
    public function action_index() {

       
        $content = View::factory('admin/articals/v_artical_index');

        // Вывод в шаблон
        $this->template->page_title = 'Статьи';
        $this->template->block_center = array($content);
        
    }
}
