<?php
App::uses('AppModel', 'Model');
/**
 * Member Model
 *
 * @property User $User
 */
class Member extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'member_gname' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'You must provide your first name',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'member_fname' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'You must provide your family name',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'member_address' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'You must provide your address',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),

        'member_postcode' => array(
            'numeric' => array(
                'rule'    => array('numeric'),
                'message' => 'Invalid postcode',
            ),
            'between' => array(
                'rule'    =>  array('between', '4', '4'),
                'message' => 'Invalid postcode format, must be 4 numbers'
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            )
        ),


		'member_email' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'An email is compulsory',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),

		'member_phone' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please enter your phone number, must be 8 digits',
            ),
            'between' => array(
            'rule' => array('between', '8','8'),
            )
		),

		'member_mobile' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please enter your mobile number, must be 10 digits',
            ),
                'between' => array(
                    'rule' => array('between', '10','10'),
                )
		),

		'active' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'member_id',
			'dependent' => false,
			'conditions' => '',
			// 'fields' => 'member_id', 'username', 'password', 'password_confirm', 'email', 'role',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

		 /**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
    public $hasAndBelongsToMany = array(
        'Course' => array(
            'className' => 'Course',
            'joinTable' => 'Courseenrolments',
            'foreignKey' => 'member_id',
            'associationForeignKey' => 'course_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
 
        )
    );

	// Set a virtual field so something other than a ID is displayed in other tables
	public $virtualFields =array('memberName' => 'CONCAT("ID #", Member.id, " - ", Member.member_gname, " ",
								  Member.member_mname, " ", Member.member_fname)');
	public $displayField = 'memberName';
	public $order= 'id ASC';
}
