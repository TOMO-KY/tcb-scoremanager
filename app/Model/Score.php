<?php
App::uses('AppModel', 'Model');
/**
 * Score Model
 *
 * @property ScoreGroup $ScoreGroup
 * @property User $User
 */
class Score extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'score_group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'ScoreGroup' => array(
			'className' => 'ScoreGroup',
			'foreignKey' => 'score_group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public function beforeValidate( $options = array() ) {
        foreach( $this->data[$this->name] as &$val ) {
            $val = trim($val);
        }
        unset($val);
    }

}
