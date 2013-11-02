<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Продукты
 */
class Controller_Admin_Scenes extends Controller_Admin {
    public function before() {
        parent::before();
        
            $submenu = Widget::load('adminmenuproducts');
            $this->template->block_left = array($submenu);
            $this->template->page_title = 'Сцены';
           
    }

    public function action_list() {
        $id = (int) $this->request->param('id');

        $place = ORM::factory('place', $id);
        if(!$place->loaded()){
            $this->request->redirect('admin/places');
        }
      $scenes = $place->scenes->find_all();
      
        
        $content = View::factory('admin/scenes/v_scenes_list')
                   
                    ->bind('place', $place) 
                    ->bind('scenes', $scenes)
                    
                ;

        // Вывод в шаблон
        
        $this->template->block_center = array($content);
       
        
    }
    
    public function action_add(){
        
        
        if (isset($_POST['submit']))
        {
            $_POST['title'] = Security::xss_clean( $_POST['title']);
            $_POST['description'] = Security::xss_clean( $_POST['description']);
            $_POST['adress'] = Security::xss_clean( $_POST['adress']);
            
            $data = Arr::extract($_POST, array('title', 'description', 'adress', 
               ));
            $place = ORM::factory('place');
            $place->values($data);
        

         try {
                $place->save();
                $this->request->redirect('admin/places');
            }
            catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            }

      }
        


        $content = View::factory('admin/places/v_place_add')
                 ->bind('errors', $errors)
                 ->bind('data', $data)
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
        $place = ORM::factory('place', $id);

        if(!$place->loaded()) {
            $this->request->redirect('admin/places');
        }

        $place->delete();
        $this->request->redirect('admin/places');
    }
        
   
}