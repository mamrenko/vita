<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Главная страница
 */
class Controller_Index_Main extends Controller_Index {

    public function action_index() {
        $block_center = View::factory('index/main/v_main_index');
        $search = Widget::load('search');
        $topproducts = Widget::load('topproducts');
        $news = Widget::load('news');

        // Вывод в шаблон
        $this->template->page_title = 'О магазине';
        $this->template->block_center = array($block_center,$search,);
        $this->template->block_right = array($topproducts, $news);
    }
}