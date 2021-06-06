<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SaleLines Model
 *
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \App\Model\Table\UnitsTable&\Cake\ORM\Association\BelongsTo $Units
 * @property \App\Model\Table\CurrenciesTable&\Cake\ORM\Association\BelongsTo $Currencies
 * @property \App\Model\Table\SaleUpdatesTable&\Cake\ORM\Association\BelongsToMany $SaleUpdates
 *
 * @method \App\Model\Entity\SaleLine newEmptyEntity()
 * @method \App\Model\Entity\SaleLine newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\SaleLine[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SaleLine get($primaryKey, $options = [])
 * @method \App\Model\Entity\SaleLine findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\SaleLine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SaleLine[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\SaleLine|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SaleLine saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SaleLine[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SaleLine[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\SaleLine[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SaleLine[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SaleLinesTable extends Table
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

        $this->setTable('sale_lines');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Units', [
            'foreignKey' => 'unit_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Currencies', [
            'foreignKey' => 'currency_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('SaleUpdates', [
            'foreignKey' => 'sale_line_id',
            'targetForeignKey' => 'sale_update_id',
            'joinTable' => 'sale_lines_sale_updates',
            'through' => 'SaleLinesSaleUpdates',
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
            ->decimal('quantity')
            ->greaterThanOrEqual('quantity', 0)
            ->requirePresence('quantity', 'create')
            ->notEmptyString('quantity');

        $validator
            ->decimal('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        $validator
            ->decimal('discount')
            ->greaterThanOrEqual('discount', 0)
            ->requirePresence('discount', 'create')
            ->notEmptyString('discount');

        $validator
            ->boolean('percentage_discount')
            ->requirePresence('percentage_discount', 'create')
            ->notEmptyString('percentage_discount');

        $validator
            ->boolean('unit_discount')
            ->requirePresence('unit_discount', 'create')
            ->notEmptyString('unit_discount');

        $validator
            ->scalar('description')
            ->maxLength('description', 100)
            ->allowEmptyString('description');

        $validator
            ->requirePresence('product_id')
            ->notEmpty('product_id');

        $validator
            ->requirePresence('unit_id')
            ->notEmpty('unit_id');

        $validator
            ->requirePresence('currency_id')
            ->notEmpty('currency_id');

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
        $rules->add($rules->existsIn(['product_id'], 'Products'), ['errorField' => 'product_id']);
        $rules->add($rules->existsIn(['unit_id'], 'Units'), ['errorField' => 'unit_id']);
        $rules->add($rules->existsIn(['currency_id'], 'Currencies'), ['errorField' => 'currency_id']);

        return $rules;
    }
}
