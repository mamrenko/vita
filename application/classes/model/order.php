<?php defined('SYSPATH') OR die('No direct script access.');

class Model_Order extends ORM {
    
         protected $_belongs_to = array(
        'customer' => array(
            'model' => 'customer',
            'foreign_key' => 'custom_id',
        ),
    );
     
         protected $_has_one = array(
		'taketicket' => array(
			'model' => 'taketicket',
			'foreign_key' => 'order_id',
		),
                
	);
}