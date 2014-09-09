<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Bookings extends Controller_Admin {
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
        
         $orderusers = ORM::factory('orderuser')
                 ->order_by('actdt', 'DESC')
                 ->find_all();
         
         
        $content = View::factory('admin/bookings/v_booking_index')
                ->bind('orderusers', $orderusers);
                

        // Вывод в шаблон
        $this->template->page_title = 'Заказы от зарегистрированных пользователей';
        
        $this->template->block_center = array($content);
        $this->template->block_left = array($submenu);
    }
    public function action_orders(){
    
        $id = abs((int) $this->request->param('id'));
         $customer  = ORM::factory('orderuser', $id);
        
        //$customer
        
        
       if(!$customer->loaded()) {
            $this->request->redirect('admin/bookings');
        }
          $orders = ORM::factory('booking')
                ->where('orderuser_id', '=', $id)
                ->find_all();
      
        $submenu = Widget::load('adminmenuorders');
        $content = View::factory('admin/bookings/v_booking_orders')
                ->bind('customer', $customer)
                ->bind('orders', $orders);
        
        // Вывод в шаблон
        $this->template->page_title = 'Заказ Покупателя';
        $this->template->block_center = array($content);
        $this->template->block_left = array($submenu);
    
}
public function action_tickets(){
         $id = abs((int) $this->request->param('id'));
         $order  = ORM::factory('booking', $id);
        
        $customer =  ORM::factory('orderuser')
                ->where('id', '=', $order->orderuser_id)
               ->find();
        
        
       if(!$order->loaded()) {
            $this->request->redirect('admin/bookings/orders');
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
            $_POST['booking_id'] = Security::xss_clean( $_POST['booking_id']);
            $_POST['orderuser_id'] = Security::xss_clean( $_POST['orderuser_id']);
            if(!isset($_POST['college'])){
               $_POST['college'] =''; 
            }

            $data = Arr::extract($_POST, array(
                'dmy', 
                'comment',
                'college',
                'booking_id',
                'orderuser_id',
                ));
            $data2 = array(
              
                'customer_id' => '0',
                 'order_id' => '0',
            );
            $data = Arr::merge($data2, $data);
            $taketicket = ORM::factory('taketicket');
             $taketicket->values($data);
            

         try {
                $taketicket->save();
                $taketicket->add('associates', $data['college']);
                $this->request->redirect('admin/bookings/orders/'.$data['orderuser_id']);
            }
            catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
             
                }
            }
        
        
        
        $content = View::factory('admin/bookings/v_bookings_ticket')
                ->bind('id', $id)
                ->bind('order', $order)
                ->bind('colleges', $colleges)
                ->bind('customer', $customer)
                ->bind('data', $data)
                ->bind('college_arr', $college_arr);
        
        // Вывод в шаблон
        $this->template->page_title = 'У кого брали билеты и какие';
        $this->template->block_center = array($content);
        $this->template->block_left = array($submenu); 
    
}
}