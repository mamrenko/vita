<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Index extends Controller_Base
{
    

    public function action_index()
	{
            $block_center = View::factory('v_index');
            $this->template->page_title = 'Главная страница';
            $this->template->block_center = array(
                'block_center' => $block_center,
            );
	}
         
        public function action_catalog()
	{
            
             $products = Model::factory('catalog')->all_products();
            
           
             $content = View::factory('v_catalog', array(
                 'products' => $products,
            )
            ); 
             $this->template->page_title = 'Каталог';
             $this->template->block_center = array(
                $content, 
             );
             
	}
        
} 
