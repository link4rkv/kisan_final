<?php

App::uses('AppController', 'Controller');

class MessagesController extends AppController {

	public $uses = array('Contact', 'Message');

	/**
	 * Displays a view
	 *
	 * @param mixed What page to display
	 * @return void
	 * @throws NotFoundException When the view file could not be found
	 *	or MissingViewException in debug mode.
	 */
	public function index() {
		$messages = $this->Message->find('all', array('limit' => 100, 'contain' => 'Contact', 'order' => 'Message.created DESC'));
		$this->set('messages', $messages);
	}

	/**
	 * Generates 6 digit OTP 
	 * @return otp
	 */
	public function generateOTP(){
		$this->autoRender = false;
		$otp = rand(100000, 999999);

		return $otp;
	}

	/**
	 * Sends message to the contact.
	 *
	 * @param contact Id of the contact
	 */
	public function send_messages($contact_id){
		$this->autoRender = false;
		$message = $this->request->data['message'];
		
		$contact = $this->Contact->find('first', array('conditions' => array('Contact.id' => $contact_id), 'fields' => array('Contact.contact_number'), 'recursive' => -1));
		try{
			$this->Message->sendMessage($contact['Contact']['contact_number'], $message);
			$otp = filter_var($message, FILTER_SANITIZE_NUMBER_INT);
			$this->Message->saveSentMessage(array('contact_id' => $contact_id, 'otp' => $otp));

			return true;
		} catch (Exception $e){
			throw new Exception($e->getMessage(), 1);	
		}
	}
}
