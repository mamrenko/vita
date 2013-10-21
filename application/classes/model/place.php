<?php defined('SYSPATH') OR die('No direct script access.');

class Model_Place extends ORM {
    protected $has_many = array(
           'playbills' => array(
           'model' => 'playbill',
           'foreign_key' => 'place_id',
        ),
        
    );
    
}
