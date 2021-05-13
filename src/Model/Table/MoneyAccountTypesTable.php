<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MoneyAccountTypes Model
 *
 * @property \App\Model\Table\TagsTable&\Cake\ORM\Association\BelongsToMany $Tags
 *
 * @method \App\Model\Entity\MoneyAccountType newEmptyEntity()
 * @method \App\Model\Entity\MoneyAccountType newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\MoneyAccountType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MoneyAccountType get($primaryKey, $options = [])
 * @method \App\Model\Entity\MoneyAccountType findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\MoneyAccountType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MoneyAccountType[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\MoneyAccountType|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MoneyAccountType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MoneyAccountType[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MoneyAccountType[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\MoneyAccountType[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MoneyAccountType[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MoneyAccountTypesTable extends CatalogEntriesTable
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        $this->catalog = 'MONEY_ACCOUNT_TYPE';
        parent::initialize($config);
    }
}
