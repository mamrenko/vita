<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Продукты
 */
class Controller_Admin_Playbill extends Controller_Admin {
    public function before() {
        parent::before();
        
            $submenu = Widget::load('adminmenuproducts');
            $this->template->block_left = array($submenu);
            $this->template->page_title = 'События';
           
    }

    public function action_index() {
        $playbills = ORM::factory('playbill')
                ->group_by('place_id')
                ->order_by('place_id')
                ->find_all();
        
        $content = View::factory('admin/playbill/v_playbill_index',
                array(
                    'playbills' => $playbills,
                    
                ));

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
           
        
        $content = View::factory('admin/playbill/v_playbill_list', array(
                    'playbills' => $playbills,
                    'place' => $place,
                    
                )
                );

        // Вывод в шаблон
       
        $this->template->block_center = array($content);
         
        
    }
    public function action_add(){
       $places = ORM::factory('place')->find_all()->as_array();
       $pl = array();
       foreach($places as $pl){
           $pls[$pl->id] = $pl->title;
       }
       
        
        if (isset($_POST['submit']))
        {
            $_POST['title'] = Security::xss_clean( $_POST['title']);
            $_POST['description'] = Security::xss_clean( $_POST['description']);
            
            $_POST['meta_title'] = Security::xss_clean( $_POST['meta_title']);
            $_POST['meta_keywords'] = Security::xss_clean( $_POST['meta_keywords']);
            $_POST['meta_description'] = Security::xss_clean( $_POST['meta_description']);
            
            
            $data = Arr::extract($_POST, array('title', 'description','meta_title', 'meta_keywords', 
                'meta_description', 'place_id', 'start'));
            $playbill = ORM::factory('playbill');
            $playbill->values($data);
        

         try {
                $playbill->save();
                $this->request->redirect('admin/playbill');
            }
            catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            }

      }
        


        $content = View::factory('admin/playbill/v_playbill_add')
                 ->bind('errors', $errors)
                 ->bind('data', $data)
                 ->bind('pls', $pls)
                 ;

        $this->template->page_title .= ' :: Добавить';
        $this->template->block_center = array($content);
        
    }
    public function action_edit(){
        
         
       
         $id = (int) $this->request->param('id');

        $playbill = ORM::factory('playbill', $id);
        $events = $playbill->events;
        if(!$playbill->loaded()){
            $this->request->redirect('admin/playbill');
        }
          
       
        
        
        $content = View::factory('admin/playbill/v_playbill_edit')
                ->bind('id', $id)
                ->bind('playbill', $playbill)
                ->bind('events', $events)
                
                ;

        // Вывод в шаблон
        $this->template->block_center = array($content);
        //$this->template->page_title = $playbill->title . '<br /> Площадка: '.$playbill->place->title;
        
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