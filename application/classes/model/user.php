<?php defined('SYSPATH') or die('No direct script access.');

class Model_User extends Model_Auth_User {
         
    
    public function labels()
                {
                    return array(
                        'username'         => 'Ваше Имя',
                        'email'            => 'Ваш email Адрес',
                        'password'         => 'Пароль',
                        'phonenumber' => 'Ваш Телефонный номер',
                        'password_confirm' => 'Повторить Пароль',
                    );
                }
                
 
    public function rules()
	{
		return array(
			'username' => array(
				array('not_empty'),
				array('min_length', array(':value', 4)),
				array('max_length', array(':value', 32)),
				array('regex', array(':value', '/^[-\pL\pN_.]++$/uD')),
				array(array($this, 'username_available'), array(':validation', ':field')),
			),
			'password' => array(
				array('not_empty'), 
                                
                                //array('min_length', array(':value', 17)),
			),
                        'phonenumber' => array(
				array('not_empty'),
                            array('regex', array(':value', '/^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$/')),
                                
			),
			'email' => array(
				array('not_empty'),
				array('min_length', array(':value', 4)),
				array('max_length', array(':value', 127)),
				array('email'),
				array(array($this, 'email_available'), array(':validation', ':field')),
			),
		);
	}
      
        
              
 
} 
