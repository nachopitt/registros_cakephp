<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SaleLinesSaleUpdates Model
 *
 * @property \App\Model\Table\SaleLinesTable&\Cake\ORM\Association\BelongsTo $SaleLines
 * @property \App\Model\Table\SaleUpdatesTable&\Cake\ORM\Association\BelongsTo $SaleUpdates
 * @property \App\Model\Table\ShipmentsTable&\Cake\ORM\Association\BelongsTo $Shipments
 *
 * @method \App\Model\Entity\SaleLinesSaleUpdate newEmptyEntity()
 * @method \App\Model\Entity\SaleLinesSaleUpdate newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\SaleLinesSaleUpdate[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SaleLinesSaleUpdate get($primaryKey, $options = [])
 * @method \App\Model\Entity\SaleLinesSaleUpdate findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\SaleLinesSaleUpdate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SaleLinesSaleUpdate[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\SaleLinesSaleUpdate|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SaleLinesSaleUpdate saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SaleLinesSaleUpdate[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SaleLinesSaleUpdate[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\SaleLinesSaleUpdate[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SaleLinesSaleUpdate[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SaleLinesSaleUpdatesTable extends Table
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

        $this->setTable('sale_lines_sale_updates');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('SaleLines', [
            'foreignKey' => 'sale_line_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('SaleUpdates', [
            'foreignKey' => 'sale_update_id',
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
        $rules->add($rules->existsIn(['sale_line_id'], 'SaleLines'), ['errorField' => 'sale_line_id']);
        $rules->add($rules->existsIn(['sale_update_id'], 'SaleUpdates'), ['errorField' => 'sale_update_id']);
        $rules->add($rules->existsIn(['shipment_id'], 'Shipments'), ['errorField' => 'shipment_id']);

        return $rules;
    }
}
