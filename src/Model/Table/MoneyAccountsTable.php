<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MoneyAccounts Model
 *
 * @property \App\Model\Table\MoneyAccountTypesTable&\Cake\ORM\Association\BelongsTo $MoneyAccountTypes
 * @property \App\Model\Table\CurrenciesTable&\Cake\ORM\Association\BelongsTo $Currencies
 * @property \App\Model\Table\TransactionsTable&\Cake\ORM\Association\HasMany $Transactions
 *
 * @method \App\Model\Entity\MoneyAccount newEmptyEntity()
 * @method \App\Model\Entity\MoneyAccount newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\MoneyAccount[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MoneyAccount get($primaryKey, $options = [])
 * @method \App\Model\Entity\MoneyAccount findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\MoneyAccount patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MoneyAccount[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\MoneyAccount|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MoneyAccount saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MoneyAccount[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MoneyAccount[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\MoneyAccount[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MoneyAccount[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MoneyAccountsTable extends Table
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

        $this->setTable('money_accounts');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('MoneyAccountTypes', [
            'foreignKey' => 'money_account_type_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Currencies', [
            'foreignKey' => 'currency_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Transactions', [
            'foreignKey' => 'money_account_id',
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
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 45)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('number')
            ->maxLength('number', 100)
            ->requirePresence('number', 'create')
            ->notEmptyString('number');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['money_account_type_id'], 'MoneyAccountTypes'), ['errorField' => 'money_account_type_id']);
        $rules->add($rules->existsIn(['currency_id'], 'Currencies'), ['errorField' => 'currency_id']);

        return $rules;
    }
}
