<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Index extends Controller_Template
{
    public $template = 'v_index';
    public function before() {
        parent::before();
         $this->template->title = 'Aplodismenty22222';
    }

    public function action_index()
	{
           
           
            $this->template->content = 'Здесь будет контент';
	}
         
        public function action_catalog()
	{
            $products = Model::factory('catalog')->all_products();
            
           
            $this->template->content = View::factory('v_catalog', array(
                 'products' => $products,
            )
            );
	}
        
} 
