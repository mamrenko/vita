<?php defined('SYSPATH') OR die('No direct script access.');

class Model_Booking extends ORM {
    
           protected $_belongs_to = array(
        'orderuser' => array(
            'model' => 'orderuser',
            'foreign_key' => 'orderuser_id',
        ),
               
            
    );
      protected $_has_many = array(
		'taketickets' => array(
			'model' => 'taketicket',
			'foreign_key' => 'booking_id',
		),
                
	);
    
     
    }