<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Продукты
 */
class Controller_Admin_Categories extends Controller_Admin {
    public function before() {
        parent::before();
        
            $this->template->scripts[] = 'canvas/js/plugins/datatables/jquery.dataTables.min.js';
            $this->template->scripts[] = 'canvas/js/plugins/datatables/DT_bootstrap.js';
            $this->template->scripts[] = 'canvas/js/plugins/datatables/placetb.js';
            
            $submenu = Widget::load('adminmenuproducts');
            $this->template->block_left = array($submenu);
            $this->template->page_title = 'Категории';
           
    }

    public function action_index() {
        $categories = ORM::factory('category')->order_by('title')->find_all();
        
        $content = View::factory('admin/categories/v_cat_index',
                array(
                    'categories' => $categories,
                ));

        // Вывод в шаблон
        
        $this->template->block_center = array($content);
       
        
    }
    
    public function action_add(){
       
       
        
        if (isset($_POST['submit']))
        {
            $_POST['title'] = Security::xss_clean( $_POST['title']);
            
            
            
            $data = Arr::extract($_POST, array('title'));
            $categories = ORM::factory('category');
            $categories->values($data);
        

         try {
                $categories->save();
                $this->request->redirect('admin/categories');
            }
            catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            }

      }
        


        $content = View::factory('admin/categories/v_cat_add')
                 ->bind('errors', $errors)
                 ->bind('data', $data)
                 
                 ;

        $this->template->page_title .= ' :: Добавить';
        $this->template->block_center = array($content);
        
    }
    public function action_edit(){
        
          
       
         $id = (int) $this->request->param('id');

        $categories = ORM::factory('category', $id);
        if(!$categories->loaded()){
            $this->request->redirect('admin/categories');
        }
          $data = $categories->as_array();   
       
        if (isset($_POST['submit'])) {
            $_POST['title'] = Security::xss_clean( $_POST['title']);
            
            
            
            $data = Arr::extract($_POST, array('title'));
            
            $categories->values($data);
            
            try {
           
            $categories->save(); 
            $this->request->redirect('admin/categories');
            }  
          catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            } 
           
        }
        
        $content = View::factory('admin/categories/v_cat_edit')
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
        $categories = ORM::factory('category', $id);

        if(!$categories->loaded()) {
            $this->request->redirect('admin/categories');
        }

        $categories->delete();
        $this->request->redirect('admin/categories');  
        
    }
}