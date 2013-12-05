<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Виджет "Меню товары"
 */
class Controller_Widgets_Adminmenuproducts extends Controller_Widgets {

    public $template = 'widgets/admin/w_menuproducts';    // Шаблон виждета
     
    public function action_index()
    {
         $select = Request::initial()->controller();
        
        $menu = array(
             'События по Площадкам' =>  array('playbill', 'costs'),
             'Мероприятия по Площадкам' =>  array('playplaces'),
             'Площадки' =>  array('places'),
             'События' =>  array('events'),
             'Начало мероприятий' =>  array('starts'),
             'Сектора' =>  array('areas'),
             'Категории' =>  array('categories'),
             'Карусель' =>  array('carousels'),
             'Билеты' =>  array('tickets'),
        );
        $this->template->menu = $menu;
        $this->template->select = $select;
    }

}
