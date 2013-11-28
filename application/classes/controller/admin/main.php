<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Главная страница
 */
class Controller_Admin_Main extends Controller_Admin {

    public function action_index() {
         $adminstat = Widget::load('adminstat');
        $block_center = View::factory('admin/main/v_main_index', array(
            'adminstat' => $adminstat,
        ));
      
     
               

        // Вывод в шаблон
        $this->template->page_title = 'Главная страница администрирования';
        $this->template->block_center = array($block_center);
        $this->template->block_left = array() ;
       
    }
}