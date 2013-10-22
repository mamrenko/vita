<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Продукты
 */
class Controller_Admin_Playbill extends Controller_Admin {
    public function before() {
        parent::before();
        
            $submenu = Widget::load('adminmenuproducts');
            $this->template->block_left = array($submenu);
           
    }

    public function action_index() {
        $playbills = ORM::factory('playbill')->find_all();
        
        $content = View::factory('admin/playbill/v_playbill_index',
                array(
                    'playbills' => $playbills,
                ));

        // Вывод в шаблон
        $this->template->page_title = 'Мероприятия';
        $this->template->block_center = array($content);
       
        
    }
    
    public function action_add(){
        //Получение  Площадок
        $places = ORM::factory('place')->find_all()->as_array();
        

        
        
        if (isset($_POST['submit']))
        {
            // Работа с товаром
            $data = Arr::extract($_POST, array('title', 'description', 'meta keywords', 
                'meta description', 'place_id', 'start'));
            $playbill = ORM::factory('playbill');
            $playbill->values($data);
        

         try {
                $playbill->save();
               
           
             $this->request->redirect('admin/playbill/edit/' . $playbill->pk());
            }
            catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            }

      }
        


        $content = View::factory('admin/playbill/v_playbill_add')
                 ->bind('errors', $errors)
                 ->bind('data', $data)
                 ->bind('places', $places);

        $this->template->page_title = 'Мероприятия  :: Добавить';
        $this->template->block_center = array($content);
        
    }
    public function action_edit(){
        
        $content = View::factory('admin/playbill/v_playbill_edit');
        $this->template->page_title = 'Мероприятия  :: Редактировать';
        $this->template->block_center = array($content);
        
    }
    
    public function action_delete(){
        
        
        
    }
}