<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Index_Deliver extends Controller_Index
{
   
    public function action_index()
	{
            
           
             $content = View::factory(
                     'index/deliver/v_deliver',
                     array(
                 
            )
            ); 
             $this->template->page_title = 'Доставка';
             $this->template->content_title ='Доставка';
             $this->template->block_center = array(
                $content, 
             );
            
	}
         
        
        
} 
