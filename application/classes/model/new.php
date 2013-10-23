<?php defined('SYSPATH') OR die('No direct script access.');

class Model_New extends ORM {

   public function rules()
    {
        return array(
            'title' => array(
                array('not_empty'),
                array('min_length', array(':value', 3)),
                
            ),
             
            
            'content' => array(
                array('not_empty'),
                array('min_length', array(':value', 20)),
            ),
            'date' => array(
                array('not_empty'),
                array('date', array(':value', 'Y-m-d')),
            )
        );


    }

    public function labels()
    {
        return array(
            'title' => 'Название',
            'date' => 'Дата',
            
            'content' => 'Основной текст',
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
} 
