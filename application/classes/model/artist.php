<?php defined('SYSPATH') OR die('No direct script access.');



class Model_Playbill extends ORM {
    
    
    protected $_belongs_to = array(
        'place' => array(
            'model' => 'place',
            'foreign_key' => 'place_id',
        ),
        'starts' => array(
            'model' => 'start',
            'foreign_key' => 'start',
        ),
        'scene' => array(
            'model' => 'scene',
            'foreign_key' => 'scene_id',
        ),
        
    );
     
   
    
    protected $_has_many = array(
		'costs' => array(
			'model' => 'cost',
			'foreign_key' => 'playbill_id',
		),
                'events' => array(
			'model' => 'event',
			'foreign_key' => 'playbill_id',
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
             
            'description' => array(
                array('not_empty'),
                array('min_length', array(':value', 20)),
            ),
            'meta_title' => array(
                array('not_empty'),
                array('min_length', array(':value', 10)),
                array('max_length', array(':value', 150)),
                
            ),
            'meta_keywords' => array(
                array('not_empty'),
                array('min_length', array(':value', 10)),
                array('max_length', array(':value', 150)),
                
            ),
            'meta_description' => array(
                array('not_empty'),
                array('min_length', array(':value', 10)),
                array('max_length', array(':value', 150)),
                
            ),
            
        );


    }

    public function labels(){
       return array(
                      'title' => 'Название Мероприятия',
                      'description' => 'Описание мероприятия',
                      'meta_title' => 'Мета тайтл для оптимизации',
                      'meta_keywords' => 'Ключевые слова',
                      'meta_description' => 'Описание страницы для сео оптимизации',
           
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
//            'description' => array(
//                array('strip_tags'),
            //),
            'meta_title' => array(
                array('strip_tags'),
            ),
            'meta_keywords' => array(
                array('strip_tags'),
            ),
            'meta_description' => array(
                array('strip_tags'),
            ),
        );
    }
} 

