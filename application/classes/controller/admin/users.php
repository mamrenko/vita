<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Пользователи
 */
class Controller_Admin_Users extends Controller_Admin {

    public function action_index() {

        $submenu = Widget::load('adminmenuusers');
        $content = View::factory('admin/users/v_users_index');

        // Вывод в шаблон
        $this->template->page_title = 'Пользователи';
        $this->template->block_center = array($content);
        $this->template->block_left = array($submenu);
    }
}
