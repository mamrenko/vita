<?php defined('SYSPATH') OR die('No direct script access.');


 

    class Model_Cost extends ORM{
             protected $_belongs_to = array(
        'playbill' => array(
            'model' => 'playbill',
            'foreign_key' => 'playbill_id',
        ),
        
        'area' => array(
            'model' => 'area',
            'foreign_key' => 'sector',
        ),
        
    );
     
             
               public function rules()
    {
        return array(
            'price' => array(
                array('not_empty'),
                
                
            ),
           
            
        );


    }

    public function labels(){
       return array(
                      'price' => 'Цена',
                     
           
                  );
    }
    
    public function filters()
    {
        return array(
            TRUE => array(
                array('trim'),
            ),
            'price' => array(
                array('strip_tags'),
            ),
            
        );
    }  
 

    }