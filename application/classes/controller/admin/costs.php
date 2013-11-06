<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Продукты
 */
class Controller_Admin_Costs extends Controller_Admin {
    public function before() {
        parent::before();
        
            $submenu = Widget::load('adminmenuproducts');
            $this->template->block_left = array($submenu);
            $this->template->page_title = 'Цены';
           
    }

    public function action_index() {
        $areas = ORM::factory('area')->order_by('title')->find_all();
        
        $content = View::factory('admin/areas/v_area_index',
                array(
                    'areas' => $areas,
                ));

        // Вывод в шаблон
        
        $this->template->block_center = array($content);
       
        
    }
    
    public function action_add(){
       $id = (int) $this->request->param('id');

      $playbill = ORM::factory('playbill', $id);
      $costs = $playbill->costs->find_all();
      
       $areas = ORM::factory('area')->find_all()->as_array();
        
       $area = array();
       foreach($areas as $area){
           $aarea[$area->id] = $area->title;
       }
        if (isset($_POST['submit']))
        {
            $_POST['price'] = Security::xss_clean( $_POST['price']);
            
            
            
            $data = Arr::extract($_POST, array('sector', 'price', 'playbill_id'));
            $cost = ORM::factory('cost');
            $cost->values($data);
        

         try {
                $cost->save();
                $this->request->redirect('admin/costs/add/'. $id);
            }
            catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            }

      }
        


        $content = View::factory('admin/costs/v_cost_add')
                 ->bind('errors', $errors)
                 ->bind('data', $data)
                 ->bind('playbill', $playbill)
                 ->bind('id', $id)
                 ->bind('aarea', $aarea)
                 ->bind('costs', $costs)
                 
                 ;

        $this->template->page_title .= ' :: Добавить ';
        $this->template->block_center = array($content);
        
    }
    public function action_edit(){
        
          
       
         $id = (int) $this->request->param('id');

        $cost = ORM::factory('cost', $id);
        if(!$cost->loaded()){
            $this->request->redirect('admin/playbill');
        }
          $playbill = $cost->playbill;
           $areas = ORM::factory('area')->find_all()->as_array();
        
       $area = array();
       foreach($areas as $area){
           $aarea[$area->id] = $area->title;
       }
          $data = $cost->as_array();   
       
        if (isset($_POST['submit'])) {
            $_POST['price'] = Security::xss_clean( $_POST['price']);
            
            
            $data = Arr::extract($_POST, array('sector', 'price', 'playbill_id'));
            $cost = ORM::factory('cost');
            $cost->values($data);
        
            
            try {
           
            $cost->save(); 
            $this->request->redirect('admin/playbill/edit/'.$playbill->id);
            }  
          catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            } 
           
        }
        
        $content = View::factory('admin/costs/v_cost_edit')
                ->bind('id', $id)
                ->bind('errors', $errors)
                ->bind('data', $data)
                ->bind('playbill', $playbill)
                ->bind('aarea', $aarea)
                
                ;

        // Вывод в шаблон
        $this->template->block_center = array($content);
        $this->template->page_title .= ' :: Редактировать';
        
    }
    
    public function action_delete(){
        
        $id = (int) $this->request->param('id');
        $cost = ORM::factory('cost', $id);
       
        $playbill=$cost->playbill;
      if(!$cost->loaded()) {
        $this->request->redirect('admin/playbill');
      }

        $cost->delete();
        $this->request->redirect('admin/playbill/edit/'.$playbill->id);  
        
    }
}