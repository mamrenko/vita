<?php defined('SYSPATH') OR die('No direct script access.');

class Model_Place extends ORM {
    
        protected $_has_many = array(
		'playbills' => array(
			'model' => 'playbill',
			'foreign_key' => 'place_id',
		),
                'scenes' => array(
			'model' => 'scene',
			'foreign_key' => 'place_id',
		),
	);
   
    
    
    public function rules()
    {
        return array(
            'title' => array(
                array('not_empty'),
                array('min_length', array(':value', 3)),
                
            ),
             'adress' => array(
                array('not_empty'),
                
            ),
            
            'description' => array(
                array('not_empty'),
                array('min_length', array(':value', 20)),
            ),
            
        );


    }

    public function labels()
    {
        return array(
            'title' => 'Название Площадки',
            'adress' => 'Адрес Площадки',
            
            'description' => 'Описание  Площадки',
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
