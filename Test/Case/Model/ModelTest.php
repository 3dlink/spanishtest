<?php
App::uses('Model', 'Model');

/**
 * Model Test Case
 *
 */
class ModelTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.model'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Model = ClassRegistry::init('Model');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Model);

		parent::tearDown();
	}

/**
 * testImplementedEvents method
 *
 * @return void
 */
	public function testImplementedEvents() {
		$this->markTestIncomplete('testImplementedEvents not implemented.');
	}

/**
 * testGetEventManager method
 *
 * @return void
 */
	public function testGetEventManager() {
		$this->markTestIncomplete('testGetEventManager not implemented.');
	}

/**
 * testBindModel method
 *
 * @return void
 */
	public function testBindModel() {
		$this->markTestIncomplete('testBindModel not implemented.');
	}

/**
 * testUnbindModel method
 *
 * @return void
 */
	public function testUnbindModel() {
		$this->markTestIncomplete('testUnbindModel not implemented.');
	}

/**
 * testSetSource method
 *
 * @return void
 */
	public function testSetSource() {
		$this->markTestIncomplete('testSetSource not implemented.');
	}

/**
 * testSet method
 *
 * @return void
 */
	public function testSet() {
		$this->markTestIncomplete('testSet not implemented.');
	}

/**
 * testDeconstruct method
 *
 * @return void
 */
	public function testDeconstruct() {
		$this->markTestIncomplete('testDeconstruct not implemented.');
	}

/**
 * testSchema method
 *
 * @return void
 */
	public function testSchema() {
		$this->markTestIncomplete('testSchema not implemented.');
	}

/**
 * testGetColumnTypes method
 *
 * @return void
 */
	public function testGetColumnTypes() {
		$this->markTestIncomplete('testGetColumnTypes not implemented.');
	}

/**
 * testGetColumnType method
 *
 * @return void
 */
	public function testGetColumnType() {
		$this->markTestIncomplete('testGetColumnType not implemented.');
	}

/**
 * testHasField method
 *
 * @return void
 */
	public function testHasField() {
		$this->markTestIncomplete('testHasField not implemented.');
	}

/**
 * testHasMethod method
 *
 * @return void
 */
	public function testHasMethod() {
		$this->markTestIncomplete('testHasMethod not implemented.');
	}

/**
 * testIsVirtualField method
 *
 * @return void
 */
	public function testIsVirtualField() {
		$this->markTestIncomplete('testIsVirtualField not implemented.');
	}

/**
 * testGetVirtualField method
 *
 * @return void
 */
	public function testGetVirtualField() {
		$this->markTestIncomplete('testGetVirtualField not implemented.');
	}

/**
 * testCreate method
 *
 * @return void
 */
	public function testCreate() {
		$this->markTestIncomplete('testCreate not implemented.');
	}

/**
 * testClear method
 *
 * @return void
 */
	public function testClear() {
		$this->markTestIncomplete('testClear not implemented.');
	}

/**
 * testRead method
 *
 * @return void
 */
	public function testRead() {
		$this->markTestIncomplete('testRead not implemented.');
	}

/**
 * testField method
 *
 * @return void
 */
	public function testField() {
		$this->markTestIncomplete('testField not implemented.');
	}

/**
 * testSaveField method
 *
 * @return void
 */
	public function testSaveField() {
		$this->markTestIncomplete('testSaveField not implemented.');
	}

/**
 * testSave method
 *
 * @return void
 */
	public function testSave() {
		$this->markTestIncomplete('testSave not implemented.');
	}

/**
 * testUpdateCounterCache method
 *
 * @return void
 */
	public function testUpdateCounterCache() {
		$this->markTestIncomplete('testUpdateCounterCache not implemented.');
	}

/**
 * testSaveAll method
 *
 * @return void
 */
	public function testSaveAll() {
		$this->markTestIncomplete('testSaveAll not implemented.');
	}

/**
 * testSaveMany method
 *
 * @return void
 */
	public function testSaveMany() {
		$this->markTestIncomplete('testSaveMany not implemented.');
	}

/**
 * testValidateMany method
 *
 * @return void
 */
	public function testValidateMany() {
		$this->markTestIncomplete('testValidateMany not implemented.');
	}

/**
 * testSaveAssociated method
 *
 * @return void
 */
	public function testSaveAssociated() {
		$this->markTestIncomplete('testSaveAssociated not implemented.');
	}

/**
 * testValidateAssociated method
 *
 * @return void
 */
	public function testValidateAssociated() {
		$this->markTestIncomplete('testValidateAssociated not implemented.');
	}

/**
 * testUpdateAll method
 *
 * @return void
 */
	public function testUpdateAll() {
		$this->markTestIncomplete('testUpdateAll not implemented.');
	}

/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {
		$this->markTestIncomplete('testDelete not implemented.');
	}

/**
 * testDeleteAll method
 *
 * @return void
 */
	public function testDeleteAll() {
		$this->markTestIncomplete('testDeleteAll not implemented.');
	}

/**
 * testExists method
 *
 * @return void
 */
	public function testExists() {
		$this->markTestIncomplete('testExists not implemented.');
	}

/**
 * testHasAny method
 *
 * @return void
 */
	public function testHasAny() {
		$this->markTestIncomplete('testHasAny not implemented.');
	}

