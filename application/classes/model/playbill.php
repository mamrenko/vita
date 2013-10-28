<?php defined('SYSPATH') OR die('No direct script access.');



class Model_Playbill extends ORM {
    
    
    protected $_belongs_to = array(
        'place' => array(
            'model' => 'place',
            'foreign_key' => 'place_id',
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
            'meta_keywords' => array(
                array('not_empty'),
                array('min_length', array(':value', 10)),
                
            ),
            'meta_description' => array(
                array('not_empty'),
                array('min_length', array(':value', 10)),
                
            ),
            
        );


    }

    public function labels(){
       return array(
                      'title' => 'Название Мероприятия',
                      'description' => 'Описание мероприятия',
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
            'description' => array(
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

