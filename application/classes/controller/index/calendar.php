<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Index_Calendar extends Controller_Index
{
    public function before() {
        parent::before();
        
        $this->template->styles[] = 'media/css/jquery.listnav-2.1.css';
        $this->template->styles[] = 'assets/css/pages/page_search.css';
        
        
        
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
        
        
        
        $news = Widget::load('news');
        $menu = Widget::load('menu');
        
    }

    public function action_index()
	{
           if (isset($_POST['submit']))
        {
            $_POST['pickday'] = Security::xss_clean( $_POST['pickday']);
          
            
           
            
            
            $data = Arr::extract($_POST, array(
                'pickday',
                
               ));
            
             
              
            
            $pickdays = ORM::factory('event')
                    
                     ->and_where('day' ,'=', $_POST['pickday'])
                    
                     ->order_by('playbill_id')
                    
                     ->find_all();
             
        }
        
        $news = Widget::load('news');
        $menu = Widget::load('menu');
       
        
              
         $content = View::factory('index/calendar/v_calendar')
                 ->bind('pickdays', $pickdays)
                 //->bind($_POST['pickday'], $pick)
             
            ; 
             $this->template->page_title = 'Выбор даты |  ' ;
             $this->template->content_title ='';
             $this->template->block_center = array($content,);
             $this->template->block_left = array($menu,$news,); 
              
	}
        
        
        
} 