/**
 * testFind method
 *
 * @return void
 */
	public function testFind() {
		$this->markTestIncomplete('testFind not implemented.');
	}

/**
 * testBuildQuery method
 *
 * @return void
 */
	public function testBuildQuery() {
		$this->markTestIncomplete('testBuildQuery not implemented.');
	}

/**
 * testResetAssociations method
 *
 * @return void
 */
	public function testResetAssociations() {
		$this->markTestIncomplete('testResetAssociations not implemented.');
	}

/**
 * testIsUnique method
 *
 * @return void
 */
	public function testIsUnique() {
		$this->markTestIncomplete('testIsUnique not implemented.');
	}

/**
 * testQuery method
 *
 * @return void
 */
	public function testQuery() {
		$this->markTestIncomplete('testQuery not implemented.');
	}

/**
 * testValidates method
 *
 * @return void
 */
	public function testValidates() {
		$this->markTestIncomplete('testValidates not implemented.');
	}

/**
 * testInvalidFields method
 *
 * @return void
 */
	public function testInvalidFields() {
		$this->markTestIncomplete('testInvalidFields not implemented.');
	}

/**
 * testInvalidate method
 *
 * @return void
 */
	public function testInvalidate() {
		$this->markTestIncomplete('testInvalidate not implemented.');
	}

/**
 * testIsForeignKey method
 *
 * @return void
 */
	public function testIsForeignKey() {
		$this->markTestIncomplete('testIsForeignKey not implemented.');
	}

/**
 * testEscapeField method
 *
 * @return void
 */
	public function testEscapeField() {
		$this->markTestIncomplete('testEscapeField not implemented.');
	}

/**
 * testGetID method
 *
 * @return void
 */
	public function testGetID() {
		$this->markTestIncomplete('testGetID not implemented.');
	}

/**
 * testGetLastInsertID method
 *
 * @return void
 */
	public function testGetLastInsertID() {
		$this->markTestIncomplete('testGetLastInsertID not implemented.');
	}

/**
 * testGetInsertID method
 *
 * @return void
 */
	public function testGetInsertID() {
		$this->markTestIncomplete('testGetInsertID not implemented.');
	}

/**
 * testSetInsertID method
 *
 * @return void
 */
	public function testSetInsertID() {
		$this->markTestIncomplete('testSetInsertID not implemented.');
	}

/**
 * testGetNumRows method
 *
 * @return void
 */
	public function testGetNumRows() {
		$this->markTestIncomplete('testGetNumRows not implemented.');
	}

/**
 * testGetAffectedRows method
 *
 * @return void
 */
	public function testGetAffectedRows() {
		$this->markTestIncomplete('testGetAffectedRows not implemented.');
	}

/**
 * testSetDataSource method
 *
 * @return void
 */
	public function testSetDataSource() {
		$this->markTestIncomplete('testSetDataSource not implemented.');
	}

/**
 * testGetDataSource method
 *
 * @return void
 */
	public function testGetDataSource() {
		$this->markTestIncomplete('testGetDataSource not implemented.');
	}

/**
 * testAssociations method
 *
 * @return void
 */
	public function testAssociations() {
		$this->markTestIncomplete('testAssociations not implemented.');
	}

/**
 * testGetAssociated method
 *
 * @return void
 */
	public function testGetAssociated() {
		$this->markTestIncomplete('testGetAssociated not implemented.');
	}

/**
 * testJoinModel method
 *
 * @return void
 */
	public function testJoinModel() {
		$this->markTestIncomplete('testJoinModel not implemented.');
	}

/**
 * testBeforeFind method
 *
 * @return void
 */
	public function testBeforeFind() {
		$this->markTestIncomplete('testBeforeFind not implemented.');
	}

/**
 * testAfterFind method
 *
 * @return void
 */
	public function testAfterFind() {
		$this->markTestIncomplete('testAfterFind not implemented.');
	}

/**
 * testBeforeSave method
 *
 * @return void
 */
	public function testBeforeSave() {
		$this->markTestIncomplete('testBeforeSave not implemented.');
	}

/**
 * testAfterSave method
 *
 * @return void
 */
	public function testAfterSave() {
		$this->markTestIncomplete('testAfterSave not implemented.');
	}

/**
 * testBeforeDelete method
 *
 * @return void
 */
	public function testBeforeDelete() {
		$this->markTestIncomplete('testBeforeDelete not implemented.');
	}

/**
 * testAfterDelete method
 *
 * @return void
 */
	public function testAfterDelete() {
		$this->markTestIncomplete('testAfterDelete not implemented.');
	}

/**
 * testBeforeValidate method
 *
 * @return void
 */
	public function testBeforeValidate() {
		$this->markTestIncomplete('testBeforeValidate not implemented.');
	}

/**
 * testAfterValidate method
 *
 * @return void
 */
	public function testAfterValidate() {
		$this->markTestIncomplete('testAfterValidate not implemented.');
	}

/**
 * testOnError method
 *
 * @return void
 */
	public function testOnError() {
		$this->markTestIncomplete('testOnError not implemented.');
	}

/**
 * testValidator method
 *
 * @return void
 */
	public function testValidator() {
		$this->markTestIncomplete('testValidator not implemented.');
	}

}
