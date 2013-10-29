<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Продукты
 */
class Controller_Admin_Playplaces extends Controller_Admin {
    public function before() {
        parent::before();
        
            $submenu = Widget::load('adminmenuproducts');
            $this->template->block_left = array($submenu);
            $this->template->page_title = 'Мероприятия по Площадкам ';
           
    }

    public function action_index() {
       $places = ORM::factory('place')
               ->find_all();
             
        
        $content = View::factory('admin/playplaces/v_playplaces_index', array(
                    'places' => $places,
                )
                );

        // Вывод в шаблон
       
        $this->template->block_center = array($content);
       
        
    }
     public function action_list() {
      $id = (int) $this->request->param('id');

      
      $place = ORM::factory('place', $id);
      $playbills = $place->playbills->find_all();
       
//      if(!$playbills->loaded()){
//         $this->request->redirect('admin/playplaces');
//       }
           
        
        $content = View::factory('admin/playplaces/v_playplaces_list', array(
                    'playbills' => $playbills,
                    'place' => $place,
                )
                );

        // Вывод в шаблон
       
        $this->template->block_center = array($content);
         
        
    }
    
    public function action_add(){
        $id = (int) $this->request->param('id');
        $place = ORM::factory('place', $id);
        if (isset($_POST['submit']))
        {
            $_POST['title'] = Security::xss_clean( $_POST['title']);
            $_POST['description'] = Security::xss_clean( $_POST['description']);
            $_POST['meta_keywords'] = Security::xss_clean( $_POST['meta_keywords']);
            $_POST['meta_description'] = Security::xss_clean( $_POST['meta_description']);
            
            
            $data = Arr::extract($_POST, array('title', 'description', 'meta_keywords', 
                'meta_description', 'place_id', 'start'));
            $playbill = ORM::factory('playbill');
            $playbill->values($data);
        

         try {
                $playbill->save();
                $this->request->redirect('admin/playplaces/list/'.$id);
            }
            catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            }

      }
        


        $content = View::factory('admin/playplaces/v_playplaces_add')
                 ->bind('errors', $errors)
                 ->bind('data', $data)
                 ->bind('place', $place)
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