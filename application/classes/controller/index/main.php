<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Главная страница
 */
class Controller_Index_Main extends Controller_Index {

    public function action_index() {
        $block_center = View::factory('index/main/v_main_index');
        $search = Widget::load('search');
       
        $news = Widget::load('news');
        $login = Widget::load('login');
        $menu = Widget::load('menu');
        $carousel =  Widget::load('carousel');
        // Вывод в шаблон
        $this->template->page_title = 'О магазине';
        $this->template->content_title = 'Главная страница';
        $this->template->block_center = array($carousel,$block_center);
        $this->template->block_left = array($menu,$news,);
        $this->template->block_header = array();
    }
}