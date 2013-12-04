<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Продукты
 */
class Controller_Admin_Places extends Controller_Admin {
    public function before() {
        parent::before();
           
            $this->template->scripts[] = 'media/js/jquery.MultiFile.pack.js';
            $this->template->scripts[] = 'media/js/upload.js';
        
             
           
            
            $this->template->scripts[] = 'canvas/js/plugins/datatables/jquery.dataTables.min.js';
            $this->template->scripts[] = 'canvas/js/plugins/datatables/DT_bootstrap.js';
            $this->template->scripts[] = 'canvas/js/plugins/datatables/placetb.js';
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
              // Работа с изображениями
            
                    if (!empty($_FILES['image']['name'][0]))
                {
                 $image =   $_FILES['image']['tmp_name'];
                    
                        $filename = $this->_upload_img($image);
         
                
                       
                    // Запись в БД
                        $im_db = ORM::factory('place', $place->pk());
                        
                        $im_db->image = $filename;
                        $im_db->save();
                      
                
            }
              $this->request->redirect('admin/places'); 
         }
            catch (ORM_Validation_Exception $e) {
               
                $errors = $e->errors('validation');
               
                
            }
 

      }
        


        $content = View::factory('admin/places/v_place_add')
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
            
            // Работа с изображениями
            
                    if (!empty($_FILES['image']['name'][0]))
                {
                 $image =   $_FILES['image']['tmp_name'];
                    
                        $filename = $this->_upload_img($image);
                        
                        if (file_exists('media/uploads/places/'.$place->image) and file_exists('media/uploads/places/'.'small_' .$place->image))
                      {
                      unlink('media/uploads/places/'.$place->image);
                      unlink('media/uploads/places/'.'small_' .$place->image);
                      }
                
                       
                    // Запись в БД
                        $im_db = ORM::factory('place', $place->pk());
                        
                        $im_db->image = $filename;
                        $im_db->save();
                      
                
            }
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
                ->bind('place', $place)
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
        if (file_exists('media/uploads/places/'.$place->image) and file_exists('media/uploads/places/'.'small_' .$place->image))
        {
        unlink('media/uploads/places/'.$place->image);
        unlink('media/uploads/places/'.'small_' .$place->image);
        }
        
        $place->delete();
        $this->request->redirect('admin/places');
    }
        
   
    
     
    
    
     public function _upload_img($file, $ext = NULL, $directory = NULL){

        if($directory == NULL)
        {
            $directory = 'media/uploads/places/';
        }

        if($ext== NULL)
        {
            $ext= 'jpg';
        }

        // Генерируем случайное название
        $filename = strtolower(Text::random('alnum', 20));

        // Изменение размера и загрузка изображения
        $im = Image::factory($file);
        $mark = image::factory('media/images/watermark10023.png');
        if($im->width > 150)
        {
            $im->resize(150, 150, Image::AUTO);
                    
            
        }
        $im->watermark($mark,TRUE, TRUE);
        $im->save("$directory/small_$filename.$ext");

        $im = Image::factory($file);
        $im
            ->resize(200, 200, Image::AUTO)
            ->watermark($mark,TRUE, TRUE)
            ->save("$directory/$filename.$ext");
       
           
            
            

        return "$filename.$ext";
    }
}