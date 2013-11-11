<?php defined('SYSPATH') OR die('No direct script access.');


 

    class Model_Area extends ORM{
        
         protected $_has_many = array(
		'costs' => array(
			'model' => 'cost',
			'foreign_key' => 'sector',
		),
                
	);
          public function rules()
    {
        return array(
            'title' => array(
                array('not_empty'),
                array('min_length', array(':value', 3)),
                array('max_length', array(':value', 150)),
                
            ),
           
            
        );


    }

    public function labels(){
       return array(
                      'title' => 'Название  Сектора',
                     
           
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