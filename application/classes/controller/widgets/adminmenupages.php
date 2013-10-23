<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Виджет "Меню заказов"
 */
class Controller_Widgets_Adminmenupages extends Controller_Widgets {

    public $template = 'widgets/admin/w_menupages';    // Шаблон виждета
    
    public function action_index()
    {
        $select = Request::initial()->controller();
        
        $menu = array(
             'Страницы' =>  array('pages'),
             'Новости' =>  array('news'),
             'Статьи' =>  array('articals'),
             
           
        );
        $this->template->menu = $menu;
        $this->template->select = $select;
    }

}