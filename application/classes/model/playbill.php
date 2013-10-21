<?php defined('SYSPATH') OR die('No direct script access.');



class Model_Playbill extends ORM {
    
   public function rules(){
      return array(
          
           TRUE => array(
              array('not_empty',) 
           ),
          
           'title' =>  array(
               'min_lenght', 
               array(':value', 3),),
           
           'description' =>array(
               'min_lenght',
               array(':value', 3),),
           
           'meta keywords' => array(
               'min_lenght',
               array(':value', 3),),
           
           'meta description' => array(
               'min_lenght', 
               array(':value', 3),) ,
          
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

