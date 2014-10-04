<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Index_Places extends Controller_Index
{
    public function before() {
        parent::before();
        
        
         $news = Widget::load('news');
         $menu = Widget::load('menu');
         $calendar = Widget::load('calendar');
       
       // $this->template->styles[] = 'assets/css/pages/portfolio-v2.css';
        
       // $this->template->styles[] = 'canvas/js/plugins/datepicker/datepicker.css';
        $this->template->styles[] = 'media/dist/css/bootstrap.css';
        $this->template->styles[] = 'media/js/plugins/listnav/listnav.css';
     $this->template->styles[] = 'media/dist/css/site.css';
      $this->template->styles[] = 'media/css/site.css';
        
              
        $this->template->scripts[] = 'assets/plugins/bootstrap/js/bootstrap.js';     
        $this->template->scripts[] = 'assets/plugins/bootstrap/js/bootstrap.min.js';
        $this->template->scripts[] = 'media/js/plugins/mascedinput/jquery-2.0.2.min.js';
        $this->template->scripts[] = 'media/js/plugins/listnav/jquery.listnav-2.1.js';
        $this->template->scripts[] = 'media/js/plugins/listnav/listnav.js';
        $this->template->scripts[] = 'canvas/js/plugins/datatables/jquery.dataTables.min.js';
        $this->template->scripts[] = 'canvas/js/plugins/datatables/DT_bootstrap.js';
        $this->template->scripts[] = 'canvas/js/plugins/datatables/placetb.js';
        
        
        
        
        
        $this->template->scripts[] = 'assets/plugins/jquery.mixitup.min.js';
         $this->template->scripts[] = 'assets/js/app.js';
        $this->template->scripts[] = 'assets/js/site.js';
         $this->template->scripts[] = 'media/js/plugins/mixitup/mix.js';
        //$this->template->scripts[] = 'media/dist/plugins/calendar/jquery.datetimepicker.js';
      $this->template->scripts[] = 'media/dist/plugins/eternicode-bootstrap-datepicker/bootstrap-datepicker.js';     
       $this->template->scripts[] = 'media/dist/plugins/eternicode-bootstrap-datepicker/bootstrap-datepicker.ru.js';
       $this->template->scripts[] = 'canvas/js/demos/form-extended.js';
        
    }

    public function action_index()
	{
        $news = Widget::load('news');
        $menu = Widget::load('menu');
        $calendar = Widget::load('calendar');
       
        $places = ORM::factory('event')
                      ->where('day', '>', date('Y-m-d'))
                      ->group_by('place_id')
                      ->order_by('place_id')
                      ->find_all() 
                
                ;
      
        
              
         $content = View::factory('index/place/v_places', array(
                 'places' => $places,
                 
            )
            ); 
             $this->template->page_title = 'Площадки: Театры, Концерты, Мюзиклы, Цирки, Спорт, Фестивали';
             $this->template->content_title ='Каталог';
             $this->template->block_center = array($content,);
             $this->template->block_left = array($calendar,$menu,$news,); 
              
	}
         public function action_place()
	{
             $id = abs((int) $this->request->param('id'));
       
             if (isset($_POST['submit']))
        {
            $_POST['startday'] = Security::xss_clean( $_POST['startday']);
            $_POST['startday'] = date('Y-m-d', strtotime( $_POST['startday']));
            
            $_POST['endday'] = Security::xss_clean( $_POST['endday']);
            $_POST['endday'] = date('Y-m-d', strtotime( $_POST['endday']));
            
            
            $data = Arr::extract($_POST, array(
                'startday',
                'endday', 
                
               ));
            
              $data['startday'] = date('d-m-Y', strtotime( $data['startday']));
              $data['endday'] = date('d-m-Y', strtotime( $data['endday']));
            
            $interval = ORM::factory('event')
                     ->where('place_id', '=', $id)
                     ->and_where('day' ,'>=', $_POST['startday'])
                    ->and_where('day', '<=', $_POST['endday'])
                     //->group_by('playbill_id')
                     ->order_by('day')
                    
                     ->find_all();
             
        }
        if (isset($_POST['reset'])){
            unset($_POST['startday']);
            unset($_POST['endday']);
            
        }
        
        
        
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
       // var_dump( $arr);
         ///---------
             $events = ORM::factory('event')
                     ->where('place_id', '=', $id)
                     ->and_where('day' ,'>=', date('Y-m-d'))
                     //->group_by('playbill_id')
                     ->order_by('day')
                    
                     ->find_all();
             
        $place = ORM::factory('place')
                ->where('id', '=', $id)
                 ->find();
        
        if(!$place->loaded()){
            
            throw new Exception_404('Запрашиваемая страница не найдена');
            return;
            
        }
        
               $scenes = ORM::factory('event')
               ->where('place_id', '=', $id)
               ->and_where('day' ,'>', date('Y-m-d'))
               ->group_by('scene_id')
               ->find_all();
      
         $news = Widget::load('news');
         $menu = Widget::load('menu');
         $calendar = Widget::load('calendar');
         
        
            $content = View::factory('index/place/v_place')
                  ->bind('events', $events)
                  ->bind('id', $id)
                  ->bind('place', $place)
                  ->bind('scenes', $scenes)
                  ->bind('data', $data)
                  ->bind('interval', $interval)
                  ->bind('arr', $arr)
                   
                  ;
//                 foreach ($events as $event) {
//                 $play = $event->playbill->title. ' ';
//            }  
             $this->template->keywords = 'Билеты в '. $place->title ;
                  
                    
            
             $this->template->meta_description = $place->title;
             $this->template->meta_title = 'Купить лучшие билеты  в  '.$place->title;
                   
                 
             $this->template->page_title = $place->title ;
             $this->template->content_title ='Каталог';
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
             'den' => $den,
                 
            )
            );
             $this->template->page_title = '';
             $this->template->content_title ='Каталог';
             $this->template->block_center = array($content,);
             $this->template->block_left = array($calendar, $menu, $news,); 
        }
        
        
         public function _getday($den)
        {
            switch ($den) {
case 1:
    $den =  " Понедельник";
    break;
case 2:
    $den =  " Вторник";
    break;
case 3:
    $den =  " Среда";
    break;
case 4:
    $den =  " Четверг";
    break;
case 5:
    $den =  " Пятница";
    break;
case 6:
    $den =  " Суббота";
    break;
case 7:
    $den =  " Воскресенье";
    break;
default:
    $den =  " ????";
}
            
return $den;       
        }
        
        public function _getmonth($month){
            
            
            
            switch ($month) {
case 1:
    $month =  " Января";
    break;
case 2:
    $month =  " Февраля";
    break;
case 3:
    $month =  " Марта";
    break;
case 4:
    $month = " Апреля";
    break;
case 5:
    $month = " Мая";
    break;
case 6:
    $month = " Июня";
    break;
case 7:
    $month = " Июля";
    break;
case 8:
    $month =  " Августа";
    break;
case 9:
    $month = " Сентября";
    break;
case 10:
    $month = " Октября";
    break;
case 11:
    $month = " Ноября";
    break;
case 12:
    $month = " Декабря";
    break;
default:
    $month = "????";
}
return $month;
        }
} 
