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
			),
                      'phonenumber' => array(
				array('not_empty'),
                                
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
