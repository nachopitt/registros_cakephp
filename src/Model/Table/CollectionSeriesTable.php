<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CollectionSeries Model
 *
 * @property \App\Model\Table\TagsTable&\Cake\ORM\Association\BelongsToMany $Tags
 *
 * @method \App\Model\Entity\CollectionSeries newEmptyEntity()
 * @method \App\Model\Entity\CollectionSeries newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CollectionSeries[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CollectionSeries get($primaryKey, $options = [])
 * @method \App\Model\Entity\CollectionSeries findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CollectionSeries patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CollectionSeries[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CollectionSeries|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CollectionSeries saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CollectionSeries[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CollectionSeries[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CollectionSeries[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CollectionSeries[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CollectionSeriesTable extends CatalogEntriesTable
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        $this->catalog = 'COLLECTION_SERIES';
        parent::initialize($config);
    }
}
