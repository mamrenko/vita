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
             '<i class="fa fa-home fa-fw"></i> Главная' =>  array('/',),
             '<i class="fa fa-eye"></i> Площадки' => array('places'),
             '<i class="fa fa-rub"></i>  Способы Оплаты' =>  array('pay'),
             '<i class="fa fa-truck"></i> Доставка' =>  array('deliver'),
             '<i class="fa fa-phone"></i> Контакты' =>  array('contact'),
        );
        $this->template->menu = $menu;
        $this->template->select = $select;
        
        
    }

}
