<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\EventInterface;
use ArrayObject;

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
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CatalogEntriesTable extends Table
{
    protected $catalog = '';
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
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        if ($this->getAlias() != 'Tags') {
            $this->belongsToMany('Tags', [
                'foreignKey' => 'catalog_entry_id',
                'targetForeignKey' => 'tag_id',
                'joinTable' => 'catalog_entries_tags',
            ]);
        }
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
            ->maxLength('name', 60)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('short_name')
            ->maxLength('short_name', 10)
            ->allowEmptyString('short_name');

        $validator
            ->scalar('catalog')
            ->maxLength('catalog', 45)
            ->requirePresence('catalog', 'create')
            ->notEmptyString('catalog');

        return $validator;
    }

    public function beforeFind(EventInterface $event, Query $query, ArrayObject $options, $primary)
    {
        if ($this->catalog != '') {
            $query->where([$this->getAlias() . '.catalog' => $this->catalog]);
        }
        return ;
    }

    public function getCatalogs(): array
    {
        return array(
            "COLLECTION" => 'Collection', 
            "COLLECTION_SERIES" => 'Collection series', 
            "COLLECTION_CONDITION" => 'Collection Condition', 
            "COLLECTION_REGION" => 'Collecton Region', 
            "CURRENCY" => 'Currency', 
            'CUSTOMER' => 'Customer', 
            "MERCHANT" => 'Merchant', 
            "MONEY_ACCOUNT_TYPE" => 'Money account type', 
            "PRODUCT" => 'Product', 
            "SELLER" => 'Seller', 
            "SHIPMENT_STATUS" => 'Shipment status', 
            "SHIPPER" => 'Shipper', 
            "TAG" => 'Tag', 
            "UNIT" => 'Unit',
            "LOCALITY" => 'Locality',
            "REGION" => 'Region',
            "COUNTRY" => 'Country',
        );
    }
}
