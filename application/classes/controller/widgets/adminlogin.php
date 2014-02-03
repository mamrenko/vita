<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Виджет "Меню заказов"
 */
class Controller_Widgets_Adminlogin extends Controller_Widgets {

    public $template = 'widgets/admin/w_adminlogin';    // Шаблон виждета
    
    public function action_index()
    {
        $auth = Auth::instance();
        $this->template->auth = $auth;
        $this->template->user = $auth->get_user();
    }

}
