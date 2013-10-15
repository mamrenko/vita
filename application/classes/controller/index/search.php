<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Поиск
 */
class Controller_Index_Search extends Controller_Index {

    public function action_index() {
        
        $content = View::factory('index/search/v_search_index');
        
        // Выводим в шаблон
        $this->template->page_title = 'Поиск';
        $this->template->block_center = array($content);
        //$this->template->block_left = null;
    }


}