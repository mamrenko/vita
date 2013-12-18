<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Index extends Controller_Base {
    
    public $template = 'index/v_index';
    public function before() {
        parent::before();
        
        $menu = Widget::load('menu');
        $topmenu = Widget::load('topmenu');
        $login = Widget::load('login');
        $cart = Widget::load('cart');
        $news = Widget::load('news');

        
        $this->template->styles = array(
            //'canvas/css/bootstrap.min.css',
            //'canvas/css/App.css',
            //'canvas/js/libs/css/ui-lightness/jquery-ui-1.9.2.custom.css',
            //'media/dist/css/bootstrap.min.css',
            //'media/dist/css/flatly-bootstrap-theme.min.css',
            'media/dist/css/spacelab-bootstrap-theme.min.css',
            'media/dist/css/style.css',
            'media/dist/css/app.css',
            'media/dist/plugins/font-awesome/css/font-awesome.min.css',
            'media/dist/plugins/font-awesome/css/font-awesome.css'
            );
        $this->template->scripts = array(
          'media/dist/js/jquery-2.0.3.min.js',
          'media/dist/js/bootstrap.min.js',
          'media/dist/plugins/backtotop/back-to-top.js',
           // 'media/dist/js/site.js',
            //'canvas/js/libs/jquery-1.9.1.min.js',
            //'canvas/js/libs/jquery-ui-1.9.2.custom.min.js',
            //'canvas/js/libs/bootstrap.min.js',
            //'canvas/js/App.js',
            //'canvas/js/plugins/icheck/jquery.icheck.min.js',
            //'media/dist/plugins/backstretch/backstretch.js',
            //'media/dist/plugins/backstretch/gistfile1.js',
            
            
        );
        
        $this->template->topmenu = $topmenu;
        $this->template->cart = $cart;
       
        $this->template->block_header = null;
        $this->template->block_center = null;
        $this->template->block_right = null;
        
        
        
    }

    
} 
