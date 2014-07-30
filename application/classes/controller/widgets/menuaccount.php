<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Виджет "Меню личного кабинета"
 */
class Controller_Widgets_Menuaccount extends Controller_Widgets {

    public $template = 'widgets/w_menuaccount';    // Шаблон виждета
    
    public function action_index()
    {
        $select = Request::initial()->action();

        $menu = array(
            '<i class="fa fa-user"></i> &nbsp; Личный кабинет' => array('index'),
            '<i class="fa fa-list"></i> &nbsp; Заказы' => array('orders','order'),
            '<i class="fa fa-paperclip"></i> &nbsp; Профиль' => array('profile'),
            '<i class="fa fa-truck"></i> &nbsp; Адреса' => array('adress'),
        );

        // Вывод в шаблон
        $this->template->menu = $menu;
        $this->template->select = $select;
    }

}