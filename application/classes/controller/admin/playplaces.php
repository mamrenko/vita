<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Продукты
 */
class Controller_Admin_Playplaces extends Controller_Admin {
    public function before() {
        parent::before();
            $this->template->scripts[] = 'media/js/jquery.MultiFile.pack.js';
            $this->template->scripts[] = 'media/js/upload.js';
            
            $this->template->scripts[] = 'canvas/js/plugins/datatables/jquery.dataTables.min.js';
            $this->template->scripts[] = 'canvas/js/plugins/datatables/DT_bootstrap.js';
            $this->template->scripts[] = 'canvas/js/plugins/datatables/placetb.js';
        
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
        
        if(!$id){
                 $this->request->redirect('admin/playplaces');
             }

        $scenes = $place->scenes->find_all()->as_array();
        
        $scn = array();
        foreach ($scenes as $scn){
            $scene[$scn->id] = $scn->title;
        }
   
        $starts = ORM::factory('start')->find_all()->as_array();
        $str = array();
       foreach($starts as $str){
           $start[$str->id] = $str->start;
       }
       
        if (isset($_POST['submit']))
        {
            $_POST['title'] = Security::xss_clean( $_POST['title']);
            $_POST['description'] = Security::xss_clean( $_POST['description']);
            $_POST['meta_title'] = Security::xss_clean( $_POST['meta_title']);
            $_POST['meta_keywords'] = Security::xss_clean( $_POST['meta_keywords']);
            $_POST['meta_description'] = Security::xss_clean( $_POST['meta_description']);
            
            
            $data = Arr::extract($_POST, array('title', 'description','meta_title', 'meta_keywords', 
                'meta_description', 'place_id', 'scene_id', 'start'));
            $playbill = ORM::factory('playbill');
            $playbill->values($data);
          

         try {
                $playbill->save();
                 if (!empty($_FILES['image']['name'][0]))
                {
                 $image =   $_FILES['image']['tmp_name'];
                    
                        $filename = $this->_upload_img($image);
         
                
                       
                    // Запись в БД
                        $im_db = ORM::factory('playbill', $playbill->pk());
                        
                        $im_db->image = $filename;
                        $im_db->save();
                }
                
                $this->request->redirect('admin/playplaces/list/' . $id);
            }
            catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            }

      }
        


        $content = View::factory('admin/playplaces/v_playplaces_add')
                 ->bind('errors', $errors)
                 ->bind('data', $data)
                 ->bind('id', $id)
                 ->bind('place', $place)
                 ->bind('start', $start)
                 ->bind('scene', $scene)
                 ;

        $this->template->page_title .= ' :: Добавить';
        $this->template->block_center = array($content);
        
    }
    public function action_edit(){
        
        $id = (int) $this->request->param('id');
        
        $starts = ORM::factory('start')->find_all()->as_array();
        $str = array();
       foreach($starts as $str){
           $start[$str->id] = $str->start;
       }
       
        $playbill = ORM::factory('playbill', $id);
        if(!$playbill->loaded()){
         $this->request->redirect('admin/playplaces');
      }
                $scenes = ORM::factory('scene')
                ->where('place_id', '=', $playbill->place_id)
                ->find_all()
                ->as_array();
        
        $scn = array();
        foreach ($scenes as $scn){
            $scene[$scn->id] = $scn->title;
        }
          $data = $playbill->as_array();   
       
        if (isset($_POST['submit'])) {
            $_POST['title'] = Security::xss_clean( $_POST['title']);
            $_POST['description'] = Security::xss_clean( $_POST['description']);
            $_POST['meta_title'] = Security::xss_clean( $_POST['meta_title']);
            $_POST['meta_keywords'] = Security::xss_clean( $_POST['meta_keywords']);
            $_POST['meta_description'] = Security::xss_clean( $_POST['meta_description']);
            
            
            $data = Arr::extract($_POST, array('title', 'description','meta_title', 'meta_keywords', 
                'meta_description', 'place_id','scene_id', 'start'));
           
            $playbill->values($data);
            
            try {
           
           $playbill->save(); 
           
           // Работа с изображениями
            
                    if (!empty($_FILES['image']['name'][0]))
                {
                 $image =   $_FILES['image']['tmp_name'];
                    
                        $filename = $this->_upload_img($image);
                        
                        if (file_exists('media/uploads/playplaces/'.$playbill->image) and file_exists('media/uploads/playplaces/'.'small_' .$playbill->image))
                      {
                      unlink('media/uploads/playplaces/'.$playbill->image);
                      unlink('media/uploads/playplaces/'.'small_' .$playbill->image);
                      }
                
                       
                    // Запись в БД
                        $im_db = ORM::factory('playbill', $playbill->pk());
                        
                        $im_db->image = $filename;
                        $im_db->save();
                      
                
            }
           
            $this->request->redirect('admin/playplaces/list/'.$playbill->place_id);
            }  
          catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            } 
           
        }
        
        $content = View::factory('admin/playplaces/v_playplaces_edit')
                ->bind('id', $id)
                ->bind('errors', $errors)
                ->bind('data', $data)
                ->bind('playbill', $playbill)
                ->bind('start', $start)
                ->bind('scene', $scene)        
                ;

        // Вывод в шаблон
        $this->template->block_center = array($content);
        $this->template->page_title .= ' :: Редактировать';
        
    }
    
    public function action_delete(){
        $id = (int) $this->request->param('id');
        $playbill = ORM::factory('playbill', $id);
        $place = $playbill->place;
        if(!$playbill->loaded()) {
            $this->request->redirect('admin/playplaces/list/'. $place->id);
        }
        if (file_exists('media/uploads/playplaces/'.$playbill->image) and file_exists('media/uploads/playplaces/'.'small_' .$playbill->image))
        {
        unlink('media/uploads/playplaces/'.$playbill->image);
        unlink('media/uploads/playplaces/'.'small_' .$playbill->image);
        }
        $playbill->delete();
        $this->request->redirect('admin/playplaces/list/'. $place->id);
    }
        
   public function _upload_img($file, $ext = NULL, $directory = NULL){

        if($directory == NULL)
        {
            $directory = 'media/uploads/playplaces/';
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
            ->resize(400, 600, Image::AUTO)
            ->watermark($mark,TRUE, TRUE)
            ->save("$directory/$filename.$ext");
       
           
            
            

        return "$filename.$ext";
    }
}