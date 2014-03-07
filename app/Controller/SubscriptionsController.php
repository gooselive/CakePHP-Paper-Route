<?php
App::uses('AppController', 'Controller');
/**
 * Subscriptions Controller
 *
 * @property Subscription $Subscription
 */


class SubscriptionsController extends AppController {
	public $components=array('Search');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Subscription->recursive = 0;
		$this->set('subscriptions', $this->paginate());
	}

/**
 * search method
 *
 * @return void
 */
	public function search() {
		$this->loadModel('Address');
		$this->Subscription->recursive = 0;
		$this->Subscription->order = array('Address.street_name' => 'asc', 'Address.street_number' => 'asc');
		$this->Address->recursive = 0;
		$conditions=$this->Search->getConditions();
		$this->set('subscriptions', $this->paginate(null,$conditions));
		//debug($conditions);
	}
	
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Subscription->id = $id;
		if (!$this->Subscription->exists()) {
			throw new NotFoundException(__('Invalid subscription'));
		}
		$this->set('subscription', $this->Subscription->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Subscription->create();
			if ($this->Subscription->save($this->request->data)) {
				$this->Session->setFlash(__('The subscription has been saved'));
				$this->redirect($this->origReferer());
			} else {
				$this->Session->setFlash(__('The subscription could not be saved. Please, try again.'));
			}
		} else {
			$this->setReferer();
		}
		$addresses = $this->Subscription->Address->find('list');
		$this->set(compact('addresses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Subscription->id = $id;
		if (!$this->Subscription->exists()) {
			throw new NotFoundException(__('Invalid subscription'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Subscription->save($this->request->data)) {
				$this->Session->setFlash(__('The subscription has been saved'));
				$this->redirect($this->origReferer());
			} else {
				$this->Session->setFlash(__('The subscription could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Subscription->read(null, $id);
			$this->setReferer();
		}
		$addresses = $this->Subscription->Address->find('list');
		$this->set(compact('addresses'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Subscription->id = $id;
		if (!$this->Subscription->exists()) {
			throw new NotFoundException(__('Invalid subscription'));
		}
		if ($this->Subscription->delete()) {
			$this->Session->setFlash(__('Subscription deleted'));
			$this->redirect($this->origReferer());
		}
		$this->Session->setFlash(__('Subscription was not deleted'));
		$this->redirect($this->origReferer());
	}
}
