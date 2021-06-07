<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PurchaseUpdates Model
 *
 * @property \App\Model\Table\PurchasesTable&\Cake\ORM\Association\BelongsTo $Purchases
 * @property \App\Model\Table\PurchaseStatusesTable&\Cake\ORM\Association\BelongsTo $PurchaseStatuses
 * @property \App\Model\Table\ShipmentsTable&\Cake\ORM\Association\BelongsTo $Shipments
 * @property \App\Model\Table\PurchaseLinesTable&\Cake\ORM\Association\BelongsToMany $PurchaseLines
 *
 * @method \App\Model\Entity\PurchaseUpdate newEmptyEntity()
 * @method \App\Model\Entity\PurchaseUpdate newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PurchaseUpdate[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PurchaseUpdate get($primaryKey, $options = [])
 * @method \App\Model\Entity\PurchaseUpdate findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PurchaseUpdate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PurchaseUpdate[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PurchaseUpdate|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PurchaseUpdate saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PurchaseUpdate[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PurchaseUpdate[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PurchaseUpdate[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PurchaseUpdate[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PurchaseUpdatesTable extends Table
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

        $this->setTable('purchase_updates');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Purchases', [
            'foreignKey' => 'purchase_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('PurchaseStatuses', [
            'foreignKey' => 'purchase_status_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Shipments', [
            'foreignKey' => 'shipment_id',
        ]);
        $this->belongsToMany('PurchaseLines', [
            'foreignKey' => 'purchase_update_id',
            'targetForeignKey' => 'purchase_line_id',
            'joinTable' => 'purchase_lines_purchase_updates',
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
            ->dateTime('date')
            ->requirePresence('date', 'create')
            ->notEmptyDateTime('date');

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
        $rules->add($rules->existsIn(['purchase_status_id'], 'PurchaseStatuses'), ['errorField' => 'purchase_status_id']);
        $rules->add($rules->existsIn(['shipment_id'], 'Shipments'), ['errorField' => 'shipment_id']);

        return $rules;
    }
}
