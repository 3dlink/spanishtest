<?php
App::uses('AppController', 'Controller');
/**
 * Models Controller
 *
 * @property Model $Model
 * @property PaginatorComponent $Paginator
 */
class ModeltestsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public $uses = array('Modeltest','Answertest');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$question = "";
		$type = "";

		if(isset($this->request->query['question']) || isset($this->request->query['type'])){
			$question = $this->request->query['question'];
			$type = $this->request->query['type'];

			// if(!empty($question)){
				$this->Paginator->settings = array(
					'conditions' => array(
	            		'Modeltest.question LIKE "%'.$question.'%"',
	            		'Modeltest.type_id LIKE "%'.$type.'%"',
        			)
				);
			// }

		}
		$this->Modeltest->recursive = 0;
		// $this->Paginator->settings = array(
  //     'order' => array('Question.level_3d DESC')
  // 	);
		$this->set('question', $question);
		$this->set('type', $type);
		$this->set('questions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Modeltest->exists($id)) {
			throw new NotFoundException(__('Invalid question'));
		}
		$options = array('conditions' => array('Modeltest.' . $this->Modeltest->primaryKey => $id));
		$this->set('modeltest', $this->Modeltest->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Modeltest->create();
			$question = $this->request->data['Modeltest'];
			$answers = $this->request->data['Answer'];
			$answers[$this->request->data['correct']]['correct'] = 1;

			if ($this->Modeltest->save($question)) {
				$question_id = $this->Modeltest->getLastInsertId();

				foreach ($answers as $key => $value) {
					$answers[$key]['modeltest_id'] = $question_id;
				}

				if ($this->Answertest->saveAll($answers)) {
					$this->Session->setFlash('La pregunta fue creada con éxito.', 'default', array('class' => 'success_message'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('La pregunta no pudo ser creada, inténtelo de nuevo.', 'default', array('class' => 'error_message'));
				}
			} else {
					$this->Session->setFlash('La pregunta no pudo ser creada, inténtelo de nuevo.', 'default', array('class' => 'error_message'));
			}
		}
		$categories = array();
		// $categories = $this->Modeltest->Category->find('list');
		$types = $this->Modeltest->Type->find('list');
		$this->set(compact('categories', 'types'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Modeltest->exists($id)) {
			throw new NotFoundException(__('Invalid question'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$question = $this->request->data['Modeltest'];
			$answers = $this->request->data['Answer'];
			$answers[$this->request->data['correct']]['correct'] = 1;

			foreach ($answers as $key => $value) {
				$answers[$key]['modeltest_id'] = $id;
			}

			$this->Answertest->deleteAll(array('Answertest.modeltest_id' => $id, false));
			if ($this->Modeltest->save($this->request->data)) {

				if ($this->Answertest->saveAll($answers)) {
					$this->Session->setFlash('La pregunta fue editada con éxito.', 'default', array('class' => 'success_message'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('La pregunta no pudo ser editada, inténtelo de nuevo.', 'default', array('class' => 'error_message'));
				}
				
			} else {
					$this->Session->setFlash('La pregunta no pudo ser editada, inténtelo de nuevo.', 'default', array('class' => 'error_message'));
			}
		} else {
			$options = array('conditions' => array('Modeltest.' . $this->Modeltest->primaryKey => $id));
			$this->request->data = $this->Modeltest->find('first', $options);
		}
		$categories = $this->Modeltest->Category->find('list');
		$types = $this->Modeltest->Type->find('list');
		$this->set(compact('categories', 'types'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Modeltest->id = $id;
		if (!$this->Modeltest->exists()) {
			throw new NotFoundException(__('Invalid question'));
		}
		if ($this->Modeltest->delete()) {
			$this->Answertest->deleteAll(array('Answertest.modeltest_id' => $id, false));
			$this->Session->setFlash('La pregunta ha sido eliminada con éxito.', 'default', array('class' => 'success_message'));
		} else {
			$this->Session->setFlash('La pregunta no pudo ser eliminada, inténtelo nuevamente.', 'default', array('class' => 'error_message'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
