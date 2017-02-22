<?php
App::uses('Result', 'Model');

/**
 * Result Test Case
 *
 */
class ResultTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.result',
		'app.user',
		'app.user_group',
		'app.login_token',
		'app.question',
		'app.category',
		'app.type',
		'app.answer',
		'app.questions_user',
		'app.results_question'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Result = ClassRegistry::init('Result');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Result);

		parent::tearDown();
	}

}
