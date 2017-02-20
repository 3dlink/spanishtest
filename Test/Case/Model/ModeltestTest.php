<?php
App::uses('Modeltest', 'Model');

/**
 * Modeltest Test Case
 *
 */
class ModeltestTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		$this->Modeltest = ClassRegistry::init('Modeltest');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Modeltest);

		parent::tearDown();
	}

}
