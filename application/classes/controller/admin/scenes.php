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
        $id = (int) $this->request->param('id');
        $place = ORM::factory('place', $id);
        if(!$id){
                 $this->request->redirect('admin/places');
             }
        
        if (isset($_POST['submit']))
        {
            $_POST['title'] = Security::xss_clean( $_POST['title']);
            
            
            $data = Arr::extract($_POST, array('title',  'place_id', 
               ));
            $scene = ORM::factory('scene');
            $scene->values($data);
        

         try {
                $scene->save();
                $this->request->redirect('admin/scenes/list/'. $id);
            }
            catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            }

      }
        


        $content = View::factory('admin/scenes/v_scene_add')
                 ->bind('errors', $errors)
                 ->bind('data', $data)
                ->bind('id', $id)
                ->bind('place', $place)
                 ;

         $this->template->page_title .= ' :: Добавить';
        $this->template->block_center = array($content);
        
    }
    public function action_edit(){
        
        $id = (int) $this->request->param('id');

        $scene = ORM::factory('scene', $id);
        $place = $scene->place;
        if(!$scene->loaded()){
            $this->request->redirect('admin/places');
        }
          $data = $scene->as_array();   
       
        if (isset($_POST['submit'])) {
            $_POST['title'] = Security::xss_clean( $_POST['title']);
            
            $data = Arr::extract($_POST, array('title', 'place_id'));
            
            $scene->values($data);
            
            try {
           
            $scene->save(); 
            $this->request->redirect('admin/scenes/list/'. $scene->place_id);
            }  
          catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            } 
           
        }
        
        $content = View::factory('admin/scenes/v_scene_edit')
                ->bind('id', $id)
                ->bind('errors', $errors)
                ->bind('data', $data)
                ->bind('scene', $scene)
                ;

        // Вывод в шаблон
        $this->template->block_center = array($content);
        $this->template->page_title .= ' :: Редактировать';
        
    }
    
    public function action_delete(){
        $id = (int) $this->request->param('id');
        $scene = ORM::factory('scene', $id);
        $place = $scene->place;
        if(!$scene->loaded()) {
            $this->request->redirect('admin/scenes/list/'. $place->id);
        }

        $scene->delete();
        $this->request->redirect('admin/scenes/list/'. $place->id);
    
    }
        
   
}