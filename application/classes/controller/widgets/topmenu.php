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
             '<i class="fa fa-bullhorn"></i> Площадки' => array('places'),
             '<i class="fa fa-star-o"></i> Артисты' => array('artistes'),
        );
        $this->template->menu = $menu;
        $this->template->select = $select;
        
        
    }

}
