<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PurchaseLinesPurchaseUpdates Model
 *
 * @property \App\Model\Table\PurchaseLinesTable&\Cake\ORM\Association\BelongsTo $PurchaseLines
 * @property \App\Model\Table\PurchaseUpdatesTable&\Cake\ORM\Association\BelongsTo $PurchaseUpdates
 * @property \App\Model\Table\ShipmentsTable&\Cake\ORM\Association\BelongsTo $Shipments
 *
 * @method \App\Model\Entity\PurchaseLinesPurchaseUpdate newEmptyEntity()
 * @method \App\Model\Entity\PurchaseLinesPurchaseUpdate newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PurchaseLinesPurchaseUpdate[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PurchaseLinesPurchaseUpdate get($primaryKey, $options = [])
 * @method \App\Model\Entity\PurchaseLinesPurchaseUpdate findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PurchaseLinesPurchaseUpdate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PurchaseLinesPurchaseUpdate[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PurchaseLinesPurchaseUpdate|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PurchaseLinesPurchaseUpdate saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PurchaseLinesPurchaseUpdate[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PurchaseLinesPurchaseUpdate[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PurchaseLinesPurchaseUpdate[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PurchaseLinesPurchaseUpdate[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PurchaseLinesPurchaseUpdatesTable extends Table
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

        $this->setTable('purchase_lines_purchase_updates');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('PurchaseLines', [
            'foreignKey' => 'purchase_line_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('PurchaseUpdates', [
            'foreignKey' => 'purchase_update_id',
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
        $rules->add($rules->existsIn(['purchase_line_id'], 'PurchaseLines'), ['errorField' => 'purchase_line_id']);
        $rules->add($rules->existsIn(['purchase_update_id'], 'PurchaseUpdates'), ['errorField' => 'purchase_update_id']);
        $rules->add($rules->existsIn(['shipment_id'], 'Shipments'), ['errorField' => 'shipment_id']);

        return $rules;
    }
}
