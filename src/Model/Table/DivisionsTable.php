<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class DivisionsTable extends Table {

    public function initialize(array $config): void {
        parent::initialize($config);
        
        $this->setTable('divisions');
        $this->setPrimaryKey('num_division');
        
        $this->addBehavior('Timestamp');
        
        // Relation avec Championnats
        $this->hasMany('Championnats', [
            'foreignKey' => 'num_division'
        ]);
    }

    public function validationDefault(Validator $validator): Validator {
        $validator
            ->notEmptyString('nom_division', __('Veuillez renseigner un nom de division'));

        return $validator;
    }
}
