<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Equipe Entity
 *
 * @property int $id
 * @property string $num_equipe
 * @property int $num_club
 * @property int $num_championnat
 * @property string|null $num_groupe
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Club $club
 * @property \App\Model\Entity\Championnat $championnat
 */
class Equipe extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'num_equipe' => true,
        'num_club' => true,
        'num_championnat' => true,
        'num_groupe' => true,
        'created' => true,
        'modified' => true,
        'club' => true,
        'championnat' => true,
    ];
}