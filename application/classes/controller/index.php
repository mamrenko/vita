<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Index extends Controller_Base {
    
    public $template = 'index/v_assets';
    public function before() {
        parent::before();
        
        $menu = Widget::load('menu');
        $topmenu = Widget::load('topmenu');
        $login = Widget::load('login');
        $cart = Widget::load('cart');
        $news = Widget::load('news');

//CSS Global Compulsory
        $this->template->styles = array(
            'assets/plugins/bootstrap/css/bootstrap.css',
            'assets/css/style.css',
            'assets/css/headers/header1.css',
            'assets/css/responsive.css', 
            'assets/plugins/font-awesome/css/font-awesome.css',
            'assets/plugins/flexslider/flexslider.css',
            'assets/plugins/parallax-slider/css/parallax-slider.css',  
            'assets/css/themes/default.css',
            'assets/css/themes/headers/default.css',
            
           
            );
            
//JS Global Compulsory       
        $this->template->scripts = array(
            'assets/plugins/jquery-1.10.2.min.js',
            'assets/plugins/jquery-migrate-1.2.1.min.js',
            'assets/plugins/bootstrap/js/bootstrap.min.js',
            'assets/plugins/hover-dropdown.min.js',
            'assets/plugins/back-to-top.js',
            'assets/plugins/flexslider/jquery.flexslider-min.js',
            'assets/plugins/parallax-slider/js/modernizr.js',
            'assets/plugins/parallax-slider/js/jquery.cslider.js',
            'assets/js/app.js',
            'assets/js/pages/index.js',
            'assets/js/slider.js',
            'canvas/js/plugins/parsley/messages.ru.js',
            'canvas/js/plugins/parsley/parsley.js',
     
        );   
        
      
        $this->template->topmenu = $topmenu;
        $this->template->cart = $cart;
       
        $this->template->block_header = null;
        $this->template->block_center = null;
        $this->template->block_right = null;
        
        
        
    }

    
} 
