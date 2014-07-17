<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_News extends Controller_Admin {

    public function before() {
        parent::before();
            $this->template->styles[] = 'canvas/js/plugins/datepicker/datepicker.css';
            
            
            
            $this->template->scripts[] = 'media/js/jquery.MultiFile.pack.js';
            $this->template->scripts[] = 'media/js/upload.js';
            $this->template->scripts[] = 'canvas/js/plugins/datatables/jquery.dataTables.min.js';
            $this->template->scripts[] = 'canvas/js/plugins/datatables/DT_bootstrap.js';
            $this->template->scripts[] = 'canvas/js/plugins/datatables/placetb.js';
            $this->template->scripts[] = 'canvas/js/plugins/datepicker/bootstrap-datepicker.js';
            $this->template->scripts[] = 'canvas/js/plugins/datepicker/bootstrap-datepicker.ru.js';
            $this->template->scripts[] = 'canvas/js/demos/form-extended.js';
            
      $submenu = Widget::load('adminmenupages');
        // Вывод в шаблон
        $this->template->submenu = Widget::load('adminmenupages');
        $this->template->page_title = 'Новости';
        $this->template->block_left = array($submenu);
    }

    public function action_index() {
       
        $all_news = ORM::factory('new')->find_all();
        $content = View::factory('admin/news/v_news_index', array(
            'all_news' => $all_news,
        ));


        // Вывод в шаблон
        $this->template->block_center = array($content);
         
    }


    public function action_edit() {

        $id = (int) $this->request->param('id');

        $news = ORM::factory('new', $id);
        if(!$news->loaded()){
            $this->request->redirect('admin/news');
        }
          $data = $news->as_array();   
          $data['day'] = date('d-m-Y', strtotime($data['day']));
        if (isset($_POST['submit'])) {
            $_POST['content'] = Security::xss_clean( $_POST['content']);
            $_POST['title'] = Security::xss_clean( $_POST['title']);
             $_POST['title'] = mb_convert_case($_POST['title'], MB_CASE_TITLE);
            $_POST['day'] = date('Y-m-d', strtotime( $_POST['day']));
            $data = Arr::extract($_POST, array('title', 'content', 'day'));
            
            $news->values($data);
            
            try {
           
            $news->save(); 
            // Работа с изображениями
            
                    if (!empty($_FILES['image']['name'][0]))
                {
                 $image =   $_FILES['image']['tmp_name'];
                    
                        $filename = $this->_upload_img($image);
                        
                        if (file_exists('media/uploads/news/'.$news->image) and file_exists('media/uploads/news/'.'small_' .$news->image))
                      {
                      unlink('media/uploads/news/'.$news->image);
                      unlink('media/uploads/news/'.'small_' .$news->image);
                      }
                
                       
                    // Запись в БД
                        $im_db = ORM::factory('new', $news->pk());
                        
                        $im_db->image = $filename;
                        $im_db->save();
                      
                
            }
            $this->request->redirect('admin/news');
            }  
          catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            } 
           
        }
        
        $content = View::factory('admin/news/v_news_edit')
                ->bind('id', $id)
                ->bind('errors', $errors)
                ->bind('data', $data)
                ->bind('news', $news)
                ;

        // Вывод в шаблон
        $this->template->block_center = array($content);
        $this->template->page_title .= ' :: Редактировать';
    }

    public function action_add() {
       if (isset($_POST['submit'])) {
            $_POST['content'] = Security::xss_clean( $_POST['content']);
            $_POST['title'] = Security::xss_clean( $_POST['title']);
             $_POST['title'] = mb_convert_case($_POST['title'], MB_CASE_TITLE);
            $_POST['day'] = date('Y-m-d', strtotime( $_POST['day']));
            $data = Arr::extract($_POST, array('title',  'content', 'day'));
            $news = ORM::factory('new');
            $news->values($data);

            try {
                $news->save();
                 if (!empty($_FILES['image']['name'][0]))
                {
                 $image =   $_FILES['image']['tmp_name'];
                    
                        $filename = $this->_upload_img($image);
         
                
                       
                    // Запись в БД
                        $im_db = ORM::factory('new', $news->pk());
                        
                        $im_db->image = $filename;
                        $im_db->save();
                }
                $this->request->redirect('admin/news');
            }
            catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            }
        }

        $content = View::factory('admin/news/v_news_add')
                ->bind('errors', $errors)
                ->bind('data', $data);

        // Вывод в шаблон
        $this->template->page_title .= ':: Добавить';
        $this->template->block_center = array($content);
    }

    public function action_delete() {
        $id = (int) $this->request->param('id');
        $pages = ORM::factory('new', $id);

        if(!$pages->loaded()) {
            $this->request->redirect('admin/news');
        }
         if (file_exists('media/uploads/news/'.$pages->image)
                 and file_exists('media/uploads/news/'.'small_' .$pages->image))
        {
        unlink('media/uploads/news/'.$pages->image);
        unlink('media/uploads/news/'.'small_' .$pages->image);
        }
        $pages->delete();
        $this->request->redirect('admin/news');
    }
    
    public function _upload_img($file, $ext = NULL, $directory = NULL){

        if($directory == NULL)
        {
            $directory = 'media/uploads/news/';
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
            ->resize(300, 200, Image::AUTO)
            ->watermark($mark,TRUE, TRUE)
            ->save("$directory/$filename.$ext");
       
           
            
            

        return "$filename.$ext";
    }
    
}
