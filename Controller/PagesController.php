<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
	// $rand = array();
	// $modelTest = array();
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */

	public $components = array('Paginator');

	public $uses = array('Answer','Modeltest','Result','Question','Usermgmt.User');
/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function display() {

		$path = func_get_args();

		$count = count($path);

		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		$this->set('msj', $this->Session->read('success'));

		$this->Session->write('success', "");


		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}

	}

	public function upload($action = 0) {
		$this->autoRender = false;
		if($action!=0){

			if($action == 1){

				$time = strtotime ( "now" );
				$targetFolder = '../webroot/files/'; // Relative to the root
				if (! empty ( $_FILES )) {
					$tempFile = $_FILES ['file'] ['tmp_name'];
					$targetPath = $targetFolder;
					// Validate the file type
					$fileTypes = array (
							'jpg',
							'jpeg',
							'gif',
							'png',
							'JPG',
							'JPEG',
							'GIF',
							'PNG'
					); // File extensions
					$fileParts = pathinfo ( $_FILES ['file'] ['name'] );
					if (in_array ( $fileParts ['extension'], $fileTypes )) {
						$name = "img" . $time . $this->__randomStr ( 3 );
						$targetFile = rtrim ( $targetPath, '/' ) . '/' . $name . "." . $fileParts ['extension'];
						if (move_uploaded_file ( $tempFile, $targetFile )) {
							$namepath = $name . "." . $fileParts ['extension'];
							return json_encode ($namepath );
						} else {
							return json_encode ( array (
									false,
									false
							) );
						}
					} else {
						echo 'Imagen no valida';
					}
				}

			}elseif($action == 2){

				$time = strtotime ( "now" );
				$targetFolder = '../webroot/files/'; // Relative to the root
				if (! empty ( $_FILES )) {
					$tempFile = $_FILES ['file'] ['tmp_name'];
					$targetPath = $targetFolder;
					// Validate the file type
					$fileTypes = array ('mp3'); // File extensions
					$fileParts = pathinfo ( $_FILES ['file'] ['name'] );
					if (in_array ( $fileParts ['extension'], $fileTypes )) {
						$name = "audio" . $time . $this->__randomStr ( 3 );
						$targetFile = rtrim ( $targetPath, '/' ) . '/' . $name . "." . $fileParts ['extension'];
						if (move_uploaded_file ( $tempFile, $targetFile )) {
							$namepath = $name . "." . $fileParts ['extension'];
							return json_encode ($namepath );
						} else {
							return json_encode ( array (
									false,
									false
							) );
						}
					} else {
						echo 'archivo no valido';
					}
				}

			}

		}else{
			echo 'error';
		}
	}

	function __randomStr($length) {
		$str = '';
		$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

		$size = strlen ( $chars );
		for($i = 0; $i < $length; $i ++) {
			$str .= $chars [rand ( 0, $size - 1 )];
		}

		return $str;
	}

	public function sendMail(){
		$this->autoRender = false;

		// $from = 'info@3dlinkweb.com';
		// $to = array($_POST['data']['email']);
		// $subject = "Fan Pass Code";
		// $content = $this->__armar_contenido($this->data['code'],$this->data['date'],$this->data['name']);
		// // $content = "Your code for the pass ".$this->data['name'].", ".$this->data['date']." is ".$this->data['code'];
		// // debug($content);
		// $this->__enviar_correo($from, $to, $subject, $content);

		// $this->__setcodeinactive($this->data['passid'],$this->data['idcode']);

		$from = 'info@3dlinkweb.com';
		$to = array($this->Session->read('email'));
		$subject = "Fan Pass Code";
		$content = $this->__armar_contenido($this->Session->read('code'),$this->Session->read('date'),$this->Session->read('name'));
		// $content = "Your code for the pass ".$this->data['name'].", ".$this->data['date']." is ".$this->data['code'];
		// debug($content);
		$this->__enviar_correo($from, $to, $subject, $content);

		$this->__setcodeinactive($this->Session->read('passid'),$this->Session->read('idcode'));


		return json_encode(1);
	}

	function __enviar_correo($from, $to, $subject, $contenido){
		$Email = new CakeEmail();
		$Email->config('_temp')
		->to($to)
		->subject($subject)
		->from($from)
		->template('default')
		->emailFormat('html')
		->send($contenido);
	}

	function __armar_contenido($code,$date,$name){

		$content = "<table style='width: 1000px;background-color: #468ce6;font-family: Arial;font-size: 10px;color: white;margin: 0 auto;padding: 0 175px 140px;'><tr><td><p style='color: black;font-size: 12px;text-align: center;padding: 20px 0;margin: 0;'><a style='color: black;text-decoration: underline;' href=''>Click here</a> to view online</p></td></tr><tr><td style='width: 650px;margin: 0 auto;background-color: white;color: black;margin-bottom: 35px;'><img style='width: 100%;height: 385px;' src='http://www.3dlinkweb.com/hailmary/img/banner_email.jpg'></img></td></tr><tr><td style='padding-left: 175px;'><div style='color:black;width:300px;height:63px;background-color:#f5f6f7;border:solid 1px black;text-align:center;font-size:19px;font-weight:bold;padding-top:20px;'>$name<p style='color: #468ce6;'>Valid: $date</p></div></td></tr><tr><td style='padding: 80px 35px 50px;background-color: #fff; color:black; text-align:center;'><p style='font-size: 26px;font-weight: bold;text-align: center;margin: 0;margin-bottom: 30px;'>Bombs away!</p><p style='font-size: 15px;text-align: center;margin: 0px;font-weight: normal;'>The code for your Hail Mary deal for Fan Pass is below. Go to <a href='http://fanpass.co.nz'>www.fanpass.co.nz</a> and redeem during the dates shown above.</p><br /><br /><p style='width: 100%;height: 53px;background-color: black;margin: 0 auto;font-family: Tahoma;font-weight: bold;font-size: 29px;text-align: center;padding-top: 17px;color: white;'>$code</p><br /><br /><a style='margin-top:30px; width: 133px;height: 20px;background-color: #468ce6;color: white;border-radius: 5px;margin: 0 auto;font-weight: bold;font-size: 19px;text-decoration: none;display: block;padding: 10px 20px;'  href='http://fanpass.co.nz/packages?type=0' type='buttom'>REDEEM NOW</a></td></tr><tr><td style='text-align: center; margin: 0;'><br /><br /><p>For full FAN PASS terms and conditions click here. FAN PASS is available on PC, Mac and select Apple and Android™ devices – please see www.fanpass.co.nz/faq for more details. HD quality is available on select tablets and PC/Mac with a suitable internet connection. Apple and the Apple logo are trademarks of Apple Inc., registered in the U.S. and other countries. App Store is a service mark of Apple Inc. Android™ and Google play™ are trademarks of Google Inc. <br><br>This message is sent to you by SKY Network Television Limited, of 10 Panorama Road, Mt Wellington, Auckland, New Zealand.  <br><br>Information contained in this email message is intended only for use of the individual or entity named above. If the reader of this message is not the intended recipient or employee or agent responsible to deliver it to the intended recipient, you are hereby notified that any dissemination, distribution or copying of this communication is strictly prohibited. If you have received this communication in error, please immediately notify the sender by email and destroy the original message. <br><br>You are currently subscribed to our mailing list on zoeysummer@vodafone.co.nz.  Please do not reply to this email as it is sent by an automated system, not a real life member of the FAN PASS team.</p><br /><br /><br /><a style='padding-right: 35px;color: white;text-decoration: underline;' href=''>Unsubscribe</a><a style='padding-right: 35px;color: white;text-decoration: underline;' href=''>Update preferences</a><a style='padding-right: 35px;color: white;text-decoration: underline;' href=''>Terms and conditions</a><a style='padding-right: 35px;color: white;text-decoration: underline;' href=''>Privacy</a><a style='padding-right: 35px;color: white;text-decoration: underline;' href=''>www.fanpass.co.nz</a></td></tr></table>";

		return $content;

	}

	public function dashboard() {
	}

	public function dashTest() {
	}

	public function pretest() {
		$user=$this->UserAuth->getUser(); 
		$user_group=$this->UserAuth->getGroupId();    
		$user=$this->User->findById($user['User']['id']);

		$this->set('user',$user);
	}

	public function test() {

		$questions = array();
		for ($i=0; $i < 8; $i++) { 
			$questionsByLevel_Lectura[$i] = $this->Question->find('all',array('conditions' => array('Question.level_3d' => ($i+1),'Question.type_id=1')));
			$questionsByLevel_Auditiva[$i] = $this->Question->find('all',array('conditions' => array('Question.level_3d' => ($i+1),'Question.type_id=2')));
		}

		$count = array(30,30,30,30,20,20,20,20);
		// $count = array(4,4,4,4,4,4,4,4);

		for ($i=0; $i < 8; $i++) {

			// $count = 4;

			$div = count($questionsByLevel_Lectura[$i]);
			$rand_1 = array_rand($questionsByLevel_Lectura[$i],$count[$i]/2);
			$rand_2 = array_rand($questionsByLevel_Auditiva[$i],$count[$i]/2);
			foreach ($rand_2 as $key => $value) {
				$rand_2[$key] = $value + $div;
			}

			$rand[$i] = array_merge($rand_1,$rand_2);	//random por modulo
			$questionsByLevel[$i] = array_merge($questionsByLevel_Lectura[$i],$questionsByLevel_Auditiva[$i]);
			$_SESSION["questionsByLevel"][$i] = $questionsByLevel[$i];
			$_SESSION["random"][$i] = $rand[$i];

		}

		$question = $questionsByLevel[0][$rand[0][0]]; //primera pregunta
		$question_ = array();
		$answers = array();
		$answers = $question['Answer'];

		$new_answers = array();
		foreach ($answers as $key => $value) {
			if($value['correct']==1){
				array_push($new_answers, $value);
				unset($answers[$key]);
			}
		}

		$rand = array_rand($answers,3);
		array_push($new_answers, $answers[$rand[0]]);
		array_push($new_answers, $answers[$rand[1]]);
		array_push($new_answers, $answers[$rand[2]]);
		$rand = array(0,1,2,3);
		shuffle($rand);
		$answers = array();
		$answers[0] = $new_answers[$rand[0]];
		$answers[1] = $new_answers[$rand[1]];
		$answers[2] = $new_answers[$rand[2]];
		$answers[3] = $new_answers[$rand[3]];
		$new_answers = array();

		foreach ($answers as $key => $value) {
			array_push($new_answers, array(
				'id' => $value['id'],
				'value' => $value['answer']
			));
		}

		$question_ = array(
			'id'=>$question['Question']['id'],
			'pregunta'=>$question['Question']['question'],
			'respuestas'=>$new_answers,
			'categoria'=>$question['Category']['name'],
			'tipo'=>$question['Type']['name'],
			'tipo_id'=>$question['Type']['id'],
			'nivel'=>$question['Question']['level_3d'],
			'audio'=>$question['Question']['audio']
		);
		// debug($question_);die;

		$this->set('count', $count[0]);
		$this->set('question', $question_);

	}

	public function modelTest() {
		$modelTest_1 = $this->Modeltest->find('all',array('conditions'=>array('Modeltest.type_id=1')));
		$modelTest_2 = $this->Modeltest->find('all',array('conditions'=>array('Modeltest.type_id=2')));
		$count = 6;
		$div = count($modelTest_1);
		$rand_1 = array_rand($modelTest_1,$count/2);
		$rand_2 = array_rand($modelTest_2,$count/2);
		foreach ($rand_2 as $key => $value) {
			$rand_2[$key] = $value + $div;
		}
		$rand = array_merge($rand_1,$rand_2);
		$modelTest = array_merge($modelTest_1,$modelTest_2);
		$_SESSION["modelTest"] = $modelTest;
		$_SESSION["rand"] = $rand;
		$question = $modelTest[$rand[0]];
		$question_ = array();
		$answers = array();
		$answers = $question['Answertest'];

		$new_answers = array();
		foreach ($answers as $key => $value) {
			if($value['correct']==1){
				array_push($new_answers, $value);
				unset($answers[$key]);
			}
		}

		$rand = array_rand($answers,3);
		array_push($new_answers, $answers[$rand[0]]);
		array_push($new_answers, $answers[$rand[1]]);
		array_push($new_answers, $answers[$rand[2]]);
		$rand = array(0,1,2,3);
		shuffle($rand);
		$answers = array();
		$answers[0] = $new_answers[$rand[0]];
		$answers[1] = $new_answers[$rand[1]];
		$answers[2] = $new_answers[$rand[2]];
		$answers[3] = $new_answers[$rand[3]];
		$new_answers = array();

		foreach ($answers as $key => $value) {
			array_push($new_answers, array(
				'id' => $value['id'],
				'value' => $value['answer']
			));
		}

		$question_ = array(
			'id'=>$question['Modeltest']['id'],
			'pregunta'=>$question['Modeltest']['question'],
			'respuestas'=>$new_answers,
			'categoria'=>$question['Category']['name'],
			'tipo'=>$question['Type']['name'],
			'tipo_id'=>$question['Type']['id'],
			'audio'=>$question['Modeltest']['audio']
		);

		$this->set('count', $count);
		$this->set('question', $question_);

	}

	public function modelDone() {
		$this->autoRender = false;
		if(isset($_POST['data'])){
			$data = $_POST['data'];
			// debug($data);
			return json_encode(1);
		}
	}


	public function doneTest($action=null){
		$title = "";
		$description = "";
		if(!is_null($action)){
			if($action==1){
				$title = "PRUEBA MODELO";
				$description = "Usted ha finalizado el examen modelo.";
				$description_chino = "您已经完成了所要求的级别水平考试";
			}elseif($action==2){
				$title = "PRUEBA DE ESPAÑOL";
				$description = "Usted ha finalizado el examen. El nivel obtenido representa que usted cumplio los requerimientos de dicho nivel.";
				$description_chino = "您已经完成了所要求的级别水平考试";
			}else{
				$title = "PRUEBA DE ESPAÑOL";
				$description = "Su tiempo ha expirado, Favor dirijase al administrador..";
				$description_chino = "您已经完成了所要求的级别水平考试";
			}
		}
		$user=$this->UserAuth->getUser();	
		$user=$this->User->findById($user['User']['id']);

		$this->set('user',$user);

		$this->set('title',$title);
		$this->set('description',$description);
		$this->set('description_chino',$description_chino);
	}


	public function nextLevel() {
		$this->autoRender = false;
		if(isset($_POST['data'])){
			$data = $_POST['data'];

			// debug($data);die;

			$user=$this->UserAuth->getUser();
			foreach ($data as $key => $value) {
				$result[$key] = array(
					'user_id'=>$user['User']['id']
				);
				$correct = 0;

				for ($i=0; $i < 4; $i++) { 
					$answer = $this->Answer->findById($value['answers']['answer_'.$i]);
					if($answer['Answer']['correct'] == 1){
						$correct = $answer['Answer']['id'];
					}
				}
				
				$level = $value['level'];
				$result[$key]['Question']['Question'][$key] = array(
					'question_id' => $value['question'],
					'level' => $value['level'],
					'answer_0' => $value['answers']['answer_0'],
					'answer_1' => $value['answers']['answer_1'],
					'answer_2' => $value['answers']['answer_2'],
					'answer_3' => $value['answers']['answer_3'],
					'answer_selected' => $value['answer'],
					'correct' => $correct
				);
			}


			$corrects = 0;
				foreach ($data as $key => $value) {
					$answer = $this->Answer->findById($value['answer']);
					if($answer['Answer']['correct'] == 1)
						$corrects++;
				}

				$percent = ($corrects*100)/$_SESSION['count'][($level-1)];

				$this->User->id = $user['User']['id'];
				$veces = $user['User']['presents'];
				$veces++;
				$this->User->saveField('done', 1);
				$this->User->saveField('presents', $veces);

				if($percent >= 75){//pasó de nivel
					if($this->Result->saveAll($result)){
						$this->User->id = $user['User']['id'];
						$this->User->saveField('actual_level', $level);
						return json_encode(1);
					}else{
						return json_encode(0);
					}
				}else{
					return json_encode(0);
				}

			}
	}

	private function __answersRandom($answers) {
		$this->autoRender = false;
		$new_answers = array();
		foreach ($answers as $key => $value) {
			if($value['correct']==1){
				$value['answer']=$value['answer'];
				array_push($new_answers, $value);
				unset($answers[$key]);
			}
		}
		$rand = array_rand($answers,3);
		array_push($new_answers, $answers[$rand[0]]);
		array_push($new_answers, $answers[$rand[1]]);
		array_push($new_answers, $answers[$rand[2]]);
		$rand = array(0,1,2,3);
		shuffle($rand);
		$answers = array();
		$answers[0] = $new_answers[$rand[0]];
		$answers[1] = $new_answers[$rand[1]];
		$answers[2] = $new_answers[$rand[2]];
		$answers[3] = $new_answers[$rand[3]];
		$new_answers = array();

		foreach ($answers as $key => $value) {
			array_push($new_answers, array(
				'id' => $value['id'],
				'value' => $value['answer']
			));
		}

		return $new_answers;
	}

	public function nextQuestion() {
		$this->autoRender = false;
		if(isset($_POST['question_id'])){

			$question = $_SESSION['modelTest'][$_SESSION["rand"][$_POST['question_id']]];

			$question = array(
				'id'=>$question['Modeltest']['id'],
				'pregunta'=>$question['Modeltest']['question'],
				'respuestas'=>$this->__answersRandom($question['Answertest']),
				'categoria'=>$question['Category']['name'],
				'tipo'=>$question['Type']['name'],
				'tipo_id'=>$question['Type']['id'],
				'audio'=>$question['Modeltest']['audio']
			);
			return json_encode($question);
		}
	}

	// public function deleteLevel() {
	// 	$this->autoRender = false;
	// 	if(isset($_POST['level'])){
	// 		$results = $this->find('all', array(
 //        'joins' => array(
 //          array('table' => 'results_questions',
 //            'alias' => 'ResultQuestion',
 //            'type' => 'INNER',
 //            'conditions' => array(
 //              'ResultQuestion.level' => $_POST['level']
 //            )
 //          )
 //        )
 //    	));
 //    	debug($results);die;
	// 	}
	// }

	public function nextQuestionTest() {
		$this->autoRender = false;
		if(isset($_POST['data'])){
// debug($_POST['data']['level']);
// debug($_POST['data']['id']);
			$this->log('level: '.$_POST['data']['level'].', id: '.$_POST['data']['id']);
			$question = $_SESSION['questionsByLevel'][$_POST['data']['level']][$_SESSION['random'][$_POST['data']['level']][$_POST['data']['id']]];
			$this->log('pasó');
			$total = count($_SESSION['random'][$_POST['data']['level']]);
			$question = array(
				'id'=>$question['Question']['id'],
				'pregunta'=>$question['Question']['question'],
				'respuestas'=>$this->__answersRandom($question['Answer']),
				'categoria'=>$question['Category']['name'],
				'tipo'=>$question['Type']['name'],
				'tipo_id'=>$question['Type']['id'],
				'nivel'=>$question['Question']['level_3d'],
				'audio'=>$question['Question']['audio'],
				'total'=>$total
			);
			return json_encode($question);
		}
	}

}
