<?php defined('SYSPATH') OR die('No direct script access.');



class Model_Event extends ORM {
    
   
     protected $_has_many = array(
        
        'categories' => array(
            'model' => 'category',
            'foreign_key' => 'event_id',
            'through' => 'events_categories',
            'far_key' => 'category_id',
        ),
         'tickets' => array(
			'model' => 'ticket',
			'foreign_key' => 'event_id',
		),
    );
     protected $_belongs_to = array(
        'playbill' => array(
            'model' => 'playbill',
            'foreign_key' => 'playbill_id',
        ),
        'scene' => array(
            'model' => 'scene',
            'foreign_key' => 'scene_id',
        ),
         'tart' => array(
            'model' => 'start',
            'foreign_key' => 'start',
        ),
         'place' => array(
            'model' => 'place',
            'foreign_key' => 'place_id',
        ),
    );

 
      public function rules()
    {
        return array(
               'day' => array(
                array('not_empty'),
                
                
            ),
            
        );


    }
    public function labels(){
       return array(
                      'day' => 'Дата события',
                      'cat' => 'Категория',  
           
                  );
    }
    
    public function filters(){
       
       return array(
           
           TRUE =>  array(
               
               array('trim'),
               ),
           );
    }
//    public function  get_events(){
////       $query = DB::query(DATABASE::SELECT, 'CALL GetEvents()');
////       // $query = DB::expr('CALL GetEvents()');
////       $query->as_assoc();
////       $query->execute();
//       $query = "CALL GetEvents();";
//       DB::query(Database::SELECT, $query);
//      
//    }
    
    public function get_events(){
       
        
        
    }
}