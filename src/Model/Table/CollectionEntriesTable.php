<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CollectionEntries Model
 *
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \App\Model\Table\CollectionsTable&\Cake\ORM\Association\BelongsTo $Collections
 * @property \App\Model\Table\CollectionSeriesTable&\Cake\ORM\Association\BelongsTo $CollectionSeries
 * @property \App\Model\Table\CollectionEntryDetailsTable&\Cake\ORM\Association\HasMany $CollectionEntryDetails
 *
 * @method \App\Model\Entity\CollectionEntry newEmptyEntity()
 * @method \App\Model\Entity\CollectionEntry newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CollectionEntry[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CollectionEntry get($primaryKey, $options = [])
 * @method \App\Model\Entity\CollectionEntry findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CollectionEntry patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CollectionEntry[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CollectionEntry|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CollectionEntry saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CollectionEntry[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CollectionEntry[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CollectionEntry[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CollectionEntry[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CollectionEntriesTable extends Table
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

        $this->setTable('collection_entries');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Collections', [
            'foreignKey' => 'collection_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('CollectionSeries', [
            'foreignKey' => 'collection_series_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('CollectionEntryDetails', [
            'foreignKey' => 'collection_entry_id',
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
            ->nonNegativeInteger('number')
            ->requirePresence('number', 'create')
            ->notEmptyString('number');

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
        $rules->add($rules->existsIn(['product_id'], 'Products'), ['errorField' => 'product_id']);
        $rules->add($rules->existsIn(['collection_id'], 'Collections'), ['errorField' => 'collection_id']);
        $rules->add($rules->existsIn(['collection_series_id'], 'CollectionSeries'), ['errorField' => 'collection_series_id']);

        return $rules;
    }
}
