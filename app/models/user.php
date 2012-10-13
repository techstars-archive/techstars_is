<?php
class User extends AppModel {

	/**
	 * Name of Class
	 * @var string
	 */
	var $name = 'User';
	
	/**
	 * Validation rules
	 * @var array
	 */
	var $validate = array(
		'username'=>array(
			'alphaNumeric'=>array(
				'rule'=>'alphaNumeric',
				'allowEmpty'=>FALSE,
				'message'=>'Please insert a username'
			)
		),
		'password'=>array(
			'alphaNumeric'=>array(
				'rule'=>'alphaNumeric',
				'allowEmpty'=>FALSE,
				'message'=>'Please insert a password'
			)
		)
	);
}