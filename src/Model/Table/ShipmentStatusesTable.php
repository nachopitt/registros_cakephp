<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ShipmentStatuses Model
 *
 * @property \App\Model\Table\TagsTable&\Cake\ORM\Association\BelongsToMany $Tags
 *
 * @method \App\Model\Entity\ShipmentStatus newEmptyEntity()
 * @method \App\Model\Entity\ShipmentStatus newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ShipmentStatus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ShipmentStatus get($primaryKey, $options = [])
 * @method \App\Model\Entity\ShipmentStatus findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ShipmentStatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ShipmentStatus[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ShipmentStatus|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ShipmentStatus saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ShipmentStatus[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ShipmentStatus[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ShipmentStatus[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ShipmentStatus[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ShipmentStatusesTable extends CatalogEntriesTable
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        $this->catalog = 'SHIPMENT_STATUS';
        parent::initialize($config);

        $this->setTable('catalog_entries');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
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
            ->scalar('name')
            ->maxLength('name', 45)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('catalog')
            ->maxLength('catalog', 45)
            ->requirePresence('catalog', 'create')
            ->notEmptyString('catalog');

        return $validator;
    }
}
