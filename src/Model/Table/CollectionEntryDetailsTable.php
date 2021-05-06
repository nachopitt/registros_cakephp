<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CollectionEntryDetails Model
 *
 * @property \App\Model\Table\CollectionEntriesTable&\Cake\ORM\Association\BelongsTo $CollectionEntries
 * @property \App\Model\Table\CollectionRegionsTable&\Cake\ORM\Association\BelongsTo $CollectionRegions
 * @property \App\Model\Table\CollectionConditionsTable&\Cake\ORM\Association\BelongsTo $CollectionConditions
 *
 * @method \App\Model\Entity\CollectionEntryDetail newEmptyEntity()
 * @method \App\Model\Entity\CollectionEntryDetail newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CollectionEntryDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CollectionEntryDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\CollectionEntryDetail findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CollectionEntryDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CollectionEntryDetail[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CollectionEntryDetail|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CollectionEntryDetail saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CollectionEntryDetail[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CollectionEntryDetail[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CollectionEntryDetail[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CollectionEntryDetail[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CollectionEntryDetailsTable extends Table
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

        $this->setTable('collection_entry_details');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('CollectionEntries', [
            'foreignKey' => 'collection_entry_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('CollectionRegions', [
            'foreignKey' => 'collection_region_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('CollectionConditions', [
            'foreignKey' => 'collection_condition_id',
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
        $rules->add($rules->existsIn(['collection_entry_id'], 'CollectionEntries'), ['errorField' => 'collection_entry_id']);
        $rules->add($rules->existsIn(['collection_region_id'], 'CollectionRegions'), ['errorField' => 'collection_region_id']);
        $rules->add($rules->existsIn(['collection_condition_id'], 'CollectionConditions'), ['errorField' => 'collection_condition_id']);

        return $rules;
    }
}
