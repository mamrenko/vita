<?php defined('SYSPATH') or die('No direct script access.');

class Model_New extends ORM {
  


    public function rules(){
      return array(
           'title' => 'not_empty',
           'title' =>  'min_lenght', array(':value', 3),
           'content' => 'not_empty',
           'content' =>'min_lenght', array(':value', 3),
           'date' =>  'not_empty',
           'date' => 'date',
      );
          
           
     }

    public function labels(){
       return array(
                      'title' => 'Название новости',
                      'content' => 'Текст н овости',
                      'date' => 'Дата Ввода новости',
                  );
    }
    
    public function filters(){
        return array(
           
           TRUE =>  array(
               
               array('trim'),
               ),
            
           'date' => array(
             array(Format::date, array(':value', 'Y-m-d H:i:s')),  
           ),
           );
    }

    



    
} 
