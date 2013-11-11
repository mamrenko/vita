<?php defined('SYSPATH') OR die('No direct script access.');

class Model_Scene extends ORM {
    
        protected $_belongs_to = array(
        'place' => array(
            'model' => 'place',
            'foreign_key' => 'place_id',
        ),
    );
   protected $_has_one = array(
        'event' => array(
            'model' => 'event',
            'foreign_key' => 'scene_id',
            ),
        
       
        );
    
    
    public function rules()
    {
        return array(
            'title' => array(
                array('not_empty'),
                array('min_length', array(':value', 3)),
                array('max_length', array(':value', 40)),
            ),
             
            
        );


    }

    public function labels()
    {
        return array(
            'title' => 'Название  Сцены',
            
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
