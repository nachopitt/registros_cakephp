<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Currencies Model
 *
 * @property \App\Model\Table\TagsTable&\Cake\ORM\Association\BelongsToMany $Tags
 *
 * @method \App\Model\Entity\Currency newEmptyEntity()
 * @method \App\Model\Entity\Currency newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Currency[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Currency get($primaryKey, $options = [])
 * @method \App\Model\Entity\Currency findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Currency patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Currency[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Currency|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Currency saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Currency[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Currency[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Currency[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Currency[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CurrenciesTable extends CatalogEntriesTable
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        $this->catalog = 'CURRENCY';
        parent::initialize($config);
    }
}
