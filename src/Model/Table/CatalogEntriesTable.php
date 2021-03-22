<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CatalogEntries Model
 *
 * @property \App\Model\Table\TagsTable&\Cake\ORM\Association\BelongsToMany $Tags
 *
 * @method \App\Model\Entity\CatalogEntry newEmptyEntity()
 * @method \App\Model\Entity\CatalogEntry newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CatalogEntry[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CatalogEntry get($primaryKey, $options = [])
 * @method \App\Model\Entity\CatalogEntry findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CatalogEntry patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CatalogEntry[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CatalogEntry|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CatalogEntry saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CatalogEntry[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CatalogEntry[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CatalogEntry[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CatalogEntry[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CatalogEntriesTable extends Table
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

        $this->setTable('catalog_entries');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Tags', [
            'foreignKey' => 'catalog_entry_id',
            'targetForeignKey' => 'tag_id',
            'joinTable' => 'catalog_entries_tags',
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
            ->scalar('entry_name')
            ->maxLength('entry_name', 45)
            ->requirePresence('entry_name', 'create')
            ->notEmptyString('entry_name');

        $validator
            ->scalar('catalog_name')
            ->maxLength('catalog_name', 45)
            ->requirePresence('catalog_name', 'create')
            ->notEmptyString('catalog_name');

        return $validator;
    }
}
