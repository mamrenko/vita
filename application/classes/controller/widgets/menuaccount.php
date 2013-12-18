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
            '<i class="icon-home"></i>Личный кабинет' => array('index'),
            '<i class="icon-cloud"></i>Заказы' => array('orders'),
            '<i class="icon-gear"></i>Профиль' => array('profile'),
        );

        // Вывод в шаблон
        $this->template->menu = $menu;
        $this->template->select = $select;
    }

}