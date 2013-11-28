<?php defined('SYSPATH') OR die('No direct script access.');


 

    class Model_Carousel extends ORM{
        
         
          public function rules()
    {
        return array(
                'title' => array(
                array('not_empty'),
                array('min_length', array(':value', 3)),
                array('max_length', array(':value', 50)),
                
            ),
            'description' => array(
                array('not_empty'),
                array('min_length', array(':value', 3)),
                array('max_length', array(':value', 100)),
                
            ),
           
            
        );


    }

    public function labels(){
       return array(
                      'title' => 'Название',
                      'description' => 'Описание',
                     
           
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
            'description' => array(
                array('strip_tags'),
            ),
            
        );
    }  
 

    }