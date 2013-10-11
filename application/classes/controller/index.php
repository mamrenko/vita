<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Index extends Controller_Base
{
    public function before() {
        parent::before();
        
        $menu = Request::factory('widgets/menu')->execute();
        $top = Request::factory('widgets/topproducts')->execute();
        
        $this->template->block_left = array($menu);
        $this->template->block_right = array($top);
        
    }

    public function action_index()
	{
            $block_center = View::factory('v_index');
            $this->template->page_title = 'Главная страница';
            $this->template->block_center = array(
                'block_center' => $block_center,
            );
          
	}
         
        
} 
