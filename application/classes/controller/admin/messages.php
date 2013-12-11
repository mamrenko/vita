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
            
             $submenu = Widget::load('adminmenupages');
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
    
    public function action_add(){
       
       
        
        if (isset($_POST['submit']))
        {
            $_POST['title'] = Security::xss_clean( $_POST['title']);
            
            
            
            $data = Arr::extract($_POST, array('title'));
            $area = ORM::factory('area');
            $area->values($data);
        

         try {
                $area->save();
                $this->request->redirect('admin/areas');
            }
            catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            }

      }
        


        $content = View::factory('admin/areas/v_area_add')
                 ->bind('errors', $errors)
                 ->bind('data', $data)
                 
                 ;

        $this->template->page_title .= ' :: Добавить';
        $this->template->block_center = array($content);
        
    }
    public function action_edit(){
        
          
       
         $id = (int) $this->request->param('id');

        $area = ORM::factory('area', $id);
        if(!$area->loaded()){
            $this->request->redirect('admin/areas');
        }
          $data = $area->as_array();   
       
        if (isset($_POST['submit'])) {
            $_POST['title'] = Security::xss_clean( $_POST['title']);
            
            
            
            $data = Arr::extract($_POST, array('title'));
            
            $area->values($data);
            
            try {
           
            $area->save(); 
            $this->request->redirect('admin/areas');
            }  
          catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            } 
           
        }
        
        $content = View::factory('admin/areas/v_area_edit')
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
        $area = ORM::factory('area', $id);

        if(!$area->loaded()) {
            $this->request->redirect('admin/areas');
        }

        $area->delete();
        $this->request->redirect('admin/areas');  
        
    }
}