<?php defined('SYSPATH') OR die('No direct script access.');

class Model_Catalog extends Model {
    public function all_products(){
        return array(
            'Товар 1' => 100, 
            'Товар 2' => 200, 
            'Товар 3' => 300,
            'Товар 4' => 400,
            'Товар 5' => 500,
            'Товар 555' => 500000,   
           );;
    }
	
} 

