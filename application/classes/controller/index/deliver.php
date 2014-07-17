<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Index_Deliver extends Controller_Index
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
            $menu = Widget::load('menu');
           $news = Widget::load('news');
           
           
            $carouselevents = ORM::factory('event')
                ->limit(10)
                ->where('status', '=', 1)
                ->and_where('day' ,'>', date('Y-m-d'))
                ->find_all();
            
            
             
             $content = View::factory(
                     'index/deliver/v_deliver')
                    ->bind('carouselevents', $carouselevents)   
            ; 
             $this->template->page_title = 'Доставка';
             $this->template->content_title ='Доставка';
             $this->template->block_header = array(
                $content, 
             );
            //$this->template->block_right = array($menu,$news);
	}
         
        
        
} 
