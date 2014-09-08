<?php defined('SYSPATH') OR die('No direct script access.');


 

    class Model_Customer extends ORM{
        
         
    protected $_table_name = 'customers';
    
    
    protected $_has_many = array(
		'order' => array(
			'model' => 'order',
			'foreign_key' => 'custom_id',
		),
                'taketickets' => array(
			'model' => 'taketicket',
			'foreign_key' => 'customer_id',
		),
	);
   
    
    
      public function rules()
    {
        return array(
            'name' => array(
                array('not_empty'),
                array('min_length', array(':value', 3)),
                array('max_length', array(':value', 25)),
                
            ),
           'email' => array(
                array('not_empty'),
                array('email'),
                
            ),
            'phone'=>array(
               array('not_empty'),
               array('phone'),
               array('min_length', array(':value', 17))
            ),
            'adress' =>array(
                 array('not_empty'),
                 array('min_length', array(':value', 10)),
                 array('max_length', array(':value', 300)),
            ),
            'metro' =>array(
               array('not_empty'),
//                 array('min_length', array(':value', 10)),
//                 array('max_length', array(':value', 300)),
            ),
            'status' => array(
                array('not_empty'),
                array('digit'),
            )
        );


    }

    public function labels(){
       return array(
                    
                     'email' => 'Поле Электронная почта',
                     'name' => 'Поле Ваше имя',
                     'phone' => 'Поле Ваш телефон',
                      'adress' => 'Поле Адрес Доставки',
                       'metro' =>'Поле выбора метро',
                      'status'=>'Вы должны согласиться с условиями, оно ',
           
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
            
            
        );
    }  

    
    
    }
    