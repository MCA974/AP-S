<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TypeChampionnat Entity
 *
 * @property int $num_type_championnat
 * @property string $nom_type_championnat
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 * @property \App\Model\Entity\Championnat[] $championnats
 */
class TypeChampionnat extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'num_type_championnat' => false,
        'nom_type_championnat' => true,
        'created' => false,
        'modified' => false,
        'championnats' => true,
    ];
}
