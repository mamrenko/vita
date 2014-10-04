<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Index extends Controller_Base {
    
    //public $template = 'index/v_assets';
    
    public $template = 'index/v_base_index';
    public function before() {
        parent::before();
        
        $menu = Widget::load('menu');
        $topmenu = Widget::load('topmenu');
        $login = Widget::load('login');
        $cart = Widget::load('cart');
        $news = Widget::load('news');
        $search = Widget::load('search');
        
         $calendar = Widget::load('calendar');

//CSS Global Compulsory
        
         
        
        $this->template->styles = array(
            
            'media/dist/css/bootstrap.css',
            'http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css',
            
            'media/BootstrapFormHelpers/dist/css/bootstrap-formhelpers.css',
            //Подключаем календарь http://xdsoft.net/jqplugins/datetimepicker/
            //'media/dist/plugins/calendar/jquery.datetimepicker.css',
            //'assets/css/pages/page_search.css'
            //'assets/plugins/bootstrap/css/bootstrap.css',
            //'assets/css/style.css',
            //'assets/css/headers/header1.css',
            //'assets/css/headers/header2.css',
           // 'assets/css/responsive.css',
            //'assets/plugins/font-awesome/font-awesome.css',
            //'assets/plugins/font-awesome/css/font-awesome.min.css',
            //'assets/plugins/font-awesome/css/font-awesome.css',
             
            'assets/plugins/flexslider/flexslider.css',
            //'assets/plugins/parallax-slider/css/parallax-slider.css',  
            //'assets/css/themes/default.css',
            //'assets/css/themes/headers/default.css',
            'media/dist/plugins/eternicode-bootstrap-datepicker/datepicker3.css',
             'media/css/site.css',
            
            
           
            );
            
//JS Global Compulsory       
        $this->template->scripts = array(
            
            //'https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js',
           // 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js',
            //'media/dist/js/1.11.1-jquery.min.js',
//            'assets/plugins/jquery-1.10.2.min.js',
            'media/dist/js/jquery-2.0.3.js',
            'media/dist/js/bootstrap.js',
            
            //HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
          //WARNING: Respond.js doesn't work if you view the page via file:// -->
           //[if lt IE 9]>
            'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js',
            'https://oss.maxcdn.com/respond/1.4.2/respond.min.js',
            
            'media/BootstrapFormHelpers/dist/js/bootstrap-formhelpers.js',
            
            
//            'assets/plugins/hover-dropdown.min.js',
            'media/dist/plugins/backtotop/back-to-top.js',
   //         'assets/plugins/back-to-top.js',
  //          'assets/plugins/flexslider/jquery.flexslider-min.js',
//            'assets/plugins/parallax-slider/js/modernizr.js',
//            'assets/plugins/parallax-slider/js/jquery.cslider.js',
//            'assets/js/app.js',
//            'assets/js/pages/index.js',
//            'assets/js/slider.js',
            'canvas/js/plugins/parsley/messages.ru.js',
            'canvas/js/plugins/parsley/parsley.js',
            //'netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js',
            //
            //
            //Подключаем календарь http://xdsoft.net/jqplugins/datetimepicker/
          // 'media/dist/plugins/calendar/jquery.datetimepicker.js',
            'media/dist/plugins/eternicode-bootstrap-datepicker/bootstrap-datepicker.js',
            'media/dist/plugins/eternicode-bootstrap-datepicker/bootstrap-datepicker.ru.js',
            'media/dist/plugins/eternicode-bootstrap-datepicker/inlinecalendar.js',
     
        );   
        
      
        $this->template->topmenu = $topmenu;
        $this->template->cart = $cart;
        $this->template->login = $login;
        $this->template->search = $search;
       
         
        $this->template->block_header = null;
        $this->template->block_center = null;
        $this->template->block_right = null;
        $this->template->block_left = null;
        
        
        
    }

    
} 
