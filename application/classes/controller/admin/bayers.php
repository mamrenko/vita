<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Пользователи
 */
class Controller_Admin_Bayers extends Controller_Admin {
    public function before() {
        parent::before();
         $this->template->scripts[] = 'canvas/js/plugins/datatables/jquery.dataTables.min.js';
            $this->template->scripts[] = 'canvas/js/plugins/datatables/DT_bootstrap.js';
            $this->template->scripts[] = 'canvas/js/plugins/datatables/placetb.js';
             $this->template->scripts[] = 'canvas/js/plugins/tableCheckable/jquery.tableCheckable.js';
            $this->template->scripts[] = 'canvas/js/plugins/tableCheckable/mychecktable.js';
             
           
    }

    public function action_index() {

         $customers = ORM::factory('customer')
                ->find_all();
                
        
        
        $submenu = Widget::load('adminmenuusers');
        $content = View::factory('admin/bayers/v_bayers_index')
                ->bind('customers', $customers);
        
        
       

        // Вывод в шаблон
        $this->template->page_title = 'Покупатели';
        $this->template->block_center = array($content);
        $this->template->block_left = array($submenu);
    }
    
public function action_orders(){
    
        $id = abs((int) $this->request->param('id'));
         $customer  = ORM::factory('customer', $id);
        
        //$customer
        
        
       if(!$customer->loaded()) {
            $this->request->redirect('admin/bayers');
        }
          $orders = ORM::factory('order')
                ->where('custom_id', '=', $id)
                ->find_all();
        $submenu = Widget::load('adminmenuusers');
        $content = View::factory('admin/bayers/v_bayers_orders')
                ->bind('customer', $customer)
                ->bind('orders', $orders);
        
        // Вывод в шаблон
        $this->template->page_title = 'Заказ Покупателя';
        $this->template->block_center = array($content);
        $this->template->block_left = array($submenu);
    
}



}
