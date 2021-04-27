<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ShipmentUpdates Model
 *
 * @property \App\Model\Table\ShipmentsTable&\Cake\ORM\Association\BelongsTo $Shipments
 * @property \App\Model\Table\ShipmentStatusesTable&\Cake\ORM\Association\BelongsTo $ShipmentStatuses
 *
 * @method \App\Model\Entity\ShipmentUpdate newEmptyEntity()
 * @method \App\Model\Entity\ShipmentUpdate newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ShipmentUpdate[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ShipmentUpdate get($primaryKey, $options = [])
 * @method \App\Model\Entity\ShipmentUpdate findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ShipmentUpdate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ShipmentUpdate[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ShipmentUpdate|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ShipmentUpdate saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ShipmentUpdate[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ShipmentUpdate[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ShipmentUpdate[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ShipmentUpdate[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ShipmentUpdatesTable extends Table
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

        $this->setTable('shipment_updates');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Shipments', [
            'foreignKey' => 'shipment_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('ShipmentStatuses', [
            'foreignKey' => 'shipment_status_id',
            'joinType' => 'INNER',
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
        $rules->add($rules->existsIn(['shipment_id'], 'Shipments'), ['errorField' => 'shipment_id']);
        $rules->add($rules->existsIn(['shipment_status_id'], 'ShipmentStatuses'), ['errorField' => 'shipment_status_id']);

        return $rules;
    }
}
