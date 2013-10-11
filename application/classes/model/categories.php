<?php defined('SYSPATH') OR die('No direct script access.');

class Model_Categories extends Model {
    
    
    public function all_cat(){
        return array(
            'Театры', 
            'Концерты', 
            'Цирки',
            'Спектакли',
            'Детям',
              
           );;
    }
	
    
    public function topproducts(){
        return array(
            'Спектакль с Безруковым', 
            'Пушкин и ПУСТОТА', 
            'Цирки ДЮСОЛЕЙ',
            'Спектакли АВАНГАРД',
            'Детям ШАРИК',
              
           );;
    }
} 

