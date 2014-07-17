<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Index_Pay extends Controller_Index
{
     public function before() {
        parent::before();
        
         $this->template->styles[] = 'media/dist/plugins/owl-carousel/owl.carousel.css';
         $this->template->styles[] = 'media/dist/plugins/owl-carousel/owl.theme.css';
         $this->template->styles[] = 'media/dist/plugins/owl-carousel/ownpay.css';
         
         $this->template->scripts[] = 'media/dist/plugins/owl-carousel/owl.carousel.js'; 
         $this->template->scripts[] = 'media/dist/plugins/owl-carousel/ownmy.js';
    }

   
    public function action_index()
	{
            
        
        $carouselevents = ORM::factory('event')
               
                ->limit(10)
                ->where('status', '=', 1)
                ->and_where('day' ,'>', date('Y-m-d'))
                ->find_all();
           
             $content = View::factory('index/pay/v_pay')
                 ->bind('carouselevents', $carouselevents)   
                     
            ; 
             $this->template->page_title = 'Оплата';
             $this->template->content_title ='Оплата';
             $this->template->block_header = array(
                $content, 
             );
            
	}
         
        
        
} 
