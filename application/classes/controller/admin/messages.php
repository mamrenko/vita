<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Продукты
 */
class Controller_Admin_Messages extends Controller_Admin {
    public function before() {
        parent::before();
            $this->template->scripts[] = 'canvas/js/plugins/datatables/jquery.dataTables.min.js';
            $this->template->scripts[] = 'canvas/js/plugins/datatables/DT_bootstrap.js';
            $this->template->scripts[] = 'canvas/js/plugins/datatables/placetb.js';
            
             $submenu = Widget::load('adminmenuusers');
            $this->template->block_left = array($submenu);
            $this->template->page_title = 'Сообщения';
           
    }

    public function action_index() {
        $messages = ORM::factory('message')->order_by('name')->find_all();
        
        $content = View::factory('admin/messages/v_message_index',
                array(
                    'messages' => $messages,
                ));

        // Вывод в шаблон
        
        $this->template->block_center = array($content);
       
        
    }
    
   
    
    
    public function action_delete(){
        
        $id = (int) $this->request->param('id');
        $message = ORM::factory('message', $id);

        if(!$message->loaded()) {
            $this->request->redirect('admin/messages');
        }

        $message->delete();
        $this->request->redirect('admin/messages');  
        
    }
}