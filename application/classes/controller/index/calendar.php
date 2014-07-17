<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Index_Catalog extends Controller_Index
{
    public function before() {
        parent::before();
        $this->template->styles[] = 'media/css/jquery.listnav-2.1.css';
        
        $this->template->scripts[] = 'media/js/plugins/mascedinput/jquery-2.0.2.min.js';
        $this->template->scripts[] = 'media/js/plugins/listnav/jquery.listnav-2.1.js';
        $this->template->scripts[] = 'media/js/plugins/listnav/listnav.js';
        
    }

    public function action_index()
	{
        $news = Widget::load('news');
        $menu = Widget::load('menu');
       
        $events = ORM::factory('event')
                      ->group_by('place_id')
                      ->order_by('place_id')
                      ->find_all();
             
         $content = View::factory('index/catalog/v_catalog', array(
                 'events' => $events,
            )
            ); 
             $this->template->page_title = 'Каталог';
             $this->template->content_title ='Каталог';
             $this->template->block_center = array($content,);
             $this->template->block_left = array($menu,$news,); 
              
	}
         
        
        
} 
