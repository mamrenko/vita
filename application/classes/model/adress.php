<?php defined('SYSPATH') OR die('No direct script access.');


 

    class Model_Adress extends ORM{
        protected $_table_name = 'adresses';
        
         protected $_belongs_to = array(
        'user' => array(
            'model' => 'user',
            'foreign_key' => 'user_id',
        ),
	);
         
         
         
          public function rules()
    {
        return array(
            'adress' => array(
                array('not_empty'),
                array('min_length', array(':value', 10)),
                array('max_length', array(':value', 255)),
                
            ),
           
            
        );


    }

    public function labels(){
       return array(
                      'adress' => 'Поле Адрес доставки',
                     
           
                  );
    }
    
    public function filters()
    {
        return array(
            TRUE => array(
                array('trim'),
            ),
            'adress' => array(
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