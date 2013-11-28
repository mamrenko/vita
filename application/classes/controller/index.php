<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Index extends Controller_Base {
    
    public $template = 'index/v_base';
    public function before() {
        parent::before();
        
        $menu = Widget::load('menu');
        $topmenu = Widget::load('topmenu');
        $login = Widget::load('login');
        $cart = Widget::load('cart');
        $news = Widget::load('news');

        
        $this->template->styles = array(
            'media/dist/css/bootstrap.min.css',
            'media/dist/css/amelia-bootstrap-theme.min.css',
            'media/dist/css/site.css'
            );
        $this->template->scripts = array(
            'media/dist/js/jquery-2.0.3.min.js',
            'media/dist/js/bootstrap.min.js',
            'media/dist/js/site.js',
        );
        
        $this->template->topmenu = $topmenu;
        $this->template->cart = $cart;
       
        $this->template->block_header = null;
        $this->template->block_center = null;
        $this->template->block_right = null;
        
        
        
    }

    
} 
