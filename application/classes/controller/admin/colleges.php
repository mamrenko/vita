<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Пользователи
 */
class Controller_Admin_Colleges extends Controller_Admin {
    public function before() {
        parent::before();
        $this->template->styles[]='media/BootstrapFormHelpers/dist/css/bootstrap-formhelpers.css';
         $this->template->scripts[] = 'canvas/js/plugins/datatables/jquery.dataTables.min.js';
            $this->template->scripts[] = 'canvas/js/plugins/datatables/DT_bootstrap.js';
            $this->template->scripts[] = 'canvas/js/plugins/datatables/placetb.js';
            
            
        $this->template->scripts[] = 'media/BootstrapFormHelpers/dist/js/bootstrap-formhelpers.js';
           // $this->template->scripts[] = 'canvas/js/plugins/tableCheckable/mychecktable.js';
             
           
    }

    public function action_index() {

         $colleges = ORM::factory('associate')
                ->find_all();
                
        
        
        $submenu = Widget::load('adminmenuusers');
        $content = View::factory('admin/associates/v_associates_index')
                ->bind('colleges', $colleges);
        
        
       

        // Вывод в шаблон
        $this->template->page_title = 'Коллеги';
        $this->template->block_center = array($content);
        $this->template->block_left = array($submenu);
    }
    


    public function action_edit() {

        $submenu = Widget::load('adminmenuusers');
        
         $id = abs((int) $this->request->param('id'));

        $collega = ORM::factory('associate', $id);
        if(!$collega->loaded()){
            $this->request->redirect('admin/colleges');
        }
          $data = $collega->as_array();   
       
        if (isset($_POST['submit'])) {
            $_POST['name'] = Security::xss_clean( $_POST['name']);
            $_POST['phone'] = Security::xss_clean( $_POST['phone']);
            $_POST['adress'] = Security::xss_clean( $_POST['adress']);
            
            
            
            $data = Arr::extract($_POST, array('name','phone', 'adress'));
            
            $collega->values($data);
            
            try {
           
            $collega->save(); 
            $this->request->redirect('admin/colleges');
            }  
          catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            } 
           
        }
        $content = View::factory('admin/associates/v_associates_edit')
                 ->bind('id', $id)
                 ->bind('errors', $errors)
                 ->bind('data', $data);
        
        
       

        // Вывод в шаблон
        $this->template->page_title = 'Редактирование Коллеги';
        $this->template->block_center = array($content);
        $this->template->block_left = array($submenu);
    }
    public function action_add() {

        
        $submenu = Widget::load('adminmenuusers');
        
         if (isset($_POST['submit']))
        {
            $_POST['name'] = Security::xss_clean( $_POST['name']);
            $_POST['phone'] = Security::xss_clean( $_POST['phone']);
            $_POST['adress'] = Security::xss_clean( $_POST['adress']);
            //$_POST['title'] = $db->quote($_POST['title']);
        
            $data = Arr::extract($_POST, array('name', 'phone', 'adress'));
            $collega = ORM::factory('associate');
             $collega->values($data);
            

         try {
                $collega->save();
                $this->request->redirect('admin/colleges');
            }
            catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            }

      }
        
        
        $content = View::factory('admin/associates/v_associates_add')
                ->bind('errors', $errors)
                ->bind('data', $data);
        
        
       

        // Вывод в шаблон
        $this->template->page_title = 'Добавление Коллеги';
        $this->template->block_center = array($content);
        $this->template->block_left = array($submenu);
    }


}
