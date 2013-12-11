<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Index_Catalog extends Controller_Index
{
   
    public function action_index()
	{
             //$topproducts = Widget::load('topproducts');
             $events = ORM::factory('event')->find_all();
            
           
             $content = View::factory('index/catalog/v_catalog', array(
                 'events' => $events,
            )
            ); 
             $this->template->page_title = 'Каталог';
             $this->template->content_title ='Каталог';
             $this->template->block_center = array(
                $content, 
             );
             //$this->template->block_right = array($topproducts);
	}
         
        
        
} 
