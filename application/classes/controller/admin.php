<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Admin extends Controller_Base {
    
    public $template = 'admin/admin_v_base';
    
    public function before() {
        parent::before();
        if (!$this->auth->logged_in('admin')) {
            $this->request->redirect('login');
        }

        $menu_admin = Widget::load('adminmenu');
        
        
        $this->template->menu_admin = $menu_admin;
        
        $this->template->site_name = 'Администрирование сайта Аплодисменты';
        $this->template->site_description = 'Администрирование сайта Аплодисменты';
        
        $this->template->styles = array(
            'http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,800italic,400,600,800',
            'canvas/css/font-awesome.min.css',
            'canvas/css/bootstrap.min.css',
            'canvas/js/libs/css/ui-lightness/jquery-ui-1.9.2.custom.css',
            'canvas/js/plugins/icheck/skins/minimal/blue.css',
            'canvas/js/plugins/fullcalendar/fullcalendar.css',
            'canvas/css/App.css',
            'canvas/css/custom.css',
            'canvas/js/plugins/select2/select2.css',
            );
       
        $this->template->scripts = array(
            'canvas/js/libs/jquery-1.9.1.min.js',
            'canvas/js/libs/jquery-ui-1.9.2.custom.min.js',
            'canvas/js/libs/bootstrap.min.js',
            'canvas/js/plugins/icheck/jquery.icheck.min.js',
             
            //'canvas/js/plugins/textarea-counter/jquery.textarea-counter.js',
            //'canvas/js/plugins/select2/select2.js',
            //'canvas/js/plugins/tableCheckable/jquery.tableCheckable.js',
             'canvas/js/plugins/parsley/messages.ru.js',
             'canvas/js/plugins/parsley/parsley.js',
           
           // 'canvas/js/plugins/fileupload/bootstrap-fileupload.js',
            //'canvas/js/plugins/icheck/jquery.icheck.min.js',
            'canvas/js/App.js',
            //'canvas/js/libs/raphael-2.1.2.min.js',
            //'canvas/js/plugins/morris/morris.min.js',
            //'canvas/js/demos/charts/morris/area.js',
            //'canvas/js/demos/charts/morris/donut.js',
            //'canvas/js/plugins/sparkline/jquery.sparkline.min.js',
           // 'canvas/js/plugins/fullcalendar/fullcalendar.min.js',
            //'canvas/js/demos/calendar.js',
            //'canvas/js/demos/dashboard.js',
            'media/ckeditor/ckeditor.js',
            //'https://code.jquery.com/jquery.js',
            );
       
        
        $this->template->block_left = null;
        $this->template->block_center = null;
        $this->template->block_right = null;
        
        
    }

    
} 
