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
        'artists' => array(
            'model' => 'artist',
            'foreign_key' => 'playbill_id',
            'through' => 'artist_playbill',
            'far_key' => 'artist_id',
        ),
                
	);
   
    
 public function rules()
    {
        return array(
            'title' => array(
                array('not_empty'),
                array('min_length', array(':value', 3)),
                array('max_length', array(':value', 300)),
                
            ),
             
            'description' => array(
                array('not_empty'),
                array('min_length', array(':value', 20)),
                array('max_length', array(':value', 1500)),
            ),
            'meta_title' => array(
                array('not_empty'),
                array('min_length', array(':value', 10)),
                array('max_length', array(':value', 300)),
                
            ),
            'meta_keywords' => array(
                array('not_empty'),
                array('min_length', array(':value', 10)),
                array('max_length', array(':value', 300)),
                
            ),
            'meta_description' => array(
                array('not_empty'),
                array('min_length', array(':value', 10)),
                array('max_length', array(':value', 300)),
                
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
    public function get_sets(){
        
        $table_name = "playbills";
        $column_name = "onset";
        
       
         $result = mysql_query("SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS
    WHERE TABLE_NAME = '$table_name' AND COLUMN_NAME = '$column_name'")
or die (mysql_error());

$row = mysql_fetch_array($result);
$enumList2 = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE'])-6))));
return $enumList2;


    }
} 

