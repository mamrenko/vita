<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Виджет "Верхнее меню"
 */
class Controller_Widgets_Topmenu extends Controller_Widgets {
    
    public $template = 'widgets/w_topmenu';

    public function action_index()
    {
         $select = Request::initial()->controller();
         
          $menu = array(
             'Главная' =>  array('main',),
             'Каталог' => array('catalog'),
             'Способы Оплаты' =>  array('pay'),
             'Доставка' =>  array('deliver'),
             'Контакты' =>  array('contact'),
        );
        $this->template->menu = $menu;
        $this->template->select = $select;
        
    }

}