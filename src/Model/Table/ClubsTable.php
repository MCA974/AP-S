<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ClubsTable extends Table {

    public function initialize(array $config): void {
        parent::initialize($config);
        
        $this->setTable('clubs');
        $this->setPrimaryKey('id');
        
        $this->addBehavior('Timestamp');
        
        // Ajouter cette relation
        $this->hasMany('Equipes', [
            'foreignKey' => 'num_club',
        ]);
    }

    public function validationDefault(Validator $validator): Validator {
        $validator
            ->notEmptyString('nom_club', __('Veuillez renseigner un nom'));

        return $validator;
    }
}