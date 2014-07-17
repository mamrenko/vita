<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Виджет "Меню Пользователи"
 */
class Controller_Widgets_Adminmenuusers extends Controller_Widgets {

    public $template = 'widgets/admin/w_menuusers';    // Шаблон виждета
    
    public function action_index()
    {
        $select = Request::initial()->controller();
        $menu = array(
             'Пользователи' =>  array('users'),
             'Покупатели' =>  array('bayers'),
             'Коллеги' => array('colleges'),
             'Рассылка' =>  array('subscribe'),
             'Сообщения' => array('messages'),
             
        );
        $this->template->menu = $menu;
        $this->template->select = $select;
    }

}