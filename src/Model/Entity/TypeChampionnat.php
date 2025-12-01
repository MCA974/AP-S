<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TypeChampionnat Entity
 *
 * @property int $id
 * @property string $num_championnat
 * @property string $integer
 * @property string $nom_championnat
 * @property string $string
 * @property string $num_categorie
 * @property string $num_division
 * @property string $num_type_championnat
 */
class TypeChampionnat extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        
        
        'nom_championnat' => true,
        
    ];
}
