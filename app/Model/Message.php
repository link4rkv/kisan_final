<?php
App::uses('AppModel', 'Model');

require_once('../Vendor/twilio-php-master/Twilio/autoload.php');
use Twilio\Rest\Client;
/**
 * Message Model
 *
 * @property Contact $Contact
 */
class Message extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Contact' => array(
			'className' => 'Contact',
			'foreignKey' => 'contact_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public function sendMessage($to, $message){
		$sid = 'AC7f4870ba1f31e4124a0ad6a873cacf4c';
		$token = 'd8e9133579b24a49129d248247925606';
		
		$client = new Twilio\Rest\Client($sid, $token);
		
		$message = $client->messages->create(
		  $to, // Text this number
		  array(
		    'from' => '+13344582546', // From a valid Twilio number
		    'body' => $message
		  )
		);
	}

	public function saveSentMessage($data = array()){
		if(empty($data)){
			throw new Exception("Invalid Data", 1);
		}

		$data['created'] = DboSource::expression('NOW()');
		$this->create();
		$this->save($data);

		return $this->id;
	}
}
