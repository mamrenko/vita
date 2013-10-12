<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Widgets extends Controller_Template {
    
   
    public function before() {
        parent::before();
        if(Request::current()->is_initial())
        {
            $this->auto_render = FALSE;
        }
        
        
    }

    
} 
