<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Index_Pay extends Controller_Index
{
   
    public function action_index()
	{
            
           
             $content = View::factory(
                     'index/pay/v_pay',
                     array(
                 
            )
            ); 
             $this->template->page_title = 'Оплата';
             $this->template->content_title ='Оплата';
             $this->template->block_center = array(
                $content, 
             );
            
	}
         
        
        
} 
