<?php defined('SYSPATH') OR die('No direct script access.');



class Model_Artist extends ORM {
    
    
    protected $_belongs_to = array(
        'place' => array(
            'model' => 'place',
            'foreign_key' => 'place_id',
        ),
        
        
    );
     
   
    
    protected $_has_many = array(
		'playbills' => array(
                'model'   => 'playbill',
                'foreign_key' => 'artist_id',
                'through' => 'artist_playbill',
                'far_key' => 'playbill_id',
    ),
                
	);
   
    
 public function rules()
    {
        return array(
            'name' => array(
                array('not_empty'),
                array('min_length', array(':value', 3)),
                array('max_length', array(':value', 120)),
                
            ),
             
            'description' => array(
                array('not_empty'),
                array('min_length', array(':value', 20)),
            ),
            
        );


    }

    public function labels(){
       return array(
                      'name' => 'Имя Актера',
                      'description' => 'Описание Актера',
                      
           
                  );
    }
    
    public function filters()
    {
        return array(
            TRUE => array(
                array('trim'),
            ),
            'name' => array(
                array('strip_tags'),
            ),
                array('strip_tags'),
         
            
        );
    }
    
} 

