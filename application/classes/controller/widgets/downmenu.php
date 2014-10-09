<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Виджет "Верхнее меню"
 */
class Controller_Widgets_Downmenu extends Controller_Widgets {
    
    public $template = 'widgets/w_downmenu';

    public function action_index()
    {
         $select = Request::initial()->controller();
        
          $downmenu = array(
           
             '<i class="fa fa-rub"></i>  Способы Оплаты' =>  array('pay'),
             '<i class="fa fa-truck"></i> Доставка' =>  array('deliver'),
             '<i class="fa fa-phone"></i> Контакты' =>  array('contact'),
        );
        $this->template->downmenu = $downmenu;
        $this->template->select = $select;
        
        
    }

}
