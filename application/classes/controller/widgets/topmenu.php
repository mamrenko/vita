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
             '<i class="icon-home"></i> Главная' =>  array('main',),
             '<i class="fa fa-book fa-fw"></i>  Каталог' => array('catalog'),
             '<i class="fa fa-rub"></i>  Способы Оплаты' =>  array('pay'),
             '<i class="fa fa-truck"></i> Доставка' =>  array('deliver'),
             '<i class="fa fa-phone"></i> Контакты' =>  array('contact'),
        );
        $this->template->menu = $menu;
        $this->template->select = $select;
        
        
    }

}
