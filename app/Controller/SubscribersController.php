<?php
App::uses('AppController', 'Controller');
/**
 * Subscribers Controller
 *
 * @property Subscriber $Subscriber
 */
class SubscribersController extends AppController {
public $components=array('Search');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Subscriber->recursive = 0;
		$this->set('subscribers', $this->paginate());
	}

/**
 * search method
 *
 * @return void
 */
	public function search() {
		$this->loadModel('Address');
		$this->Subscriber->recursive = 0;
		$this->Subscriber->order = array('Address.street_name' => 'asc', 'Address.street_number' => 'asc');
		$conditions=$this->Search->getConditions();
		$this->set('subscribers', $this->paginate(null,$conditions));
		$this->setReferer();
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Subscriber->id = $id;
		if (!$this->Subscriber->exists()) {
			throw new NotFoundException(__('Invalid subscriber'));
		}
		$this->set('subscriber', $this->Subscriber->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Subscriber->create();
			if ($this->Subscriber->save($this->request->data)) {
				$this->Session->setFlash(__('The subscriber has been saved'));
				$this->redirect($this->origReferer());
			} else {
				$this->Session->setFlash(__('The subscriber could not be saved. Please, try again.'));
			}
		} else {
			$this->setReferer();
		}
		$addresses = $this->Subscriber->Address->find('list');
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
		$this->Subscriber->id = $id;
		if (!$this->Subscriber->exists()) {
			throw new NotFoundException(__('Invalid subscriber'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Subscriber->save($this->request->data)) {
				$this->Session->setFlash(__('The subscriber has been saved'));
				$this->redirect($this->origReferer());
			} else {
				$this->Session->setFlash(__('The subscriber could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Subscriber->read(null, $id);
			$this->setReferer();
		}
		$addresses = $this->Subscriber->Address->find('list');
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
		$this->Subscriber->id = $id;
		if (!$this->Subscriber->exists()) {
			throw new NotFoundException(__('Invalid subscriber'));
		}
		if ($this->Subscriber->delete()) {
			$this->Session->setFlash(__('Subscriber deleted'));
			$this->redirect($this->origReferer());
		}
		$this->Session->setFlash(__('Subscriber was not deleted'));
		$this->redirect($this->origReferer());
	}
}
