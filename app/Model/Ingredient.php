<?php
App::uses('AppModel', 'Model');
/**
 * Ingredient Model
 *
 * @property CoreIngredient $CoreIngredient
 * @property Location $Location
 * @property Unit $Unit
 * @property User $User
 */
class Ingredient extends AppModel {

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
            'name' => array(
                    'notEmpty' => array(
                            'rule' => array('notEmpty'),
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
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
            'CoreIngredient' => array(
                    'className' => 'CoreIngredient',
                    'foreignKey' => 'core_ingredient_id',
            ),
            'Location' => array(
                    'className' => 'Location',
                    'foreignKey' => 'location_id',
            ),
            'Unit' => array(
                    'className' => 'Unit',
                    'foreignKey' => 'unit_id',
            ),
            'User' => array(
                    'className' => 'User',
                    'foreignKey' => 'user_id',
            )
    );

    public $hasMany = array(
        'IngredientMapping' => array(
            'className' => 'IngredientMapping',
            'foreignKey' => 'ingredient_id',
            'order' => 'IngredientMapping.sort_order',
            'dependent' => true
        )
    );
}
