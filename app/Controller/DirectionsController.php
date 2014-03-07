<?php
App::uses('AppController', 'Controller');
/**
 * Directions Controller
 *
 * @property Direction $Direction
 * @property SearchComponent $Search
 */
class DirectionsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Search');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Direction->recursive = 0;
		$this->set('directions', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Direction->id = $id;
		if (!$this->Direction->exists()) {
			throw new NotFoundException(__('Invalid direction'));
		}
		$this->set('direction', $this->Direction->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Direction->create();
			if ($this->Direction->save($this->request->data)) {
				$this->Session->setFlash(__('The direction has been saved'));
				$this->redirect($this->origReferer());
			} else {
				$this->Session->setFlash(__('The direction could not be saved. Please, try again.'));
			}
		} else {
			$this->setReferer();
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Direction->id = $id;
		if (!$this->Direction->exists()) {
			throw new NotFoundException(__('Invalid direction'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Direction->save($this->request->data)) {
				$this->Session->setFlash(__('The direction has been saved'));
				$this->redirect($this->origReferer());
			} else {
				$this->Session->setFlash(__('The direction could not be saved. Please, try again.'));
			}
		} else {
			$this->setReferer();
			$this->request->data = $this->Direction->read(null, $id);
		}
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
		$this->Direction->id = $id;
		if (!$this->Direction->exists()) {
			throw new NotFoundException(__('Invalid direction'));
		}
		if ($this->Direction->delete()) {
			$this->Session->setFlash(__('Direction deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Direction was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
