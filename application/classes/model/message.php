<?php defined('SYSPATH') OR die('No direct script access.');


 

    class Model_Message extends ORM{
        
         
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
               array('phone')
            ),
            'text' =>array(
                 array('not_empty'),
                 array('min_length', array(':value', 10)),
                 array('max_length', array(':value', 300)),
            ),
           
            
        );


    }

    public function labels(){
       return array(
                      'name' => 'Имя ',
                       'email' => 'Поле Электронная почта',
                       'phone' => 'Поле Ваш телефон',
                       'text' => 'Поле Вашего сообщения',
           
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