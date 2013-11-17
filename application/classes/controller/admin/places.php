<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Продукты
 */
class Controller_Admin_Places extends Controller_Admin {
    public function before() {
        parent::before();
        
            $submenu = Widget::load('adminmenuproducts');
            $this->template->block_left = array($submenu);
            $this->template->page_title = 'Площадка';
           
    }

    public function action_index() {
       $places = ORM::factory('place')->order_by('title')->
               find_all();
        
        $content = View::factory('admin/places/v_places_index', array(
                    'places' => $places,
                )
                );

        // Вывод в шаблон
        $this->template->page_title = 'Площадки';
        $this->template->block_center = array($content);
       
        
    }
    
//    public function action_add(){
//        
//        
//        if (isset($_POST['submit']))
//        {
//            $_POST['title'] = Security::xss_clean( $_POST['title']);
//            $_POST['description'] = Security::xss_clean( $_POST['description']);
//            $_POST['adress'] = Security::xss_clean( $_POST['adress']);
//            
//          
//            $data = Arr::merge($_POST, array('title', 'description', 'adress'));
//            
//            $place = ORM::factory('place');
//            $place->values($data);
//             $save_errors=$place->save_data($_FILES);
//      if($save_errors){
//       
//        $errors=$save_errors;
//      }else{
//        $this->request->redirect('admin/places/');
//      }
//           
//       $filename = $this->_save_image($_FILES['image']);
//                 
//                 
//
//         try { 
//             
//                $place->save();
//              // Работа с изображениями
//                  
//            
//        
//           
//
//            
//        
//                
//                    // Запись в БД
//                        $im_db = ORM::factory('place', $place->pk());
//                        
//                        $im_db->image = $filename;
//                        $im_db->save();
//       
//                        $this->request->redirect('admin/places');
//        
//                
//         }
//         
//            catch (ORM_Validation_Exception $e) {
//               
//                $errors = $e->errors('validation');
//                
//            
//        }
//
//      }
//        
//
//
//        $content = View::factory('admin/places/v_place_add')
//                 ->bind('errors', $errors)
//                 ->bind('data', $data)
//                 ->bind('place', $place)
//                
//                 
//                 
//                 ;
//
//         $this->template->page_title .= ' :: Добавить';
//        $this->template->block_center = array($content);
//        
//    }
    public function action_add() {
    $content = View::factory('admin/places/v_place_add')
      ->bind('data', $post)
      ->bind('errors', $errors)
      ->bind('place', $place)
            
            ;
     $this->template->page_title .= ' :: Добавить';
     $this->template->block_center = array($content);
     
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST) && empty($_FILES) && $_SERVER['CONTENT_LENGTH'] > 0 )
      $errors=array('image'=>__('Image is too big'));
    
    if(isset($_POST['submit'])){
      $place=ORM::factory('place');
      $save_errors=$place->save_data($_POST,$_FILES);
      if($save_errors){
        $post=$_POST;
        $errors=$save_errors;
      }else{
       $this->request->redirect('admin/places');
      }
    }
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
    
        protected function _save_image($image)
    {
       
       
        if (
            ! Upload::valid($image) OR
            ! Upload::not_empty($image) OR
            ! Upload::type($image, array('jpg', 'jpeg', 'png', 'gif','JPG',)))
        {
            return FALSE;
        }
 
        $directory = DOCROOT.'media/uploads/places/';
 
        if ($file = Upload::save($image, NULL, $directory))
        {
            $filename = strtolower(Text::random('alnum', 20)).'.jpg';
 
             $im = Image::factory($file);
             if($im->width > 150)
                {
                    $im->resize(150);
                }
            $im->save($directory.'small_'.$filename);

            $im = Image::factory($file);
          
            $im
            ->resize(600, 800, Image::AUTO)
            ->save($directory.$filename);

 
            // Delete the temporary file
            unlink($file);
            
               
 
            return $filename;
        }
 
        return FALSE;
    }
 
    
    
   public function action_delete(){
        $id = (int) $this->request->param('id');
        $place = ORM::factory('place', $id);
      
        if(!$place->loaded()) {
            $this->request->redirect('admin/places');
        }
        if (file_exists('media/uploads/places/'.$place->image) and file_exists('media/uploads/places/'.'small_' .$place->image))
        {
        unlink('media/uploads/places/'.$place->image);
        unlink('media/uploads/places/'.'small_' .$place->image);
        }
        
        $place->delete();
        $this->request->redirect('admin/places');
    }
        
   
    
    
}