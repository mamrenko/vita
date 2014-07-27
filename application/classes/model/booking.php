<?php defined('SYSPATH') OR die('No direct script access.');

class Model_Booking extends ORM {
    
         protected $_belongs_to = array(
           'user' => array(
            'model' => 'user',
            'foreign_key' => 'user_id',
        ),
    );
     
      public function rules()
    {
        return array(
            'seladr' => array(
                array('not_empty'),
                array('digit'),
                
            ),
            'status' => array(
                array('not_empty'),
                array('digit'),
            )
            
            
            
            );
    }
    
    
    public function labels(){
       return array(
                    
                     'seladr' => 'Поле Выбора адреса доставки',
                      'status'=>'Вы должны согласиться с условиями, оно ',
           
                  );
    }
    
    public function filters()
    {
        return array(
            TRUE => array(
                array('trim'),
            ),
          
        );
    }  
    }