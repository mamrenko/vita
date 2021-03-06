<?php defined('SYSPATH') OR die('No direct script access.');


 

    class Model_Taketicket extends ORM{
        
         
    protected $_table_name = 'taketickets';
    
         protected $_has_one = array(
		
                
	);
    
     protected $_belongs_to = array(
        'customer' => array(
            'model' => 'customer',
            'foreign_key' => 'customer_id',
        ),
        
         'booking' => array(
			'model' => 'booking',
			'foreign_key' => 'booking_id',
		),
          'order' => array(
            'model' => 'order',
            'foreign_key' => 'order_id',
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
//            'college' => array(
//           array(array($this, 'my_function'), array(':validation', ':field')),
//       ),'use_ssl', 'in_array', array(array('yes', 'no'))
//           'college'  => array(
//                array($this, 'in_array', array(':value', array('10', '11'))),
//            
//           ),
//            'college' => array(
//                array('not_empty'),
//           ),
           'dmy' => array(
                array('not_empty'),
           ),
            'comment' =>array(
                 array('not_empty'),
                 array('min_length', array(':value', 10)),
                 array('max_length', array(':value', 600)),
            ),
           
        );


    }

    public function labels(){
       return array(
                    'dmy' => 'Поле День когда брали билеты',
                     'college' => 'Коллега у которого брали билеты',
                     'comment' => 'Дополнение, Комментарии Какие билеты и почем',
                    
           
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
    