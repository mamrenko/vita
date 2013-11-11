<?php defined('SYSPATH') OR die('No direct script access.');


 

    class Model_Start extends ORM{
            protected $_has_many = array(
		'playbills' => array(
			'model' => 'playbill',
			'foreign_key' => 'start',
		),
                
                
	);
 
 public function rules()
    {
        return array(
            'start' => array(
                array('not_empty'),
                array('min_length', array(':value', 5)),
                array('max_length', array(':value', 5)),
                
            ),
           
            
        );


    }

    public function labels(){
       return array(
                      'start' => 'Начало мероприятий',
                     
           
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