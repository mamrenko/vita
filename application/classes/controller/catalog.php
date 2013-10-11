<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Catalog extends Controller_Base
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
