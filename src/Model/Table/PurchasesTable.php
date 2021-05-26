<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Purchases Model
 *
 * @property \App\Model\Table\MerchantsTable&\Cake\ORM\Association\BelongsTo $Merchants
 * @property \App\Model\Table\TransactionTriggersTable&\Cake\ORM\Association\BelongsTo $TransactionTriggers
 * @property \App\Model\Table\PurchaseUpdatesTable&\Cake\ORM\Association\HasMany $PurchaseUpdates
 *
 * @method \App\Model\Entity\Purchase newEmptyEntity()
 * @method \App\Model\Entity\Purchase newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Purchase[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Purchase get($primaryKey, $options = [])
 * @method \App\Model\Entity\Purchase findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Purchase patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Purchase[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Purchase|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Purchase saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Purchase[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Purchase[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Purchase[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Purchase[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PurchasesTable extends Table
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

        $this->setTable('purchases');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Merchants', [
            'foreignKey' => 'merchant_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('TransactionTriggers', [
            'foreignKey' => 'transaction_trigger_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('PurchaseUpdates', [
            'foreignKey' => 'purchase_id',
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
            ->scalar('purchase_number')
            ->maxLength('purchase_number', 45)
            ->allowEmptyString('purchase_number');

        $validator
            ->scalar('purchase_url')
            ->maxLength('purchase_url', 2048)
            ->allowEmptyString('purchase_url');

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
        $rules->add($rules->existsIn(['transaction_trigger_id'], 'TransactionTriggers'), ['errorField' => 'transaction_trigger_id']);
        $rules->add($rules->existsIn(['merchant_id'], 'Merchants'), ['errorField' => 'merchant_id']);

        return $rules;
    }
}
