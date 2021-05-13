<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Localities Model
 *
 * @property \App\Model\Table\TagsTable&\Cake\ORM\Association\BelongsToMany $Tags
 *
 * @method \App\Model\Entity\Locality newEmptyEntity()
 * @method \App\Model\Entity\Locality newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Locality[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Locality get($primaryKey, $options = [])
 * @method \App\Model\Entity\Locality findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Locality patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Locality[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Locality|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Locality saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Locality[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Locality[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Locality[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Locality[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LocalitiesTable extends CatalogEntriesTable
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        $this->catalog = 'LOCALITY';
        parent::initialize($config);
    }
}
