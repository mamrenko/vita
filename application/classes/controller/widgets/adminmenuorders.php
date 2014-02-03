<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Виджет "Меню заказов"
 */
class Controller_Widgets_Adminmenuorders extends Controller_Widgets {

    public $template = 'widgets/admin/w_menuorders';    // Шаблон виждета
    
    public function action_index()
    {
        $select = Request::initial()->controller();
        
        $menu = array(
             'Заказы' =>  array('orders'),
             'Выполненные Заказы' =>  array(''),
             'Статистика Заказов' =>  array(''),
             'Список Емейлов' => array(''),
           
        );
        $this->template->menu = $menu;
        $this->template->select = $select;
    }

}
