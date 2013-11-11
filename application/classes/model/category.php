<?php defined('SYSPATH') OR die('No direct script access.');


 

    class Model_Category extends ORM{
        
         
    protected $_table_name = 'categories';
    
     protected $_has_many = array(
        'events' => array(
        'model'   => 'event',
        'through' => 'events_categories',
    ),
);
      public function rules()
    {
        return array(
            'title' => array(
                array('not_empty'),
                array('min_length', array(':value', 3)),
                array('max_length', array(':value', 25)),
                
            ),
           
            
        );


    }

    public function labels(){
       return array(
                      'title' => 'Название   Категории',
                     
           
                  );
    }
    
    public function filters()
    {
        return array(
            TRUE => array(
                array('trim'),
            ),
            'title' => array(
                array('strip_tags'),
            ),
            
        );
    }  

    }