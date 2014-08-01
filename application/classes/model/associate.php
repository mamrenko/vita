<?php defined('SYSPATH') OR die('No direct script access.');


 

    class Model_Associate extends ORM{
        protected $_table_name = 'associates';
        
         protected $_has_many = array(
        'taketickets' => array(
        'model'   => 'taketicket',
        'foreign_key' => 'associate_id',
        'through' => 'associates_taketickets',
        'far_key' => 'taketicket_id',
    ),
         
    );     
         
          public function rules()
    {
        return array(
            'name' => array(
                array('not_empty'),
                array('min_length', array(':value', 3)),
                array('max_length', array(':value', 200)),
                
            ),
            'adress' => array(
                array('not_empty'),
                array('min_length', array(':value', 10)),
                array('max_length', array(':value', 200)),
                
            ),
          
            
            'phone'=>array(
               array('not_empty'),
               array('phone'),
               array('min_length', array(':value', 17)),
               array('max_length', array(':value', 17)),
            ),
            
        );


    }

    public function labels(){
       return array(
               'name' => 'Имя Коллеги',   
             'adress' => 'Адрес Коллеги',
              'phone' => 'Телефон  Коллеги',
                     
           
                  );
    }
    
    public function filters()
    {
        return array(
            TRUE => array(
                array('trim'),
            ),
            'adress' => array(
                array('strip_tags'),
            ),
            
        );
    }  
 

    }