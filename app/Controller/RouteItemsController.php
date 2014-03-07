<?php
App::uses('AppController', 'Controller');
/**
 * RouteItems Controller
 *
 * @property RouteItem $RouteItem
 */
class RouteItemsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->RouteItem->recursive = 0;
		$this->set('routeItems', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->RouteItem->id = $id;
		if (!$this->RouteItem->exists()) {
			throw new NotFoundException(__('Invalid route item'));
		}
		$this->set('routeItem', $this->RouteItem->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RouteItem->create();
			if ($this->RouteItem->save($this->request->data)) {
				$this->Session->setFlash(__('The route item has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The route item could not be saved. Please, try again.'));
			}
		}
		//$routes = $this->RouteItem->Route->find('list');
		$directions = $this->RouteItem->Direction->find('list');
		$addresses = $this->RouteItem->Address->find('list');
		$this->set(compact(/*'routes',*/ 'directions', 'addresses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->setReferer();
		$this->RouteItem->id = $id;
		if (!$this->RouteItem->exists()) {
			throw new NotFoundException(__('Invalid route item'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->RouteItem->save($this->request->data)) {
				$this->Session->setFlash(__('The route item has been saved'));
				$this->redirect($this->origReferer());
			} else {
				$this->Session->setFlash(__('The route item could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->RouteItem->read(null, $id);
		}
		$directions = $this->RouteItem->Direction->find('list');
		$addresses = $this->RouteItem->Address->find('list');
		$this->set(compact('routes', 'directions', 'addresses'));
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
		$this->RouteItem->id = $id;
		if (!$this->RouteItem->exists()) {
			throw new NotFoundException(__('Invalid route item'));
		}
		if ($this->RouteItem->delete()) {
			$this->Session->setFlash(__('Route item deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Route item was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
