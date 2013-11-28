<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Admin extends Controller_Base {
    
    public $template = 'admin/admin_v_base';
    
    public function before() {
        parent::before();
        $menu_admin = Widget::load('adminmenu');
        
        
        $this->template->menu_admin = $menu_admin;
        
        $this->template->site_name = 'Администрирование сайта Аплодисменты';
        $this->template->site_description = 'Администрирование сайта Аплодисменты';
        
        $this->template->styles = array(
            'media/dist/css/bootstrap.min.css',
            'media/dist/css/cerulean-bootstrap-theme.min.css',
            'media/dist/css/site.css',
            'media/css/admin/admincommon.css',
            'media/canvas-admin-v1 2/Theme/js/plugins/fileupload/bootstrap-fileupload.css'
            );
       
        $this->template->scripts = array(
            'media/dist/js/jquery-2.0.3.min.js',
            'media/dist/js/bootstrap.min.js',
            'media/dist/js/site.js',
            'media/js/jquery-ui-1.10.3.custom.js',
            'media/js/adminmenuleft.js',
            'media/js/tablett.js',
           
           'media/canvas-admin-v1 2/Theme/js/plugins/fileupload/bootstrap-fileupload.js',
            );
        $this->template->scripts[] = 'media/ckeditor/ckeditor.js';
        
        $this->template->block_left = null;
        $this->template->block_center = null;
        $this->template->block_right = null;
        
        
    }

    
} 
