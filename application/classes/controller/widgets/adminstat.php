<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Виджет "Меню Пользователи"
 */
class Controller_Widgets_Adminstat extends Controller_Widgets {

    public $template = 'widgets/admin/w_stat';    // Шаблон виждета
    
    public function action_index()
    {
       $count['news'] = ORM::factory('new')->count_all();
        $count['plybills'] = ORM::factory('playbill')->count_all();

        // Вывод в шаблон
        $this->template->count = $count;

    }

}