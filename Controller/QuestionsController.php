<?php
App::uses('AppController', 'Controller');
/**
 * Questions Controller
 *
 * @property Question $Question
 * @property PaginatorComponent $Paginator
 */
class QuestionsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public $uses = array('Question','Answer','Category');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$question = "";
		$level = "";
		$type = "";

		if(isset($this->request->query['question']) || isset($this->request->query['level']) || isset($this->request->query['type'])){
			$question = $this->request->query['question'];
			$level = $this->request->query['level'];
			$type = $this->request->query['type'];

			// if(!empty($question)){
				$this->Paginator->settings = array(
					'conditions' => array(
        		'Question.question LIKE "%'.$question.'%"',
        		'Question.type_id LIKE "%'.$type.'%"',
        		'Question.level_3d LIKE "%'.$level.'%"'
  				)
				);
			// }

		}
		$this->Question->recursive = 0;
		// $this->Paginator->settings = array(
  //     'order' => array('Question.level_3d DESC')
  // 	);
		$this->Paginator->settings = array(
			'limit' => 10,
		);
		$this->set('question', $question);
		$this->set('level', $level);
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
		if (!$this->Question->exists($id)) {
			throw new NotFoundException(__('Invalid question'));
		}
		$options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
		$this->set('question', $this->Question->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Question->create();
			$question = $this->request->data['Question'];
			$answers = $this->request->data['Answer'];
			$answers[$this->request->data['correct']]['correct'] = 1;

			if ($this->Question->save($question)) {
				$question_id = $this->Question->getLastInsertId();

				foreach ($answers as $key => $value) {
					$answers[$key]['question_id'] = $question_id;
				}

				if ($this->Answer->saveAll($answers)) {
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
		// $categories = $this->Question->Category->find('list');
		$types = $this->Question->Type->find('list');
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
		if (!$this->Question->exists($id)) {
			throw new NotFoundException(__('Invalid question'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$question = $this->request->data['Question'];
			$answers = $this->request->data['Answer'];
			$answers[$this->request->data['correct']]['correct'] = 1;

			foreach ($answers as $key => $value) {
				$answers[$key]['question_id'] = $id;
			}

			$this->Answer->deleteAll(array('Answer.question_id' => $id, false));
			if ($this->Question->save($this->request->data)) {

				if ($this->Answer->saveAll($answers)) {
					$this->Session->setFlash('La pregunta fue editada con éxito.', 'default', array('class' => 'success_message'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('La pregunta no pudo ser editada, inténtelo de nuevo.', 'default', array('class' => 'error_message'));
				}
				
			} else {
					$this->Session->setFlash('La pregunta no pudo ser editada, inténtelo de nuevo.', 'default', array('class' => 'error_message'));
			}
		} else {
			$options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
			$this->request->data = $this->Question->find('first', $options);
		}
		$categories = $this->Question->Category->find('list');
		$types = $this->Question->Type->find('list');
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
		$this->Question->id = $id;
		if (!$this->Question->exists()) {
			throw new NotFoundException(__('Invalid question'));
		}
		if ($this->Question->delete()) {
			$this->Answer->deleteAll(array('Answer.question_id' => $id, false));
			$this->Session->setFlash('La pregunta ha sido eliminada con éxito.', 'default', array('class' => 'success_message'));
		} else {
			$this->Session->setFlash('La pregunta no pudo ser eliminada, inténtelo nuevamente.', 'default', array('class' => 'error_message'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function getCategories(){
		$this->autoRender=false;
		$option=$_GET['type_id'];
		$result=$this->Category->find('all', array("order"=>"Category.id",'conditions'=>array("Category.type_id"=>$option)));
		$reporting=array();
		// $reporting[0]='Seleccione una categoría';
		foreach ($result as $row) {
			$reporting[$row['Category']['id']]=$row['Category']['name'];
		}
		return json_encode(array('categories'=>$reporting));
	}
}
