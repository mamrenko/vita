<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Admin extends Controller_Base {
    
    public $template = 'admin/v_base';
    public function before() {
        parent::before();
        $menu_admin = Widget::load('adminmenu');
        
        
        $this->template->menu_admin = $menu_admin;
        
        $this->template->site_name = 'Администрирование сайта Аплодисменты';
        $this->template->site_description = 'Администрирование сайта Аплодисменты';
        
        $this->template->styles = array('media/css/admin/admincommon.css');
        $this->template->scripts = array();
        
        $this->template->block_left = null;
        $this->template->block_center = null;
        $this->template->block_right = null;
        
        
    }

    
} 
