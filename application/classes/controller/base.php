<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Base extends Controller_Template {
    
    public $template = 'v_base';
    public function before() {
        parent::before();
        $site_name = 'Аплодисменты' ;
        $site_description = 'Заказ и доставка билетов в театр, на концерт, цирк';
        
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
