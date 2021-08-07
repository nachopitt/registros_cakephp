<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\I18n\Number;
use Cake\Utility\Text;

/**
 * PurchaseLine Entity
 *
 * @property int $id
 * @property int $purchase_id
 * @property int $product_id
 * @property string $quantity
 * @property int $unit_id
 * @property string $price
 * @property string $discount
 * @property bool $percentage_discount
 * @property bool $unit_discount
 * @property int $currency_id
 * @property string|null $description
 * @property int|null $seller_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Purchase $purchase
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Unit $unit
 * @property \App\Model\Entity\Currency $currency
 * @property \App\Model\Entity\Seller $seller
 * @property \App\Model\Entity\PurchaseUpdate[] $purchase_updates
 */
class PurchaseLine extends Entity
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
        'purchase_id' => true,
        'product_id' => true,
        'quantity' => true,
        'unit_id' => true,
        'price' => true,
        'discount' => true,
        'percentage_discount' => true,
        'unit_discount' => true,
        'currency_id' => true,
        'description' => true,
        'seller_id' => true,
        'created' => true,
        'modified' => true,
        'purchase' => true,
        'product' => true,
        'unit' => true,
        'currency' => true,
        'seller' => true,
        'purchase_updates' => true,
    ];

    protected function _getSummary() {
        $quantity = Number::format($this->_fields['quantity'], [
            'places' => 0,
            'precision' => 4,
            'after'=> ' ' . $this->_fields['unit']['short_name']
        ]);

        $price = Number::currency($this->_fields['price'], $this->_fields['currency']['short_name'], [
            'after' => ' ' . $this->_fields['currency']['short_name']
        ]);

        $summary = Text::insert(':quantity - :product_name - :price', [
            'quantity' => $quantity,
            'product_name' => $this->_fields['product']['name'],
            'price' => $price,
        ]);
        return $summary;
    }
}
