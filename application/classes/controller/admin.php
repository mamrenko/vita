<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Admin extends Controller_Base {
    
    public $template = 'admin/v_base';
    public function before() {
        parent::before();
        $menu_admin = Widget::load('menuadmin');
        
        $this->template->site_name = $site_name;
        $this->template->site_description = $site_description;
        $this->template->page_title = null;
        
        
        $this->template->styles = array('media/css/common.css');
        $this->template->scripts = array();
        
        $this->template->block_left = null;
        $this->template->block_center = null;
        $this->template->block_right = null;
        
        
    }

    
} 
