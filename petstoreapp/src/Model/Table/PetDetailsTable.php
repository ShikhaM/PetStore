<?php
namespace App\Model\Table;

use App\Model\Entity\PetDetail;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PetDetails Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 */
class PetDetailsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('pet_details');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('species', 'create')
            ->notEmpty('species');

        $validator
            ->requirePresence('subspecies', 'create')
            ->notEmpty('subspecies');

        $validator
            ->date('dob')
            ->requirePresence('dob', 'create')
            ->notEmpty('dob');

        $validator
            ->numeric('weight')
            ->requirePresence('weight', 'create')
            ->notEmpty('weight');

        $validator
            ->numeric('price')
            ->requirePresence('price', 'create')
            ->notEmpty('price');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->requirePresence('colour', 'create')
            ->notEmpty('colour');

        $validator
            ->requirePresence('collection_location', 'create')
            ->notEmpty('collection_location');

        $validator
            ->requirePresence('image_url', 'create')
            ->notEmpty('image_url');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }
}
