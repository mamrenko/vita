<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Widgets_Carousel extends Controller_Widgets
 
{
    
    
    public $template = 'widgets/w_carousel';

    public function action_index()
	{
          // Получаем список категорий
        $carousels = ORM::factory('carousel')
                ->where('image' ,'!=',  '' )
                ->where('label', '=', '1')
                ->limit(6)
                ->and_where('day' ,'>', date('Y-m-d'))
                ->find_all();
        $this->template->carousels = $carousels;
	}
         
        
} 
 
       