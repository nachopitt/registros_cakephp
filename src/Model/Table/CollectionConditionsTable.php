<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CollectionConditions Model
 *
 * @property \App\Model\Table\TagsTable&\Cake\ORM\Association\BelongsToMany $Tags
 *
 * @method \App\Model\Entity\CollectionCondition newEmptyEntity()
 * @method \App\Model\Entity\CollectionCondition newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CollectionCondition[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CollectionCondition get($primaryKey, $options = [])
 * @method \App\Model\Entity\CollectionCondition findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CollectionCondition patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CollectionCondition[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CollectionCondition|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CollectionCondition saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CollectionCondition[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CollectionCondition[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CollectionCondition[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CollectionCondition[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CollectionConditionsTable extends CatalogEntriesTable
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        $this->catalog = 'COLLECTION_CONDITION';
        parent::initialize($config);
    }
}
