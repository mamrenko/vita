<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Index_Order extends Controller_Index
{
    public function before() {
        parent::before();
        
        $this->template->styles[] = 'media/css/jquery.listnav-2.1.css';
        $this->template->styles[] = 'assets/css/pages/page_search.css';
        
         $this->template->scripts[] = 'media/js/plugins/mascedinput/jquery-2.0.2.min.js';
         $this->template->scripts[] = 'media/js/plugins/mascedinput/jquery.maskedinput.min.js';
         $this->template->scripts[] = 'media/js/plugins/mascedinput/phonescr.js';
         $this->template->scripts[] = 'media/js/plugins/maxlength/jquery.maxlength.js';
         $this->template->scripts[] = 'media/js/plugins/maxlength/maxlength.js';
        
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
       $id = (int) $this->request->param('id');
       
        $event = ORM::factory('event', $id);
        
        $news = Widget::load('news');
        $menu = Widget::load('menu');
        $calendar = Widget::load('calendar');
        $events = ORM::factory('event')
                 ->where('playbill_id', '=', $event->playbill_id)
                 ->and_where('day', '>=', date('Y-m-d'))
                 ->find_all()
                ;
        
                foreach ($events as $evet) {
                   $month2 = (date('m', strtotime($evet->day))) ;
                   $den2 = (date('N',strtotime($evet->day))); 
                   $month1 = $this-> _getmonth($month2);
                   $den1 = $this->_getday($den2);
                }
        
        
        $eveday = array();
         foreach ($events as $key) {
            
         $month = (date('m', strtotime($key->day))) ;
         $den = (date('N',strtotime($key->day)));
   
      $eveday[date('d', strtotime($key->day))
              . $this->_getmonth($month) .' '
              .date('Y', strtotime($key->day))
              .$this->_getday($den)
              . ' в '. $key->start] = date('d', strtotime($key->day))
              . $this->_getmonth($month) .' '
              .date('Y', strtotime($key->day))
              .$this->_getday($den)
              . ' в '. $key->start;

          
         }  
     $costs = ORM::factory('cost')
             ->where('playbill_id', '=', $event->playbill_id)
             ->find_all()
             ;
     
     $costs_s = array();
        foreach ($costs as $key) {
      $costs_s[$key->area->title .'  '.$key->price. '  рублей'] = $key->area->title .'  '.$key->price. '  рублей';
}
            
        
              
         $content = View::factory('index/order/v_order')
                  ->bind('event', $event)
                  ->bind('id', $id)
                  ->bind('data', $data)
                  ->bind('eveday', $eveday)
                  ->bind('costs_s', $costs_s)
                  ->bind('events', $events)
                  ->bind('month1', $month1)
                   ->bind('den1', $den1)
                    ;
              
                 
            
            ; 
           
             $this->template->page_title = $event->id .' | ' . $event->playbill->title;
             $this->template->content_title ='';
             $this->template->block_center = array($content,);
             $this->template->block_left = array($calendar, $menu,$news,); 
              
	}
        
        public function action_add(){
           
            $id = abs((int) $this->request->param('id'));
            
            // $orders_s = $this->session->get('orders');
            
             $cost_s = $this->session->get('costs');
             
            
             
             $amt_s = $this->session->get('amts');
            
            
//          if (isset($orders_s[$id]))
//        {
//             
//              $orders_s[$id] = 1;
//            
//        }
//        else
//        {
//             $orders_s[$id] = 1;
//             
//        }
        
        
         if (isset($cost_s[$id]))
        {
             
              $cost_s[$id] = Arr::get($_POST, 'cost');
            
        }
        else
        {
            $cost_s[$id] = Arr::get($_POST, 'cost');
             
        }
        
        
        
        if (isset($amt_s[$id]))
        {
             
              $amt_s[$id] = Arr::get($_POST, 'amt');
            
        }
        else
        {
            $amt_s[$id] = Arr::get($_POST, 'amt');
             
        }
        
           
        
         $this->session->set('costs', $cost_s);
        
         $this->session->set('amts', $amt_s);
        
       
     
         $this->request->redirect('cart');
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
        
        
        
        //Получаем заказ от незарегистрированного пользователя
        public function action_get_order(){
             
            
            
            
            $news = Widget::load('news');
            $menu = Widget::load('menu');
           $calendar = Widget::load('calendar');
         $content = View::factory('index/order/v_get_order')
                  ->bind('errors', $errors);
                 
                   
              
                 
            
            
           
             $this->template->page_title = 'Спасибо за заказ';
             $this->template->content_title ='';
             $this->template->block_center = array($content,);
             $this->template->block_left = array($calendar, $menu,$news,); 
        }
} 
