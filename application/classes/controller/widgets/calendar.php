<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Widgets_Menu extends Controller_Widgets
 
{
    public $template = 'widgets/w_menu';

    public function action_index()
	{
          $events = ORM::factory('event')
                  ->find_all();
        
           
          $this->template-> events =  $events;
	}
         
        
} 
 
       