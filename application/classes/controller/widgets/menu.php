<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Widgets_Menu extends Controller_Template
 
{
    public $template = 'widgets/w_menu';

    public function action_index()
	{
          $categories = Model::factory('categories')->all_cat();
          $this->template->categories = $categories;
	}
         
        
} 
