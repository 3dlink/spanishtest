<?php
App::uses('AppModel', 'Model');
/**
 * Answertest Model
 *
 * @property Modeltest $Modeltest
 */
class Answertest extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Modeltest' => array(
			'className' => 'Modeltest',
			'foreignKey' => 'modeltest_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
