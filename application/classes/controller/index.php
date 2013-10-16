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

        
        $this->template->styles = array('media/css/common.css');
        $this->template->scripts = array();
        
        $this->template->topmenu = $topmenu;
        $this->template->cart = $cart;
        $this->template->block_left = array($menu, $login,);
        $this->template->block_center = null;
        $this->template->block_right = array($news);
        
        
        
    }

    
} 