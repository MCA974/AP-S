<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Equipe extends Entity
{
    protected array $_accessible = [
        'num_club' => true,
        'nirm_groupe' => true,
        'nirm_championnat' => true,
        'club' => true,
        'created' => true,
        'modified' => true,
    ];
}
