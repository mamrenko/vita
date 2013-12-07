<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Продукты
 */
class Controller_Admin_Events extends Controller_Admin {
    public function before() {
        parent::before();
            //$this->template->scripts[] = 'media/js/jquery-1.6.2.min.js';
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
               ));
            $event = ORM::factory('event');
            $event->values($data);
        

         try {
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
                 ;

         $this->template->page_title .= ' :: Добавить';
        $this->template->block_center = array($content);
        
    }
    public function action_edit(){
        
        $id = (int) $this->request->param('id');

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
               ));
            $event->values($data);
            
            try {
           
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
                ;

        // Вывод в шаблон
        $this->template->block_center = array($content);
        $this->template->page_title .= ' :: Редактировать';
        
    }
    
    public function action_delete(){
        $id = (int) $this->request->param('id');
        $event = ORM::factory('event', $id)->order_by('day');
        $playbill = $event->playbill;
        $categories = ORM::factory('category')->find_all()->as_array();

        
        
        if(!$event->loaded()) {
            $this->request->redirect('admin/playbill');
        }

        
        $event->remove('categories');
        $event->delete();
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
   
}