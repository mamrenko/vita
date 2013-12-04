<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Продукты
 */
class Controller_Admin_Starts extends Controller_Admin {
    public function before() {
        parent::before();
            $this->template->scripts[] = 'canvas/js/plugins/datatables/jquery.dataTables.min.js';
            $this->template->scripts[] = 'canvas/js/plugins/datatables/DT_bootstrap.js';
            $this->template->scripts[] = 'canvas/js/plugins/datatables/placetb.js';
            
            
            $submenu = Widget::load('adminmenuproducts');
            $this->template->block_left = array($submenu);
            $this->template->page_title = 'Начала Мероприятий';
           
    }

    public function action_index() {
        $starts = ORM::factory('start')->find_all();
        
        $content = View::factory('admin/starts/v_start_index',
                array(
                    'starts' => $starts,
                ));

        // Вывод в шаблон
        
        $this->template->block_center = array($content);
       
        
    }
    
    public function action_add(){
      
       
        
        if (isset($_POST['submit']))
        {
            $_POST['start'] = Security::xss_clean( $_POST['start']);
           
            
            
            $data = Arr::extract($_POST, array('start', ));
            $start = ORM::factory('start');
            $start->values($data);
        

         try {
                $start->save();
                $this->request->redirect('admin/starts');
            }
            catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            }

      }
        


        $content = View::factory('admin/starts/v_start_add')
                 ->bind('errors', $errors)
                 ->bind('data', $data)
                
                 ;

        $this->template->page_title .= ' :: Добавить';
        $this->template->block_center = array($content);
        
    }
    public function action_edit(){
        
        
       
         $id = (int) $this->request->param('id');

        $start = ORM::factory('start', $id);
        if(!$start->loaded()){
            $this->request->redirect('admin/starts');
        }
          $data = $start->as_array();   
       
        if (isset($_POST['submit'])) {
            $_POST['satrt'] = Security::xss_clean( $_POST['start']);
            
            
            
            $data = Arr::extract($_POST, array('start',));
            
            $start->values($data);
            
            try {
           
            $start->save(); 
            $this->request->redirect('admin/starts');
            }  
          catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            } 
           
        }
        
        $content = View::factory('admin/starts/v_start_edit')
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
        $playbill = ORM::factory('playbill', $id);

        if(!$playbill->loaded()) {
            $this->request->redirect('admin/playbill');
        }

        $playbill->delete();
        $this->request->redirect('admin/playbill');  
        
    }
}