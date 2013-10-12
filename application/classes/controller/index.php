<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Index extends Controller_Base {
    
    public $template = 'index/v_base';
    public function before() {
        parent::before();
        
        $menu = Widget::load('menu');
        $topmenu = Widget::load('topmenu');
        
        $this->template->styles = array('media/css/common.css');
        $this->template->scripts = array();
        
        $this->template->topmenu = $topmenu;
        $this->template->block_left = array($menu);
        $this->template->block_center = null;
        $this->template->block_right = null;
        
        
        
    }

    
} 
