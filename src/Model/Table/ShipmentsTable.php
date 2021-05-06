<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Shipments Model
 *
 * @property \App\Model\Table\ShippersTable&\Cake\ORM\Association\BelongsTo $Shippers
 * @property \App\Model\Table\SendersTable&\Cake\ORM\Association\BelongsTo $Senders
 * @property \App\Model\Table\AddressesTable&\Cake\ORM\Association\BelongsTo $ShippingFromAddresses
 * @property \App\Model\Table\RecipientsTable&\Cake\ORM\Association\BelongsTo $Recipients
 * @property \App\Model\Table\AddressesTable&\Cake\ORM\Association\BelongsTo $ShippingToAddresses
 * @property \App\Model\Table\PurchaseLinesTable&\Cake\ORM\Association\HasMany $PurchaseLines
 * @property \App\Model\Table\SaleLinesTable&\Cake\ORM\Association\HasMany $SaleLines
 * @property \App\Model\Table\ShipmentUpdatesTable&\Cake\ORM\Association\HasMany $ShipmentUpdates
 *
 * @method \App\Model\Entity\Shipment newEmptyEntity()
 * @method \App\Model\Entity\Shipment newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Shipment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Shipment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Shipment findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Shipment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Shipment[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Shipment|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Shipment saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Shipment[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Shipment[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Shipment[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Shipment[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ShipmentsTable extends Table
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

        $this->setTable('shipments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Shippers', [
            'foreignKey' => 'shipper_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Senders', [
            'className' => 'Merchants',
            'foreignKey' => 'sender_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('ShippingFromAddresses', [
            'className' => 'Addresses',
            'foreignKey' => 'shipping_from_address_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Recipients', [
            'className' => 'Merchants',
            'foreignKey' => 'recipient_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('ShippingToAddresses', [
            'className' => 'Addresses',
            'foreignKey' => 'shipping_to_address_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('PurchaseLines', [
            'foreignKey' => 'shipment_id',
        ]);
        $this->hasMany('SaleLines', [
            'foreignKey' => 'shipment_id',
        ]);
        $this->hasMany('ShipmentUpdates', [
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
            ->dateTime('date')
            ->requirePresence('date', 'create')
            ->notEmptyDateTime('date');

        $validator
            ->scalar('tracking_number')
            ->maxLength('tracking_number', 45)
            ->requirePresence('tracking_number', 'create')
            ->notEmptyString('tracking_number');

        $validator
            ->scalar('tracking_url')
            ->maxLength('tracking_url', 2048)
            ->requirePresence('tracking_url', 'create')
            ->notEmptyString('tracking_url');

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
        $rules->add($rules->existsIn(['shipper_id'], 'Shippers'), ['errorField' => 'shipper_id']);
        $rules->add($rules->existsIn(['sender_id'], 'Senders'), ['errorField' => 'sender_id']);
        $rules->add($rules->existsIn(['shipping_from_address_id'], 'ShippingFromAddresses'), ['errorField' => 'shipping_from_address_id']);
        $rules->add($rules->existsIn(['recipient_id'], 'Recipients'), ['errorField' => 'recipient_id']);
        $rules->add($rules->existsIn(['shipping_to_address_id'], 'ShippingToAddresses'), ['errorField' => 'shipping_to_address_id']);

        return $rules;
    }
}
