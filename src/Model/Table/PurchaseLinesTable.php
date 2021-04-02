<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PurchaseLines Model
 *
 * @property \App\Model\Table\PurchasesTable&\Cake\ORM\Association\BelongsTo $Purchases
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \App\Model\Table\MoneyMovementsTable&\Cake\ORM\Association\BelongsTo $MoneyMovements
 * @property \App\Model\Table\ShipmentsTable&\Cake\ORM\Association\BelongsTo $Shipments
 *
 * @method \App\Model\Entity\PurchaseLine newEmptyEntity()
 * @method \App\Model\Entity\PurchaseLine newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PurchaseLine[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PurchaseLine get($primaryKey, $options = [])
 * @method \App\Model\Entity\PurchaseLine findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PurchaseLine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PurchaseLine[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PurchaseLine|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PurchaseLine saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PurchaseLine[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PurchaseLine[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PurchaseLine[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PurchaseLine[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PurchaseLinesTable extends Table
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

        $this->setTable('purchase_lines');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Purchases', [
            'foreignKey' => 'purchase_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('MoneyMovements', [
            'foreignKey' => 'money_movement_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Shipments', [
            'foreignKey' => 'shipment_id',
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
        $rules->add($rules->existsIn(['purchase_id'], 'Purchases'), ['errorField' => 'purchase_id']);
        $rules->add($rules->existsIn(['product_id'], 'Products'), ['errorField' => 'product_id']);
        $rules->add($rules->existsIn(['money_movement_id'], 'MoneyMovements'), ['errorField' => 'money_movement_id']);
        $rules->add($rules->existsIn(['shipment_id'], 'Shipments'), ['errorField' => 'shipment_id']);

        return $rules;
    }
}
