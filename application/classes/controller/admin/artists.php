<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Продукты
 */
class Controller_Admin_Artists extends Controller_Admin {
    public function before() {
        parent::before();
            $this->template->styles [] = 'canvas/js/plugins/fileupload/bootstrap-fileupload.css';
            
            
            
            
           // $this->template->scripts[] = 'media/js/jquery.MultiFile.pack.js';
            //$this->template->scripts[] = 'media/js/upload.js';
        
             
           
            
            $this->template->scripts[] = 'canvas/js/plugins/datatables/jquery.dataTables.min.js';
            $this->template->scripts[] = 'canvas/js/plugins/datatables/DT_bootstrap.js';
            $this->template->scripts[] = 'canvas/js/plugins/datatables/placetb.js';
            
            $this->template->scripts[] = 'canvas/js/plugins/fileupload/bootstrap-fileupload.js';
            
            
            $submenu = Widget::load('adminmenuproducts');
            $this->template->block_left = array($submenu);
            $this->template->page_title = 'Артисты';
           
    }

    public function action_index() {
       $places = ORM::factory('place')->order_by('title')->
               find_all();
        
        $content = View::factory('admin/artists/v_artist_index', array(
                    'places' => $places,
                )
                );

        // Вывод в шаблон
        $this->template->page_title = 'Артисты';
        $this->template->block_center = array($content);
       
        
    }
    
    
    public function action_list() {
      $id = abs((int) $this->request->param('id'));

        $place = ORM::factory('place', $id);
        
         $artists = $place->artists->find_all();
        $content = View::factory('admin/artists/v_artist_list')
                ->bind('errors', $errors)
                ->bind('place', $place)
                ->bind('artists', $artists)
              ;

        // Вывод в шаблон
        $this->template->page_title =  ' Труппа '.$place->title. ' Артисты';
        $this->template->block_center = array($content);
       
        
    }
    
    
    public function action_add(){
        
         $id = abs((int) $this->request->param('id'));

        $place = ORM::factory('place', $id);
        
        
        if (isset($_POST['submit']))
        {
            $_POST['title'] = Security::xss_clean( $_POST['name']);
            $_POST['description'] = Security::xss_clean( $_POST['description']);
            $_POST['place_id'] = Security::xss_clean( $_POST['place_id']);
            
            $data = Arr::extract($_POST, array('name', 'description','place_id' 
               ));
            
            $artist = ORM::factory('artist');
            $artist->values($data);
           

         try {
                $artist->save();
              // Работа с изображениями
            
                    if (!empty($_FILES['image']['name'][0]))
                {
                 $image =   $_FILES['image']['tmp_name'];
                    
                        $filename = $this->_upload_img($image);
         
                
                       
                    // Запись в БД
                        $im_db = ORM::factory('artist', $artist->pk());
                        
                        $im_db->image = $filename;
                        $im_db->save();
                      
                
            }
              $this->request->redirect('admin/artists/list/'.$artist->place_id); 
         }
            catch (ORM_Validation_Exception $e) {
               
                $errors = $e->errors('validation');
               
                
            }
 

      }
        


        $content = View::factory('admin/artists/v_artist_add')
                 ->bind('errors', $errors)
                 ->bind('data', $data)
                 ->bind('place', $place)
                 ->bind('id', $id)
                
                 
                 
                 ;

         $this->template->page_title .= ' :: Добавить';
        $this->template->block_center = array($content);
        
    }
    public function action_edit(){
        
        $id = abs((int)$this->request->param('id')) ;

        $artist = ORM::factory('artist', $id);
        if(!$artist->loaded()){
            $this->request->redirect('admin/artists');
        }
          $data = $artist->as_array();   
       
        if (isset($_POST['submit'])) {
            $_POST['name'] = Security::xss_clean( $_POST['name']);
            $_POST['description'] = Security::xss_clean( $_POST['description']);
            $_POST['place_id'] = Security::xss_clean( $_POST['place_id']);
            $data = Arr::extract($_POST, array('name', 'description', 'place_id'));
            
            $artist->values($data);
            
            try {
           
            $artist->save();
            
            // Работа с изображениями
            
                    if (!empty($_FILES['image']['name'][0]))
                {
                 $image =   $_FILES['image']['tmp_name'];
                    
               if($artist->image != NULL) {        
                        
                       if(file_exists('media/uploads/artists/'.$artist->image))
        {  
                           
                          
                       unlink('media/uploads/artists/'.$artist->image);
       
        }
               }       
                       $filename = $this->_upload_img($image);
                    // Запись в БД
                        $im_db = ORM::factory('artist', $artist->pk());
                        
                        $im_db->image = $filename;
                        $im_db->save();
                      
                
            }
            $this->request->redirect('admin/artists/list/'.$artist->place_id);
            }  
          catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            } 
           
        }
        
        $content = View::factory('admin/artists/v_artist_edit')
                ->bind('id', $id)
                ->bind('errors', $errors)
                ->bind('data', $data)
                ->bind('artist', $artist)
                ;

        // Вывод в шаблон
        $this->template->block_center = array($content);
        $this->template->page_title .= ' :: Редактировать';
        
    }
    
    public function action_delete(){
        $id = abs((int) $this->request->param('id'));
        $artist = ORM::factory('artist', $id);
        $place = $artist->place;
        if(!$artist->loaded()) {
            $this->request->redirect('admin/artists');
        }
        
        if($artist->image != NULL){

        if(file_exists('media/uploads/artists/'.  $artist->image))
        {  
        unlink('media/uploads/artists/'.$artist->image);
       
        }
        }
        $artist->delete();
        $this->request->redirect('admin/artists/list/'.$place->id);
    }
        
   
    
     
    
    
     public function _upload_img($file, $ext = NULL, $directory = NULL){

        if($directory == NULL)
        {
            $directory = 'media/uploads/artists/';
        }

        if($ext== NULL)
        {
            $ext= 'jpg';
        }

        // Генерируем случайное название
        $filename = strtolower(Text::random('alnum', 20));

        // Изменение размера и загрузка изображения
 //       $im = Image::factory($file);
  //      $mark = image::factory('media/images/watermark10023.png');
//        if($im->width > 150)
//        {
//            $im->resize(150, 150, Image::AUTO);
//                    
//            
//        }
//        $im->watermark($mark,TRUE, TRUE);
//        $im->save("$directory/small_$filename.$ext");

        $im = Image::factory($file);
        $im
            ->resize(200, 200, Image::AUTO)
          //  ->watermark($mark,TRUE, TRUE)
            ->save("$directory/$filename.$ext");
       
           
            
            

        return "$filename.$ext";
    }
}