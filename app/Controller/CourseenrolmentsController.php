<?php
App::uses('AppController', 'Controller');
/**
 * Courseenrolments Controller
 *
 * @property Courseenrolment $Courseenrolment
 */
class CourseenrolmentsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Courseenrolment->recursive = 0;
		$this->set('courseenrolments', $this->paginate());
	}
	
	public function admin_index() {
		$this->Courseenrolment->recursive = 0;
		$this->set('courseenrolments', $this->paginate());
	}
	
	public function course_members() {
		$this->Courseenrolment->recursive = 0;
		$this->set('courseenrolments', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Courseenrolment->exists($id)) {
			throw new NotFoundException(__('Invalid courseenrolment'));
		}
		$options = array('conditions' => array('Courseenrolment.' . $this->Courseenrolment->primaryKey => $id));
		$this->set('courseenrolment', $this->Courseenrolment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Courseenrolment->create();
			if ($this->Courseenrolment->save($this->request->data)) {
				$this->Session->setFlash(__('The Course Enrolment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('ERROR'));
			}
		}
		$courses = $this->Courseenrolment->Course->find('list');
		$members = $this->Courseenrolment->Member->find('list');
		$this->set(compact('courses', 'members'));
	}
	
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Courseenrolment->create();
			if ($this->Courseenrolment->save($this->request->data)) {
				$this->Session->setFlash(__('The Course Enrolment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The courseenrolment could not be saved. Please, try again.'));
			}
		}
		$courses = $this->Courseenrolment->Course->find('list');
		$members = $this->Courseenrolment->Member->find('list');
		$this->set(compact('courses', 'members'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Courseenrolment->exists($id)) {
			throw new NotFoundException(__('Invalid courseenrolment'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Courseenrolment->save($this->request->data)) {
				$this->Session->setFlash(__('The courseenrolment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The courseenrolment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Courseenrolment.' . $this->Courseenrolment->primaryKey => $id));
			$this->request->data = $this->Courseenrolment->find('first', $options);
		}
		$courses = $this->Courseenrolment->Course->find('list');
		$members = $this->Courseenrolment->Member->find('list');
		$this->set(compact('courses', 'members'));
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
		$this->Courseenrolment->id = $id;
		if (!$this->Courseenrolment->exists()) {
			throw new NotFoundException(__('Invalid courseenrolment'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Courseenrolment->delete()) {
			$this->Session->setFlash(__('Courseenrolment deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Courseenrolment was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
