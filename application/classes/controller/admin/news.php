<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_News extends Controller_Admin {

    public function before() {
        parent::before();
            $this->template->styles[] = 'canvas/js/plugins/datepicker/datepicker.css';
            
            
            
            
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
            $_POST['day'] = date('Y-m-d', strtotime( $_POST['day']));
            $data = Arr::extract($_POST, array('title', 'content', 'day'));
            
            $news->values($data);
            
            try {
           
            $news->save(); 
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
                ;

        // Вывод в шаблон
        $this->template->block_center = array($content);
        $this->template->page_title .= ' :: Редактировать';
    }

    public function action_add() {
       if (isset($_POST['submit'])) {
            $_POST['content'] = Security::xss_clean( $_POST['content']);
            $_POST['title'] = Security::xss_clean( $_POST['title']);
            $_POST['day'] = date('Y-m-d', strtotime( $_POST['day']));
            $data = Arr::extract($_POST, array('title',  'content', 'day'));
            $news = ORM::factory('new');
            $news->values($data);

            try {
                $news->save();
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

        $pages->delete();
        $this->request->redirect('admin/news');
    }
}
