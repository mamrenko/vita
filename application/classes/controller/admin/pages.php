<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Главная страница
 */
class Controller_Admin_Pages extends Controller_Admin {

    public function action_index() {

        $submenu = Widget::load('adminmenupages');
        $content = View::factory('admin/pages/v_pages_index');

        // Вывод в шаблон
        $this->template->page_title = 'Страницы';
        $this->template->block_center = array($content);
         $this->template->block_left = array($submenu);
    }
}
