<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Index_Artists extends Controller_Index
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
        $this->template->scripts[] = 'media/dist/plugins/calendar/jquery.datetimepicker.js';
        $this->template->scripts[] = 'media/dist/plugins/eternicode-bootstrap-datepicker/bootstrap-datepicker.js';
        $this->template->scripts[] = 'media/dist/plugins/eternicode-bootstrap-datepicker/bootstrap-datepicker.ru.js';
        
         $news = Widget::load('news');
         $menu = Widget::load('menu');
        
    }

    public function action_index()
	{
       $id = abs((int) $this->request->param('id'));
        $artist = ORM::factory('artist',$id);
                 
        $playbills = $artist->playbills->find_all();
      //  Database::instance('alternate');
//        foreach($playbills as $playbill)
//            {
//               
//              $events = ORM::factory ('event')
//                ->where ('playbill_id', '=', $playbill->id)
//                ->distinct('playbill_id')
//                ->and_where('day', '>=', date('Y-m-d'));
//            }
//       
//     
//               $events = $events ->find_all();

    
      
        
                
        $news = Widget::load('news');
        $menu = Widget::load('menu');
        $calendar = Widget::load('calendar');
        
 
              
         $content = View::factory('index/artist/v_artist')
                  ->bind('artist', $artist)
                  ->bind('id', $id)
                  ->bind('playbills', $playbills)
                  ->bind('events', $events)
                  
            
            ; 
             $this->template->page_title = $artist->place->title .' | ' . $artist->name;
             $this->template->content_title ='';
             $this->template->block_center = array($content,);
             $this->template->block_left = array($calendar, $menu,$news,); 
              
	}
        
       
        
       
} 
