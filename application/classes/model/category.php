<?php defined('SYSPATH') OR die('No direct script access.');


 

    class Model_Category extends ORM{
        
         
    protected $_table_name = 'categories';
    
     protected $_has_many = array(
        'events' => array(
        'model'   => 'event',
        'through' => 'events_categories',
    ),
);

    }