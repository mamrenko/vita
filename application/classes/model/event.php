<?php defined('SYSPATH') OR die('No direct script access.');



class Model_Event extends ORM {
    
   
     protected $has_many = array(
           'categories' => array(
           'model' => 'category',
           'foreign_key' => 'event_id',
           'through' => 'events_categories',
           'far_key' => 'categories_id'
        ),
        
    );

    public function rules(){
      return array(
          
           TRUE => array(
              array('not_empty',) 
           ),
          
          
      );
          
           
     }

    public function labels(){
       return array(
                      'title' => 'Название Мероприятия',
                      'description' => 'Описание мероприятия',
                      'meta keywords' => 'Ключевые слова',
                      'meta description' => 'Описание страницы для сео оптимизации',
           
                  );
    }
    
    public function filters(){
        
       return array(
           
           TRUE =>  array(
               
               array('trim'),
               ),
           );
    }
} 

