<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_News extends Controller_Admin {

    public function before() {
        parent::before();

        // Вывод в шаблон
        $this->template->submenu = Widget::load('menupages');
        $this->template->page_title = 'Новости';
    }

    public function action_index() {
        
        $all_news = Model::factory('news')->get_news();
        $content = View::factory('admin/news/v_news_index', array(
            'all_news' => $all_news,
        ));


        // Вывод в шаблон
        $this->template->block_center = array($content);
    }


    public function action_edit() {

        $id = (int) $this->request->param('id');

        $news = Model::factory('news')->get_one_news($id);
        $content = View::factory('admin/news/v_news_edit', array(
            'news' => $news,
        ));

        if (isset($_POST['submit'])) {

            $news = Arr::extract($_POST, array('title', 'intro', 'content', 'date'));
            Model::factory('news')->update_news($id, $news['title'], $news['intro'], $news['content'], $news['date']);
            $this->request->redirect('admin/news/');
        }

        // Вывод в шаблон
        $this->template->block_center = array($content);
        $this->template->page_title .= ' :: Редактировать';
    }

    public function action_add() {
       
        

        $news = Arr::extract($_POST, array('title', 'content', 'date'));
        
        if (isset($_POST['submit'])) {
            
            $post = Validation::factory($_POST);
            
            $post->rule('title', 'not_empty')
             ->rule('title', 'min_lenght', array(':value', 3))
             ->rule('content', 'not_empty')
             ->rule('content', 'min_lenght', array(':value', 3))
             ->rule('date', 'not_empty')
             ->rule('date', 'date')
              ->labels(array(
                  'title' => 'Название новости',
                  'content' => 'Текст н овости',
                  'date' => 'Дата Ввода новости',
              ))      
                    ;
            
            if ($post->check())
            {
            
            Model::factory('news')->add_news($news['title'],  $news['content'], $news['date']);
            $this->request->redirect('admin/news');
            }
            
            $errors = $post->errors('validation');
        }
        $content = View::factory('admin/news/v_news_add')
                ->bind('errors', $errors)
                ->bind('post', $post);
        
        // Вывод в шаблон
        $this->template->block_center = array($content);
        $this->template->page_title .= ' :: Добавить';
    }

    public function action_delete() {
        $id = (int) $this->request->param('id');

        Model::factory('news')->delete_news($id);
        $this->request->redirect('admin/news');
    }
}
