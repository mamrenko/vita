<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Index_Event extends Controller_Index
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

    public function action_one()
	{
       $id = abs((int) $this->request->param('id'));
        $events = ORM::factory('event')
                 ->where('playbill_id', '=', $id)
                 ->where('day', '>=', date('Y-m-d'))
                ->find_all();
        
        $playbill = ORM::factory('playbill', $id);
        if(!$playbill->loaded()){
            
            throw new Exception_404('Запрашиваемая страница не найдена');
            return;
            
        }
        $artists = $playbill->artists->find_all();
        $news = Widget::load('news');
        $menu = Widget::load('menu');
        $calendar = Widget::load('calendar');
        
     
///Проверяем находится ли товар в корзине
         $cost_s = $this->session->get('costs');
         
           if ($cost_s != NULL)
        {
            
               $arr = array();
            foreach($cost_s as $key => $value)
            {
                $arr[$key] = $key;
            }

        
        }
                
      
        
              
         $content = View::factory('index/event/v_event')
                  ->bind('events', $events)
                  ->bind('id', $id)
                  ->bind('playbill', $playbill)
                  ->bind('artists', $artists)
                 ->bind('arr', $arr)
            
            ; 
         
             $site_title ='';
             $this->template->site_title = $site_title;
             $this->template->keywords = $playbill->meta_keywords;
             $this->template->meta_description = $playbill->meta_description;
             $this->template->meta_title = $playbill->meta_title;
            
             $this->template->page_title = $playbill->place->title .' | ' . $playbill->title;
             $this->template->content_title ='';
             $this->template->block_center = array($content,);
             $this->template->block_left = array($calendar, $menu,$news,); 
              
	}
        
        public function action_scene(){
                $id = (int) $this->request->param('id');
                
         $news = Widget::load('news');
         $menu = Widget::load('menu');
         
         
         $scene = ORM::factory('scene')
                 ->where('id', '=', $id)
                 ->find();
         
         $events = ORM:: factory('event')
                 ->where('scene_id', '=', $id)
                 ->and_where('day', '>=', date('Y-m-d'))
                 ->order_by('day')
                 ->find_all();
            
         $content = View::factory('index/place/v_scene', array(
                 
             'id' => $id,
             'events' => $events,
             
             'scene' => $scene,
                 
            )
            );
         
          
             $this->template->page_title = '';
             $this->template->content_title ='Каталог';
             $this->template->block_center = array($content,);
             $this->template->block_left = array($menu,$news,); 
        }
     
} 
