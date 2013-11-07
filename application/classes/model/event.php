<?php defined('SYSPATH') OR die('No direct script access.');



class Model_Event extends ORM {
    
   
     protected $_has_many = array(
        
        'categories' => array(
            'model' => 'category',
            'foreign_key' => 'event_id',
            'through' => 'events_categories',
            'far_key' => 'category_id',
        ),
    );
     protected $_belongs_to = array(
        'playbill' => array(
            'model' => 'playbill',
            'foreign_key' => 'playbill_id',
        ),
        
        
    );

 
      public function rules()
    {
        return array(
               'day' => array(
                array('not_empty'),
                
            ),
            
        );


    }
    public function labels(){
       return array(
                      'day' => 'Дата события',
                      'cat' => 'Категория',  
           
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

