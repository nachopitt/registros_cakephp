<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Address Entity
 *
 * @property int $id
 * @property string $short_name
 * @property string $address_line_1
 * @property string $address_line_2
 * @property int $locality_id
 * @property int $region_id
 * @property int $country_id
 * @property string|null $postal_code
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Locality $locality
 * @property \App\Model\Entity\Region $region
 * @property \App\Model\Entity\Country $country
 */
class Address extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'short_name' => true,
        'address_line_1' => true,
        'address_line_2' => true,
        'locality_id' => true,
        'region_id' => true,
        'country_id' => true,
        'postal_code' => true,
        'created' => true,
        'modified' => true,
        'locality' => true,
        'region' => true,
        'country' => true,
    ];

    protected function _getSummary() {
        $summary = '';
        if ($this->_fields['short_name']) {
            $summary = $this->_fields['short_name'];
        }
        else {
            if ($this->_fields['address_line_1']) {
                $summary .= $this->_fields['address_line_1'];
            }
            if ($this->_fields['address_line_2']) {
                $summary .= ' - ' . $this->_fields['address_line_2'];
            }
            if ($this->_fields['postal_code']) {
                $summary .= ' - ' . $this->_fields['postal_code'];
            }
            if ($this->_fields['locality']['name']) {
                $summary .= ' - ' . $this->_fields['locality']['name'];
            }
            if ($this->_fields['region']['name']) {
                $summary .= ' - ' . $this->_fields['region']['name'];
            }
            if ($this->_fields['country']['name']) {
                $summary .= ' - ' . $this->_fields['country']['name'];
            }
        }

        return $summary;
    }
}
