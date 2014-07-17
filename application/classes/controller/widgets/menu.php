<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Widgets_Menu extends Controller_Widgets
 
{
    public $template = 'widgets/w_menu';

    public function action_index()
	{
        
        
        $cats  = Model::factory('category')->get_cats();
         
        $this->template->cats = $cats;
        
        
	}
         
        
} 

       