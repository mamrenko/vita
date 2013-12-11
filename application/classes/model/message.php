<?php defined('SYSPATH') OR die('No direct script access.');


 

    class Model_Message extends ORM{
        
         
          public function rules()
    {
        return array(
            'name' => array(
                array('not_empty'),
                array('min_length', array(':value', 3)),
                array('max_length', array(':value', 150)),
                
            ),
           
            
        );


    }

    public function labels(){
       return array(
                      'name' => 'Имя ',
                     
           
                  );
    }
    
    public function filters()
    {
        return array(
            TRUE => array(
                array('trim'),
            ),
            TRUE => array(
                array('strip_tags'),
            ),
            
        );
    }  
 

    }