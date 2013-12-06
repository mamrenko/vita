<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Продукты
 */
class Controller_Admin_Tickets extends Controller_Admin {
    public function before() {
        parent::before();
            $this->template->scripts[] = 'canvas/js/plugins/datatables/jquery.dataTables.min.js';
            $this->template->scripts[] = 'canvas/js/plugins/datatables/DT_bootstrap.js';
            $this->template->scripts[] = 'canvas/js/plugins/datatables/placetb.js';
            
            $submenu = Widget::load('adminmenuproducts');
            $this->template->block_left = array($submenu);
            $this->template->page_title = 'Билеты';
           
    }

    public function action_index() {
        $events = ORM::factory('event')
                ->where('day', '>=', date("Y-m-d"))
                ->order_by('day')
                ->find_all();
        
        $content = View::factory('admin/tickets/v_ticket_index',
                array(
                    'events' => $events,
                ));

        // Вывод в шаблон
        
        $this->template->block_center = array($content);
       
        
    }
    public function action_list(){
        $id = (int) $this->request->param('id');
        
        $event = ORM::factory('event', $id);
        if(!$event->loaded()){
            $this->request->redirect('admin/tickets');
        }
      $tickets = $event->tickets->find_all();
       
        
        $content = View::factory('admin/tickets/v_ticket_list',
                array(
                    'tickets' => $tickets,
                    'event' =>$event,
                    
                ));

        // Вывод в шаблон
        
        $this->template->block_center = array($content);
        
    }

        public function action_add(){
        $id = (int) $this->request->param('id');
        $event = ORM::factory('event', $id);
        
        if(!$id){
                 $this->request->redirect('admin/tickets');
             }
       $sectors = ORM::factory('area')->order_by('title')->find_all()->as_array();
         
       $sect = array();
        foreach ($sectors as $sector){
            $sect[$sector->title]= $sector->title;
        }
       
        $rows = ORM::factory('row')->find_all()->as_array();
         $rws = array();
         
       foreach($rows as $row){
           $rws[$row->number]= $row->number;
       }
        if (isset($_POST['submit']))
        {
            $_POST['cost'] = Security::xss_clean( $_POST['cost']);
            
            
            
            $data = Arr::extract($_POST, array(
                'event_id',
                'sector',
                'row',
                'seat',
                'cost'
                ));
            $tickets = ORM::factory('ticket');
            $tickets->values($data);
        

         try {
                $tickets->save();
                $this->request->redirect('admin/tickets/add/'. $event->id);
            }
            catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            }

      }
        


        $content = View::factory('admin/tickets/v_ticket_add')
                 ->bind('errors', $errors)
                 ->bind('data', $data)
                 ->bind('id', $id)
                 ->bind('event', $event)
                 ->bind('rws', $rws)
                 ->bind('sect', $sect)
                
                 
                 ;

        $this->template->page_title .= ' :: Добавить';
        $this->template->block_center = array($content);
        
    }
    public function action_edit(){
        
          
       
         $id = (int) $this->request->param('id');

        $ticket = ORM::factory('ticket', $id);
        if(!$ticket->loaded()){
            $this->request->redirect('admin/tickets');
        }
        $sectors = ORM::factory('area')->order_by('title')->find_all()->as_array();
         
       $sect = array();
        foreach ($sectors as $sector){
            $sect[$sector->title]= $sector->title;
        }
       
        $rows = ORM::factory('row')->find_all()->as_array();
         $rws = array();
         
       foreach($rows as $row){
           $rws[$row->number]= $row->number;
       }
        
          $data = $ticket->as_array();   
       
        if (isset($_POST['submit'])) {
            $_POST['cost'] = Security::xss_clean( $_POST['cost']);
            
            
            
            $data = Arr::extract($_POST, array(
                'event_id',
                'sector',
                'row',
                'seat',
                'cost'
                ));
            
            $ticket->values($data);
            
            try {
           
            $ticket->save(); 
            $this->request->redirect('admin/tickets/list/'.$ticket->event_id);
            }  
          catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            } 
           
        }
        
        $content = View::factory('admin/tickets/v_ticket_edit')
                ->bind('id', $id)
                ->bind('errors', $errors)
                ->bind('data', $data)
                ->bind('sect', $sect)
                ->bind('ticket', $ticket)
                ->bind('rws', $rws)
                
                ;

        // Вывод в шаблон
        $this->template->block_center = array($content);
        $this->template->page_title .= ' :: Редактировать';
        
    }
    
    public function action_delete(){
        
        $id = (int) $this->request->param('id');
        $ticket = ORM::factory('ticket', $id);
        $event_id = $ticket->event_id;
        if(!$ticket->loaded()) {
            $this->request->redirect('admin/tickets/list/'.$event_id);
        }

        $ticket->delete();
        $this->request->redirect('admin/tickets/list/'.$event_id);  
        
    }
}