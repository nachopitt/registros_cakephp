<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CollectionRegions Model
 *
 * @property \App\Model\Table\TagsTable&\Cake\ORM\Association\BelongsToMany $Tags
 *
 * @method \App\Model\Entity\CollectionRegion newEmptyEntity()
 * @method \App\Model\Entity\CollectionRegion newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CollectionRegion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CollectionRegion get($primaryKey, $options = [])
 * @method \App\Model\Entity\CollectionRegion findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CollectionRegion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CollectionRegion[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CollectionRegion|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CollectionRegion saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CollectionRegion[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CollectionRegion[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CollectionRegion[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CollectionRegion[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CollectionRegionsTable extends CatalogEntriesTable
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        $this->catalog = 'COLLECTION_REGION';
        parent::initialize($config);
    }
}
