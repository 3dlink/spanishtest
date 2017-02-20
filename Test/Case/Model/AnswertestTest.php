<?php
App::uses('Answertest', 'Model');

/**
 * Answertest Test Case
 *
 */
class AnswertestTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.answertest',
		'app.modeltest',
		'app.category',
		'app.type',
		'app.question',
		'app.answer',
		'app.user',
		'app.user_group',
		'app.login_token',
		'app.questions_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Answertest = ClassRegistry::init('Answertest');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Answertest);

		parent::tearDown();
	}

}
