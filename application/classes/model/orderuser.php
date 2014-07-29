<?php defined('SYSPATH') OR die('No direct script access.');


 

    class Model_Orderuser extends ORM{
        protected $_table_name = 'orderusers';
        
         protected $_has_many = array(
		'bookings' => array(
			'model' => 'booking',
			'foreign_key' => 'orderuser_id',
		),
                
	);
         
         
         
          public function rules()
    {
        return array(
            'seladr' => array(
                array('not_empty'),
                array('min_length', array(':value', 20)),
                array('max_length', array(':value', 255)),
                
            ),
            'status' => array(
                array('not_empty'),
                array('digit'),
            )
           
            
        );


    }

    public function labels(){
       return array(
                      'seladr' => 'Адрес доставки',
                      'status'=>'Вы должны согласиться с условиями, оно ',
           
                  );
    }
    
    public function filters()
    {
        return array(
            TRUE => array(
                array('trim'),
            ),
            'seladr' => array(
                array('strip_tags'),
            ),
            
        );
    }  
 
public function get_sets(){
        
        $table_name = "adresses";
        $column_name = "metro";
        
       
         $result = mysql_query("SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS
    WHERE TABLE_NAME = '$table_name' AND COLUMN_NAME = '$column_name'")
or die (mysql_error());

$row = mysql_fetch_array($result);
$enumList2 = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE'])-6))));
return $enumList2;


    }
    }