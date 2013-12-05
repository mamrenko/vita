<?php defined('SYSPATH') OR die('No direct script access.');


 

    class Model_Ticket extends ORM{
        
          protected $_belongs_to = array(
           'event' => array(
            'model' => 'event',
            'foreign_key' => 'event_id',
        ),
        
        
    );
          public function rules()
    {
        return array(
            'sector' => array(
                array('not_empty'),
               // array('min_length', array(':value', 3)),
                array('max_length', array(':value', 50)),
                
            ),
           
            
        );


    }

    public function labels(){
       return array(
                      'sector' => 'Название  Сектора',
                     
           
                  );
    }
    
    public function filters()
    {
       return array(
            TRUE => array(
                array('trim'),
            ),
            'sector' => array(
                array('strip_tags'),
            ),
            'row' => array(
                array('strip_tags'),
            ),
            'seat' => array(
                array('strip_tags'),
            ),
            
       );
   }  
 

    }