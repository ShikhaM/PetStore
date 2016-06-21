<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PetDetail Entity.
 *
 * @property int $id
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 * @property string $name
 * @property string $species
 * @property string $subspecies
 * @property \Cake\I18n\Time $dob
 * @property float $weight
 * @property float $price
 * @property string $description
 * @property string $colour
 * @property string $collection_location
 * @property string $image_url
 */
class PetDetail extends Entity
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
        '*' => true,
        'id' => false,
    ];
}
