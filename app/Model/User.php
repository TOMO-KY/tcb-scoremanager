<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Role $Role
 * @property Score $Score
 * @property UserAuthorization $UserAuthorization
 */
class User extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'last_name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => '入力必須項目です',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'first_name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => '入力必須項目です',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => '有効なメールアドレスを入力してください',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' => array(
			    'rule' => 'isUnique',
                'message' => 'そのメールアドレスは既に使われています。'
            ),
		),
		'role_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => '選択に誤りがあります',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

	public $belongsTo = array(
		'Role' => array(
			'className' => 'Role',
			'foreignKey' => 'role_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	public $hasOne = array(
		'UserAuthorization' => array(
			'className' => 'UserAuthorization',
			'foreignKey' => 'user_id',
			'dependent' => false
		)
	);
	
	public $hasMany = array(
		'Score' => array(
			'className' => 'Score',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	public function beforeValidate( $options = array() ) {
        foreach( $this->data[$this->name] as &$val ) {
            $val = trim($val);
        }
        unset($val);
    }

}
