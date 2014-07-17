<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Index_Categories extends Controller_Index
{
    public function before() {
        parent::before();
        
        //$this->template->styles[] = 'media/css/jquery.listnav-2.1.css';
        $this->template->styles[] = 'media/dist/css/site.css';
        
        
        
        //$this->template->scripts[] = 'assets/plugins/bootstrap/js/bootstrap.min.js';
        $this->template->scripts[] = 'media/js/plugins/mascedinput/jquery-2.0.2.min.js';
        $this->template->scripts[] = 'media/js/plugins/listnav/jquery.listnav-2.1.js';
        $this->template->scripts[] = 'media/js/plugins/listnav/listnav.js';
        $this->template->scripts[] = 'canvas/js/plugins/datatables/jquery.dataTables.min.js';
        $this->template->scripts[] = 'canvas/js/plugins/datatables/DT_bootstrap.js';
        $this->template->scripts[] = 'canvas/js/plugins/datatables/placetb.js';
        
        //$this->template->scripts[] = 'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js';
        
         $this->template->scripts[] = 'assets/plugins/jquery.mixitup.min.js';
         $this->template->scripts[] = 'assets/js/app.js';
         $this->template->scripts[] = 'media/js/plugins/mixitup/mix.js';
         
        $this->template->scripts[] = 'media/dist/plugins/eternicode-bootstrap-datepicker/bootstrap-datepicker.js';
        $this->template->scripts[] = 'media/dist/plugins/eternicode-bootstrap-datepicker/bootstrap-datepicker.ru.js';
            
        
         $news = Widget::load('news');
        $menu = Widget::load('menu');
        
    }

    public function action_index()
	{
       $id = (int) $this->request->param('id');
        $cat = ORM::factory('category', $id);
        
        $news = Widget::load('news');
        $menu = Widget::load('menu');
        $calendar = Widget::load('calendar');
       
        $events= $cat->events
                ->and_where('day' ,'>', date('Y-m-d'))
                ->order_by('day')
                ->find_all();
        
                
      
        
              
         $content = View::factory('index/categories/v_cat', array(
                 'cat' => $cat,
                  'id' => $id,
                 'events' => $events,
                 
            )
            ); 
             $this->template->page_title = $cat->title;
             $this->template->content_title = $cat->title;
             $this->template->keywords = 'Билеты - '.$cat->title;
             $this->template->block_center = array($content,);
             $this->template->block_left = array($calendar, $menu,$news,); 
              
	}
        
        
} 
