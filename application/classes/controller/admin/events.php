<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Продукты
 */
class Controller_Admin_Events extends Controller_Admin {
    public function before() {
        parent::before();
            $this->template->scripts[] = 'media/js/jquery-1.6.2.min.js';
            $this->template->scripts[] = 'media/js/datepicker.js';
            $this->template->scripts[] = 'media/js/datap.js';
            $this->template->styles[] = 'media/css/datepicker.css';
            
            $submenu = Widget::load('adminmenuproducts');
            $this->template->block_left = array($submenu);
            $this->template->page_title = 'События ';
           
    }

    public function action_index() {
       $events = ORM::factory('event')
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
        $events = $playbill->events->find_all();
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

        $place = ORM::factory('place', $id);
        if(!$place->loaded()){
            $this->request->redirect('admin/places');
        }
          $data = $place->as_array();   
       
        if (isset($_POST['submit'])) {
            $_POST['title'] = Security::xss_clean( $_POST['title']);
            $_POST['description'] = Security::xss_clean( $_POST['description']);
            $_POST['adress'] = Security::xss_clean( $_POST['adress']);
            $data = Arr::extract($_POST, array('title', 'description', 'adress'));
            
            $place->values($data);
            
            try {
           
            $place->save(); 
            $this->request->redirect('admin/places');
            }  
          catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            } 
           
        }
        
        $content = View::factory('admin/places/v_place_edit')
                ->bind('id', $id)
                ->bind('errors', $errors)
                ->bind('data', $data)
                ;

        // Вывод в шаблон
        $this->template->block_center = array($content);
        $this->template->page_title .= ' :: Редактировать';
        
    }
    
    public function action_delete(){
        $id = (int) $this->request->param('id');
        $event = ORM::factory('event', $id);
        $playbill = $event->playbill;
        $categories = ORM::factory('category')->find_all()->as_array();

        
        
        if(!$event->loaded()) {
            $this->request->redirect('admin/playbill');
        }

        
        $event->remove('categories');
        $event->delete();
        $this->request->redirect('admin/playbill/edit/'.$playbill->id);
    }
        
   
}