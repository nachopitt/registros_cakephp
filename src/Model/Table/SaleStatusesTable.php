<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SaleStatuses Model
 * 
 * @property \App\Model\Table\TagsTable&\Cake\ORM\Association\BelongsToMany $Tags
 *
 * @method \App\Model\Entity\SaleStatus newEmptyEntity()
 * @method \App\Model\Entity\SaleStatus newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\SaleStatus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SaleStatus get($primaryKey, $options = [])
 * @method \App\Model\Entity\SaleStatus findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\SaleStatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SaleStatus[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\SaleStatus|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SaleStatus saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SaleStatus[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SaleStatus[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\SaleStatus[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SaleStatus[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SaleStatusesTable extends CatalogEntriesTable
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        $this->catalog = 'SALE_STATUS';
        parent::initialize($config);
    }

    public function getInitialStates(): array {
        return ['SOLD', 'ORDERED'];
    }
}
