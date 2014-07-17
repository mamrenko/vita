<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Новости
 */
class Controller_Index_News extends Controller_Index {

    public function before() {
        parent::before();

        // Выводим в шаблон
       // $this->template->block_right = NULL;
       // $this->template->block_left = array($menu); 
         
    }

    public function action_index() {
        $menu = Widget::load('menu');
        $calendar = Widget::load('calendar');
        $all_news = ORM::factory('new')
                ->where('day','>=', date('Y-m-d'))
                ->find_all();
        $content = View::factory('index/news/v_news_all', array(
            'all_news' => $all_news,
            )
        );
        
        // Выводим в шаблон
        $this->template->page_title = 'Новости';
        $this->template->content_title ='Новости';
        $this->template->block_center = array($content);
        $this->template->block_left = array($calendar,$menu);
    }

    public function action_get() {
         $menu = Widget::load('menu');
         $calendar = Widget::load('calendar');
        $id = (int) $this->request->param('id');

        $news = ORM::factory('new', $id)
                ->where('day','>=', date('Y-m-d'))
                ->order_by('day');

        $content = View::factory('index/news/v_news_one', array(
                'news' => $news,
            ));


        // Выводим в шаблон
        $this->template->page_title ='Новости'.' | ' . $news->title;
        $this->template->content_title = HTML::anchor('news', 'Новости') . " &rarr; ".  $news->title;
        $this->template->block_center = array($content);
        $this->template->block_left = array($calendar,$menu);
         
    }
}
