<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MoneyMovements Model
 *
 * @property \App\Model\Table\UnitsTable&\Cake\ORM\Association\BelongsTo $Units
 * @property \App\Model\Table\CurrenciesTable&\Cake\ORM\Association\BelongsTo $Currencies
 * @property \App\Model\Table\PaymentMethodsTable&\Cake\ORM\Association\BelongsTo $PaymentMethods
 * @property \App\Model\Table\PurchaseLinesTable&\Cake\ORM\Association\HasMany $PurchaseLines
 * @property \App\Model\Table\SaleLinesTable&\Cake\ORM\Association\HasMany $SaleLines
 *
 * @method \App\Model\Entity\MoneyMovement newEmptyEntity()
 * @method \App\Model\Entity\MoneyMovement newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\MoneyMovement[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MoneyMovement get($primaryKey, $options = [])
 * @method \App\Model\Entity\MoneyMovement findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\MoneyMovement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MoneyMovement[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\MoneyMovement|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MoneyMovement saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MoneyMovement[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MoneyMovement[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\MoneyMovement[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MoneyMovement[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class MoneyMovementsTable extends Table
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

        $this->setTable('money_movements');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Units', [
            'foreignKey' => 'unit_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Currencies', [
            'foreignKey' => 'currency_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('PaymentMethods', [
            'foreignKey' => 'payment_method_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('PurchaseLines', [
            'foreignKey' => 'money_movement_id',
        ]);
        $this->hasMany('SaleLines', [
            'foreignKey' => 'money_movement_id',
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
            ->numeric('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        $validator
            ->numeric('quantity')
            ->greaterThanOrEqual('quantity', 0)
            ->requirePresence('quantity', 'create')
            ->notEmptyString('quantity');

        $validator
            ->numeric('discount')
            ->greaterThanOrEqual('discount', 0)
            ->requirePresence('discount', 'create')
            ->notEmptyString('discount');

        $validator
            ->boolean('discount_percentage')
            ->requirePresence('discount_percentage', 'create')
            ->notEmptyString('discount_percentage');

        $validator
            ->scalar('description')
            ->maxLength('description', 100)
            ->allowEmptyString('description');

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
        $rules->add($rules->existsIn(['unit_id'], 'Units'), ['errorField' => 'unit_id']);
        $rules->add($rules->existsIn(['currency_id'], 'Currencies'), ['errorField' => 'currency_id']);
        $rules->add($rules->existsIn(['payment_method_id'], 'PaymentMethods'), ['errorField' => 'payment_method_id']);

        return $rules;
    }
}
