<?php
declare(strict_types=1);

namespace App\Model\Behavior;

use ArrayObject;
use Cake\ORM\Behavior;
use Cake\Datasource\EntityInterface;
use Cake\Event\EventInterface;
use Cake\I18n\FrozenTime;

class UpdatableBehavior extends Behavior
{
    protected $_defaultConfig = [
        'updatesTable' => 'Updates',
        'dateField' => 'date',
        'stateField' => 'state',
        'descriptionField' => 'description',
        'descriptionFieldCallback' => null
    ];

    public function initialize(array $config): void
    {
        // Some initialization code here
    }

    // In a table or behavior class
    public function afterMarshal(EventInterface $event, EntityInterface $entity, ArrayObject $data, ArrayObject $options) {
        $dateField = $this->_config['dateField'];
        $stateField = $this->_config['stateField'];
        $descriptionField = $this->_config['descriptionField'];
        if ($entity->isNew() || (!$entity->isNew() && $entity->isDirty($stateField))) {
            if (empty($this->_config['descriptionFieldCallback'])) {
                $description = $entity->get($stateField);
                if (!$entity->isNew() && $entity->isDirty($stateField)) {
                    $description = $entity->getOriginal($stateField) . ' => ' . $entity->get($stateField);
                }
                else {
                    $description = $entity->get($stateField);
                }
            }
            else {
                $description = $this->_config['descriptionFieldCallback']($entity->isNew(), $entity->getOriginal($stateField), $entity->get($stateField));
            }
            $updatesTable = $this->table()->getAssociation($this->_config['updatesTable'])->getTarget();
            $update = $updatesTable->newEmptyEntity();
            $update->set($dateField, FrozenTime::now());
            $update->set($stateField, $entity->get($stateField));
            $update->set($descriptionField, $description);
            $entity[$updatesTable->getTable()] = [$update];
        }
    }
}