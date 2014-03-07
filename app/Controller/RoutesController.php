<?php
App::uses('AppController', 'Controller');
/**
 * Routes Controller
 *
 * @property Route $Route
 */
class RoutesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Route->recursive = 0;
		$this->set('routes', $this->paginate());
	}

/**
 * view method
 *   
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($slug = null) {
		if (!$slug) {
		  $this->Session->setFlash(__('Invalid route', true));
		  $this->redirect(array('action' => 'index'));
		  }
		$this->Route->recursive = 0;
		$this->set('route', $this->Route->findBySlug($slug));
		$id = $this->Route->find('first', array('conditions' => array('Route.slug' => $slug)));
		$this->set('Items', $this->Route->RouteItem->
		findAllByRouteId($id['Route']['id'],
		 array(), array('RouteItem.route_order' => 'asc'), null, null, 2));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Route->create();
			if ($this->Route->save($this->request->data)) {
				$this->Session->setFlash(__('The route has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The route could not be saved. Please, try again.'));
			}
		}
		$carriers = $this->Route->Carrier->find('list');
		$this->set(compact('carriers'));
	}

/**
 * addItem method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function addItem($slug = null) {
		if (!$slug) {
		  $this->Session->setFlash(__('Invalid route', true));
		  $this->redirect(array('action' => 'index'));
		  }
		if ($this->request->is('post')) {
			$this->Route->RouteItem->create();
			if ($this->Route->RouteItem->save($this->request->data)) {
				$this->Session->setFlash(__('The route item has been saved'));
				$this->redirect(array('action' => 'edit', $slug));
			} else {
				$this->Session->setFlash(__('The route item could not be saved. Please, try again.'));
			}
		}
		$id = $this->Route->find('first', array('conditions' => array('Route.slug' => $slug)));
		$this->set('items', $this->Route->RouteItem->
			findAllByRouteId($id['Route']['id'],
			 array(), array('RouteItem.route_order' => 'asc'), null, null, 1));
		$this->set('addresses', $this->Route->RouteItem->Address->find('list'));
		$this->set('directions', $this->Route->RouteItem->Direction->find('list'));
		$this->set('routes', $this->Route->find('list'));
		$this->set('id', $id['Route']['id']);
	}
/**
 * addItems method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function addItems($slug = null, $count = null) {
		if (!$slug) {
		  $this->Session->setFlash(__('Invalid route', true));
		  $this->redirect(array('action' => 'index'));
		  }
		if ($this->request->is('post')) {
			$this->Route->RouteItem->create();
			if ($this->Route->RouteItem->saveAll($this->request->data['Route']['RouteItem'])) {
				$this->Session->setFlash(__('The route items have been saved'));
				$this->redirect(array('action' => 'edit', $slug));
			} else {
				$this->Session->setFlash(__('The route item could not be saved. Please, try again.'));
			}
		}
		$this->set('count', $count);
		$id = $this->Route->find('first', array('conditions' => array('Route.slug' => $slug)));
		$this->set('items', $this->Route->RouteItem->
			findAllByRouteId($id['Route']['id'],
			 array(), array('RouteItem.route_order' => 'asc'), null, null, 1));
		$this->set('addresses', $this->Route->RouteItem->Address->find('list'));
		$this->set('directions', $this->Route->RouteItem->Direction->find('list'));
		$this->set('routes', $this->Route->find('list'));
		$this->set('id', $id['Route']['id']);
//		$this->set('currentrequest', $this->request->data['Route']['RouteItem']);
	}


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($slug = null) {
		if (!$slug) {
		  $this->Session->setFlash(__('Invalid route', true));
		  $this->redirect(array('action' => 'index'));
		  }
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Route->save($this->request->data)) {
				$this->Session->setFlash(__('The route has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The route could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Route->findBySlug($slug);
		}
		$id = $this->Route->find('first', array('conditions' => array('Route.slug' => $slug)));		
		$this->set('Items', $this->Route->RouteItem->
			findAllByRouteId($id['Route']['id'],
			 array(), array('RouteItem.route_order' => 'asc'), null, null, 1));
		$this->set('carriers', $this->Route->Carrier->find('list'));
		$this->set('id', $id['Route']['slug']);
	}
	
/**
 * editItem method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function editItem($id = null) {
		$this->Route->RouteItem->id = $id;
		if (!$this->Route->RouteItem->exists()) {
			throw new NotFoundException(__('Invalid route item'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Route->RouteItem->save($this->request->data)) {
				$this->Session->setFlash(__('The route item has been saved'));
				$this->redirect($this->origReferer());
			} else {
				$this->Session->setFlash(__('The route item could not be saved. Please, try again.'));
			}
		} else {
			$this->setReferer();
			$this->request->data = $this->Route->RouteItem->read(null, $id);
		}
		$directions = $this->Route->RouteItem->Direction->find('list');
		$addresses = $this->Route->RouteItem->Address->find('list');
		$this->set('routes', $this->Route->find('list'));
		$id = $this->Route->find('first', array('conditions' => array('Route.slug' => $slug)));
		$this->set('slug', $id['Route']['slug']);		
//		debug($this->Route);
		$this->set(compact('directions', 'addresses'));
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
		$this->Route->id = $id;
		if (!$this->Route->exists()) {
			throw new NotFoundException(__('Invalid route'));
		}
		if ($this->Route->delete()) {
			$this->Session->setFlash(__('Route deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Route was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * deleteItem method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
}
