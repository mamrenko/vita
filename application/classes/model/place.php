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
   
   
    protected $_has_one = array(
        'event' => array(
            'model' => 'event',
            'foreign_key' => 'place_id',
            ),
        
       
        );

    
    public function rules()
    {
        return array(
            'title' => array(
                array('not_empty'),
                array('min_length', array(':value', 3)),
                array('max_length', array(':value', 50)),
                
            ),
             'adress' => array(
                array('not_empty'),
                 array('min_length', array(':value', 10)),
                 array('max_length', array(':value', 70)),
                 
                
            ),
            
            'description' => array(
                array('not_empty'),
                array('min_length', array(':value', 50)),
                array('max_length', array(':value', 500)),
                
            ),
//           'image',array(
//                array('not_empty'),)
//                array('Upload::valid'),
//                array('Upload::size' ,array(':value', '1M')),
//                array('Upload::type' ,array(':value', array('jpg', 'jpeg', 'png', 'gif','JPG',))))
           
      
            
        );

  
    }

    public function labels()
    {
        return array(
            'title' => 'Название Площадки',
            'adress' => 'Адрес Площадки',
            
            'description' => 'Описание  Площадки',
            'image' => 'Загрузка картинки',
        );
    }

    public function filters()
    {
        return array(
           
            'title' => array(
                array('strip_tags'),
                array('trim'),
            ),
            'adress' => array(
                array('strip_tags'),
                array('trim'),
            ),
            'description' => array(
                array('strip_tags'),
                array('trim'),
            ),
            
        );
    }
//        
     
}