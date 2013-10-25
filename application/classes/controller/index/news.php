<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Новости
 */
class Controller_Index_News extends Controller_Index {

    public function before() {
        parent::before();

        // Выводим в шаблон
       // $this->template->block_right = NULL;
    }

    public function action_index() {
        $all_news = ORM::factory('new')->find_all();
        $content = View::factory('index/news/v_news_all', array(
            'all_news' => $all_news,
            )
        );
        
        // Выводим в шаблон
        $this->template->page_title = 'Новости';
         $this->template->title_content ='Новости';
        $this->template->block_center = array($content);
    }

    public function action_get() {
        $id = (int) $this->request->param('id');

        $news = ORM::factory('new', $id);

        $content = View::factory('index/news/v_news_one', array(
                'news' => $news,
            ));


        // Выводим в шаблон
        $this->template->page_title ='Новости'.' | ' . $news->title;
        $this->template->title_content = HTML::anchor('news', 'Новости') . " &rarr; ".  $news->title;
        $this->template->block_center = array($content);
    }
}
