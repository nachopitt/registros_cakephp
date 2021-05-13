<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Shippers Model
 *
 * @property \App\Model\Table\TagsTable&\Cake\ORM\Association\BelongsToMany $Tags
 *
 * @method \App\Model\Entity\Shipper newEmptyEntity()
 * @method \App\Model\Entity\Shipper newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Shipper[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Shipper get($primaryKey, $options = [])
 * @method \App\Model\Entity\Shipper findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Shipper patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Shipper[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Shipper|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Shipper saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Shipper[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Shipper[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Shipper[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Shipper[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ShippersTable extends CatalogEntriesTable
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        $this->catalog = 'SHIPPER';
        parent::initialize($config);
    }
}
