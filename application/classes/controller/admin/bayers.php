<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Пользователи
 */
class Controller_Admin_Bayers extends Controller_Admin {

    public function action_index() {

        $submenu = Widget::load('adminmenuusers');
        $content = View::factory('admin/bayers/v_bayers_index');

        // Вывод в шаблон
        $this->template->page_title = 'Покупатели';
        $this->template->block_center = array($content);
        $this->template->block_left = array($submenu);
    }
}
