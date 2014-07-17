<?php defined('SYSPATH') OR die('No direct script access.');


 

    class Model_Category extends ORM{
        
         
    protected $_table_name = 'categories';
    
     protected $_has_many = array(
        'events' => array(
        'model'   => 'event',
        'foreign_key' => 'category_id',
        'through' => 'events_categories',
        'far_key' => 'event_id',
    ),
);
      public function rules()
    {
        return array(
            'title' => array(
                array('not_empty'),
                array('min_length', array(':value', 3)),
                array('max_length', array(':value', 25)),
                
            ),
           
            
        );


    }

    public function labels(){
       return array(
                      'title' => 'Название   Категории',
                     
           
                  );
    }
    
    public function filters()
    {
        return array(
            TRUE => array(
                array('trim'),
            ),
            'title' => array(
                array('strip_tags'),
            ),
            
        );
    }  

    
    public function get_cats(){
            $query = DB::select()
                    ->from('events')
                    ->where('day' ,'>', date('Y-m-d'))
                    ->join('events_categories')
                    ->on('events_categories.event_id', '=', 'events.id')
                    ->group_by('category_id')
                    ->join('categories')
                    ->on('categories.id', '=', 'events_categories.category_id')
                    ;
            return $query->execute();
    }
    }
    