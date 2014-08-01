<?php defined('SYSPATH') OR die('No direct script access.');


 

    class Model_Taketicket extends ORM{
        
         
    protected $_table_name = 'taketickets';
    
    
     protected $_belongs_to = array(
        'customer' => array(
            'model' => 'customer',
            'foreign_key' => 'custom_id',
        ),
         'order' => array(
            'model' => 'order',
            'foreign_key' => 'order_id',
        ),
         'booking' => array(
			'model' => 'booking',
			'foreign_key' => 'booking_id',
		),
         'orderuser' => array(
            'model' => 'orderuser',
            'foreign_key' => 'orderuser_id',
        ),
    );
   
     protected $_has_many = array(
        
        'associates' => array(
            'model' => 'associate',
            'foreign_key' => 'taketicket_id',
            'through' => 'associates_taketickets',
            'far_key' => 'associate_id',
        ),
         );
    
      public function rules()
    {
        return array(
           
           
            'comment' =>array(
                 array('not_empty'),
                 array('min_length', array(':value', 3)),
                 array('max_length', array(':value', 600)),
            ),
           
        );


    }

    public function labels(){
       return array(
                    
                    // 'huckster' => 'Коллега у которого брали билеты',
                     'comment' => 'Введите какие билеты и почем брали',
                    
           
                  );
    }
    
    public function filters()
    {
        return array(
            TRUE => array(
                array('trim'),
            ),
            'commets' => array(
                array('strip_tags'),
            ),
            
            
        );
    }  

    
    
    }
    