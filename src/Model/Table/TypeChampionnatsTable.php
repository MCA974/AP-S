<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class TypeChampionnatsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('type_championnats');
        $this->setDisplayField('nom_type_championnat');
        // si votre PK est num_type_championnat
        $this->setPrimaryKey('num_type_championnat');

        // Association manquante : un type a plusieurs championnats
        $this->hasMany('Championnats', [
            'foreignKey' => 'num_type_championnat',
        ]);
    }
}
