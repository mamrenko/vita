<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Продукты
 */
class Controller_Admin_Events extends Controller_Admin {
    public function before() {
        parent::before();
        
            //$this->template->scripts[] = 'canvas/js/libs/jquery-1.9.1.min.js';
            //$this->template->scripts[] = 'media/js/datepicker.js';
           // $this->template->scripts[] = 'media/js/datap.js';
            //$this->template->styles[] = 'media/css/datepicker.css';
             $this->template->styles[] = 'canvas/js/plugins/select2/select2.css';
             $this->template->styles[] = 'canvas/js/plugins/datepicker/datepicker.css';
             
             
            $this->template->scripts[] = 'canvas/js/plugins/datatables/jquery.dataTables.min.js';
            $this->template->scripts[] = 'canvas/js/plugins/datatables/DT_bootstrap.js';
            $this->template->scripts[] = 'canvas/js/plugins/datatables/placetb.js';
           
            
            $this->template->scripts[] = 'canvas/js/plugins/datepicker/bootstrap-datepicker.js';     
            $this->template->scripts[] = 'canvas/js/plugins/datepicker/bootstrap-datepicker.ru.js';
            $this->template->scripts[] = 'canvas/js/plugins/select2/select2.js';
            $this->template->scripts[] = 'canvas/js/demos/form-extended.js';
           
            
            
            
            $submenu = Widget::load('adminmenuproducts');
            $this->template->block_left = array($submenu);
            $this->template->page_title = 'События ';
           
    }

    public function action_index() {
       $events = ORM::factory('event')
               ->order_by('day')
               ->find_all();
               
        
        $content = View::factory('admin/events/v_event_index', array(
                    'events' => $events,
                )
                );

        // Вывод в шаблон
       
        $this->template->block_center = array($content);
       
        
    }
    
    public function action_add(){
        $id = (int) $this->request->param('id');
        $playbill = ORM::factory('playbill', $id);
        $events = $playbill->events->order_by('day')->find_all();
        if(!$id){
                 $this->request->redirect('admin/playbill');
             }
        $categories = ORM::factory('category')->find_all()->as_array();
        
        $scenes = $playbill->place->scenes->find_all()->as_array();
        $scn = array();
        foreach ($scenes as $scn){
            $scene[$scn->id] = $scn->title;
        }
        
        $starts = ORM::factory('start')->find_all()->as_array();
        $str = array();
       foreach($starts as $str){
           $start[$str->start] = $str->start;
       }
        
        $cats = array();
        foreach ($categories as $cat){
            $cats[$cat->id] = $cat->title;
        }
        if (isset($_POST['submit']))
        {
            $_POST['day'] = Security::xss_clean( $_POST['day']);
            $_POST['day'] = date('Y-m-d', strtotime( $_POST['day']));
            
            if(!isset($_POST['cat'])){
                $_POST['cat'] = 6;
            }
            $data = Arr::extract($_POST, array(
                'day',
                'status', 
                'playbill_id',
                'place_id',
                'scene_id', 
                'cat',
                'start'
               ));
            $event = ORM::factory('event');
            $event->values($data);
        

         try {
                Sitemap::build();
                $event->save();
                $event->add('categories', $data['cat']);
                
                $this->request->redirect('admin/events/add/'. $playbill->id);
            }
            catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            }

      }
        


        $content = View::factory('admin/events/v_event_add')
                 ->bind('errors', $errors)
                 ->bind('data', $data)
                 ->bind('playbill', $playbill)
                 ->bind('cats', $cats)
                 ->bind('id', $id)
                 ->bind('events', $events)
                 ->bind('start', $start)
                ->bind('scene', $scene)
                 ;

         $this->template->page_title .= ' :: Добавить';
        $this->template->block_center = array($content);
        
    }
    public function action_edit(){
        
        $id = abs((int) $this->request->param('id'));

        $event = ORM::factory('event', $id);
        if(!$event->loaded()){
            $this->request->redirect('admin/playbill');
        }
            $categories = ORM::factory('category')->find_all()->as_array();

            $cats = array();
            foreach ($categories as $cat){
                $cats[$cat->id] = $cat->title;
            }
          $playbill = $event->playbill;
          $data = $event->as_array();
          $data['cat'] = $event->categories->find_all()->as_array();
          $data['day'] = date('d-m-Y', strtotime($data['day']));
          
          $scenes = $playbill->place->scenes->find_all()->as_array();
            $scn = array();
            foreach ($scenes as $scn){
                $scene[$scn->id] = $scn->title;
            }
           
            $starts = ORM::factory('start')->find_all()->as_array();
            $str = array();
           foreach($starts as $str){
               $start[$str->start] = $str->start;
           }
       
        if (isset($_POST['submit'])) {
             $_POST['day'] = Security::xss_clean( $_POST['day']);
             $_POST['day'] = date('Y-m-d', strtotime( $_POST['day']));
             
            if(!isset($_POST['cat'])){
                $_POST['cat'] = 6;
            }
            $data = Arr::extract($_POST, array(
                'day',
                'status', 
                'playbill_id',
                'place_id',
                'scene_id', 
                'cat', 
                'start'
               ));
            $event->values($data);
            
            try {
            Sitemap::build();
            $event->save(); 
            $event->remove('categories');
            $event->add('categories', $data['cat']);
            $this->request->redirect('admin/playbill/edit/'.$playbill->id);
            }  
          catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            } 
           
        }
        
        $content = View::factory('admin/events/v_event_edit')
                ->bind('id', $id)
                ->bind('errors', $errors)
                ->bind('data', $data)
                ->bind('playbill', $playbill)
                ->bind('cats', $cats)
                ->bind('event', $event)
                ->bind('start', $start)
                ->bind('scene', $scene)  
                ;

        // Вывод в шаблон
        $this->template->block_center = array($content);
        $this->template->page_title .= ' :: Редактировать';
        
    }
    
    public function action_delete(){
        $id = abs((int) $this->request->param('id'));
        $event = ORM::factory('event', $id)->order_by('day');
        $playbill = $event->playbill;
        $categories = ORM::factory('category')->find_all()->as_array();

        
        
        if(!$event->loaded()) {
            $this->request->redirect('admin/playbill');
        }

        
        $event->remove('categories');
        $event->delete();
        Sitemap::build();
        $this->request->redirect('admin/playbill/edit/'.$playbill->id);
    }
    public function action_old(){
       $events = ORM::factory('event')
               ->where('day', '<', date("Y-m-d"))
               ->find_all();
               
        
        $content = View::factory('admin/events/v_event_old', array(
                    'events' => $events,
                )
                );

        // Вывод в шаблон
       
        $this->template->block_center = array($content); 
    }
    public function  action_all_delete(){
        
        $events = ORM::factory('event')
               ->where('day', '<', date("Y-m-d"))
                ->find_all();
        foreach ($events as $event) {
           
             $event->remove('categories');
             $event->delete();
      }
        $this->request->redirect('admin/events/old');
    }

}