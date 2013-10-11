<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Widgets_Topproducts extends Controller_Template
{
    public $template = 'widgets/w_topproducts';

    public function action_index()
	{
          $topproducts = Model::factory('categories')->topproducts();
          $this->template->topproducts = $topproducts;
	}
         
        
} 
