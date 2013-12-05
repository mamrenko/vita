<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Продукты
 */
class Controller_Admin_carousels extends Controller_Admin {
    public function before() {
        parent::before();
             $this->template->styles[] = 'canvas/js/plugins/select2/select2.css';
             $this->template->styles[] = 'canvas/js/plugins/datepicker/datepicker.css';
             
            //$this->template->scripts[] = 'media/js/jquery-1.6.2.min.js';
            $this->template->scripts[] = 'media/js/jquery.MultiFile.pack.js';
            $this->template->scripts[] = 'media/js/upload.js';
            
            $this->template->scripts[] = 'canvas/js/plugins/datatables/jquery.dataTables.min.js';
            $this->template->scripts[] = 'canvas/js/plugins/datatables/DT_bootstrap.js';
            $this->template->scripts[] = 'canvas/js/plugins/datatables/placetb.js';
           
            $this->template->scripts[] = 'canvas/js/plugins/datepicker/bootstrap-datepicker.js';
            $this->template->scripts[] = 'canvas/js/plugins/datepicker/bootstrap-datepicker.ru.js';
            $this->template->scripts[] = 'canvas/js/plugins/select2/select2.js';
            $this->template->scripts[] = 'canvas/js/demos/form-extended.js';
            
            
             
            

            $submenu = Widget::load('adminmenuproducts');
            $this->template->block_left = array($submenu);
            $this->template->page_title = 'Карусел на Главной странице';
           
    }

    public function action_index() {
        $carousels = ORM::factory('carousel')->order_by('title')->find_all();
        
        $content = View::factory('admin/carousels/v_carousel_index',
                array(
                    'carousels' => $carousels,
                ));

        // Вывод в шаблон
        
        $this->template->block_center = array($content);
       
        
    }
    
    public function action_add(){
       
       
        
        if (isset($_POST['submit']))
        {
            $_POST['title'] = Security::xss_clean( $_POST['title']);
            $_POST['description'] = Security::xss_clean( $_POST['description']);
            $_POST['link'] = Security::xss_clean( $_POST['link']);
            $_POST['day'] = date('Y-m-d', strtotime( $_POST['day']));
            
            
            $data = Arr::extract($_POST, array(
                'title', 
                'description',
                'label',
                'day',
                'link',
                ));
            $carousel = ORM::factory('carousel');
            $carousel->values($data);
        

         try {
                $carousel->save();
                // Работа с изображениями
            
                    if (!empty($_FILES['image']['name'][0]))
                {
                 $image =   $_FILES['image']['tmp_name'];
                    
                        $filename = $this->_upload_img($image);
         
                
                       
                    // Запись в БД
                        $im_db = ORM::factory('carousel', $carousel->pk());
                        
                        $im_db->image = $filename;
                        $im_db->save();
                      
                
            }
                
                $this->request->redirect('admin/carousels');
            }
            catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            }

      }
        


        $content = View::factory('admin/carousels/v_carousel_add')
                 ->bind('errors', $errors)
                 ->bind('data', $data)
                 
                 ;

        $this->template->page_title .= ' :: Добавить';
        $this->template->block_center = array($content);
        
    }
    public function action_edit(){
        
          
       
         $id = (int) $this->request->param('id');

        $carousel = ORM::factory('carousel', $id);
        if(!$carousel->loaded()){
            $this->request->redirect('admin/carousels');
        }
          $data = $carousel->as_array();   
          $data['day'] = date('d-m-Y', strtotime($data['day']));
        if (isset($_POST['submit'])) {
            $_POST['title'] = Security::xss_clean( $_POST['title']);
            $_POST['description'] = Security::xss_clean( $_POST['description']);
             $_POST['day'] = Security::xss_clean( $_POST['day']);
             $_POST['day'] = date('Y-m-d', strtotime( $_POST['day']));
            
            $data = Arr::extract($_POST, array(
                'title',
                'description',
                'label',
                'day',
                'link',
                ));
            
            $carousel->values($data);
            
            try {
           
            $carousel->save();
            
            // Работа с изображениями
            
                    if (!empty($_FILES['image']['name'][0]))
                {
                 $image =   $_FILES['image']['tmp_name'];
                    
                        $filename = $this->_upload_img($image);
                        
                        if (file_exists('media/uploads/carousels/'.$carousel->image) and file_exists('media/uploads/carousels/'.'small_' .$carousel->image))
                      {
                      unlink('media/uploads/carousels/'.$carousel->image);
                      unlink('media/uploads/carousels/'.'small_' .$carousel->image);
                      }
                
                       
                    // Запись в БД
                        $im_db = ORM::factory('carousel', $carousel->pk());
                        
                        $im_db->image = $filename;
                        $im_db->save();
                      
                
            }
            $this->request->redirect('admin/carousels');
            }  
          catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            } 
           
        }
        
        $content = View::factory('admin/carousels/v_carousel_edit')
                ->bind('id', $id)
                ->bind('errors', $errors)
                ->bind('data', $data)
                ->bind('carousel', $carousel)
                ;

        // Вывод в шаблон
        $this->template->block_center = array($content);
        $this->template->page_title .= ' :: Редактировать';
        
    }
    
    public function action_delete(){
        
        $id = (int) $this->request->param('id');
        $carousel = ORM::factory('carousel', $id);

        if(!$carousel->loaded()) {
            $this->request->redirect('admin/carousels');
        }
        if (file_exists('media/uploads/carousels/'.$carousel->image) and file_exists('media/uploads/carousels/'.'small_' .$carousel->image))
        {
        unlink('media/uploads/carousels/'.$carousel->image);
        unlink('media/uploads/carousels/'.'small_' .$carousel->image);
        }
        $carousel->delete();
        $this->request->redirect('admin/carousels');  
        
    }
    public function _upload_img($file, $ext = NULL, $directory = NULL){

        if($directory == NULL)
        {
            $directory = 'media/uploads/carousels/';
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
            ->resize(600, 300, IMAGE::NONE)
            ->watermark($mark,TRUE, TRUE)
            ->save("$directory/$filename.$ext");
       
           
            
            

        return "$filename.$ext";
    }
}