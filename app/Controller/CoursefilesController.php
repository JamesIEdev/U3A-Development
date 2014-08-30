<?php
App::uses('AppController', 'Controller');
/**
 * Coursefiles Controller
 *
 * @property Coursefile $Coursefile
 */
class CoursefilesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Coursefile->recursive = 0;
		$this->set('coursefiles', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Coursefile->exists($id)) {
			throw new NotFoundException(__('Invalid coursefile'));
		}
		$options = array('conditions' => array('Coursefile.' . $this->Coursefile->primaryKey => $id));
		$this->set('coursefile', $this->Coursefile->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Coursefile->create();
			if ($this->Coursefile->save($this->request->data)) {
				$this->Session->setFlash(__('The coursefile has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The coursefile could not be saved. Please, try again.'));
			}
		}
		$courses = $this->Coursefile->Course->find('list');
		$this->set(compact('courses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Coursefile->exists($id)) {
			throw new NotFoundException(__('Invalid coursefile'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Coursefile->save($this->request->data)) {
				$this->Session->setFlash(__('The coursefile has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The coursefile could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Coursefile.' . $this->Coursefile->primaryKey => $id));
			$this->request->data = $this->Coursefile->find('first', $options);
		}
		$courses = $this->Coursefile->Course->find('list');
		$this->set(compact('courses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Coursefile->id = $id;
		if (!$this->Coursefile->exists()) {
			throw new NotFoundException(__('Invalid coursefile'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Coursefile->delete()) {
			$this->Session->setFlash(__('Coursefile deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Coursefile was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
