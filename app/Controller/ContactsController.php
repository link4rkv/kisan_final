<?php

App::uses('AppController', 'Controller');

class ContactsController extends AppController {

	public $uses = array();

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function index() {
		$contacts = $this->Contact->find('all', array('limit' => 100, 'recursive' => -1));
		$this->set('contacts', $contacts);
	}

	/**
	 * view method
	 * @name View specific notifier
	 * @acl-display true
	 * @acl-permission read
	 * @param string $id
	 * @return void
	 */
	public function view($contact_id = null) {
		$this->Contact->id = $contact_id;
		if (!$this->Contact->exists()) {
			throw new NotFoundException(__('Invalid Contact'));
		}
		$this->set('contact', $this->Contact->read(null, $contact_id));
	}
}
