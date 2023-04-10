<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Friends Model
 *
 * @property \App\Model\Table\SpousesTable&\Cake\ORM\Association\HasMany $Spouses
 *
 * @method \App\Model\Entity\Friend newEmptyEntity()
 * @method \App\Model\Entity\Friend newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Friend[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Friend get($primaryKey, $options = [])
 * @method \App\Model\Entity\Friend findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Friend patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Friend[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Friend|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Friend saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Friend[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Friend[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Friend[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Friend[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FriendsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('friends');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Spouses', [
            'foreignKey' => 'friend_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->maxLength('name', 25)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->numeric('amount')
            ->requirePresence('amount', 'create')
            ->notEmptyString('amount');

        $validator
            ->scalar('city')
            ->maxLength('city', 20)
            ->requirePresence('city', 'create')
            ->notEmptyString('city');

        return $validator;
    }
}
