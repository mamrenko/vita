<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Продукты
 */
class Controller_Admin_Playbill extends Controller_Admin {
    public function before() {
        parent::before();
        
            $submenu = Widget::load('adminmenuproducts');
            $this->template->block_left = array($submenu);
           
    }

    public function action_index() {
        $playbills = ORM::factory('playbill')->find_all();
        
        $content = View::factory('admin/playbill/v_playbill_index',
                array(
                    'playbills' => $playbills,
                ));

        // Вывод в шаблон
        $this->template->page_title = 'Мероприятия';
        $this->template->block_center = array($content);
       
        
    }
}