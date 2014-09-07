<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Orders extends Controller_Admin {
     public function before() {
        parent::before();
         $this->template->scripts[] = 'canvas/js/plugins/datatables/jquery.dataTables.min.js';
            $this->template->scripts[] = 'canvas/js/plugins/datatables/DT_bootstrap.js';
            $this->template->scripts[] = 'canvas/js/plugins/datatables/placetb.js';
             $this->template->scripts[] = 'canvas/js/plugins/tableCheckable/jquery.tableCheckable.js';
            $this->template->scripts[] = 'canvas/js/plugins/tableCheckable/mychecktable.js';
             
            $this->template->scripts[] = 'canvas/js/plugins/select2/select2.js';
           
            $this->template->styles[] = 'canvas/js/plugins/datepicker/datepicker.css';
            $this->template->scripts[] = 'canvas/js/plugins/datepicker/bootstrap-datepicker.js';     
            $this->template->scripts[] = 'canvas/js/plugins/datepicker/bootstrap-datepicker.ru.js';
            
             $this->template->scripts[] = 'canvas/js/demos/form-extended.js';
    }

    public function action_index() {
        
        $submenu = Widget::load('adminmenuorders');
        
         $customers = ORM::factory('customer')
                 ->order_by('id', 'DESC')
                 ->find_all();
        $content = View::factory('admin/orders/v_orders_index')
                ->bind('customers', $customers);
                

        // Вывод в шаблон
        $this->template->page_title = 'Заказы';
        
        $this->template->block_center = array($content);
        $this->template->block_left = array($submenu);
    }
    public function action_orders(){
    
        $id = abs((int) $this->request->param('id'));
         $customer  = ORM::factory('customer', $id);
        
        //$customer
        
        
       if(!$customer->loaded()) {
            $this->request->redirect('admin/orders');
        }
          $orders = ORM::factory('order')
                ->where('custom_id', '=', $id)
                ->find_all();
          
         
      
        $submenu = Widget::load('adminmenuorders');
        $content = View::factory('admin/orders/v_orders_orders')
                ->bind('customer', $customer)
                ->bind('orders', $orders);
        
        // Вывод в шаблон
        $this->template->page_title = 'Заказ Покупателя';
        $this->template->block_center = array($content);
        $this->template->block_left = array($submenu);
    
}
public function action_tickets(){
     $id = abs((int) $this->request->param('id'));
     $order  = ORM::factory('order', $id);
        
        $customer =  ORM::factory('customer')
                ->where('id', '=', $order->custom_id)
               ->find();
        
        
       if(!$order->loaded()) {
            $this->request->redirect('admin/orders/orders');
        }
          $colleges = ORM::factory('associate')
                ->find_all()
                  ->as_array();
          
          
           $college_arr = array();
        foreach ($colleges as $college){
            $college_arr[$college->id] = $college->name;
        }
        $submenu = Widget::load('adminmenuorders');
        
        
        if (isset($_POST['submit']))
        {
         
            $_POST['comment'] = Security::xss_clean( $_POST['comment']);
            $_POST['dmy'] = Security::xss_clean( $_POST['dmy']);
            $_POST['dmy'] = date('Y-m-d', strtotime( $_POST['dmy']));
            $_POST['customer_id'] = Security::xss_clean( $_POST['customer_id']);
            $_POST['order_id'] = Security::xss_clean( $_POST['order_id']);
            if(!isset($_POST['college'])){
               $_POST['college'] =''; 
            }

            $data = Arr::extract($_POST, array(
                'dmy', 
                'comment',
                'college',
                'customer_id',
                'order_id'
                ));
            $data2 = array(
                'booking_id' => '0',
                'orderuser_id' => '0',
            );
            $data = Arr::merge($data2, $data);
            $taketicket = ORM::factory('taketicket');
             $taketicket->values($data);
            

         try {
                $taketicket->save();
                $taketicket->add('associates', $data['college']);
                $this->request->redirect('admin/taketickets');
            }
            catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
             
                }
            }
     
        
        $content = View::factory('admin/orders/v_orders_ticket')
                ->bind('order', $order)
                ->bind('colleges', $colleges)
                ->bind('customer', $customer)
                ->bind('data', $data)
                ->bind('college_arr', $college_arr)
                ->bind('errors', $errors)
                ->bind('id', $id)
                ;
        
        // Вывод в шаблон
        $this->template->page_title = 'У кого брали билеты и какие';
        $this->template->block_center = array($content);
        $this->template->block_left = array($submenu); 
    
}

        public function action_ticket_edit(){
       $id = abs((int) $this->request->param('id'));
       $taketicket = ORM::factory('taketicket', $id);
      
        
        
       if(!$taketicket->loaded()) {
            $this->request->redirect('admin/orders/orders');
        }
        
        $colleges = ORM::factory('associate')
                ->find_all()
                  ->as_array();
          
          
           $college_arr = array();
        foreach ($colleges as $college){
            $college_arr[$college->id] = $college->name;
        }
        
        
         $data = $taketicket->as_array();
          $data['college'] = $taketicket->associates->find_all()->as_array();
          $data['dmy'] = date('d-m-Y', strtotime($data['dmy']));
     $submenu = Widget::load('adminmenuorders');
     
     
     if (isset($_POST['submit']))
        {
         
            $_POST['comment'] = Security::xss_clean( $_POST['comment']);
            $_POST['dmy'] = Security::xss_clean( $_POST['dmy']);
            $_POST['dmy'] = date('Y-m-d', strtotime( $_POST['dmy']));
            $_POST['customer_id'] = Security::xss_clean( $_POST['customer_id']);
            $_POST['order_id'] = Security::xss_clean( $_POST['order_id']);
            if(!isset($_POST['college'])){
               $_POST['college'] =''; 
            }

            $data = Arr::extract($_POST, array(
                'dmy', 
                'comment',
                'college',
                'customer_id',
                'order_id'
                ));
            $data2 = array(
                'booking_id' => '0',
                'orderuser_id' => '0',
            );
            $data = Arr::merge($data2, $data);
            ///$taketicket = ORM::factory('taketicket');
             $taketicket->values($data);
            

         try {
                
                
             $taketicket->save(); 
             $taketicket->remove('associates');
             $taketicket->add('associates', $data['college']);
            $this->request->redirect('admin/orders/orders/'.$data['order_id']);
            }
            catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
             
                }
            }
     
     
     $content = View::factory('admin/orders/v_orders_ticket_edit')
                
                ->bind('taketicket', $taketicket)
                ->bind('data', $data)
                ->bind('college_arr', $college_arr)
                ->bind('errors', $errors)
                ->bind('id', $id);
     
     
        // Вывод в шаблон
        $this->template->page_title = 'Редактируем У кого брали билеты и какие';
        $this->template->block_center = array($content);
        $this->template->block_left = array($submenu); 

        }
        public function action_ticket_delete(){
       $id = abs((int) $this->request->param('id'));
       $taketicket = ORM::factory('taketicket', $id);
       $order = $taketicket->order_id;
       
        if(!$taketicket->loaded()) {
            $this->request->redirect('admin/orders');
        }

        
         $taketicket->remove('associates');
        $taketicket->delete();
        $this->request->redirect('admin/orders/orders/'.$order);
        }
}