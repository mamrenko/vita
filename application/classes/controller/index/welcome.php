<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Welcome extends Controller {

	public function action_index()
	{
           
		$this->response->body('hello, world!');
	}
         
        public function action_index2()
	{
           
		$this->response->body('Привет Други!!!!!');
	}
} // End Welcome
