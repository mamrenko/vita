<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Настройки
 */
class Controller_Admin_Settings extends Controller_Admin {

    public function action_index() {

        $submenu = Widget::load('adminmenusettings');
        $content = View::factory('admin/settings/v_settings_index');

        // Вывод в шаблон
        $this->template->page_title = 'Настройки';
        $this->template->block_center = array($content);
        $this->template->block_left = array($submenu);
    }
}