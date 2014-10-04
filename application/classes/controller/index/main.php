<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Главная страница
 */
class Controller_Index_Main extends Controller_Index {
    public function before() {
        parent::before();
        //Подключаем карусель http://www.owlgraphic.com/owlcarousel/#more-demos
         $this->template->styles[] = 'media/dist/plugins/owl-carousel/owl.carousel.css';
         $this->template->styles[] = 'media/dist/plugins/owl-carousel/owl.theme.css';
         $this->template->styles[] = 'media/dist/plugins/owl-carousel/ownmy.css';
         
         
         
         
         
          //Подключаем карусель http://www.owlgraphic.com/owlcarousel/#more-demos
         $this->template->scripts[] = 'media/dist/plugins/owl-carousel/owl.carousel.js'; 
         $this->template->scripts[] = 'media/dist/plugins/owl-carousel/ownmy.js';
        
         
         
         
        
    }

    
    

    public function action_index() {
        
       // $search = Widget::load('search');
       
        $news = Widget::load('news');
        $login = Widget::load('login');
        $menu = Widget::load('menu');
        $carousel =  Widget::load('carousel');
        $calendar = Widget::load('calendar');
        
        
         $events = ORM::factory('event')
                ->where('status', '=', 1)
                ->and_where('day' ,'>', date('Y-m-d'))
                ->find_all();
        $block_center = View::factory('index/main/v_main_index',
                array(
                    'events' => $events,
                ));
        // Вывод в шаблон
        $this->template->page_title = 'Главная страница';
        $this->template->content_title = 'Главная страница';
        //$this->template->meta_title = $settings-> site_title; 
        $this->template->block_center = array($carousel,$block_center);
        $this->template->block_left = array($calendar,$menu,$news,);
        $this->template->block_header = array();
    }
}