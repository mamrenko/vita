<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Виджет "Меню Настройки"
 */
class Controller_Widgets_Adminmenusettings extends Controller_Widgets {

    public $template = 'widgets/admin/w_menusettings';    // Шаблон виждета
    
    public function action_index()
    {
        $select = Request::initial()->controller();
        
        $menu = array(
             'Общие' =>  array('settings'),
             'Название сайта' =>  array(''),
             'Мета теги' =>  array(''),
             'Оплата' => array(''),
             'Доставка' => array(''),
             'Скидки' => array(''),
           
        );
        $this->template->menu = $menu;
        $this->template->select = $select;
        
    }

}
