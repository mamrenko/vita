<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Виджет "Меню админа"
 */
class Controller_Widgets_Adminmenu extends Controller_Widgets {

    public $template = 'widgets/admin/w_menuadmin';    // Шаблон виждета
    
    public function action_index()
    {
        $select = Request::initial()->controller();
        
        $menu = array(
             'Главная' =>  array('main'),
             'Заказы' =>  array('orders'),
             'Страницы' =>  array('pages', 'news', 'articles'),
             'Мероприятия' =>  array('playbill'),
             'Пользователи' =>  array('users'),
             'Настройки' =>  array('settings'),
           
        );
        $this->template->menu = $menu;
        $this->template->select = $select;
    }

}